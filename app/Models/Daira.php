<?php

namespace App\Models;

class Daira extends Model
{
    protected $table = 'daira'; 
    

    public function getWilaya()
    {
        return $this->query("
        SELECT w.* FROM wilaya w 
        INNER JOIN daira d ON d.id_wilaya = w.id
        WHERE d.id = ? ",
            [$this->id]);
    }

}
