<?php
/*
 * Example PHP implementation used for the index.html example
 */

// DataTables PHP library
include( "../../php/DataTables.php" );
session_start();

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
    
        Field::inst('altaestudios.FechaEstudio'),

    
   
        Field::inst('altaestudios.IdUsuario'),
                Field::inst('usuario.nombre'), // Left join rturn data.
                Field::inst('usuario.apellido'),
    
        
    
        Field::inst('altaestudios.archivo'),
                Field::inst('archivo.web_path'),
    

          Field::inst('altaestudios.IdTipoEstudio'),
                Field::inst('tipoestudio.NombreEstudio'),
		Field::inst('altaestudios.activo'),
		
		Field::inst( 'altaestudios.userid' )
			->setValue($_SESSION['IdUsuario'])
		
	
    )
	->where('altaestudios.IdMedico',$_SESSION['IdUsuario'])
    ->leftJoin('tipoestudio', 'altaestudios.IdTipoEstudio', '=', 'tipoestudio.IdTipoEstudio')
    ->leftJoin('archivo', 'altaestudios.archivo', '=', 'archivo.IdArchivo')
    ->leftJoin('usuario', 'altaestudios.IdUsuario', '=', 'usuario.IdUsuario')
    // Reemplazar por la variable de sesion hardcodeada
	
	->process( $_POST )
	->json();