<?php

namespace App\Controllers;

use App\Models\EtatPhysique;
use App\Controllers\Controller;



class EtatphController extends Controller   
{

    public function index()
    {
        $EtatPhysique = new EtatPhysique($this->getDB());
        $EtatPhysiques = $EtatPhysique->all();

        return $this->view('EtatPhysique.index', compact('EtatPhysiques'));
    }

    public function create()
    {
        return $this->view('EtatPhysique.formETph');
    }


    public function createSave()
    {
        $EtatPhysique = new EtatPhysique($this->getDB());
        
        $result = $EtatPhysique->create($_POST);
        
        if ($result) {
            return header('Location: /EtatPhysique');
        }
    }
    
    public function show(int $id)
    {      
        $EtatPhysique = new EtatPhysique($this->getDB());
        $EtatPhysique = $EtatPhysique->findById($id);

        return $this->view('EtatPhysique.show', compact('EtatPhysique'));
    }

    public function edit(int $id)
    {
        $EtatPhysique = (new EtatPhysique($this->getDB()))->findById($id);
        return $this->view('EtatPhysique.formETph', compact('EtatPhysique'));
    }

    public function update(int $id)  
    {
        $EtatPhysique = new EtatPhysique($this->getDB());
        $result = $EtatPhysique->update($id, $_POST);
        if ($result) {
            return header('Location: /EtatPhysique');
        }
    }

    public function destroy(int $id)  
    {
        $EtatPhysique = new EtatPhysique($this->getDB());
        $result = $EtatPhysique->destroy($id);

        if ($result) {
            return header('Location: /EtatPhysique');
        }
    }
}
