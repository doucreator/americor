<?php

namespace app\widgets\HistoryList\objects;

use app\models\History;
use yii\helpers\Html;
use app\models\Customer as CustomerModel;

class Customer extends HistoryObject
{
    public $viewName = '_statuses_change';

    public function render()
    {
        $model = $this->model;
        $newValue = $oldValue = Html::tag('i', 'not set');
        switch ($model->event) {
            case History::EVENT_CUSTOMER_CHANGE_TYPE:
                $oldValue = CustomerModel::getTypeTextByType($model->getDetailOldValue('type'));
                $newValue = CustomerModel::getTypeTextByType($model->getDetailNewValue('type'));
                break;
            case History::EVENT_CUSTOMER_CHANGE_QUALITY:
                $oldValue = CustomerModel::getQualityTextByQuality($model->getDetailOldValue('quality'));
                $newValue = CustomerModel::getQualityTextByQuality($model->getDetailNewValue('quality'));
                break;
        }

        return $this->renderInternal($this->viewName, [
            'model' => $model,
            'oldValue' => $oldValue,
            'newValue' => $newValue
        ]);
    }

    public function getBody()
    {
        return $this->model->eventText;
    }
}