<?php

namespace app\controllers;

use app\models\search\HistorySearch;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


    /**
     * @return string
     */
    public function actionExport()
    {
        $model = new HistorySearch();

        $filename = 'history';
        $filename .= '-' . time();
        $batchSize = 2000;
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '2048M');

        return $this->render('export', [
            'dataProvider' => $model->search(Yii::$app->request->queryParams),
            'filename' => $filename,
            'batchSize' => $batchSize
        ]);
    }
}
