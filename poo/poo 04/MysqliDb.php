<?php

class MysqliDb
{

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

    function executeQuery($sql)
    {
        $data = array();
        $result = mysqli_query($this->connection, $sql);

        $error = mysqli_error($this->connection);

        if (empty($error)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($data, $row);
                }
            }
        } else {
            throw new Exception($error);
        }
        return $data;
    }

    function numRows($sql)
    {
        $result = mysqli_query($this->connection, $sql);
        $error = mysqli_error($this->connection);

        if (empty($error)) {
            return mysqli_num_rows($result);
        } else {
            throw new Exception($error);
        }
    }

    function getDataSingle($sql)
    {
        $result = mysqli_query($this->connection, $sql);

        $error = mysqli_error($this->connection);

        if (empty($error)) {
            if (mysqli_num_rows($result) > 0) {
                return mysqli_fetch_assoc($result);
            }
            return null;
        } else {
            throw new Exception($error);
        }
    }

    function executeInstruction($sql)
    {
        $success = mysqli_query($this->connection, $sql);

        $error = mysqli_error($this->connection);

        if (empty($error)) {
            return $success;
        } else {
            throw new Exception($error);
        }
    }

    function getLastId()
    {
        return mysqli_insert_id($this->connection);
    }

    function close()
    {
        mysqli_close($this->connection);
    }
}

$db = new MysqliDb();

try {
    $data = $db->executeQuery("SELECT * FROM pokemn");
    print_r($data);
} catch (Exception $e) {
    echo "Error: " . $e;
}


$db->close();
