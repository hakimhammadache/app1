<?php

namespace App\Models;

class Bienmobile extends Model
{
    protected $table = 'bien_mobile'; 


    public function getBm(string $id)
    {
        return $this->query("
        SELECT * FROM bien_mobile
        WHERE id_etab = ? ",
        [$id]);
    }

    public function getTypeBm() 
    {
        return $this->query("
        SELECT typed.* FROM type_bien_mobile typed 
        INNER JOIN bien_mobile bm ON bm.id_type_mob = typed.id
        WHERE bm.id = ? ",
            [$this->id]);
    }
    
    public function getEtablisement() 
    {
        return $this->query("
        SELECT etabl.* FROM etabissement etabl 
        INNER JOIN bien_mobile bm ON bm.id_etab = etabl.id
        WHERE bm.id = ? ",
            [$this->id]);
    }
      
      public function getEtatph()
    {
        return $this->query("
        SELECT etat.* FROM etat_physique etat
        INNER JOIN bien_mobile bm ON bm.id_etat_ph = etat.id
        WHERE bm.id = ? ",
            [$this->id]);
    }
     public function getPCI()
    {
        return $this->query("
        SELECT p.* FROM pci p
        INNER JOIN bien_mobile bm ON bm.id_pci = p.id
        WHERE bm.id = ? ",
            [$this->id]);
    }
    public function getAmm()
    {
        return $this->query("
        SELECT a.* FROM type_ammortisement a
        INNER JOIN bien_mobile bm ON bm.id_type_amm = a.id
        WHERE bm.id = ? ",
            [$this->id]);
    }

       public function getDoc()
    {
        return $this->query("
        SELECT doc.* FROM document doc 
        INNER JOIN bien_mobile bm
        ON doc.id_bien_mob = bm.id
        INNER JOIN type_document tp
        ON doc.id_type_doc = tp.id
        WHERE bm.id = ? ",
            [$this->id]);
    }
    public function getTypedoc() 
    {
        return $this->query("
        SELECT typed.* FROM type_document typed 
        INNER JOIN document doc ON doc.id_type_doc = typed.id
        WHERE doc.id = ? ",
            [$this->id]);
    }


    }




