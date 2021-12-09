<?php
class Database {
//DB Params
private $host = 'localhost';
private $db_name = 'mp3-magazin';
private $username = 'root';
private $password = '';
private $conn;

//DB Connect
public function connect(){
    $this->conn = null;
     
    //Verificare daca se poate conecta
    try{
    $this->conn = new PDO('mysql:host=' . $this->host . ';dbname= ' . $this->db_name, $this->username, $this->password);
    $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPRION);
    }catch(PDOException $e){
        echo "Connection Error: " . $e->getMessage();
    }
    return $this->conn;
}

}
?>