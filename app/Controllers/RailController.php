<?php

namespace App\Controllers;

use App\Models\Commune;
use App\Models\Daira;
use App\Models\Wilaya;
use App\Models\Rail;
use App\Models\Qualiteraille;
use App\Controllers\Controller;
use App\Models\EtatPhysique;



class RailController extends Controller 
{

    public function index()
    {
    	$rail = new Rail($this->getDB());
    	$rail = $rail->all();
    	$etatPhs = (new EtatPhysique($this->getDB()))->all();
        $daira = new Daira($this->getDB());
        $dairas = $daira->all();

        $wilaya = new Wilaya($this->getDB());
        $wilayas = $wilaya->all();
        $communes = (new Commune($this->getDB()))->all();
        
        return $this->view('rail.index', compact('rail','dairas','wilayas','communes','etatPhs'));
    
 
     
    }


        public function createSave()
    {
        $rail = new Rail($this->getDB());
        
        $result = $rail->create($_POST);
        
        if ($result) {
            return header('Location: /rail');
        }
    }
     
}    