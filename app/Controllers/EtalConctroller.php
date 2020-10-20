<?php
 
namespace App\Controllers;

use App\Models\Commune;
use App\Models\Bienmobile;
use App\Models\Bienimmobile;
use App\Models\Document;
use App\Models\Daira;
use App\Models\Wilaya;
use App\Models\Etablisement;
use App\Models\EtatPhysique;
use App\Controllers\Controller; 
use App\Models\Naturetablisement;



class EtalConctroller extends Controller 
{

    public function index()
    {
        $etablisement = new Etablisement($this->getDB());

        $etablisements = $etablisement->all();

        $communes = (new Commune($this->getDB()))->all();
        $wilayas = (new Wilaya($this->getDB()))->all();
      
        $natureEtabls = (new Naturetablisement($this->getDB()))->all();

        $etatPhs = (new EtatPhysique($this->getDB()))->all();

         return $this->view('etablisement.index', compact('etablisements','communes','natureEtabls','etatPhs','wilayas'));
    }


    // fonction ajout 
    public function createSave()
    {
        $etablisement = new Etablisement($this->getDB());
      
        $result = $etablisement->create($_POST);
        
        if ($result) {
            return header('Location: /etablisement');
        }
    }
    
    // cette fonction c'estpour voir plus ***
    // tu peux la supprimé 
    public function show(int $id)
    {      
        $etablisement = new Etablisement($this->getDB());
        $etablisement = $etablisement->findById($id);
        $commune = new Commune($this->getDB());
        $commune = $commune->findById($etablisement->id_commune);
        $daira = new Daira($this->getDB());
        $daira = $daira->findById($commune->id_daira);
        $wilaya = new wilaya($this->getDB());
        $wilaya = $wilaya->findById($daira->id_wilaya);
        $Naturetablisement = new Naturetablisement($this->getDB());
        $Naturetablisement = $Naturetablisement->findById($etablisement->id_natur_etab);
        $EtatPhysique = new EtatPhysique($this->getDB());
        $EtatPhysique = $EtatPhysique->findById($etablisement->id_etat_ph);
        $bm = new Bienmobile($this->getDB());
        $bm= $bm->getBm($id);
        $bim = new Bienimmobile($this->getDB());
        $bims= $bim->getBim($id);
        $doc = new Document($this->getDB());
        $docs= $doc->getDoc($id);

        return $this->view('etablisement.show', compact('etablisement','daira','commune','EtatPhysique','wilaya','Naturetablisement','bm','bims','docs'));
    }

    public function update(int $id)  
    {
        $etablisement = new Etablisement($this->getDB());
        //var_dump($_POST); die();
        $result = $etablisement->update($id, $_POST);
        if ($result) {
            return header('Location: /etablisement');
        }
    }

    public function destroy(int $id)  
    {
        $etablisement = new Etablisement($this->getDB());
        $result = $etablisement->destroy($id);

        if ($result) {
            return header('Location: /etablisement');
        }
    }


    public function insertmap(){

      
$name = htmlspecialchars(trim($_POST['name']));
$lat = htmlspecialchars(trim($_POST['lat']));
$lng = htmlspecialchars(trim($_POST['lng']));
$cmne = htmlspecialchars(trim($_POST['cmne']));
$nat_etab = htmlspecialchars(trim($_POST['nat_etab']));
$etat_phy = htmlspecialchars(trim($_POST['etat_phy']));
$db->exec("INSERT INTO etabissement (nom_etab,localisation_lng,localisation_lat,id_commune,id_natur_etab,id_etat_ph) VALUES ('$name','$lng','$lat','$cmne','$nat_etab','$etat_phy');");
if ($db) {
  echo"ok";

}
$db = NULL;





    }
}
