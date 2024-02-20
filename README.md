
# Importar e Listar documentos CSV

Esse é um projeto teste para a empresa Kanastra que consiste em realizar o upload de um arquivo CSV e listar os arquivos importados. Ao realizar o upload, o sistema deve consumir o arquivo, importar os dados contidos no CSV e enviar um email para cada registro.


O projeto foi realizado utilizando as tecnlogias: Angular, Laravel e MySQL.






## Pré-requisitos

- Node v18.12.1
- PHP 8.2.4
- Angular CLI 16.2.2
- MySQL 15.1


## Instalação

Para instalar o projeto, baixe o .zip através do Github ou faça o clone deste projeto.

O projeto consiste em duas pastas, uma para o Front-end e outra para o Back-end.
x

#### Setup API
```cd list-api && docker-compose build && docker-compose up && cp .env.example .env && php artisan migrate && php artisan storage:link```

#### Setup Front

```cd list-front && docker-compose build && docker-compose up```

Acessar a url http://localhost:4200 no Browser.





## License

[MIT](https://choosealicense.com/licenses/mit/)


## Authors

- [@hugopaulista7](https://www.github.com/hugopaulista7) - Hugo Paulista

