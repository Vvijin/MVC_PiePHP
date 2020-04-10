<?php

class Entity
{
    public $orm;
    public $table;
    public $tab;
    public $values;
    public $id = 2;
    public $params = ['WHERE' => 'id = 1', 'ORDER BY' => 'id ASC', 'LIMIT' => '1'];

    public function __construct($table, $tab)
    {
        //var_dump($tab);
        $this->orm = new ORM();
        $this->table = $table;

        if (is_array($tab)) {
            foreach ($tab as $key => $value) {
                $this->key = $value;
            }
        }

        $this->tab = $tab;
    }

    public function create()
    {
        //var_dump($this->tab);
        $this->orm->create($this->table, $this->tab);
    }

    public function update()
    {
        $this->orm->update($this->table, $this->id, $this->tab);
    }

    public function delete()
    {
        $this->orm->delete($this->table, $this->id);
    }

    public function find()
    {
        $this->orm->find($this->table, $this->params);
    }
}
