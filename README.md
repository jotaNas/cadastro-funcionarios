# Cadastro de Funcionários com Yii

## Descrição

Aplicação MVC usando o framework Yii.

## Pré-requisitos

Antes de começar, verifique se você atende aos seguintes requisitos:

-   [PHP](https://www.php.net/) instalado (versão recomendada)
-   [Composer](https://getcomposer.org/) instalado
-   [MySQL](https://www.mysql.com/) ou outro banco de dados compatível

## Configuração do Banco de Dados

-   Crie um banco de dados no MySQL com o nome `equipe` (ou o nome que você configurou em `config/db.php`).
-   Configure as credenciais do banco de dados no arquivo `config/db.php`.

phpCopy code

`<?php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=equipe',
    'username' => 'seu_usuario',
    'password' => 'sua_senha',
    'charset' => 'utf8',
];` 

## Instalação

Siga estas etapas para configurar e rodar o projeto:

1.  Clone o repositório:
    
    bashCopy code
    
    `git clone https://github.com/jotanas/cadastro-funcionarios.git
    cd seu-projeto` 
    
2.  Instale as dependências usando o Composer:
    
    bashCopy code
    
    `composer install` 
    
3.  Execute as migrações para criar as tabelas no banco de dados:
    
    bashCopy code
    
    `php yii migrate` 
    

## Rodando o Projeto

Agora você pode iniciar o servidor de desenvolvimento embutido do Yii2:

bashCopy code

`php yii serve` 

Se tudo estiver configurado corretamente, o projeto estará acessível em [http://localhost:8080](http://localhost:8080/).

Agora, você pode acessar o projeto em seu navegador:

-   Cadastro de Funcionários:
    
    -   URL: [http://localhost:8080/employee](http://localhost:8080/employee)
-   Cadastro de Funções (Roles):
    
    -   URL: [http://localhost:8080/role](http://localhost:8080/role)


## Licença

Este projeto está licenciado sob a Licença MIT - consulte o arquivo [LICENSE](https://chat.openai.com/c/LICENSE) para obter detalhes.

## Contato

-   Nome: João Nascimento
-   E-mail: [joaotnf@gmail.com](mailto:seu@email.com)
-   GitHub: [https://github.com/jotanas](https://github.com/seu-usuario)
