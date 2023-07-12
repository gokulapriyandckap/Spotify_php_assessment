<?php

//This class is Used for to connect the database.
class database{
    public $db;

    public function __construct()
    {
        try {
            $this->db = new PDO(
                'mysql:host=127.0.0.1;dbname=spotify',
                'admin',
                'welcome'
            );
        }
        catch (Exception $e){
            die($e->getMessage()."db didn't connected");
        }
    }
}