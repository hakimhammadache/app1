<?php

namespace App\Controllers;

use App\Models\Daira;
use App\Models\Commune;
use App\Models\Destrict;
use App\Controllers\Controller; 



class CommuneController extends Controller 
{

    public function index()
    {
        $commune = new Commune($this->getDB());
        $communes = $commune->all();

        return $this->view('commune.index', compact('communes'));
    }

    public function create()
    {
        $daira = new Daira($this->getDB());
        $dairas = $daira->all();

        $destrict = new Destrict($this->getDB());
        $destricts = $destrict->all();

        return $this->view('commune.formC', compact('dairas','destricts'));
    }


    public function createSave()
    {
        $commune = new Commune($this->getDB());
        
        $result = $commune->create($_POST);
        
        if ($result) {
            return header('Location: /commune');
        }
    }
    
    public function show(int $id)
    {      
        $commune = new Commune($this->getDB());
        $commune = $commune->findById($id); 
        
        $daira = new Daira($this->getDB());
        $daira = $commune->getDaira();
        
        return $this->view('commune.show', compact('commune','daira'));
    }

    public function edit(int $id)
    {
        $daira = new Daira($this->getDB());
        $dairas = $daira->all();

        $destrict = new Destrict($this->getDB()); 
        $destricts = $destrict->all();

        $commune = (new Commune($this->getDB()))->findById($id);
        return $this->view('commune.formC', compact('commune','dairas','destricts'));
    }

    public function update(int $id)  
    {
        $commune = new Commune($this->getDB());
        $result = $commune->update($id, $_POST);
        if ($result) {
            return header('Location: /commune');
        }
    }

    public function destroy(int $id)  
    {
        $commune = new Commune($this->getDB());
        $result = $commune->destroy($id);

        if ($result) {
            return header('Location: /commune');
        }
    }
}
