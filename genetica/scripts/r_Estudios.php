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
        Field::inst('NombreEstudio')
			->validator("Validate::required", array(
				"message" => "Capture un nombre de estudio"
			) )
			
			->validator( function ( $val, $data, $opts ) {
			return ctype_space( $val ) ?
				'No se aceptan espacios en blanco' :
				true;
			} )
			->validator("Validate::unique", array( 
				"message" => "Ese estudio ya está registrado"
			) ),
			
        Field::inst('ClaveEstudio')
		->validator( function ( $val, $data, $opts ) {
			return ctype_space( $val )?
				'No se aceptan espacios en blanco' :
				true;
			} )
			->validator("Validate::required", array(
				"message" => "Capture una clave de estudio"
			) )
			->validator("Validate::unique", array( 
				"message" => "Esa clave de estudio ya está registrada"
			) )


    )
   
   
    // Reemplazar por la variable de sesion hardcodeada
  
	->process( $_POST )
	->json();