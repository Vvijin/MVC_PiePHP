<?php 

class Entity 
{
    public $orm ;
    public $table;
    public $values;

    public function __construct($table, $tab)
    {
        $this->orm = new ORM();
        $this->table = $table;

        if(is_array($tab))
        {
            foreach($tab as $key => $value)
            {
                $this->key = $value;
            }
        }

        $this->values = $tab;

    }
}