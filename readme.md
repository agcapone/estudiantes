# Estudiantes (PHP + MySQL + Docker)

Aplicación simple en PHP que permite:
- Insertar estudiantes con calificación (`index.php` / `save_data.php`)
- Consultar la lista de estudiantes (`consultar.php`)
- Base de datos MySQL inicial (`formulario_db.sql`)
- Contenedor PHP + Apache (`Dockerfile`)

## Requisitos
- Docker instalado (probado con Docker 24+)
- Conexión a internet (para bajar imágenes base)

## Pasos para levantar la app

### 1. Clonar el repositorio
```bash
git clone https://github.com/agcapone/estudiantes.git
cd estudiantes



2. Construir la imagen de la app


docker build -t estudiantes:latest .



3. Crear la red Docker

docker network create estudiantes-net

4. Levantar contenedor MySQL

docker run -d --name estudiantes-mysql \
  --network estudiantes-net \
  -e MYSQL_ROOT_PASSWORD=secret \
  -e MYSQL_DATABASE=formulario_db \
  -e MYSQL_USER=app \
  -e MYSQL_PASSWORD=app \
  -v estudiantes-mysql:/var/lib/mysql \
  mysql:8.0 --default-authentication-plugin=mysql_native_password

5. Importar el esquema SQL

docker exec -i estudiantes-mysql \
  mysql -h127.0.0.1 -uroot -psecret formulario_db < formulario_db.sql

6. Levantar la app PHP

docker run -d --name estudiantes-web \
  --network estudiantes-net \
  -p 8080:80 \
  -e DB_HOST=estudiantes-mysql \
  -e DB_NAME=formulario_db \
  -e DB_USER=app \
  -e DB_PASS=app \
  estudiantes:latest

7. Probar

Consultar estudiantes:
http://localhost:8080/consultar.php

Insertar (via formulario o curl):

curl -X POST http://localhost:8080/save_data.php \
  -d "nombre=Ana Perez" -d "calificacion=9"


Notas

El usuario por defecto es app/app.

La base de datos se llama formulario_db.

Los datos persisten en el volumen estudiantes-mysql.
