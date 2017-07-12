# Reporte administrador

## Inicialización del formulario 

```js
        var editor;

        $(document).ready(function(){
            editor= new $.fn.dataTable.Editor({       
                ajax:"scripts/r_admin.php",
                table:"#reporte",  
                fields:[{
                // Todos los campos 
                }]
```

## Inicialización de la consulta 

Se incluyen las librerias necesarias, y se definen los campos.
```php
include( "../../php/DataTables.php" );

use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Options,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate;
        $db->sql( "SET NAMES 'utf8'" ); //extensión para reconocer acentos y letra ñ
        // Libreria para captura, lectura y edicion de datos
        Editor::inst( $db, 'altaestudios', 'IdAltaEstudios' ) // tabla, y primarykey de la tabla
	       ->debug(true)

	           ->fields( 
                    // todo el codigo server side
               )
```

## Campos

Fecha recepción
Campo para seleccionar la fecha en que se recibió el estudio por parte de los laboratorios, donde solo pueda seleccionar hasta el dia actual o dias anteriores. <a href="https://editor.datatables.net/reference/field/date">Documentación</a>


```javascript
        {
        label:"Fecha recepción",
        name:"altaestudios.FechaEstudio",
        type:"datetime",
        opts:{
            maxDate: new Date()
        }

```

```php
Serverside script
    Field::inst( 'altaestudios.FechaEstudio' )
        ->validator( 'Validate::dateFormat', array(
            "format"  => Format::DATE_ISO_8601,
            "message" => "Ingrese un formato válido de fecha yyyy-mm-dd"
        ) )
        ->getFormatter( 'Format::date_sql_to_format', Format::DATE_ISO_8601 )
        ->setFormatter( 'Format::date_format_to_sql', Format::DATE_ISO_8601 )
```



```php
Serverside script
 ->field(
        Field::inst( 'altaestudios.FechaEntrega' )
			->validator( 'Validate::dateFormat', array(
				"format"  => Format::DATE_ISO_8601,
				"message" => "Ingrese un formato válido de fecha yyyy-mm-dd"
			) )
            
            )
```

Fecha entrega
Campo donde se selecciona la fecha de entrega con permitiendo unicamente seleccionar el dia de hoy ```minDate``` fecha minima, 
```maxDate``` fecha máxima. <a href="https://editor.datatables.net/reference/field/date">Documentación</a>
```js
        {
                label:"Fecha entrega",
                name:"altaestudios.FechaEntrega",
                type:"datetime",
                opts:{
                    minDate: new Date(new Date().valueOf()-1000*60*60*24),
                    maxDate: new Date()

                }
        }
``` 


```php
Serverside script
        Field::inst( 'altaestudios.FechaEntrega' )
                ->validator( 'Validate::dateFormat', array(
                    "format"  => Format::DATE_ISO_8601,
                    "message" => "Ingrese un formato válido de fecha yyyy-mm-dd"
                ) )
                
```

Campo para seleccionar paciente.
```js
    {
            label:"Paciente",
            name:"altaestudios.IdUsuario", //Select llenado dinamicamente
            type:"select",
            placeholder:"Seleccione Paciente"
    }
```

Consulta para el campo paciente donde ```perfil=3```  

```php
Serverside script

 Field::inst( 'altaestudios.IdUsuario' )
            // se agregan las opciones del objeto que se va a llenar dinamicamente
                    ->options( Options::inst()
                        ->table( 'usuario'  )
                        ->value( 'IdUsuario' )
                        ->label( array('nombre', 'apellido') )
						->render( function ( $row ) {
							return $row['nombre'].' '.$row['apellido'].'';
						})
						->where( function ($q) {
							$q->where( 'perfil', 3 );
						} )
                    )
                    // validador de datos
                    ->validator( 'Validate::dbValues', array(
						"message" => "Seleccione un paciente"
					) ),
```
Campo para 
```js
        {
                label:"Médico",
                name:"altaestudios.IdMedico", //Select llenado dinamicamente
                type:"select",
                placeholder:"Sin especificar"
        }
```


