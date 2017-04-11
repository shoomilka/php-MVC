<?php
namespace App;

require_once(__DIR__ .'/controller/UploadController.php');
require_once(__DIR__ .'/controller/AdminController.php');

use App\Controller\UploadController as UploadController;
use App\Controller\AdminController as AdminController;

    $url = $_SERVER['REQUEST_URI'];
    session_start();

    if($url !== '/index.php' && $url !== '/'){
        $AdCon = new AdminController();
            
        if($url == '/index.php/login'){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') return $AdCon->postLogin();
            if ($_SERVER['REQUEST_METHOD'] === 'GET') return $AdCon->getLogin();
        }

        if(isset($_SESSION['username'])){
            if($_SESSION['username'] == 'admin'){
                if(isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
                    return $AdCon->store($_GET['id']);
                }
                isset($_GET['page']) ? $page = $_GET['page'] : $page = 0;
                isset($_GET['sort']) ? $sort = $_GET['sort'] : $sort = 0;
                return $AdCon->getList($page, $sort);
            }
        }

    }

    $UpCon = new UploadController();
    if($_SERVER['REQUEST_METHOD'] == 'POST') $UpCon->store();
    else $UpCon->create();
?>