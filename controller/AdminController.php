<?php

namespace App\Controller;

require_once(__DIR__ .'/../model/task.php');
use App\Model\Task as Task;

class AdminController
{
    function edit($id){
        $task = Task::get($id);
        require_once(__DIR__ .'/../view/edit.php');
    }

    function store($id){
        $task = Task::get($id);

        if($task->valTask($_POST["task"]) !== true){
            $msg = 'Your data is not valid.';
            $this->getList('', '', $msg);
            return;
        }

        $task->setChecked((isset($_POST["checked"])) ? true:false);
        
        $task->update();
        $msg = 'Your task was saved.';
        $this->getList('', '', $msg);
    }

    function getLogin(){
        require_once(__DIR__ .'/../view/login.php');
    }

    function postLogin(){
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
				
            if ($_POST['username'] == 'admin' && $_POST['password'] == '123') {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = 'admin';
                  return $this->getList();
               }else {
                  $msg = 'Wrong username or password';
                  require_once(__DIR__ .'/../view/login.php');
               }
            }
    }

    function getList($page = 1, $sort = '', $msg = ''){
        if($page < 1) $page = 1;

        $start = $page*3-3;
        $all = ceil(Task::getCount() / 3);

        $min = max(1, $page-3);
        $max = min($page+3, $all);

        if($sort === 'checked'){
            $tasks = Task::getPageChecked($start, $start+3);
        } elseif ($sort === 'name') {
            $tasks = Task::getPageName($start, $start+3);
        } elseif ($sort === 'email') {
            $tasks = Task::getPageEmail($start, $start+3);
        } else {
            $tasks = Task::getPageId($start, $start+3);
        }

        require_once(__DIR__ .'/../view/list.php');
    }
}