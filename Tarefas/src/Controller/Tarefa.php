<?php
namespace App\Controller;

use App\Model\Tarefa_bd;

require_once __DIR__ . '/../Config/config.php';

class Tarefa
{
    private $titulo;
    private $descricao;

    private $id;

    public function insertTarefa($titulo, $descricao)
    {
        $tarefa = new Tarefa_bd();
        $tarefa->insert($titulo, $descricao);

        if($$tarefa->insert($titulo, $descricao)) {
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit;
        }
    }

    public function selectData()
    {
        $tarefa = new Tarefa_bd();
        $result = $tarefa->select();

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["title"] . "</td> <td> " . $row["descricao"] . "</td>";
                echo "<td><a href='" . BASE_URL ."index.php?idtarefa=" . $row["id"] . " 'class='btn btn-danger'>Excluir</a></td>";
                echo "<td> <a href='" . BASE_URL .'update.php' ."?idtarefa=" . $row["id"] . " 'class='btn btn-success'>Editar</a></td> </tr>";
                
            }
        } else {
            echo "0 results";
        }


    }

    public function deleteData($id)
    {
        $tarefa = new Tarefa_bd();
        $tarefa->delete($id);

    }

    public function selectUp($id) {
        $tarefa = new Tarefa_bd();
        $result = $tarefa->selectID($id);

        if($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->setID($row['id']);
                $this->setTitulo($row['title']);
                $this->setDescricao($row['descricao']);
            }
            return true;
        }else {
            return false;
        }

    }

    public function updateData($id, $title, $descricao) {
        $tarefa = new Tarefa_bd();
        $tarefa->update($id, $title, $descricao);
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getID()
    {
        return $this->id;
    }

    public function setID($id)
    {
        $this->id = $id;
    }
}
