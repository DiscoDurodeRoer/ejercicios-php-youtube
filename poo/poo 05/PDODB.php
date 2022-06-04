<?php

class PDODB
{

    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db_name = "pokemondb";

    private $connection;

    function __construct()
    {

        $opciones = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::MYSQL_ATTR_FOUND_ROWS => true
        );

        $this->connection = new PDO(
            'mysql:host=' . $this->host . ';dbname=' . $this->db_name,
            $this->user,
            $this->pass,
            $opciones
        );
    }

    function executeQuery($sql)
    {

        $data = array();
        $result = $this->connection->query($sql);

        $error = $this->connection->errorInfo();
        if ($error[0] === "00000") {
            $result->execute();
            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                    array_push($data, $row);
                }
            }
            return $data;
        } else {
            throw new Exception($error[2]);
        }
    }

    function numRows($sql)
    {

        $result = $this->connection->query($sql);

        $error = $this->connection->errorInfo();
        if ($error[0] === "00000") {
            $result->execute();
            return $result->rowCount();
        } else {
            throw new Exception($error[2]);
        }
    }

    function getDataSingle($sql)
    {
        $result = $this->connection->query($sql);

        $error = $this->connection->errorInfo();
        if ($error[0] === "00000") {
            $result->execute();
            if ($result->rowCount() > 0) {
                return $result->fetch(PDO::FETCH_OBJ);
            }
            return null;
        } else {
            throw new Exception($error[2]);
        }
    }

    function executeInstruction($sql)
    {

        $result = $this->connection->query($sql);

        $error = $this->connection->errorInfo();
        if ($error[0] === "00000") {
            $result->execute();
            return $result->rowCount() > 0;
        } else {
            throw new Exception($error[2]);
        }
    }

    function close()
    {
        $this->connection = null;
    }

    function getLastId()
    {
        $this->connection->lastInsertId();
    }
}

$db = new PDODB();

$data = $db->executeQuery("SELECT * FROM pokemon");

print_r($data);

$db->close();

