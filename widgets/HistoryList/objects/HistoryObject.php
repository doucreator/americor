<?php

namespace app\widgets\HistoryList\objects;

use Yii;
use yii\base\BaseObject;
use yii\base\ViewContextInterface;

abstract class HistoryObject extends BaseObject implements ViewContextInterface
{
    public $model;
    public $key;
    public $index;
    public $viewName;


    abstract public function render();

    abstract public function getBody();


    protected function renderInternal(string $view, array $params)
    {
        return Yii::$app->getView()->render($view, $params, $this);
    }


    /**
     * @return string the directory containing the view files.
     */
    public function getViewPath()
    {
        $class = new \ReflectionClass($this);

        return dirname($class->getFileName()) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'views';
    }
}