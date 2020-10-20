<?php

namespace App\Controllers;

use App\Models\Daira;
use App\Models\Wilaya;
use App\Controllers\Controller;


 
class DairaController extends Controller 
{

    public function index()
    {
        $daira = new Daira($this->getDB());
        $dairas = $daira->all();

        $wilaya = new Wilaya($this->getDB());
        $wilayas = $wilaya->all();

        return $this->view('daira.index', compact('dairas','wilayas'));
    }

    public function create()
    {
        $daira = new Daira($this->getDB());
        $dairas = $daira->all();

        $wilaya = new Wilaya($this->getDB());
        $wilayas = $wilaya->all();

        return $this->view('daira.formD', compact('dairas','wilayas'));
    }
    
    public function createSave()
    {
        $daira = new Daira($this->getDB());
        
        $result = $daira->create($_POST);
        
        if ($result) {
            return header('Location: /daira');
        }
    }
    public function edit(int $id)
    {

        $wilaya = new Wilaya($this->getDB());
        $wilayas = $wilaya->all();

        $daira = (new Daira($this->getDB()))->findById($id);
        return $this->view('daira.index', compact('daira','wilayas'));
    }

    public function show(int $id)
    {      
        $daira = new Daira($this->getDB());
        $daira = $daira->findById($id);

        return $this->view('daira.show', json_encode($daira));
    }

    public function update(int $id)  
    {
        $daira = new Daira($this->getDB());
        $result = $daira->update($id, $_POST);
        if ($result) {
            return header('Location: /daira');
        }
    }

    public function destroy(int $id)  
    {
        $daira = new Daira($this->getDB());
        $result = $daira->destroy($id);

        if ($result) {
            return header('Location: /daira');
        }
    }

}
