<?php

class conexaoDB{


public static function getConexao()
    {
     $pdo = new PDO('mysql:host=127.0.0.1;dbname=API_project', username: 'admin', password: 'admin');
     return $pdo;
    }


}