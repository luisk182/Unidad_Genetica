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

// Libreria para captura, lectura y edicion de datos
Editor::inst( $db, 'usuario', 'IdUsuario')
   
	->fields(
        Field::inst('nombre'),
        Field::inst('apellido'),
        Field::inst('email'),
        Field::inst('telefono'),
        Field::inst('password'),
        Field::inst('activo'),
        Field::inst('perfil')
        
        
            
            

    )
   
//    ->leftJoin('perfil', 'usuario.IdPerfil', '=', 'perfil.IdPerfil')
	->process( $_POST )
	->json();