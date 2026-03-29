<html>
    <head>
        <link rel="stylesheet" href="stylepag.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    </head>
</html>
<?php
    include ('conexao.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM contatos WHERE id=$id";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado)==1){
        $contato = mysqli_fetch_assoc($resultado);
    }else{
        echo "Contato não encontrado na base.";
        exit;
    }    

    if (isset($_POST['atualizar'])){
        $novo_nome = $_POST['nome'];
        $novo_endereco = $_POST['endereco'];
        $novo_telefone = $_POST['fone'];

        $sql2 = "UPDATE contatos SET nome='$novo_nome', 
                        endereco='$novo_endereco', 
                        telefone='$novo_telefone' 
                        WHERE id=$id";
        if (mysqli_query($conexao, $sql2)) {
            echo "<div class='message'><h2>Contato atualizado com sucesso!</h2><br>
            <a href='index.php' id='voltar-btn'>VOLTAR</a></div>";
            exit;
        }else{
            echo "<div class='message'><h2>Erro ao atualizar.</h2><br>
            <a href='index.php' id='voltar-btn'>VOLTAR</a></div>";
            exit;
        }
    }                
?>
    <form method="POST" class="forms">
        <input type="hidden" name="id" value="<?php echo $contato['id']; ?>">
           <b>Nome: </b><input type="text" name="nome" id="inputs" value="<?php echo $contato['nome']; ?>"><br><br>
            <b>Endereço: </b><input type="text" name="endereco" id="inputs" value="<?php echo $contato['endereco']; ?>"><br><br>
            <b>Telefone: </b><input type="text" name="fone" id="inputs" value="<?php echo $contato['telefone']; ?>"><br><br>
        <input type="submit" name="atualizar" value="Atualizar" id="atualizar-btn">
    </form>
    