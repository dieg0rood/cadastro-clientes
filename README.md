# CADASTRO-CLIENTES

### O que é?

Projeto que possibilita a criação do cadastro de um cliente, armazena no banco de dados e possibilita a correção de dados, caso tenha sido informado algum dado errado.

### Qual o objetivo?

Praticar conhecimentos em HTML5, CSS3, Javascript, Bootstrap, JQuerry e PHP.

### Ferramentas Utilizadas:

Desenvolvido e testado utilizando o PHPStorm, MySQL Workbench e WampServer.

### Explicação:

###### Index.html

O usuário fará o acesso á pagina do formulário de cadastro de clientes (index.html) onde serão fornecidos os dados de cadastro, as mascaras e validação são aplicadas junto a digitação.

###### cadastrarbd.php

Ao efetuar submit, os dados serão gravados no banco de dados e o usuário será redirecionado a página do cliente (cadastrarbd.php), onde será apresentada a possibilidade de alterar os dados cadastrais do ultimo cliente registrado ou efetuar novo cadastro.

###### alterardados.php

Caso solicite a alteração de dados pessoais, o usuário será redirecionado a uma nova pagina de cadastro de clientes (alteradados.php), é realizada a consulta no banco de dados para o ultimo registro realizado, assim a página já é preenchida com seus dados, oferecendo a possibilidade de alteração.

###### editarbd.php

Ao efetuar o submit, os dados que houverem alteração serão corrigidos no banco de dados, e o usuário será redirecionado a pagina do cliente (editarbd.php), onde lhe é fornecida as opções de novo cadastro ou alterar novamente o cadastro.











