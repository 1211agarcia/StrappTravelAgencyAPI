# Descripción del Desarrollo en cuanto a tecnologías y herramientas utilizadas:

  - Sistema Operativo: Windows 10
  - Framework Web: [Symfony3.3
  
# Requerimientos para implementacion local
  - Git
  - Apache2
  - Php5
  - Mysql2
  - Composer 

# Instalación

  - Desde la terminal ejecute: 
```
        $ git clone git@github.com:1211agarcia/StrappTravelAgencyAPI.git
```
```
        $ cd StrappTravelAgencyAPI
```
```
        $ composer install
```
```
        $ php bin/consle server:start // Se ejecuta el servidor local 
```
  - En el navgador debe ingresar a la direccion siguiente http://localhost:8000/api/doc

# Pruebas
parte de las capturas de las pruebas realizadas se adjuntan.
###### Observaciones: 
Muchas de las desiciones en cuanto funcionamiento y validación no fueron tomadas en cuenta debido a la rapidez que se ameritaba.
 
###### Mejoras Futuras
- Se estima la creación de un login para mejorar la seguridad y funcionalidades de la api.

###### Bundles utilizados
FOSRestBundle
JMSSerializerBundle
NelmioCorsBundle
NelmioApiDocBundle

FOSRestBundle es la columna vertebral de REST API en Symfony, acepta la solicitud del cliente y devuelve la respuesta apropiada. JMSSerializerBundle ayuda en la serialización de datos de acuerdo con el formato solicitado, es decir, json, xml o yaml. NelmiCorsBundle permite que diferentes dominios llamen a nuestra API. El Bundle NelmioApiDocBundle nos permite generar una documentación para nuestra API.