<!DOCTYPE html>
<?php
header("Content-Type: text/html;charset=utf-8");
session_start();

if ($_SESSION['perfil']!=4) 
	{
	echo "No tiene suficiente hólá ñoño";die;
	
	}
else {
 
   
   $nombre = $_SESSION['nombre'];
   $apellido = $_SESSION['apellido'];
   $email = $_SESSION['email'];
   $activo = $_SESSION['activo'];

}
?>
<html>
<html>
<head>
    <meta charset="utf-8">

	<title>Unidad Génetica reportes</title>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Unidad Genética</title>
    <?php 
    include('header_in.php');
    include ('dtheader.php');
	
    require '../conexion.php';
    session_start();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            if (isset($_POST['register'])) { 

                require 'register.php';
                $mensaje=$_SESSION['alert'];
            }
        }
    ?>
	<script type="text/javascript" src="../js/password.js"></script>
     <script type="text/javascript" language="javascript" class="init">
          var editor;
            $(document).ready(function(){
                editor= new $.fn.dataTable.Editor({       
                    ajax:"scripts/altaUsuario.php",
                    table:"#usuarios",  
					
                    fields:[{
                        label:"Nombre",
                        name:"usuario.nombre"
                },
                    {
                        label:"Apellido",
                        name:"usuario.apellido"
                },
                    {
                        label:"Correo",
                        name:"usuario.email"
                },
                    {
                        label:"Teléfono",
                        name:"usuario.telefono"
                },
                    {
                        label:"Contraseña",
                        name:"usuario.password",
                        type:'password'
                },
                    {
                        label:"Perfil",
                        name:"usuario.perfil",
                        type:"select",
                        options:[
                            { label: "Administrador",   value:"4"  },
                            { label: "Médico",          value:"2"  },
                            { label: "Laboratorista",   value:"1"  },
                            { label: "Paciente",        value:"3"  }
                        ]     
                },
                    {
                        label:"Estatus",
                        name:"usuario.activo",
                        type:"select",
                        options:[
                            { label:"Inactivo", value:0 },
                            { label:"Activo",   value:1}
                        ]
                }
                ],
					i18n: {
							edit: {submit: "Guardar"},
							create:{submit:"Crear"},
							remove:{
								submit:"Borrar",
								confirm:{
									_: "¿Estas seguro que deseas borrar %d lineas?",
									1: "¿Estas seguro que deseas borrar 1 línea?"
								}
						}	
					}						
            });
            
         var table= $("#usuarios").DataTable({
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
               
                ajax:"scripts/altaUsuario.php",
                columns:[
                    {data:null, render:function(data, type, row){
                            return data.usuario.nombre+' '+data.usuario.apellido;
                        }
                    },
    
                    {data:"usuario.email"},
                    {data:"usuario.telefono"},
                    {data:"perfil.NombrePerfil"},
                    {data:"usuario.activo",
						 render: function(data){
							return data==1? 'Activo' : 'Inactivo';  
                        }
					}
                ],
                select:true
           } );
                new $.fn.dataTable.Buttons( table, [
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
    
    <div class="row">
	<h2>Alta de usuarios</h2>
		<div id="signup">   
			<form action="registrousuario.php" method="post" autocomplete="off">
					<div class="row">
					
						<div class="medium-4 columns">
						  <label>
								Nombre(s)<span class="req">*</span>
						  </label>
						  <input type="text" required autocomplete="off" name='nombre'/>
						</div>
        
						<div class="medium-4 columns">
						  <label>
							Apellido<span class="req">*</span>
						  </label>
						  <input type="text"required autocomplete="off" name='apellido' />
						</div>
						<div class="medium-4 columns">
							<label>
								  Correo electronico<span class="req">*</span>
							</label>
								<input type="email"required autocomplete="off" name='email' />
						</div>
					</div>
				
			
				<div class="row">
						<div class="medium-4 columns">
							<div class="row collapse">
								<label>
									  <span class="req">Contraseña</span>
								</label>
								<div class="medium-10 columns" id="generador">
									
									<input type="text"required autocomplete="off" name='password'>
								</div>
								<div class="medium-2 columns">
									<button class="button postfix" id="miboton">
										<i class="fi fi-loop"></i>
									</button>
								</div>
							</div>
						</div>
						
						<div class="medium-4 columns">
								<label>
								  Perfil<span class="req">*</span>
								</label>
								<select name="perfil">
									<option value="1">Laboratorista</option>
									<option value="2">Médico</option>
									<option value="3">Paciente</option>
									<option value="4">Admin</option>
								</select>
						</div>
						<div class="medium-4 columns">
								<label>
								  Teléfono<span class="req">*</span>
								</label>
								<input type="number"required autocomplete="off" name="telefono">
								
						</div>
						</div> <!-- ./row -->
				<div class="row">
				<div class="medium-4 columns">
					<button type="submit" class="button small expand" name="register">Registrar</button>
				</div>
				<div class="medium-4 columns">
				<?php if($mensaje){ echo '<div data-alert class="alert-box success" tabindex="0" aria-live="assertive" role="alertdialog">'.$mensaje.'<button tabindex="0" class="close" aria-label="Close Alert">&times;</button>
				</div>';}  ?>
				</div>
							
						</div>

			</form>		
          </div>
          <hr>
       
        <div class="row">
		<h3>Consulta / Modificación de usuarios</h3>
		<div class="medium-12 columns">
		<section>
			
            
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
	</div>
    
    <script>
		$("#miboton").click(function(event){
			$('#generador').generatePassword();
				event.preventDefault();
			
		
		});
	</script>
    
    
    </body>
    
    
</html>
