<?php

namespace app\widgets\HistoryList;

use app\models\search\HistorySearch;
use app\widgets\HistoryList\objects\ObjectResolverTrait;
use Yii;
use yii\base\Widget;

class HistoryList extends Widget
{
    use ObjectResolverTrait;

    /**
     * @return string
     */
    public function run()
    {
        $model = new HistorySearch();

        return $this->render('main', [
            'dataProvider' => $model->search(Yii::$app->request->queryParams)
        ]);
    }

    /**
     * @param $model
     * @param $key
     * @param $index
     * @return string
     */
    public function renderItem($model, $key, $index)
    {
        return $this->getObject($model, $key, $index)->render();
    }
}