<?php

namespace App\Controllers;

use App\Models\Commune;
use App\Models\Daira;
use App\Models\Wilaya;
use App\Models\Terrain;
use App\Models\Etatterrain;
use App\Controllers\Controller;



class TerrainController extends Controller 
{

    public function index()
    {
        $terrain = new Terrain($this->getDB());
        $terrains = $terrain->all();
        $etatT = new Etatterrain($this->getDB());
        $etatT = $etatT->all();
;
        $daira = new Daira($this->getDB());
        $dairas = $daira->all();

        $wilaya = new Wilaya($this->getDB());
        $wilayas = $wilaya->all();
        $communes = (new Commune($this->getDB()))->all();
        
        return $this->view('terrain.index', compact('terrains','dairas','wilayas','communes','etatT'));
    } 

    public function create()
    {        
        $etaT = new Etatterrain($this->getDB());
        $etaTs = $etaT->all();

        $commune = new Commune($this->getDB());
        $communes = $commune->all();

        return $this->view('terrain.form', compact('etaT','commune'));
    }


    public function createSave()
    {
        $terrain = new Terrain($this->getDB());
        
        $result = $terrain->create($_POST);
        
        if ($result) {
            return header('Location: /terrain');
        }
    }
    
    public function show(int $id)
    {      
        $terrain = new Terrain($this->getDB());
        $terrain = $terrain->findById($id);

        return $this->view('terrain.show', compact('terrain'));
    }

    public function edit(int $id)
    {
        $terrain = (new Terrain($this->getDB()))->findById($id);
        return $this->view('terrain.form', compact('terrain'));
    }

    public function update(int $id)  
    {
        $terrain = new Terrain($this->getDB());
        $result = $terrain->update($id, $_POST);
        if ($result) {
            return header('Location: /terrain');
        }
    }

    public function destroy(int $id)  
    {
        $terrain = new Terrain($this->getDB());
        $result = $terrain->destroy($id);

        if ($result) {
            return header('Location: /terrain');
        }
    }
}
