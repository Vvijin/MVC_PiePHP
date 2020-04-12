<?php

class Entity
{
    public $orm;
    public $table;
    public $tab;
    public $id;
    public $relations = [
        'has_many' => ['table' => 'article', 'key' => 'user_id'],
        'has_one' => ['table' => 'promo', 'key' => 'promo_id'],
        'many_to_many' => ['table1' => 'user', 'table2' => 'food']
    ];

    public function __construct($tab)
    {
        $this->orm = new ORM();
        $name = get_class($this);
        $name = strrev($name);
        $name = substr($name, 5);
        $name = strrev($name);
        $name = strtolower($name);
        $name = $name . 's';
        $this->table = $name;

        if (isset($tab['id'])) {

            $array = $this->orm->read($this->table, $tab['id']);
            // print_r($array);

            foreach ($array as $key => $values) {
                $this->$key = $values;
            }
        } else {
            foreach ($tab as $key => $values) {
                $this->$key = $values;
            }
        }
        $this->tab = $tab;
    }
    public function get_relations()
    {
        if ($this->relations !== NULL && isset($this->id)) {
            foreach ($this->relations as $key => $values) {
                if ($key == "has_many") {
                    $table = $values["table"];
                    $table_name = $table . 's';
                    $exec_hmany = $this->orm->find($table_name, $params = array('WHERE' => "user_id =" . "$this->id"));
                    $class = ucfirst($table) . "Model";
                    $get_hm = new $class($exec_hmany, $table_name);
                     //var_dump($exec_hmany); 

                } elseif ($key == "has_one") {
                    $table = $values["table"];
                    $tabis = $values["key"];
                    $table_name = $table . 's';
                    $exec_hone = $this->orm->read($table_name, $this->$tabis);
                    $class = ucfirst($table) . "Model";
                    $get_ho = new $class($exec_hone, $table_name);
                    //var_dump($exec_hone);  

                } elseif ($key == "many_to_many") {
                    $table1 = $values["table1"] . "s";
                    $table2 = $values["table2"] . "s";
                    $tables = $table1 . "_" . $table2;
                    // $col_name1 = $values['table1'] . '_id';
                    // $col_name2 = $values['table2'] . '_id';
                    //var_dump($tables);
                    $exec_mtm1 = $this->orm->find($table1, $params = array('WHERE' => "id =" . "$this->id"));
                    $class1 = ucfirst($table1) . "Model";
                    $exec_mtm2 = $this->orm->find($tables, $params = array('WHERE' => "user_id =" . "$this->id"));
                    //var_dump($exec_mtm2);
                    foreach ($exec_mtm2 as $key => $vals) {
                        //var_dump($vals['food_id']);
                        if ($key = $vals['food_id']) {

                            $many =  $this->orm->find($table2, $params = array('WHERE' => "id =" . "$key"));
                            $class = ucfirst($values['table2']) . "Model";
                             //var_dump($many);   
                        }
                    }
                    $get_mtm = new $class($many);
                    //var_dump($get_mtm);



                }
            }
        }
    }




    public function create()
    {
        $this->orm->create($this->table, $this->tab);
    }

    public function read()
    {
        $this->orm->read($this->table, $this->id);
    }

    public function read_all()
    {
        $this->orm->read_all($this->table);
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
        $this->orm->find($this->table, $this->tab);
    }
}
