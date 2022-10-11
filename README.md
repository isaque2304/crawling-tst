

## Clone o repositório abaixo
```
$ git clone https://github.com/samironbarai/laravel-scraper.git
```

tenha instalado os seguintes pacotes

->xampp
->composer
->nodejs


## Intale as dependecias do composer e nodejs no projeto via cli
```
$ composer install
$ npm install && npm run dev
```

## Crie um arquivo .env, você pode copiar a do .env.example e rode o comando abaixo
$ php artisan key:generate
```

- Para inciar a aplicação é necessarío que o serviço do mysql no xampp esteja habilitado
- Rode o comando "php artisan serve --port=80" no terminal do VSCODE 
- Rota para acesso da rotina no navegador "localhost/scraper"

obs: Não consegui recuperar os dados da resposta utilizando as rotinas nativas da linguagem, sempre me retorna forbidden. Porém eu consigo recuperar o token da sessão e alterar o token utilizando basicamente a mesma lógica da função "findAnswer()" do script, mas no momento de enviar a requisição do server ele me retorna que não fui autorizado mesmo gerando um novo token.


