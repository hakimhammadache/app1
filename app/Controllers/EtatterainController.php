<?php

namespace App\Controllers;

use App\Models\Etatterrain;
use App\Controllers\Controller;



class EtatterainController extends Controller 
{

    public function index()
    {
        $etatT = new Etatterrain($this->getDB());
        $etatTs = $etatT->all();

        return $this->view('EtatTerain.index', compact('etatTs'));
    }

    public function create()
    {
        return $this->view('EtatTerain.formEtr');
    }


    public function createSave()
    {
        $etatT = new Etatterrain($this->getDB());
        
        $result = $etatT->create($_POST);
        
        if ($result) {
            return header('Location: /etatTerrain');
        }
    }
    
    public function show(int $id)
    {      
        $etatT = new Etatterrain($this->getDB());
        $etatT = $etatT->findById($id);

        return $this->view('EtatTerain.show', compact('etatT'));
    }

    public function edit(int $id)
    {
        $etatT = (new Etatterrain($this->getDB()))->findById($id);
        return $this->view('EtatTerain.formEtr', compact('etatT'));
    }

    public function update(int $id)  
    {
        $etatT = new Etatterrain($this->getDB());
        $result = $etatT->update($id, $_POST);
        if ($result) {
            return header('Location: /etatTerrain');
        }
    }

    public function destroy(int $id)  
    {
        $etatT = new Etatterrain($this->getDB());
        $result = $etatT->destroy($id);

        if ($result) {
            return header('Location: /etatTerrain');
        }
    }
}
