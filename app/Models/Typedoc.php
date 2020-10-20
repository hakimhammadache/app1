<?php

namespace App\Models;

use DateTime;
use App\Models\Model;

class Typedoc extends Model
{
    protected $table = 'type_document'; 

    public function getCreatedAt(): string
    {
        return (new DateTime($this->created_at))->format('d/m/Y à H:i');
    }


    /*
    avec cette fonction importer tt les document du type selectioné
    */
    public function getDocs()
    {
        return $this->query("
            SELECT doc.* FROM document doc
            INNER JOIN type_document tdoc ON tdoc.id = doc.id_type_doc
            WHERE tdoc.id = ?
        ", [$this->id]);
    }
} 