<html>
    <head>
        <title>Agenda - T30</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="header">
            <h1>Agenda - Turma 30 - 2026</h1>
        </div>
        <h2 id="cadastrar-titulo">CADASTRAR CONTATO</h2>
        <form action="salvar.php" method="POST" class="forms">
            <b>Nome: </b><input type="text" name="nome" id="inputs"><br><br>
            <b>Endereço: </b><input type="text" name="endereco" id="inputs"><br><br>
            <b>Telefone: </b><input type="text" name="fone" id="inputs"><br><br>
            <input type="submit" value="Cadastrar" id="cadastrar-btn">
        </form>


        <div class="contatos">
            <?php
                include ('conexao.php');
                $sql = "SELECT * FROM contatos";
                $resultado = mysqli_query($conexao, $sql);
                if (mysqli_num_rows($resultado)>0){
                    while ($linha = mysqli_fetch_assoc($resultado)){
                        echo $linha['nome']."|".$linha['endereco']."|".$linha['telefone'].
                        "|<a href='editar.php?id=".$linha['id']."'>Editar</a>
                        |<a href='excluir.php?id=".$linha['id']."'>Excluir</a>"."<br>";
                    }
                }else{
                    echo "<h3>Nenhum contato registrado</h3>";
                }
            ?>
        </div>


    </body>
</html>