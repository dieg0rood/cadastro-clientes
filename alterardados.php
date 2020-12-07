<!DOCTYPE html>

<?php

    //DADOS DO BANCO DE DADOS
    $servidor = "localhost";
    $usuario = "root";
    $senhadb="";
    $dbname="cadastro";

    //CRIAR CONEXAO COM BANCO
    $conn = mysqli_connect($servidor,$usuario,$senhadb,$dbname);

    //CHECAR CONEXAO
    if (!$conn) {
        die("Conexao falhou: " . mysqli_connect_error());
    }

    //COMANDO PARA LOCALIZAR ULTIMO CLIENTE CADASTRADO VIA PRIMARY KEY DECRESCENTE
    $localizar = "SELECT * FROM clientes ORDER BY id_cliente DESC";
    $localizar = mysqli_query($conn, $localizar);
    $registro = $localizar->fetch_assoc();

    //ALOCANDO DADOS EM VARIAVEIS PARA PREENCHIMENTO PREVIO DO FORMULARIO DE ALTERAÇAO DE DADOS
    $idCliente = $registro['id_cliente'];
    $nomeOld = $registro['nome_cliente'];
    $senhaOld = $registro['senha_cliente'];
    $dataNascOld = $registro['data_nasc_cliente'];
    $emailOld = $registro['email_cliente'];
    $telefoneOld = $registro['telefone_cliente'];

    //ENCERRAR CONEXAO
    mysqli_close($conn);

?>


<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Alterar Dados</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap-grid.min.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css">

        <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="js/jquery.mask.min.js"></script>
        <script type="text/javascript" src="js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/additional-methods.min.js"></script>
        <script type="text/javascript" src="js/localization/messages_pt_BR.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-notify.min.js"></script>
        <link href="css/formcad.css" rel="stylesheet" type="text/css">

        <script type="text/javascript">
            $(document).ready(function() {

                //MASCARAS DO FORMULARIO
                $("#telefone").mask('(00)0000-0000')

            }
        </script>
    </head>

    <body>
        <div class="container">
            <div class="box">
                <h1>Alterar Dados</h1>
                <form id="formCadastro" name="formCadastro" method="post" action="editarbd.php" onsubmit="return true">
                    <div class="form-group">
                        <label for="nome">NOME COMPLETO</label>
                        <input type="text" id="nome" name="nome" class="form-control" value="<?= $nomeOld ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">E-MAIL</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?= $emailOld ?>">
                    </div>
                    <div class="form-group">
                        <label for="telefone">TELEFONE</label>
                        <input type="text" id="telefone" name="telefone" placeholder="(00)0000-0000" class="form-control" value="<?= $telefoneOld ?>">
                    </div>
                    <div class="form-group">
                        <label for="senha">SENHA</label>
                        <input type="password" id="senha" name="senha" class="form-control" value="<?= $senhaOld ?>">
                    </div>
                    <div class="form-group">
                        <label for="dataNasc">DATA DE NASCIMENTO</label>
                        <input type="date" id="dataNasc" name="dataNasc" placeholder="DD/MM/AAAA" class="form-control" value="<?= $dataNascOld ?>">
                    </div>
                    <div>
                        <input type="submit" name="alterar" id="alterar" class="btn btn-primary">
                    </div>
                </form>
            </div>

        </div>
    </body>
</html>