<?php

namespace App\Controllers;

use App\Models\Pci;
use App\Controllers\Controller;

class PciController extends Controller  
{

    public function index()
    {
        $Pci = new Pci($this->getDB());
        $Pcis = $Pci->all();

        return $this->view('pci.index', compact('Pcis'));
    }

    public function create()
    {
        return $this->view('pci.form');
    }

    public function createSave()
    {
        $Pci = new Pci($this->getDB());
        $result = $Pci->create($_POST);
        
        if ($result) {
            return header('Location: /Pci');
        }
    }
    
    public function show(int $id)
    {      
        $Pci = new Pci($this->getDB());
        $Pci = $Pci->findById($id);

        return $this->view('Pci.show', compact('Pci'));
    }

    public function edit(int $id)
    {
        $Pci = (new Pci($this->getDB()))->findById($id);
        return $this->view('Pci.form', compact('Pci'));


    }

    public function update(int $id)  
    {
        $Pci = new Pci($this->getDB());
        $result = $Pci->update($id, $_POST);
        if ($result) {
            return header('Location: /Pci');
        }
    }

    public function destroy(int $id)  
    {
        $Pci = new Pci($this->getDB());
        $result = $Pci->destroy($id);

        if ($result) {
            return header('Location: /Pci');
        }
    }
}
