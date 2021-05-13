## Instalação

### Usando Docker

**Instalando o docker**

Siga a [documentação oficial do Docker](https://docs.docker.com/compose/install/) para instalar o Docker Compose utilizado para rodar o sistema.

**Configurando o sistema**

Renomeie o arquivo `.env.example` para `.env` e faça as configurações do sistema, alterando as portas e senhas conforme necessário em seu servidor (somente para produção ou troca de portas).

**Inicializando os contêineres**

Para inicializar, abra o terminal na pasta do sistema e execute o comando
```
docker-compose up
```

Caso prefira que o terminal utilizado para inicializar não fique preso ao sistema, utilize
```
docker-compose up --d
```

*A primeira inicialização pode levar alguns segundos, pois o sistema está migrando a base de dados*

**Instalando dependências**

Abra o terminal na pasta do sistema e execute o comando `docker-compose run php composer install` para instalar as dependências do mesmo.

### Usando XAMP, WAMP, AMPPS e outros

**Instalando o composer**

Siga a [documentação oficial do Composer](https://getcomposer.org/download/) ou o [manual de instalação do Composer no Windows](https://medium.com/@marcos.paegle/php-moderno-instalando-o-composer-windows-d45c29ba1fe1) para instalação do gerenciador de pacotes do PHP.

**Instalando o sistema**

Mova todos os arquivos da pasta `website` para a pasta desejada em seu servidor local (htdocs, www, etc). Certifique-se de que todos os arquivos foram movidos, incluindo os arquivos ocultos.

Então, abra o terminal na pasta `website` e execute o comando `composer install`.

**Configurando o sistema**

Mova o arquivo `.env.example` para a pasta `website` e renomeie-o para `.env`, então, abra este arquivo em seu editor de texto e altere as configurações da base de dados conforme as informações de seu servidor local.

**Base de dados**

Crie a base de dados em seu servidor local conforme as configurações preenchidas no último passo e, então, importe o arquivo `.database/database.sql` para sua base de dados recém criada.

## Acessando o sistema

Para visualizar o sistema funcionando, acesse o link `http://localhost` ou a URL de preferência configurada em seu servidor local.

Para acessar o sistema interno, acesse o link `http://localhost/admin` ou a URL de preferẽncia configurada em seu servidor local seguida de `/admin`.

As informações de login padrões para o sistema interno são:

```
Login: admin
Senha: admin
```

## Permissões (Linux)

Em algumas distribuições, o servidor pode ter dificuldades para definir as permissões dos arquivos, para resolver, acesse a pasta do sistema através do terminal e execute:

`sudo chmod 777 -R ./`