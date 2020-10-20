<?php

namespace App\Controllers;
 
use Database\DbConnect;

abstract class Controller  
{

    protected $db;

    public function __construct(DbConnect $db)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->db= $db;
    }

    protected function view(string $path =null, array $params = null)
    {
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';
 
        $content = ob_get_clean();
        require VIEWS . 'layout.php';
    }

    
    protected function welcomeview(string $path =null, array $params = null)
    {
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';
        $content = ob_get_clean();
        require VIEWS . 'layout.php';
    }


    protected function getDB()
    {
        return $this->db;
    }


    protected function isAuth(){

        if (isset($_SESSION['auth'])){
            return true;
        }else{
            session_destroy();
            return header('Location: /?errur_auth=true');
        }
    }

    protected function isUpdateD(){

        if ($_SESSION['auth']['role'] === 'user update'){
            return true;
        }else{
            session_destroy();
            return header('Location: /?errur_userUpdataData=true');
        }
    }
        protected function isInventaire(){

        if ($_SESSION['auth']['role'] === 'user inventaire'){
            return true;
        }else{
            session_destroy();
            return header('Location: /?errur_userUpdataData=true');
        }
    }

    protected function isAdmin()
    {
        if ($_SESSION['auth']['role'] === 'admin') {
            return true;
        } else {
            session_destroy();
            return header('Location: /errur_ad1=true');
        }
    }


}
