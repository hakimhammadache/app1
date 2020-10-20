<?php

namespace App\Controllers;

use App\Models\Naturetablisement;
use App\Controllers\Controller;



class NaturetabController extends Controller  
{

    public function index()
    {
        $Naturetablisement = new Naturetablisement($this->getDB());
        $Naturetablisements = $Naturetablisement->all();

        return $this->view('Naturetablisement.index', compact('Naturetablisements'));
    }

    public function create()
    {
        return $this->view('Naturetablisement.formNE');
    }


    public function createSave()
    {
        $Naturetablisement = new Naturetablisement($this->getDB());
        
        $result = $Naturetablisement->create($_POST);
        
        if ($result) {
            return header('Location: /Naturetablisement');
        }
    }
    
    public function show(int $id)
    {      
        $Naturetablisement = new Naturetablisement($this->getDB());
        $Naturetablisement = $Naturetablisement->findById($id);

        return $this->view('Naturetablisement.show', compact('Naturetablisement'));
    }

    public function edit(int $id)
    {
        $Naturetablisement = (new Naturetablisement($this->getDB()))->findById($id);
        return $this->view('Naturetablisement.formNE', compact('Naturetablisement'));
    }

    public function update(int $id)  
    {
        $Naturetablisement = new Naturetablisement($this->getDB());
        $result = $Naturetablisement->update($id, $_POST);
        if ($result) {
            return header('Location: /Naturetablisement');
        }
    }

    public function destroy(int $id)  
    {
        $Naturetablisement = new Naturetablisement($this->getDB());
        $result = $Naturetablisement->destroy($id);

        if ($result) {
            return header('Location: /Naturetablisement');
        }
    }
}
