<?php

namespace app\widgets\Export;

use Yii;
use yii\base\Widget;

class ExportButton extends Widget
{
    public $name;
    public $pjax = 0;
    public $options = ['class' => 'btn btn-success'];
    public $exportType = Export::FORMAT_CSV;

    public $url = 'site/export';
    public $urlParams;

    public $exportRequestParam;
    public $exportTypeParam = 'export_type';
    public $colSelFlagParam = 'column_selector_enabled';


    public function __construct($config = [])
    {
        $this->urlParams = Yii::$app->getRequest()->getQueryParams();
        $this->exportRequestParam = 'exportFull_' . rand(0, 100);
        parent::__construct($config);
    }

    public function run()
    {
        return $this->render('button');
    }

    public function getFormAction()
    {
        $this->urlParams[0] = $this->url;
        return $this->urlParams;
    }
}