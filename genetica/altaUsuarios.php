<!DOCTYPE html>
<?php
session_start();

if ($_SESSION['perfil']!=4) 
	{
	echo "No tiene suficiente permisos";die;
	//header("location: ../error.php");   
	// $_SESSION['message'] = "Debes iniciar sesión para acceder a esta página";
	}
else {
 
   
   $nombre = $_SESSION['nombre'];
   $apellido = $_SESSION['apellido'];
   $email = $_SESSION['email'];
   $activo = $_SESSION['activo'];

}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>Unidad Genética - Alta usuarios </title>
   <?php   include('header_in.php');
            include ('dtheader.php');
    ?>
    
	    <script type="text/javascript" language="javascript" class="init">
          var editor;
            $(document).ready(function(){
                editor= new $.fn.dataTable.Editor({       
                    ajax:"scripts/altaUsuario.php",
                    table:"#usuarios",  
                    fields:[{
                        label:"Nombre",
                        name:"nombre"
                },
                    {
                        label:"Apellido",
                        name:"apellido"
                },
                    {
                        label:"Correo",
                        name:"email"
                },
                    {
                        label:"Telefono",
                        name:"telefono"
                },
                    {
                        label:"Contraseña",
                        name:"password",
                        type:'password'
                },
                    {
                        label:"Perfil",
                        name:"IdPerfil",
                        type:"select",
                        options:[
                            { label: "Administrador",   value:1  },
                            { label: "Médico",          value:2  },
                            { label: "Laboratorista",   value:3  },
                            { label: "Paciente",        value:4  }
                        ]     
                },
                    {
                        label:"Estatus",
                        name:"activo",
                        type:"select",
                        options:[
                            { label:"Inactivo", value:0 },
                            { label:"Activo",   value:1}
                        ]
                }
                ] 
            });
            
         var table= $("#usuarios").DataTable({
                lengthChange: false, 
                "language":{
                    "url": "./lenguaje/spanish.json"
                },
                
                initComplete: function (settings, json){
                        table.buttons().container()
                            .appendTo( $('.small-6.columns:eq(0)', table.table().container() ) );
                },
               
                ajax:"scripts/altaUsuario.php",
                columns:[
                    {data:null, render:function(data, type, row){
                            return data.nombre+' '+data.apellido;
                        }
                    },
    
                    {data:"email"},
                    {data:"telefono"},
                    {data:"perfil"},
                    {data:"activo"}
                ],
                select:true
           } );
                new $.fn.dataTable.Buttons( table, [
                {   
                    text:"Agregar",
                    extend: "create",
                    editor: editor,
                    formTitle:"Agregar registro"
                },
                { 
                    text:"Editar", 
                    extend: "edit",  
                    editor: editor,
                    formTitle:"Editar registro"
                },
                { 
                    text:"Borrar", 
                    extend: "remove", 
                    editor: editor,
                    formTitle:"¿Estás seguro que deseas borrarlo?"
                },
                {
                    extend:"copy",
                    text:"Copiar"
                },

            ] );
            } );

    </script>    
    </head>
    <body>
    <nav class="top-bar" data-topbar role="navigation">
        <?php include('menu.php'); ?>
    </nav>
    

	<div class="container">
		<section>
			<h1>Alta de Usuarios</h1>
            
			<table id="usuarios" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
                        <th>Nombre</th>
						<th>Correo</th>
                        <th>Teléfono</th>
						<th>Perfil</th>
                        <th>Estatus</th>
            
					</tr>
				</thead>
			
			</table>

		</section>
	</div>
</body>
    
</html>