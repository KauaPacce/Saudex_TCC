<?php
class Conexao
{
    private $dbname = "saudex";
    private $username = "root";
    private $password = "";

    public $conn = null;

    public function getConnection()
    {
        try 
        {
            $this->conn = new PDO("mysql:host=localhost;dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
        catch (PDOException $exception) 
        {
            echo "Erro de conexao: " . $exception->getMessage();
        }

        return $this->conn;

    }
}
?>