<?php

namespace App\Models;

class Bienimmobile extends Model
{
    protected $table = 'bien_immobile'; 


    public function getBim(string $id)
    {
        return $this->query("
        SELECT * FROM bien_immobile
        WHERE id_etab = ? ",
        [$id]);
    }

    public function getTypeBim() 
    {
        return $this->query("
        SELECT typed.* FROM type_bien_immobile typed 
        INNER JOIN bien_immobile bim ON bim.id_type_bien_im = typed.id
        WHERE bim.id = ? ",
            [$this->id]);
    }
    
    public function getEtablisement() 
    {
        return $this->query("
        SELECT etabl.* FROM etabissement etabl 
        INNER JOIN bien_immobile bim ON bim.id_etab = etabl.id
        WHERE bim.id = ? ",
            [$this->id]);
    }
     
      public function getEtatph()
    {
        return $this->query("
        SELECT etat.* FROM etat_physique etat
        INNER JOIN bien_immobile bim ON bim.id_etat_ph = etat.id
        WHERE bim.id = ? ",
            [$this->id]);
    }
     public function getPCI()
    {
        return $this->query("
        SELECT p.* FROM pci p
        INNER JOIN bien_immobile bim ON bim.id_pci = p.id
        WHERE bim.id = ? ",
            [$this->id]);
    }
    public function getAmm()
    {
        return $this->query("
        SELECT a.* FROM type_ammortisement a
        INNER JOIN bien_immobile bim ON bim.id_type_amm = a.id
        WHERE bim.id = ? ",
            [$this->id]);
    }


}

