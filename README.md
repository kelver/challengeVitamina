<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

### Teste técnico aplicado para vaga FullStack Pleno.

Empresa: Vitamina Web

----------

# Início

## Instalação

Clone o repositório

    git clone https://github.com/kelver/challengeVitamina.git

Acesse a pasta do projeto

    cd ./challengeVitamina

Instale todas as dependências com o composer

    composer install

Copie o arquivo .env.example e faça as configurações de banco de dados necessárias.

    cp .env.example .env

Gere uma nova chave de aplicação

    php artisan key:generate

Execute as migrations para criar as tabelas no banco de dados. (**Necessário configuração do arquivo .env antes de executar as migrations**)

    php artisan migrate

Execute as seeders nas factories para criar os registros fakes para testes.

    php artisan db:seed

Pode executar o servidor embutido, ou utilizar um servidor local como preferir.

    php artisan serve

Caso tenha usado o servidor embutido, pode acessar a api http://localhost:8000/api

Se tudo estiver ok, você deve ver uma mensagem na tela acessando a rota acima:

![01-vitamina](https://user-images.githubusercontent.com/22528943/188158708-23ac7573-e071-435f-bac6-7937bdd39224.png)

## Especificações da API

Um workspace no postman, está público com as rotas e enviroments locais para testes no link abaixo:

> [Postman Collection](https://www.postman.com/apiteiia/workspace/vitaminaapi)

![02-vitamina](https://user-images.githubusercontent.com/22528943/188160323-a03641df-83f4-45d5-8d21-f92547c41bb4.png)

Na imagem, na indicação verde, consta o enviroment citado, na indicação em amarelo, as rotas públicas e autenticadas 
da api.

Mais informações e detalhes, estou a disposição.

----------
