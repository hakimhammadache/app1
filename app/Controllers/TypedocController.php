<?php

namespace App\Controllers;

use App\Models\Typedoc;
use App\Controllers\Controller;



class TypedocController extends Controller 
{

    public function index() 
    {
        $tdoc = new Typedoc($this->getDB());
        $tdocs = $tdoc->all();

        return $this->view('typeDocument.index', compact('tdocs'));
    }

    public function create()
    {
        return $this->view('typeDocument.form');
    }


    public function createSave()
    {
        $tdoc = new Typedoc($this->getDB());
        
        $result = $tdoc->create($_POST);
        
        if ($result) {
            return header('Location: /typeDocument');
        }
    }
     
    public function show(int $id)
    {      
        $tdoc = new Typedoc($this->getDB());
        $tdoc = $tdoc->findById($id);
        return $this->view('typeDocument.show', compact('tdoc'));
    }

    public function edit(int $id)
    {
        $tdoc = (new Typedoc($this->getDB()))->findById($id);
        return $this->view('typeDocument.form', compact('tdoc'));
    }

    public function update(int $id)  
    {
        $tdoc = new Typedoc($this->getDB());
        $result = $tdoc->update($id, $_POST);
        if ($result) {
            return header('Location: /typeDocument');
        }
    }

    public function destroy(int $id)  
    {
        $tdoc = new Typedoc($this->getDB());
        $result = $tdoc->destroy($id);

        if ($result) {
            return header('Location: /typeDocument');
        }
    }
}
