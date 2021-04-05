<?php


namespace app\widgets\Export;

use app\widgets\HistoryList\objects\ObjectResolverTrait;

class MessageColumn extends \yii\grid\DataColumn
{
    use ObjectResolverTrait;

    /**
     * Returns the data cell value.
     * @param mixed $model the data model
     * @param mixed $key the key associated with the data model
     * @param int $index the zero-based index of the data model among the models array returned by [[GridView::dataProvider]].
     * @return string the data cell value
     */
    public function getDataCellValue($model, $key, $index)
    {
        $data = $this->getObject($model, $key, $index)->getBody();
        return strip_tags($data);
    }
}