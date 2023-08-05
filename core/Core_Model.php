<?php 

class Core_Model {
protected $conn = null;

function __construct() {
$this->connect();
}

protected function connect() {
if ($this->conn === null) {
    $config = require BASE_PATH . '/config/database.php';
    $host = $config['host'];
    $username = $config['username'];
    $password =  $config['password'];
    $dbname = $config['dbname'];

    try {
    $this->conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
    exit('Connect failed: '. $e->getMessage());
    }
}
}

protected function pdo_execute($sql) {
$sql_args = array_slice(func_get_args(), 1);
try {
    $this->connect();
    $stmt = $this->conn->prepare($sql);
    $stmt->execute($sql_args);
} catch (PDOException $e) {
    throw $e;
} finally {
    unset($conn);
}
}
protected function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $this->connect();
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        $this->conn = null;
    }
}

protected function pdo_query_one($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $this->connect();
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        $this->conn = null;
    }
}

protected function pdo_query_value($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $this->connect();
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
    } catch (PDOException $e) {
        throw $e;
    } finally {
        $this->conn = null;
    }
}
}