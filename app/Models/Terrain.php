<?php

namespace App\Models;

class Terrain extends Model
{
    protected $table = 'terrain'; 

    public function getCommune() 
    {
        return $this->query("
        SELECT c.* FROM commune c 
        INNER JOIN terrain ter ON ter.id_commune = c.id
        WHERE ter.id = ? ",
            [$this->id]);
    }

    
    public function getEtat()
    {
        return $this->query("
        SELECT etat.* FROM etat_terrain etat
        INNER JOIN terrain ter ON ter.id_etat = etat.id
        WHERE ter.id = ? ",
            [$this->id]);
    }


}