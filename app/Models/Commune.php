<?php

namespace App\Models;

class Commune extends Model
{
    protected $table = 'commune'; 

    public function getDaira() 
    {
        return $this->query("
        SELECT d.* FROM daira d 
        INNER JOIN commune c ON c.id_daira = d.id
        WHERE c.id = ? ",
            [$this->id]);
    }

    
    public function getDestrict()
    {
        return $this->query("
        SELECT dest.* FROM destricte dest
        INNER JOIN commune c ON c.id_destricte = dest.id
        WHERE c.id = ? ",
            [$this->id]);
    }


}
