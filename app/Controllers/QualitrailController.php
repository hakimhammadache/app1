<?php

namespace App\Controllers;

use App\Models\Qualiteraille;
use App\Controllers\Controller;



class QualitrailController extends Controller 
{

    public function index()
    {
        $qRail = new Qualiteraille($this->getDB());
        $qRails = $qRail->all();

        return $this->view('qualiteRaile.index', compact('qRails'));
    }

    public function create()
    {
        return $this->view('qualiteRaile.form');
    }


    public function createSave()
    {
        $qRail = new Qualiteraille($this->getDB());
        
        $result = $qRail->create($_POST);
        
        if ($result) {
            return header('Location: /qualiteRaile');
        }
    }
    
    public function show(int $id)
    {      
        $qRail = new Qualiteraille($this->getDB());
        $qRail = $qRail->findById($id);

        return $this->view('qualiteRaile.show', compact('qRail'));
    }

    public function edit(int $id)
    {
        $qRail = (new Qualiteraille($this->getDB()))->findById($id);
        return $this->view('qualiteRaile.form', compact('qRail'));
    }

    public function update(int $id)  
    {
        $qRail = new Qualiteraille($this->getDB());
        $result = $qRail->update($id, $_POST);
        if ($result) {
            return header('Location: /qualiteRaile');
        }
    }

    public function destroy(int $id)  
    {
        $qRail = new Qualiteraille($this->getDB());
        $result = $qRail->destroy($id);

        if ($result) {
            return header('Location: /qualiteRaile');
        }
    }
}
