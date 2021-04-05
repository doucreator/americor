<?php

namespace app\widgets\Export;

use kartik\export\ExportMenu;
use Yii;

class Export extends ExportMenu
{
    public $exportType = self::FORMAT_CSV;

    public function init()
    {
        if ($exportParamsNames = Yii::$app->request->post('exportParamsNames')) {
            Yii::configure($this, $exportParamsNames);
        }

        parent::init();
    }
}