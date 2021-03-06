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

### Configuración de conexión datatables 

```/php/config.php```

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
### Reportes

Pantallas y formularios

```
/genetica/altaEstudio.php
/genetica/altaLaboratorio.php
/genetica/altaUsuarios.php
/genetica/reporteAdmin.php
/genetica/reportePaciente.php
/genetica/reporteMedico.php
```


### Scripts 

```
/genetica/scripts/r_admin.php
/genetica/scripts/r_Estudios.php
/genetica/scripts/r_Laboratorio.php
/genetica/scripts/r_Medico.php
/genetica/scripts/r_Paciente.php
/genetica/scripts/altaUsuario.php
/genetica/scripts/registrousuario.php
```

### Relación

```
 /genetica/reporteAdmin.php     -> /genetica/scripts/r_admin.php
 /genetica/altaLaboratorio.php  -> /genetica/scripts/r_Laboratorio.php
 /genetica/altaUsuarios.php     -> /genetica/scripts/altaUsuario.php
 /genetica/reportePaciente.php  -> /genetica/scripts/r_Paciente.php
 /genetica/reporteMedico.php    -> /genetica/scripts/r_Medico.php
```


## Reportes
- <a href="reporteadmin.md">Reporte administrador</a>
- <a href="reportelaboratorio.md">Reporte laboratorio</a>
- <a href="reportemedico.md">Reporte médico</a>
- <a href="reportepaciente">Reporte paciente</a>
- <a href="registrousuario.md">Registro usuario</a>




