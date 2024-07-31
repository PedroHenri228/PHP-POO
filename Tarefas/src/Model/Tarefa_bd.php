<?php
namespace App\Model;

require_once __DIR__ . '/../Config/config.php';
require_once __DIR__ . '/Database.php';

class Tarefa_bd
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function insert($titulo, $descricao)
    {

        $sql = "INSERT INTO tasks (title, descricao) VALUES ('$titulo', '$descricao')";

        if ($this->conn->query($sql) === TRUE) {
            header("Location: http://localhost/ProjetosCompartilhados/teste_poo/src/View/index.php");
            exit;
        }

    }

    public function select()
    {
        $sql = "SELECT * FROM tasks";
        $result = $this->conn->query($sql);

        if ($this->conn->query($sql) === TRUE) {
            header("Location: http://localhost/ProjetosCompartilhados/teste_poo/src/View/index.php");
            exit;
        }

        if ($result === false) {
            die('Query failed: ' . $this->conn->error);
        }

        return $result;

    }

    public function delete($id)
    {
        $sql = "DELETE FROM tasks WHERE id = '$id'";

        if ($this->conn->query($sql) === TRUE) {
            header("Location: http://localhost/ProjetosCompartilhados/teste_poo/src/View/index.php");
            exit;
        }
    }

    public function selectID($id) {

        $sql = "SELECT * FROM tasks WHERE id = '$id'";

        $result = $this->conn->query($sql);

        if ($this->conn->query($sql) === TRUE) {
            header("Location: http://localhost/ProjetosCompartilhados/teste_poo/src/View/index.php");
            exit;
        }

        return $result;
    }

    public function update($id, $title, $descricao) {
        $sql = "UPDATE `tasks` SET `title`='$title',`descricao`='$descricao' WHERE `id`='$id'";

        if ($this->conn->query($sql) === TRUE) {
            header("Location: http://localhost/ProjetosCompartilhados/teste_poo/src/View/index.php");
            exit;
        }

    }
}
?>