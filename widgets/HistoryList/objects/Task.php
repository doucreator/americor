<?php

namespace app\widgets\HistoryList\objects;

class Task extends DefaultObject
{

    public function render()
    {
        $model = $this->model;
        $task = $model->task;

        return $this->renderInternal($this->viewName, [
            'user' => $model->user,
            'body' => $this->getBody(),
            'iconClass' => 'fa-check-square bg-yellow',
            'footerDatetime' => $model->ins_ts,
            'footer' => isset($task->customerCreditor->name) ? "Creditor: " . $task->customerCreditor->name : ''
        ]);
    }

    public function getBody()
    {
        $model = $this->model;
        $task = $model->task;

        return "$model->eventText: " . ($task->title ?? '');
    }
}