## Instalação

**Instalando o NodeJS**

Siga a [documentação oficial do NodeJS](https://nodejs.org/en/download/) para instalar o Node utilizado para gerar os pacotes da tela do cliente.

**Instalando o docker**

Siga a [documentação oficial do Docker](https://docs.docker.com/compose/install/) para instalar o Docker Compose utilizado para rodar o sistema.

**Configurando o sistema**

Renomeie o arquivo `.env.example` para `.env` e faça as configurações do sistema, alterando as portas e senhas conforme necessário em seu servidor.

**Preparando a tela do cliente**

Através de um terminal, acesse a pasta `front-cliente` e execute o comando
```
npm install
```

Após a conclusão do comando, abra o arquivo `front-cliente/src/App.js` e altere
```javascript
localStorage.setItem('base_url', 'localhost');
```

para
```javascript
localStorage.setItem('base_url', 'http://link-do-servidor.com.br');
```

Então, na pasta `front-cliente`, através de um terminal, execute o comando
```
npm run build
```


**Inicializando os contêineres**

Para inicializar, abra o terminal na pasta do sistema e execute o comando
```
docker-compose up
```

Caso prefira que o terminal utilizado para inicializar não fique preso ao sistema, utilize
```
docker-compose up --d
```

**Base de dados**

Na pasta `.database`, você encontra a estrutura da base de dados.

O arquivo `.sql` pode ser utilizado via importação através do PHPMyAdmin ou pelo terminal, acessando o container da base de dados.

Caso prefira utilizar o PHPMyAdmin, verifique a porta no utilizada pelo mesmo no arquivo `.env`, no parâmetro `PHPMYADMIN_PORTS`. Por padrão, o caminho é `http://ip-do-servidor:8082`.

Caso prefira utilizar o terminal, utilize o comando `docker-compose exec db bash` e siga o processo de importação via MySql.

## Acessando o sistema

**Backoffice**

Na raíz de seu servidor, utilizando a porta 80 (ou nenhuma), caso não tenha alterado no arquivo `env`, você já deve conseguir acessar o backoffice através do link `http://ip-do-servidor/`, onde deverá acessar o sistema com os seguintes dados:

```
Login: admin@investimentospremier.com
Senha: premier
```

**Visualização do cliente**

Para visualizar a tela do cliente, utilize a porta 8080 ou a porta que tiver definido em seu arquivo `.env`.

Por padrão deve ser acessado em `http://ip-do-servidor:8080/`.

Não existem clientes cadastrados por padrão na base de dados, portanto, você pode realizar um cadastro para testes.

## Alterações

**Backoffice**

Para atualizar arquivos do backoffice, basta alterá-los dentro da pasta `backoffice` e os arquivos serão atualizados automaticamente nos contêineres.

**Visualização do cliente**

Para atualizar arquivos do front, altere os arquivos necessários na pasta `front-cliente/src` e execute o comando
```
npm run build
```

Então, os arquivos serão atualizados automaticamente nos contêineres.

## Outras configurações

**E-mail**

Os e-mails serão enviados somente se o parâmetro `APP_ENV` no arquivo `.env` estiver definido como `production`.

Por padrão, o parâmetro `APP_ENV` será definido como `development`.

A configuração do e-mail deve ser feita nos parãmetros `MAIL_HOST`, `MAIL_PORT`, `MAIL_USERNAME` e `MAIL_PASSWORD` do arquivo `.env`.

## Permissões

**Erro de permissão no linux**

Caso tenha erro com permissões dos arquivos, corrija as permissões das pastas e arquivos no servidor como `777` para que o Docker consiga ler e escrever sobre os arquivos.