<?php

namespace App\Models;

class User extends Model
{
    protected $table = 'user'; 

    public function getUser(string $username) : User
    {
        $resul = $this->query("
        SELECT * FROM user 
        WHERE username = ? ",
            [$username],true);
            if ($resul) {
                return $resul;
            } else {
                return header('Location: /?erreur_psd=true');
                die();
            }
            
    }

    public function getEtab() 
    {
        return $this->query("
        SELECT * FROM etabissement
        WHERE id = ? ",
            [$this->etab_id]);
    }
}