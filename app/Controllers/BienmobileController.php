<?php

namespace App\Controllers;

use App\Models\Typebmobile;
use App\Models\Typedoc;
use App\Models\Document;
use App\Models\Pci;
use App\Models\Typeammor;
use App\Models\Bienmobile;
use App\Models\Etablisement;
use App\Controllers\Controller;
use App\Models\EtatPhysique;



 
class BienmobileController extends Controller 
{

    public function index(){
     if ($this->isAuth()) {
            $bm = new Bienmobile($this->getDB());
            $etablisement = new Etablisement($this->getDB());
            if($_SESSION['auth']['role'] === 'admin'){
                $bms = $bm->all();
                $etablisements = $etablisement->all();
                
            }else{
                $bms = $bm->getBm($_SESSION['auth']['id']);
                $etablisements = $etablisement->getEtab($_SESSION['auth']['id']);
               
            }


            $pcis = (new Pci($this->getDB()))->all();
            $amms = (new Typeammor($this->getDB()))->all();
            $typebms = (new Typebmobile($this->getDB()))->all();
            $etatPhs = (new EtatPhysique($this->getDB()))->all();
            return $this->view('Bienmobile.index', compact('bms','etablisements','typebms','etatPhs','amms','pcis'));
        }
    }



    // fonction ajout 
    public function createSave()
    {
        $bm = new Bienmobile($this->getDB());
        $result = $bm->create($_POST);
        
        if ($result) {
            return header('Location: /Bienmobile');
        }
    }
    
    // cette fonction c'estpour voir plus ***

    public function show(int $id)
    {       
        $bm = new Bienmobile($this->getDB());
        $bm = $bm->findById($id);
        $EtatPhysique = new EtatPhysique($this->getDB());
        $EtatPhysique = $EtatPhysique->findById($bm->id_etat_ph);
        $doc = new Document($this->getDB());
        $docs= $doc->getDocbm($bm->id);
        $Typeammor = new Typeammor($this->getDB());
        $Typeammor = $Typeammor->findById($bm->id_type_amm);
        $Pci = new Pci($this->getDB());
        $Pci = $Pci->findById($bm->id_pci);
        $Typebmobile = new Typebmobile($this->getDB());
        $Typebmobile = $Typebmobile->findById($bm->id_type_mob);
        $tdoc = new Typedoc($this->getDB());
        $tdoc = $tdoc->all();
        $etablisement = new Etablisement($this->getDB());
        $etablisements = $etablisement->all();

        
        return $this->view('Bienmobile.show', compact('bm','EtatPhysique','docs','tdoc','Typebmobile','Typeammor','Pci','etablisements'));
    }

    public function update(int $id)  
    {
        $bm = new Bienmobile($this->getDB());
        //var_dump($_POST); die();
        $result = $bm->update($id, $_POST);
        if ($result) {
            return header('Location: /Bienmobile');
        }
    }
    

    public function destroy(int $id)  
    {
        $bm = new Bienmobile($this->getDB());
        $result = $bm->destroy($id);

        if ($result) {
            return header('Location: /Bienmobile');
        }
    }
}
