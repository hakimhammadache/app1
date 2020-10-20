<?php

namespace App\Models;

class Document extends Model
{
    protected $table = 'document'; 


    public function getDoc(string $id)
    {
        return $this->query("
        SELECT * FROM document
        WHERE  id_bien_mob is null and id_bien_imob is null and id_etab = ? ",
        [$id]);


    }
       public function getDocbm(string $id)
    {
        return $this->query("
        SELECT doc.* FROM document doc
        INNER JOIN bien_mobile bm 
        ON doc.id_bien_mob = bm.id
        and
         doc.id_etab = bm.id_etab
        WHERE doc.id_bien_mob = ? ",
        [$id]);
            

    }
      public function getDocbim(string $id)
    {
        return $this->query("
        SELECT doc.* FROM document doc
        INNER JOIN bien_immobile bim 
        ON doc.id_bien_imob = bim.id
        and
         doc.id_etab = bim.id_etab
        WHERE doc.id_bien_imob = ? ",
        [$id]);
            

    }

    public function getTypedoc() 
    {
        return $this->query("
        SELECT typed.* FROM type_document typed 
        INNER JOIN document doc ON doc.id_type_doc = typed.id
        WHERE doc.id = ? ",
            [$this->id]);
    }
    
    public function getEtablisement() 
    {
        return $this->query("
        SELECT etabl.* FROM etabissement etabl 
        INNER JOIN document doc ON doc.id_etab = etabl.id
        WHERE doc.id = ? ",
            [$this->id]);
    }
        public function getBienmobile() 
    {
        return $this->query("
        SELECT bm.* FROM bien_mobile bm 
        INNER JOIN document doc
        ON doc.id_bien_mob = bm.id
        INNER JOIN etabissement etab
        ON bm.id_etab = etab.id
        WHERE doc.id = ? ",
            [$this->id]);
    }

            public function getBienimmobile() 
    {
        return $this->query("
        SELECT bim.* FROM bien_immobile bim 
        INNER JOIN document doc
        ON doc.id_bien_imob = bim.id
        INNER JOIN etabissement etab
        ON bim.id_etab = etab.id
        WHERE doc.id = ? ",
            [$this->id]);
    }

    

    public function create(array $data, ?array $relations = null){

        $nom_tmp=$data['tmp_name'];
        move_uploaded_file($nom_tmp,FILES . $data['nom_doc'].'.pdf');
        parent::create($data);
        return true;
    }

    public function destroy(int $id, ?string $pathefile = null) : bool
    {
        parent::destroy($id);
        unlink($pathefile);
        return true;
    }
}

