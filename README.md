# shortlink
This a project to create and share your short links.

## Para subir o projeto localmente basta rodar os comandos abaixo:

- php artisan sail:install
- ./vendor/bin/sail up

## Caso necessite rodar os testes unitários é preciso adicionar os privilégios para o usuário sail no banco de dados do MySQL.

### Para entrar no container:
- docker exec -it shortlink-mysql-1 sh 

### Logar no banco com senha
- mysql -u root -p

### Liberar acessos:
- GRANT CREATE ON *.* TO 'sail'@'%';
- FLUSH PRIVILEGES;

### Rodar os testes:
- ./vendor/bin/sail artisan test
