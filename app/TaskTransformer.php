<?php

namespace App; 

class TaskTransformer
{
    //
    public function transform($task) {
        return [
            '_id' => $task->_id,
            'title' => $task->title,
            'description' => $task->description,
            'due_date' => $task->due_date,
            'completed' => $task->completed,
            'created_at' => $task->created_at,
            'updated_at' => $task->updated_at,

        ];
    }
}
