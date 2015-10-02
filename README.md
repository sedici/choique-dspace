# choique-dspace

## Plugin de Choique para conectar con respositorios DSpace

Este plugin de Wordpress permite a cualquier sitio web hecho en Choique recuperar contenidos alojados en repositorios DSpace y mostrarlos
dentro de las distintas áreas del sitio. La recuperación de los contenidos puede realizarse mediante una expresión de búsqueda,
que se transforma a OpenSearch, o a partir de una colección particular del repositorio

## Instalación

```bash
cd workspace
git clone https://github.com/sedici/choique-dspace.git choique-dspace
```

(se trabaja sobre archivos)

```bash
git add archivo1 archivo2 ... archivoN
git commit -m 'comentarios sobre el commit'
```

(se sigue trabajando con otros archivos)

```bash
git add <lista de archivos cambiados>
git commit -m 'otros comentarios sobre este commit'
```

(una vez que ya tenemos código ESTABLE y listo para compartir)

```bash 
git push origin master
```


Si queremos actualizar nuestro repositorio local con datos que comiteó otro usuario a Github, ejecutamos:

```bash 
git pull origin master
```
