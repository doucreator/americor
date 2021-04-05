<?php

namespace app\widgets\HistoryList\objects;

use app\models\Sms as SmsModel;
use Yii;

class Sms extends DefaultObject
{

    public function render()
    {
        $model = $this->model;

        return $this->renderInternal($this->viewName, [
            'user' => $model->user,
            'body' => $this->getBody(),
            'footer' => $model->sms->direction == SmsModel::DIRECTION_INCOMING ?
                Yii::t('app', 'Incoming message from {number}', [
                    'number' => $model->sms->phone_from ?? ''
                ]) : Yii::t('app', 'Sent message to {number}', [
                    'number' => $model->sms->phone_to ?? ''
                ]),
            'iconIncome' => $model->sms->direction == SmsModel::DIRECTION_INCOMING,
            'footerDatetime' => $model->ins_ts,
            'iconClass' => 'icon-sms bg-dark-blue'
        ]);
    }

    public function getBody()
    {
        return $this->model->sms->message ?: '';
    }
}