# Unidad Genética - Sistema gestor de archivos

## Descripción del sistema:
Pendiente.
## Contenido
- *Sistema de login* - Inicio de sesión para el usuario, Recuperación de contraseña.
- *Recuperación de contraseña*
- *Reporte administrador* 
- *Reporte paciente* 
- *Reporte laboratiro*
- *Reporte Médico*
- *Alta usuario*
- *Alta estudio*
- *Alta laboratorio*


## Componentes / Frameworks

- <a href="https://datatables.net/">Datatables </a>
- <a href="http://foundation.zurb.com/">Foundation </a>
- <a href="http://sass-lang.com/">Sass </a>

## Documentación 

### Configuración Datatables 

```../php/config.php```

```php
$sql_details = array(
	"type" => "Mysql",  
	"user" => "root",              // Usuario de la base de datos
	"pass" => "",                  // Contraseña de la base de datos
	"host" => "localhost",         // Database host
	"port" => "",                  // Dejar vacio 
	"db"   => "u_genetica_test",   // Nombre base de datos
	"dsn"  => ""                  // Charset utf-8
);
```

