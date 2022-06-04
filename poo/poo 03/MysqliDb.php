<?php

class MysqliDb {

    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "pokemondb";

    private $connection;

    function __construct()
    {
        
        $this->connection = mysqli_connect(
            $this->host,
            $this->user,
            $this->pass,
            $this->dbname
        );

        $this->connection->set_charset("utf8");

    }

    function executeQuery($sql){
        $data = array();
        $result = mysqli_query($this->connection, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                array_push($data, $row);
            }
        }
        return $data;
    }

    function numRows($sql){
        $result = mysqli_query($this->connection, $sql);
        return mysqli_num_rows($result);
    }

    function getDataSingle($sql){
        $result = mysqli_query($this->connection, $sql);
        if(mysqli_num_rows($result) > 0){
            return mysqli_fetch_assoc($result);
        }
        return null;
    }

    function executeInstruction($sql){
        return mysqli_query($this->connection, $sql);
    }

    function getLastId(){
        return mysqli_insert_id($this->connection);
    }

    function close(){
        mysqli_close($this->connection);
    }

}

$db = new MysqliDb();

$data = $db->executeQuery("SELECT * FROM pokemon");

print_r($data);

$db->close();

?>