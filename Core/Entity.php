<?php 

class Entity {
    public function __construct($params)
    {
        $class =  get_class($this)."\n";

        if($params['id'])
        {
           $class -> read();
        }
        else 
        {
            $class -> params();
        }
        
    }
}