
## Sobre o projeto

Baixe as dependências do projeto e siga os seguintes passos:
- Baixe o projeto
- Rode ```composer install```
- Crie um arquivo ```.env``` na raiz do projeto com a conexão com o banco de dados.
- Rode o comando ```php artisan migrate```, caso for rodar novamente use ```php artisan migrate:fresh```
- Rode o comando ```php artisan serve```
- Acesse o endereço fornecido no comando, provavelmente será ```http://127.0.0.1:8000```
- Vá na aba produtos e cadastre um produto e após vá na aba "Loja" para poder efetuar uma compra.

## Teste Unitário
Rode o seguinte comando para rodar os testes unitários:

```./vendor/bin/phpunit```

Obs: Para os testes funcionarem o banco deverá estar devidamente conectado.