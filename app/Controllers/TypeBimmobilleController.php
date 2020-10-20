<?php

namespace App\Controllers;

use App\Models\Typebimmobile;
use App\Controllers\Controller;



class TypeBimmobilleController extends Controller 
{ 

    public function index()
    {
        $Typebimmobile = new Typebimmobile($this->getDB());
        $Typebimmobiles = $Typebimmobile->all();
        return $this->view('typebienImmobile.index', compact('Typebimmobiles'));
    }

    public function create()
    {
        return $this->view('typebienImmobile.formT');
    }


    public function createSave()
    {
        $Typebimmobile = new Typebimmobile($this->getDB());
        
        $result = $Typebimmobile->create($_POST);
        
        if ($result) {
            return header('Location: /typebienimmobile');
        }
    }
    
    public function show(int $id)
    {      
        $Typebimmobile = new Typebimmobile($this->getDB());
        $Typebimmobile = $Typebimmobile->findById($id);

        return $this->view('typebienImmobile.show', compact('Typebimmobile'));
    }

    public function edit(int $id)
    {
        $Typebimmobile = (new Typebimmobile($this->getDB()))->findById($id);
        return $this->view('typebienImmobile.formT', compact('Typebimmobile'));
    }

    public function update(int $id)  
    {
        $Typebimmobile = new Typebimmobile($this->getDB());
        $result = $Typebimmobile->update($id, $_POST);
        if ($result) {
            return header('Location: /typebienimmobile');
        }
    }

}
