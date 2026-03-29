<html>
    <head>
        <link rel="stylesheet" href="stylepag.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    </head>
</html>
<?php
    include ('conexao.php');
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $fone = $_POST['fone'];

    $sql = "INSERT INTO contatos (nome, endereco, telefone) 
                VALUES ('$nome', '$endereco', '$fone')";
    if (mysqli_query($conexao, $sql)) {
        echo "<div class='message'><h2>Contato foi adicionado com sucesso!</h2><br>
        <a href='index.php' id='voltar-btn'>VOLTAR</a></div>";
    }else{
        echo "<div class='message'><h2>Erro ao adicionar o contato.</h2><br>
        <a href='index.php' id='voltar-btn'>VOLTAR</a></div>";
    }
?>