<?php

namespace App\Models;

use PDO;
use Database\DbConnect;

abstract class Model
{
    protected $db;
    protected $table;

    public function __construct(DbConnect $db)
    {
        $this->db = $db;
    }


    public function all(): array
    {
        return $this->query("SELECT * FROM {$this->table}");
    }

    
    public function findById($id): Model
    {
       return $this->query("SELECT * FROM {$this->table} WHERE id= ?", [$id],true);
    }



    public function destroy(int $id, ?string $pathefile = null): bool
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }



    public function create(array $data, ?array $relations = null)
    {
        $partAtt = "";
        $partVal = "";
        $i = 1;

        foreach ($data as $key => $value) {
            
            $comma = $i === count($data) ? " " : ', ';
            $partAtt .= "{$key}{$comma}";
            $partVal .= ":{$key}{$comma}";
            $i++;
        }  
    return $this->query("INSERT INTO {$this->table} ($partAtt) VALUES ($partVal)",$data);
    }



    public function update(int $id, array $data, ?array $relations = null)  
    {
        $sqlRequestPart = "";
        $i = 1;
        
        foreach ($data as $key => $value) {
            $comma = $i === count($data) ? " " : ', ';
            $sqlRequestPart .= "{$key} = :{$key}{$comma}";
            $i++;
        }

        $data['id'] = $id;
        
        return $this->query("UPDATE {$this->table} SET {$sqlRequestPart} WHERE id = :id", $data);
    }




    public function query(string $sql, array $param = null, bool $single = null)
    {
        $methode = is_null($param) ? 'query' : 'prepare' ;

        if (strpos($sql,'DELETE') === 0 ||
            strpos($sql,'UPDATE') === 0 ||
            strpos($sql,'INSERT') === 0) {
            
            $stmt = $this->db->getPDO()->$methode($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
            return $stmt->execute($param);
        }

        $fetch = is_null($single) ? 'fetchAll' : 'fetch' ;

        $stmt = $this->db->getPDO()->$methode($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);

        if ($methode === 'query') {
           return $stmt->$fetch();
        }else {
            $stmt->execute($param);
            return $stmt->$fetch();
        }
    }
}
