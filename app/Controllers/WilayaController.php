<?php

namespace App\Controllers;

use App\Models\Wilaya;
use App\Controllers\Controller;



class WilayaController extends Controller 
{

    public function index()
    {
        $wilaya = new wilaya($this->getDB());
        $wilayas = $wilaya->all();

        return $this->view('wilaya.index', compact('wilayas'));
    }

    public function create()
    {
        return $this->view('wilaya.formW', compact('wilaya'));
    }


    public function createSave()
    {
        $wilaya = new wilaya($this->getDB());
        
        $result = $wilaya->create($_POST);
        
        if ($result) {
            return header('Location: /wilaya');
        }
    }
    
    public function show(int $id)
    {      
        $wilaya = new wilaya($this->getDB());
        $wilaya = $wilaya->findById($id);

        return $this->view('wilaya.show', compact('wilaya'));
    }

    public function edit(int $id)
    {
        $wilaya = (new wilaya($this->getDB()))->findById($id);
        var_dump(get_object_vars($wilaya));die();
        return $this->view('wilaya.formW', compact('wilaya'));
    }

    public function update(int $id)  
    {
        $wilaya = new wilaya($this->getDB());
        $result = $wilaya->update($id, $_POST);
        if ($result) {
            return header('Location: /wilaya');
        }
    }

    public function destroy(int $id)  
    {
        $wilaya = new wilaya($this->getDB());
        $result = $wilaya->destroy($id);

        if ($result) {
            return header('Location: /wilaya');
        }
    }
}
