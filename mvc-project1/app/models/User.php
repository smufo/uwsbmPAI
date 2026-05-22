<?php
    class User {
        private $conn;

        public function __construct($conn) {
            $this->conn = $conn;
        }

        public function getUsers(){
            $sql = "SELECT * FROM users";
            return $this->conn->query($sql);
        }

        public function addUser($user){

        }
    }