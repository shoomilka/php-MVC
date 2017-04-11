<?php

namespace App\Controller;

require_once(__DIR__ .'/../model/task.php');
use App\Model\Task as Task;

class UploadController
{
    function create(){
        require_once(__DIR__ .'/../view/create.php');
    }

    function store(){
        $task = new Task;
        $v = $task->valName($_POST["name"]);
        $v = $v && $task->valEmail($_POST["email"]);
        $v = $v && $task->valTask($_POST["task"]);
        $v = $v && $task->valImg($_FILES["img"]);

        if($v !== true){
            $msg = 'Your data is not valid.';
            require_once(__DIR__ .'/../view/create.php');
            return;
        }
        
        $task->save();
        $msg = 'Your task was saved.';
        require_once(__DIR__ .'/../view/create.php');
    }
}