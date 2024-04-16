<?php

namespace app\classes;
use Mysqli;

class DB {

    private $db_host;
    private $db_name;
    private $db_user;
    private $db_pass;

    public $conex;

    public $s = " * ";
    public $w = " 1 ";

    public function __construct($dbh = DB_HOST, $dbn = DB_NAME, $dbu = DB_USER, $dbp = DB_PASS){
        $this -> db_host = $dbh;
        $this -> db_name = $dbn;
        $this -> db_user = $dbu;
        $this -> db_pass = $dbp;
    }

    public function connect(){
        $this -> conex = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        if($this->conex->connect_errno){
            echo "Error al conectarse a la base de datos: " . $this->conex->connect_errno;
            return;
        }
        $this->conex->set_charset("utf8");
        return $this->conex;
    }

    public function all(){
        return $this;
    }

    public function get(){
        $sql = "select ".
                $this->s.
                " from " . str_replace("app\\models\\","",get_class($this)).
                " where " . $this->w;
        $result = $this->conn->query($sql);
    
        /* echo $sql;
        die(); */
        $r = $this->table->query($sql);
        while( $f = $r->fetch_assoc()){
            $result[] = $f;

        }
        return json_encode($result);
    }

}