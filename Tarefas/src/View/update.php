<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controller\Tarefa;

$tarefaUp = new Tarefa();
$tarefaData = null; 

if (isset($_GET['idtarefa'])) {
    $idtarefa = $_GET['idtarefa'];
    $tarefaData = $tarefaUp->selectUp($idtarefa);
}
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
    <form action="update.php" method="post">
        <?php if ($tarefaData): ?>
            <input type="hidden" name="id" value="<?= $tarefaUp->getID() ?>"><br>
            <input type="text" name="titulo" value="<?= $tarefaUp->getTitulo() ?>"><br>
            <input type="text" name="descricao" value="<?= $tarefaUp->getDescricao() ?>"><br>
            <button type="submit">Enviar</button>
        <?php endif; ?>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>

<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];

    $tarefaUp->updateData($id, $titulo, $descricao);
}


?>
