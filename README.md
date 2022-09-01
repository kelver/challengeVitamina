# APISoftBook
## API de cadastro de livros
## Instalação

Clone o repositório raíz e junto seus submódulos (Laradock)
```sh
git clone https://github.com/kelver/apiSoftBook.git --recurse-submodules
```
onde usamos o [LaraDock](http://laradock.io/) para montar o ambiente da aplicação.

Entre na pasta laradock, localizada na raíz do projeto, e faça uma cópia de .env.example para configurar o ambiente.

Após, execute os containers necessários
```sh
docker-compose up -d nginx mysql
```
O ambiente deve estar rodando no navegador em:
```sh
http://localhost
```

Com o ambiente configurado, entre na pasta _apiSoftBook_, ou na raiz do projeto, e instale as dependências do projeto:
```sh
composer install
```
ao finalizar, copie o arquivo _.env.example_ e renomeie para _.env_ configurando os dados da conexão com o banco de dados configurados no laradock.
Execute as migrações de banco de dados:
```sh
php artisan migrate:refresh --seed
```

Rode o comando para gerar a key secret do _JWT_
```sh
php artisan jwt:secret
```

## FrontEnd

A aplicação se trata de uma api, o front end que a consome, se encontra nesse respositório:
```sh
https://github.com/kelver/frontSoftBook
```
Para executar, apenas confira a url de consumo da api, se está de acordo com a url da sua aplicação no arquivo:.
```sh
/assets/js/main.js
```
Altere a linha:
```sh
let URLAPI = 'http://localhost:8081/api/';
```
para a URI da sua API.



## License

MIT

**Free Software, Hell Yeah!**
