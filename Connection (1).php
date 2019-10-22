<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Connectionx
 *
 * @author Rirotty
 */
class Connection {
    //put your code here
        private $host; 
        private $user; 
        private $password ;
        private $database_name ;
        private $pdo ; 
        
        function getPdo() {
            return $this->pdo;
        }

        function setPdo($pdo) {
            $this->pdo = $pdo;
        }

        function __construct() {
            $this->host = "localhost";
            $this->user = "root";
            $this->password = "";
            $this->database_name = "application";
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->database_name",$this->user,$this->password,array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); 
    
        }

        
        
    
    
}
