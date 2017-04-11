<?php
namespace App\Model;

include_once(__DIR__ .'/myDB.php');
use App\Model\MyDB as MyDB;

class Task
{
    private $db;
    public $name;
    public $email;
    public $task;
    public $img;
    public $checked;
    public $id;
    
    function __construct()
    {
        $this->db = new MyDB();
    }

    static function get($id){
        $task = new Task();
        $array = $task->db->querySingle("SELECT * FROM `tasks` WHERE id = ".$id.";", true);
        $task->id = $id;
        $task->setName($array['name']);
        $task->setEmail($array['email']);
        $task->setTask($array['task']);
        $task->setImg($array['img']);
        $task->setChecked($array['checked']);
        return $task;
    }

    function valName($data){
        if (!preg_match("/^[a-zA-Z ]*$/",$data)) return false;
        $this->name = $data;
        return true;
    }

    function valEmail($data){
        if (!filter_var($data, FILTER_VALIDATE_EMAIL)) return false;
        $this->email = $data;
        return true;
    }

    function valTask($data){
        $text = htmlspecialchars($data);
        if(strlen($text) > 255) return false;
        $this->task = $text;
        return true;
    }

    function resize_image($file, $w, $h) {
        list($width, $height) = getimagesize($file);

        $r = $width / $height;

        if ($width > $height) {
            $width = ceil($width-($width*abs($r-$w/$h)));
        } else {
            $height = ceil($height-($height*abs($r-$w/$h)));
        }
        $newwidth = $w;
        $newheight = $h;

        $src = imagecreatefromjpeg($file);
        $dst = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        unlink($file);
        imagejpeg($dst, $file);
    }

    function valImg($data){
        $imageFileType = pathinfo($data["name"], PATHINFO_EXTENSION);
        $file = 'img/'.time().(rand() % 100).'.'.$imageFileType;
        $target_file = __DIR__ .'/../'.$file;

        if(!getimagesize($data["tmp_name"])) return false;
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) return false;
        if (!move_uploaded_file($data["tmp_name"], $target_file)) return false;

        $this->img = $file;
        $this->resize_image($target_file, 340, 240);
        return true;
    }

    function save(){
        $this->db->exec("INSERT INTO `tasks`(name,email,task,img) VALUES ('".
                        $this->name."', '".$this->email."', '".$this->task."', '".$this->img."');");
    }

    function setName($data){
        $this->name = $data;
    }

    function setEmail($data){
        $this->email = $data;
    }

    function setTask($data){
        $this->task = $data;
    }

    function setImg($data){
        $this->img = $data;
    }

    function setChecked($data){
        $this->checked = $data;
    }

    static function getPageBy($col, $start, $end){
        $tasks = array();

        $db = new MyDB();

        $result = $db->query('SELECT * FROM tasks ORDER BY '.$col.' COLLATE NOCASE ASC LIMIT '.$start.', '.$end.';');

        $i = 0;
        while($array = $result->fetchArray(SQLITE3_ASSOC)){ 

            if(!isset($array['id'])) continue; 

            $task = new Task();
            $task->id = $array['id'];
            $task->setName($array['name']);
            $task->setEmail($array['email']);
            $task->setTask($array['task']);
            $task->setImg($array['img']);
            $task->setChecked($array['checked']);

            array_push($tasks, $task);

            $i++;
          } 

        $db->close();
        
        return $tasks;
    }

    static function getPageId($start, $end){
        return self::getPageBy('id', $start, $end);
    }

    static function getPageName($start, $end){
        return self::getPageBy('name', $start, $end);
    }

    static function getPageEmail($start, $end){
        return self::getPageBy('email', $start, $end);
    }

    static function getPageChecked($start, $end){
        return self::getPageBy('checked', $start, $end);
    }

    static function getCount(){
        $db = new MyDB();
        return $db->query('SELECT COUNT(*) FROM tasks;')->fetchArray(SQLITE3_ASSOC)['COUNT(*)'];
    }

    function update(){
        $this->db->exec("UPDATE `tasks` SET name = '".
                        $this->name."', email = '".$this->email."', task = '".$this->task.
                        "', img = '".$this->img."', checked = '".$this->checked."' WHERE id = ".$this->id.";");
    }
}