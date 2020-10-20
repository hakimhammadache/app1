<?php

namespace App\Models;

class Etablisement extends Model
{
    protected $table = 'etabissement'; 

    public function getEtab(string $id)
    {
        return $this->query("
        SELECT * FROM etabissement
        WHERE id = ? ",
        [$id]);
    }

    public function getCommune() 
    {
        return $this->query("
        SELECT c.* FROM commune c 
        INNER JOIN etabissement etabl ON etabl.id_commune = c.id
        WHERE etabl.id = ? ",
            [$this->id]);
    }
        public function getWilaya() 
    {
        return $this->query("
        SELECT w.* FROM wilaya w 
        INNER JOIN daira d ON d.id_wilaya = w.id 
        INNER JOIN commune c ON c.id_daira = d.id 
        INNER JOIN etabissement etabl ON etabl.id_commune=c.id
        WHERE etabl.id = ? ",
            [$this->id]);
    }

    
    public function getNatur()
    {
        return $this->query("
        SELECT nat.* FROM nature_etablisement nat
        INNER JOIN etabissement etabl ON etabl.id_natur_etab = nat.id
        WHERE etabl.id = ? ",
            [$this->id]);
    }

    public function getEtatph()
    {
        return $this->query("
        SELECT etat.* FROM etat_physique etat
        INNER JOIN etabissement etabl ON etabl.id_etat_ph = etat.id
        WHERE etabl.id = ? ",
            [$this->id]);
    }
    
}
