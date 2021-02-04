    
## Prueba Tecnica php Laravel ##

Esta aplicacion conciste en tomar datos de una base de datos de productos, para luego generar un CVS con una agrupacion especifica de los productos, tambien nos permite consultar productos por medio de una api REST.


## Construido con: ##

- Laravel 5.8
- PHP 7.2
- SQLite3
- Apache 2.4 

##Acerca del Proyecto##

Para generar el archivo CVS: En la url principal del sitio hacemos click en el Botton "Export" 

Para probar las api REST (Recomendaccion utilizar Postman [https://www.postman.com/](https://www.postman.com/))

1. **Consultar productos**
 	- URL: $nombre_proyecto/api/products
	- Peticion: GET


2. **Consultar producto**
	- URL: $nombre_proyecto/api/products/$sku
	- Peticion: GET
	

3. **Cargar nuevo producto**
	- URL: $nombre_proyecto/api/products
	- Peticion: POTS
	- Body: (Campos requeridos)
		- sku-> STRING
		- model -> STRING
		- price -> STRING
		- name -> STRING
		- attribute_color -> STRING 
	

## Versionado ##

Se uso github para el versionamiento del codigo. LINK:
[https://github.com/yender11/prueba_tecnica/](https://github.com/yender11/prueba_tecnica/ "Repositorio GitHub")

## Autor ##

- Yender J. Rodriguez Quiajda
- yenderr.11@gmail.com



