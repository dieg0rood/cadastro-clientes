<!DOCTYPE html>




    <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <title>Cliente Cadastrado</title>
            <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
            <link href="css/bootstrap-grid.min.css" rel="stylesheet" type="text/css">
            <link href="css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css">
            <link href="css/areacliente.css" rel="stylesheet" type="text/css">
            <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
            <script type="text/javascript" src="js/bootstrap.min.js"></script>
            <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
            <script type="text/javascript" src="js/bootstrap-notify.min.js"></script>
        </head>

        <body class="container">
            <div class="box">
                <div class="textoacima">
                    <h1>Area do Cliente<br/><br/></h1>

                    <?php
                    //RECEBENDO DADOS VIA POST E ARMAZENANDO EM VARIAVEIS
                    $nome = $_POST['nome'];
                    $senha = $_POST['senha'];
                    $dataNasc = $_POST['dataNasc'];
                    $email = $_POST['email'];
                    $telefone = $_POST['telefone'];

                    //DADOS DO BANCO DE DADOS
                    $servidor = "localhost";
                    $usuario = "root";
                    $senha="";
                    $dbname="cadastro";

                    //CRIAR CONEXAO COM BANCO
                    $conn = mysqli_connect($servidor,$usuario,$senha,$dbname);

                    //CHECAR CONEXAO
                    if (!$conn) {
                        die("Conexao falhou: " . mysqli_connect_error());
                    }

                    //COMANDO PARA LOCALIZAR DADOS ANTIGOS E ID ULTIMO CLIENTE CADASTRADO
                    $localizar = "SELECT * FROM clientes ORDER BY id_cliente DESC";
                    $localizar = mysqli_query($conn, $localizar);
                    $registro = $localizar->fetch_assoc();
                    $idCliente = $registro['id_cliente'];
                    $nomeOld = $registro['nome_cliente'];
                    $senhaOld = $registro['senha_cliente'];
                    $dataNascOld = $registro['data_nasc_cliente'];
                    $emailOld = $registro['email_cliente'];
                    $telefoneOld = $registro['telefone_cliente'];



                    //COMANDO PARA ATUALIZAR DADOS ALTERADOS

                    $atualizarNome = "UPDATE clientes   SET nome_cliente = '$nome' WHERE id_cliente = '$idCliente' ";
                    $atualizarEmail = "UPDATE clientes   SET email_cliente = '$email' WHERE id_cliente = '$idCliente' ";
                    $atualizarTelefone = "UPDATE clientes   SET telefone_cliente = '$telefone' WHERE id_cliente = '$idCliente' ";
                    $atualizarSenha = "UPDATE clientes   SET senha_cliente = '$senha' WHERE id_cliente = '$idCliente' ";
                    $atualizarDataNasc = "UPDATE clientes   SET data_nasc_cliente = '$dataNasc' WHERE id_cliente = '$idCliente' ";


                    //VALIDAR O ALTERAÇÕES ENTRE O CADASTRO JÁ ALOCADO NO BANCO COM O FORMULARIO RECEBIDO, CASO HAJA, É REALIZADA A ATUALIZAÇÃO NO BANCO.

                    if($nomeOld != $nome){
                        if (mysqli_query($conn, $atualizarNome)) {
                            echo "Nome Atualizado com Sucesso<br>";
                        } else {
                            echo "Error: " . $atualizarNome . "<br>" . mysqli_error($conn);
                        }
                    }
                    if($emailOld != $email){
                        if (mysqli_query($conn, $atualizarEmail)) {
                            echo "Email Atualizado com Sucesso<br>";
                        } else {
                            echo "Error: " . $atualizarEmail . "<br>" . mysqli_error($conn);
                        }
                    }
                    if($telefoneOld != $telefone){
                        if (mysqli_query($conn, $atualizarTelefone)) {
                            echo "Telefone Atualizado com Sucesso<br>";
                        } else {
                            echo "Error: " . $atualizarTelefone . "<br>" . mysqli_error($conn);
                        }
                    }
                    if($senhaOld != $senha){
                        if (mysqli_query($conn, $atualizarSenha)) {
                            echo "Senha Atualizada com Sucesso<br>";
                        } else {
                            echo "Error: " . $atualizarSenha . "<br>" . mysqli_error($conn);
                        }
                    }
                    if($dataNascOld != $dataNasc){
                        if (mysqli_query($conn, $atualizarDataNasc)) {
                            echo "Data de Nascimento Atualizada com Sucesso<br>";
                        } else {
                            echo "Error: " . $atualizarDataNasc . "<br>" . mysqli_error($conn);
                        }
                    }

                    //ENCERRAR CONEXAO
                    mysqli_close($conn);
                    ?>
                </div>

                <div class="textomeio">
                    <h3>Bem Vindo(a) Sr(a)<br/></h3>
                    <h5><?php echo $nome; ?></h5>
                </div>

                <div class="textobaixo">
                    <div class="botao">
                        <a href="alterardados.php" class="btn btn-primary">Alterar Dados pessoais</a>
                    </div>
                    <div class="botao">
                        <a href="index.html" class="btn btn-primary">Novo Cadastro</a>
                    </div>
                </div>
            </div>
        </body>
    </html>

