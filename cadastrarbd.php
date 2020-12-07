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
                    $dbsenha="";
                    $dbname="cadastro";

                    //CRIAR CONEXAO COM BANCO
                    $conn = mysqli_connect($servidor,$usuario,$dbsenha,$dbname);

                    //CHECAR CONEXAO
                    if (!$conn) {
                        die("Conexao falhou: " . mysqli_connect_error());
                    }

                    //COMANDO PARA CADASTRAR
                    $cadastrar = "INSERT INTO clientes (nome_cliente,email_cliente,telefone_cliente,senha_cliente,data_nasc_cliente) 
                                  VALUES ('$nome','$email','$telefone','$senha','$dataNasc')";

                    //VALIDAR O CADASTRO
                    if (mysqli_query($conn, $cadastrar)) {
                        echo "Cadastro Realizado com Sucesso";
                    } else {
                        echo "Error: " . $cadastrar . "<br>" . mysqli_error($conn);
                    }

                    //ENCERRAR CONEXAO
                    mysqli_close($conn);

                ?>
            <div/>

            <div class="textomeio">
                <h3><br/>Bem Vindo(a) Sr(a)<br/></h3>
                <h5><?php echo $nome; ?></h5>
            </div>

            <div class="textobaixo">
                <!-- LINK DE ACESSO PARA ALTERAR DADOS-->
                <div class="botao">
                    <a href="alterardados.php" class="btn btn-primary">Alterar Dados pessoais</a>
                </div>
                <!-- LINK DE ACESSO PARA RETORNAR AO CADASTRO-->
                <div class="botao">
                    <a href="index.html" class="btn btn-primary">Novo Cadastro</a>
                </div>

            </div>
        </div>
    </body>
</html>

