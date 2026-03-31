<html>
    <head>
        <title>Agenda - T30</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
        <script>
            function mascaraTelefone(campo){
                let valor = campo.value.replace(/\D/g,'');

                if(valor.length > 11){
                    valor = valor.substring(0,11);
                }

                valor = valor.replace(/^(\d{2})(\d)/g,"($1) $2");

                if(valor.length > 10){
                    valor = valor.replace(/(\d{5})(\d)/,"$1-$2");
                }else{
                    valor = valor.replace(/(\d{4})(\d)/,"$1-$2");
                }

                campo.value = valor;
            }
    </script>
    </head>
    <body>
        <div class="header">
            <h1>Agenda - Turma 30 - 2026</h1>
        </div>
        <h2 id="cadastrar-titulo">CADASTRAR CONTATO</h2>
        <form action="salvar.php" method="POST" class="forms">
            <b>Nome: </b><input type="text" name="nome" id="inputs" required><br><br>
            <b>Endereço: </b><input type="text" name="endereco" id="inputs" required><br><br>
            <b>Telefone: </b><input type="text" name="fone" id="inputs" required onkeyup="mascaraTelefone(this)">
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
