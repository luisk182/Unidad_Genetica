<?php

/*
 * Example PHP implementation used for the index.html example
 */

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
    Editor::inst( $db, 'tipoestudio', 'IdTipoEstudio')
   ->debug(true)
	->fields(
        Field::inst('NombreEstudio'),
		
        Field::inst('ClaveEstudio')
		

    )
   
   
    // Reemplazar por la variable de sesion hardcodeada
  
	->process( $_POST )
	->json();