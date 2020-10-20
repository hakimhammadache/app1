<?php

namespace App\Models;

class Rail extends Model
{
    protected $table = 'voie_ferroviaire'; 

    public function getCommune() 
    {
        return $this->query("
        SELECT c.* FROM commune c 
        INNER JOIN voie_ferroviaire v ON v.id_commune = c.id
        WHERE v.id = ? ",
            [$this->id]);
    }

    
    public function getEtat()
    {
        return $this->query("
        SELECT etat.* FROM etat_physique etat
        INNER JOIN voie_ferroviaire v ON v.id_etat_ph = etat.id
        WHERE v.id = ? ",
            [$this->id]);
    }


}