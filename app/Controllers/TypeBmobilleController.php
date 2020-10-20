<?php

namespace App\Controllers;

use App\Models\Typebmobile;
use App\Controllers\Controller;



class TypeBmobilleController extends Controller 
{ 

    public function index()
    {
        $Typebmobile = new Typebmobile($this->getDB());
        $Typebmobiles = $Typebmobile->all();
        return $this->view('typebienMobile.index', compact('Typebmobiles'));
    }

    public function create()
    {
        return $this->view('typebienMobile.formT');
    }


    public function createSave()
    {
        $Typebmobile = new Typebmobile($this->getDB());
        
        $result = $Typebmobile->create($_POST);
        
        if ($result) {
            return header('Location: /typebienmobile');
        }
    }
    
    public function show(int $id)
    {      
        $Typebmobile = new Typebmobile($this->getDB());
        $Typebmobile = $Typebmobile->findById($id);

        return $this->view('typebienMobile.show', compact('Typebmobile'));
    }

    public function edit(int $id)
    {
        $Typebmobile = (new Typebmobile($this->getDB()))->findById($id);
        return $this->view('typebienMobile.formT', compact('Typebmobile'));
    }

    public function update(int $id)  
    {
        $Typebmobile = new Typebmobile($this->getDB());
        $result = $Typebmobile->update($id, $_POST);
        if ($result) {
            return header('Location: /typebienmobile');
        }
    }

}
