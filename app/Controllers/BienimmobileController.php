<?php

namespace App\Controllers;

use App\Models\Typebimmobile;
use App\Models\Bienimmobile;
use App\Models\Pci;
use App\Models\Typeammor;
use App\Models\Etablisement;
use App\Controllers\Controller;
use App\Models\EtatPhysique;
use App\Models\Typedoc;
use App\Models\Document;





class BienimmobileController extends Controller 
{

    public function index(){
     if ($this->isAuth()) { 
            $bim = new Bienimmobile($this->getDB());
            $etablisement = new Etablisement($this->getDB());
            if($_SESSION['auth']['role'] === 'admin'){
                $bims = $bim->all();
                $etablisements = $etablisement->all();
                
            }else{
                $bims = $bim->getBim($_SESSION['auth']['id']);
                $etablisements = $etablisement->getEtab($_SESSION['auth']['id']);
               
            }
            $pcis =( new pci($this->getDB()))->all();
            $amms =( new Typeammor($this->getDB()))->all();
            $typebims = ( new Typebimmobile($this->getDB()))->all();
            $etatPhs = (new EtatPhysique($this->getDB()))->all();
            return $this->view('Bienimmobile.index', compact('bims','etablisements','typebims','etatPhs','pcis','amms'));
        }
    }



    // fonction ajout 
    public function createSave()
    {
        $bim = new Bienimmobile($this->getDB());
        //var_dump($_POST); die();
        $result = $bim->create($_POST);
        
        if ($result) {
            return header('Location: /Bienimmobile');
        }
    }
    
    // cette fonction c'estpour voir plus ***
    // tu peux la supprimé 
    public function show(int $id)
    {      
        $bim = new Bienimmobile($this->getDB());
        $bim = $bim->findById($id);
        $EtatPhysique = new EtatPhysique($this->getDB());
        $EtatPhysique = $EtatPhysique->findById($bim->id_etat_ph);
        $doc = new Document($this->getDB());
        $docs= $doc->getDocbim($bim->id);
        $Typeammor = new Typeammor($this->getDB());
        $Typeammor = $Typeammor->findById($bim->id_type_amm);
        $Pci = new Pci($this->getDB());
        $Pci = $Pci->findById($bim->id_pci);
        $Typebimobile = new Typebimmobile($this->getDB());
        $Typebimobile = $Typebimobile->findById($bim->id_type_bien_im);
        $tdoc = new Typedoc($this->getDB());
        $tdoc = $tdoc->all();
        $etablisement = new Etablisement($this->getDB());
        $etablisements = $etablisement->all();

        return $this->view('Bienimmobile.show', compact('bim','EtatPhysique','docs','tdoc','Typebimobile','Typeammor','Pci','etablisements'));
    }

    public function update(int $id)  
    {
        $bim = new Bienimmobile($this->getDB());
        //var_dump($_POST); die();
        $result = $bim->update($id, $_POST);
        if ($result) {
            return header('Location: /Bienimmobile');
        }
    }

    public function destroy(int $id)  
    {
        $bim = new Bienimmobile($this->getDB());
        $result = $bim->destroy($id);

        if ($result) {
            return header('Location: /Bienimmobile');
        }
    }
}
