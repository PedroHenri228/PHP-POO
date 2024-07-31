<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controller\Tarefa;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <form action="index.php" method="post">
        <input type="text" name="title" id="" placeholder="Titulo">
        <br>
        <input type="text" name="descricao" id="" placeholder="Descrição">
        <button type="submit">Enviar</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Descrição</th>
                <th scope="col">Excluir</th>
                <th scope="col">Editar</th>
            </tr>
        </thead>
        <tbody>
        <?php
            
            $tarefa_teste = new Tarefa();
            $tarefa_teste->selectData();
            if(isset($_GET['idtarefa'])) {
                $idtarefa = $_GET['idtarefa'];
                $tarefa_teste->selectUp($idtarefa);
            }
                
        ?>
        
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $descricao = $_POST['descricao'];

    $tarefa_teste = new Tarefa();
    $tarefa_teste->insertTarefa($title, $descricao);

}

if(isset($_GET['tarefa'])) {
    $idtarefa = $_GET['idtarefa'];
    echo $idtarefa;

    
}
?>