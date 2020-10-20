<?php

namespace App\Controllers;

use App\Models\Typedoc;
use App\Models\Document;
use App\Models\Etablisement;
use App\Models\Bienmobile;
use App\Controllers\Controller;



class DocumentController extends Controller 
{
    // ce controller n'est pas achevéé 

    public function index()
    {
        if ($this->isAuth()) {
            $doc = new Document($this->getDB());
            $etablisement = new Etablisement($this->getDB());
            if($_SESSION['auth']['role'] === 'admin'){
                $docs = $doc->all();
                $etablisements = $etablisement->all();
            }else{
                $docs = $doc->getDoc($_SESSION['auth']['id']);
                $etablisements = $etablisement->getEtab($_SESSION['auth']['id']);
            }
            $typeDocs = ( new Typedoc($this->getDB()))->all();
            return $this->view('Document.index', compact('docs','etablisements','typeDocs'));
        }
    }


    public function createSave()
    {
  
            $doc = new Document($this->getDB());   
            $_POST = $this->organiseAttrBeforeCreate($_POST,$_FILES);
           //var_dump($_POST);die();
            $result = $doc->create($_POST);
            if ($result) {
                return header('Location: /document');
            }
      
    }
    

    public function show()
    {      
        if ($this->isAuth()) {
            $pathfile = $_POST['pathfile'];
            header('Content-type: application/pdf');
            header("Content-Length: " . filesize($pathfile )); 
            readfile($pathfile);
        }
        
    }


    public function update(int $id)  
    {
   
            $doc = new Document($this->getDB());
           
            $result = $doc->update($id, $_POST);

            if ($result) {
                return header('Location: /document');
            }
        
    }

    public function destroy(int $id)
    {

            $doc = new Document($this->getDB());
            $result = $doc->destroy($id,$_POST['pathfile']);
            if ($result) {
                return header('Location: /document');
            }
        
    }




    private function organiseAttrBeforeCreate(array $post, array $file)
    {
        $docin = array_pop($file);
        //var_dump($docin);
        //echo("***********");
        $doci = array(
            "name" => basename($docin['name']),
            "type" => $docin['type'],
            "tmp_name" => $docin['tmp_name'],
            "size" => $docin['size'],
            "pathfile" => FILES . $post['nom_doc'] . '.pdf'
        );
        //var_dump($post);
        //echo("***********");
        $result = array_merge($post,$doci);
       // var_dump($result); die();
        return $result;
    }

    

}
