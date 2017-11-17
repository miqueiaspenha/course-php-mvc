<?php

namespace miqueias\Model;


abstract class Table
{
    protected $db;
    protected $table;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function get()
    {
        $query = "select * from {$this->table}";
        return $this->db->query($query)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $query = "select * from {$this->table} where id=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}