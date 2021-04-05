<?php

namespace app\widgets\HistoryList\objects;

use Yii;
use yii\helpers\Html;

class Fax extends DefaultObject
{

    public function render()
    {
        $model = $this->model;
        $fax = $model->fax;

        return $this->renderInternal($this->viewName, [
            'user' => $model->user,
            'body' => $this->getBody(),
            'footer' => Yii::t('app', '{type} was sent to {group}', [
                'type' => $fax ? $fax->getTypeText() : 'Fax',
                'group' => isset($fax->creditorGroup) ? Html::a($fax->creditorGroup->name, ['creditors/groups'], ['data-pjax' => 0]) : ''
            ]),
            'footerDatetime' => $model->ins_ts,
            'iconClass' => 'fa-fax bg-green'
        ]);
    }

    public function getBody()
    {
        $model = $this->model;
        $fax = $model->fax;

        return $model->eventText . ' - ' .
            (isset($fax->document) ? Html::a(
                Yii::t('app', 'view document'),
                $fax->document->getViewUrl(),
                [
                    'target' => '_blank',
                    'data-pjax' => 0
                ]
            ) : '');
    }
}