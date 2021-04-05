<?php

namespace app\widgets\HistoryList\objects;

use app\models\Call as CallModel;

class Call extends DefaultObject
{

    public function render()
    {
        $model = $this->model;
        $call = $model->call;
        $answered = $call && $call->status == CallModel::STATUS_ANSWERED;

        return $this->renderInternal($this->viewName, [
            'user' => $model->user,
            'content' => $call->comment ?? '',
            'body' => $this->getBody(),
            'footerDatetime' => $model->ins_ts,
            'footer' => isset($call->applicant) ? "Called <span>{$call->applicant->name}</span>" : null,
            'iconClass' => $answered ? 'md-phone bg-green' : 'md-phone-missed bg-red',
            'iconIncome' => $answered && $call->direction == CallModel::DIRECTION_INCOMING
        ]);
    }

    public function getBody()
    {
        $call = $this->model->call;
        if ($call) {
            return $call->totalStatusText . ($call->getTotalDisposition(false) ? " <span class='text-grey'>" . $call->getTotalDisposition(false) . "</span>" : "");
        } else {
            return '<i>Deleted</i> ';
        }
    }
}