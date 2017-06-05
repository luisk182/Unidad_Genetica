<!DOCTYPE html>
<?php

session_start();
if ($_SESSION['perfil']!=3) 
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
	$perfil=$_SESSION['perfil'];
	$idusuario= $_SESSION['IdUsuario'];
	
	//print_r($idusuario); die;
}
?>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>Unidad Génetica reportes</title>
	
   <?php   include('header_in.php');
            include ('dtheader.php');
    ?>
    <script type="text/javascript" language="javascript" class="init">
          var editor;
            $(document).ready(function(){
                editor= new $.fn.dataTable.Editor({       
                    ajax:"scripts/r_Paciente.php",
                    table:"#paciente",  
                    fields:[] 
            });

           $("#paciente").DataTable({
                "language":{
                    "url": "./lenguaje/spanish.json",
					"select":{
						"rows":{
							"_":"%d filas seleccionadas",
							"0":"",
							"1":"1 fila seleccionada"
						}
					}
                },
                
				  initComplete: function (settings, json){
                            table.buttons().container()
                            .appendTo( $('.small-6.columns:eq(0)', table.table().container() ) );
                
                },
            
                ajax:"scripts/r_Paciente.php",
                columns:[
                    {data:"tipoestudio.NombreEstudio"},
                    {data:"altaestudios.FechaEstudio"},
                    {data:"altaestudios.activo",
                    render: function(data){
                     return data==1? 'Activo' : 'Inactivo';  
                        }
                    },
                    {data:"archivo.web_path",
                        render: function(data){
                            return '<a href="'+data+'" download><i class="fi-download"></i> Archivo</a>' +' / '+ '<a href="'+data+'" target="_blank"><i class="fi-eye"></i> Ver</a>';
                        }
                    }		
                    
                ],
                select:false,
                 buttons:[
		]   
           } );
            
     });

    </script>    

    
    </head>
    
    
    <body class="dt-example">
    <nav class="top-bar" data-topbar role="navigation">
        <?php include('menu_pac.php'); ?>
    </nav>

	<div class="row">
	<div class="medium-12 columns">
		
			<h1>Resultados</h1>
			
			<div class="demo-html"></div>
			<table id="paciente" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Nombre de estudio</th>
						<th>Fecha Estudio</th>
                        <th>Estatus</th>
						<th>Archivo</th>
                       
					</tr>
				</thead>
                <tbody>
             
                    
                </tbody>
			
			</table>
		
		</div>
	</div>
	
</body>
    
</html>