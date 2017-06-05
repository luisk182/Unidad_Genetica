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
Editor::inst( $db, 'usuario', 'IdUsuario')
  
	->fields(
        Field::inst('usuario.nombre'),
        Field::inst('usuario.apellido'),
        Field::inst('usuario.email'),
        Field::inst('usuario.telefono'),
        Field::inst('usuario.password'),
        Field::inst('usuario.activo'),
        Field::inst('usuario.perfil'),
			Field::inst('perfil.NombrePerfil')

    )
   
    ->leftJoin('perfil', 'usuario.perfil', '=', 'perfil.IdPerfil')
	->process( $_POST )
	->json();