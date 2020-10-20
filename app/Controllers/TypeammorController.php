<?php

namespace App\Controllers;

use App\Models\Typeammor;
use App\Controllers\Controller;



class TypeammorController extends Controller 
{

    public function index()
    {
        $Typeammor = new Typeammor($this->getDB());
        $Typeammors = $Typeammor->all();
        return $this->view('Typeammor.index', compact('Typeammors'));
    }

    public function create()
    {
        return $this->view('Typeammor.formTam');
    }


    public function createSave()
    {
        $Typeammor = new Typeammor($this->getDB());
        
        $result = $Typeammor->create($_POST);
        
        if ($result) {
            return header('Location: /Typeammortisement');
        }
    }
    
    public function show(int $id)
    {      
        $Typeammor = new Typeammor($this->getDB());
        $Typeammor = $Typeammor->findById($id);

        return $this->view('Typeammor.show', compact('Typeammor'));
    }

    public function edit(int $id)
    {
        $Typeammor = (new Typeammor($this->getDB()))->findById($id);
        return $this->view('Typeammor.formTam', compact('Typeammor'));
    }

    public function update(int $id)  
    {
        $Typeammor = new Typeammor($this->getDB());
        $result = $Typeammor->update($id, $_POST);
        if ($result) {
            return header('Location: /Typeammortisement');
        }
    }

}
