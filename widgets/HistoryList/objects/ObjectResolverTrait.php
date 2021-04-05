<?php


namespace app\widgets\HistoryList\objects;

use app\models\History;


trait ObjectResolverTrait
{
    /**
     * @param $model
     * @param $key
     * @param $index
     * @return HistoryObject
     */
    public function getObject(History $model, $key, $index)
    {
        $params = compact('model', 'key', 'index');
        $class = $this->resolveObjectClass($model->object);
        return new $class($params);
    }


    private function resolveObjectClass($object)
    {
        if ($className = History::getClassNameByRelation($object)) {
            return $this->getClass($className) ?? DefaultObject::class;
        }

        return DefaultObject::class;
    }


    private function getClass($className)
    {
        $className = (new \ReflectionClass($this))->getNamespaceName() . '\\' . (new \ReflectionClass($className))->getShortName();
        return class_exists($className) ? $className : null;
    }
}