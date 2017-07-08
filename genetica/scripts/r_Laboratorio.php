<?php

/*
 * Example PHP implementation used for the index.html example
 */
session_start();

// DataTables PHP library
include( "../../php/DataTables.php" );


use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Options,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate;

$db->sql( "SET NAMES 'utf8'" );
// Libreria para captura, lectura y edicion de datos
Editor::inst( $db, 'altaestudios', 'IdAltaEstudios')
   ->debug(true)
	->fields(
    
        Field::inst('altaestudios.FechaEstudio')
    	->validator( 'Validate::dateFormat', array(
				"format"  => Format::DATE_ISO_8601,
				"message" => "Ingrese un formato válido de fecha yyyy-mm-dd"
			) )
			->getFormatter( 'Format::date_sql_to_format', Format::DATE_ISO_8601 )
			->setFormatter( 'Format::date_format_to_sql', Format::DATE_ISO_8601 ),
    
   
        Field::inst('altaestudios.IdUsuario'),
                Field::inst('usuario.nombre'), // Left join rturn data.
                Field::inst('usuario.apellido'),
         
        Field::inst('altaestudios.archivo'),
                Field::inst('archivo.web_path'),
    
		Field::inst('altaestudios.IdLaboratorio'),
          Field::inst('altaestudios.IdTipoEstudio'),
                Field::inst('tipoestudio.NombreEstudio')
				
			/*  Field::inst( 'altaestudios.userid' )
				->setValue($_SESSION['laboratorio'])	 */			

    )
	->where('altaestudios.IdLaboratorio',$_SESSION['laboratorio'])
    ->leftJoin('tipoestudio', 'altaestudios.IdTipoEstudio', '=', 'tipoestudio.IdTipoEstudio')
    ->leftJoin('archivo', 'altaestudios.archivo', '=', 'archivo.IdArchivo')
    ->leftJoin('usuario', 'altaestudios.IdUsuario', '=', 'usuario.IdUsuario')
    // Reemplazar por la variable de sesion hardcodeada
    
	->process( $_POST )
	->json();