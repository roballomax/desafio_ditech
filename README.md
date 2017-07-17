# desafio_ditech
Desafio ditech

Após passar os arquivos no servidor, é necessário executar o comando na raiz do projeto:<br>
`composer install`

Quando executar este comando, execute: <br>
`sudo cp .env.example .env` <br>
Após criar o arquivo .env, edite-o substituindo os dados de conexão para o padrão do servidor no qual estará a aplicação.<br>

Após essa configuração, execute o seguinte comando: <br>
`php artisan migrate` <br>
Este comando criará as tabelas no banco de dados. <br>

Após executar este comando, execute o último necessário para testar a aplicação: <br>
`php artisan serve` <br>
Este ativará o servidor de teste, que poderá acessar a aplicação atráves do `IP_DA_MAQUINA:8000`
