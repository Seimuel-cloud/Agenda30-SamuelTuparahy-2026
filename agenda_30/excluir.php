<html>
    <head>
        <link rel="stylesheet" href="stylepag.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    </head>
</html>
<?php

include('conexao.php');

$id = $_GET['id'];

$sql = "DELETE FROM contatos WHERE id=$id";

if (mysqli_query($conexao, $sql)) {
    echo "<div class='message'><h2>O contato foi excluído com sucesso!</h2><br>
    <a href='index.php' id='voltar-btn'>VOLTAR</a></div>";
    exit;
} else {
    echo "<div class='message'><h2>Erro ao excluir o contato.</h2> " . mysqli_error($conexao) . "<br>
    <a href='index.php' id='voltar-btn'>VOLTAR</a></div>";
    exit;
}
