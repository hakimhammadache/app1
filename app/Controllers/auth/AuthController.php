<?php

namespace App\Controllers\auth;



use App\Models\User;
use App\Controllers\Controller;



class AuthController extends Controller 
{


    public function welcome()
    {
        require VIEWS.'auth/login.php';
      
    }

    public function login()
    {
        $user = new User($this->getDB());
        $user = $user->getUser($_POST['username']);
        $t = $user->getEtab();
        $ar2 = get_object_vars(array_pop($t)) ;
        if (password_verify($_POST['password'], $user->password)) {
            $ar1 =  array(
                "email" => $user->email,
                "username" => $user->username,
                "role"=> $user->role
            ); 
            $_SESSION['auth'] = array_merge($ar1,$ar2);
            return header('Location: /hello');
        } else {
            return header('Location: /?erreur_mdp=true');
        }
    }

    public function hello()
    {
        return $this->view('auth.hello');
    }

    public function logout()
    {
        session_destroy();
        return header('Location: /');
    }
}