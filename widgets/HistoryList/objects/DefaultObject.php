<?php

namespace app\widgets\HistoryList\objects;

class DefaultObject extends HistoryObject
{
    public $viewName = '_common';

    public function render()
    {
        return $this->renderInternal($this->viewName, [
            'user' => $this->model->user,
            'body' => $this->getBody(),
            'bodyDatetime' => $this->model->ins_ts,
            'iconClass' => 'fa-gear bg-purple-light'
        ]);
    }

    public function getBody()
    {
        return $this->model->eventText;
    }
}