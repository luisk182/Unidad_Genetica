<!DOCTYPE html>
<?php
session_start();

if ($_SESSION['perfil']!=4 and $_SESSION['perfil']!=5) 
	{
	echo "<script> window.location = '../error-login.php'</script>";
	//header("location: ../error.php");   
	// $_SESSION['message'] = "Debes iniciar sesión para acceder a esta página";
	}
else {
 
   
   $name = $_SESSION['nombre'];
   $apellido = $_SESSION['apellido'];
   $email = $_SESSION['email'];
   $activo = $_SESSION['activo'];

}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>Unidad Genética - Estudios </title>
	<style>
		.boton{
			width:100%;
			height:50px;
			
			background-color:red;
			
		}
		.myboton{
			@extend .boton
			background-color:blue;
		}
		
	</style>
   <?php   include('header_in.php');
            include ('dtheader.php');
    ?>
    
	    <script type="text/javascript" language="javascript" class="init">
          var editor;
            $(document).ready(function(){
                editor = new $.fn.dataTable.Editor({  
         
                    ajax:"scripts/r_Estudios.php",
                    table:"#estudios",  
                    fields:[{
                        label:"Clave",
                        name:"ClaveEstudio"
                },
				
                    {
                        label:"Nombre",
                        name:"NombreEstudio"    
                }
                    ],
					
					i18n: {
							edit: {submit: "Guardar"},
							create:{submit:"Crear"},
							remove:{
								submit:"Borrar",
								confirm:{
									_: "¿Estás seguro que deseas borrar %d estudios?",
									1: "¿Estás seguro que deseas borrar este  estudio?"
								}
						}	
					}							
            });
			
         var table= $("#estudios").DataTable({
                lengthChange: false, 
                "language":{
                    "url": "./lenguaje/spanish.json",
					"select":{
						"rows":{
							"_":"%d filas seleccionadas",
							"0":"Seleccione una fila",
							"1":"1 fila seleccionada"
						}
					}
                },
                    initComplete: function (settings, json){
                            table.buttons().container()
                            .appendTo( $('.small-6.columns:eq(0)', table.table().container() ) );
                
                },
               
                ajax:"scripts/r_Estudios.php",
                columns:[{data:"ClaveEstudio"},{data:"NombreEstudio"}],
				select: {
						style: 'single'
					},
               
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
				text: 'Exportar Excel',
                extend: 'excel'
            }

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
	
        <div class="row">
            
            <div class="small-12 columns">
				 <h1>Estudios</h1>
				<table id="estudios" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Clave Estudio</th>
							<th>Nombre estudio</th>
						</tr>
					</thead>
				</table>
            </div>
         </div>
		</section>
	</div>
</body>
    
</html>