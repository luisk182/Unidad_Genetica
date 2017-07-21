<!DOCTYPE html>
<?php
header("Content-Type: text/html;charset=utf-8");
session_start();

if ($_SESSION['perfil']!=4) 
	{
echo "<script> window.location = '../error-login.php'</script>";
	
	}
else {
 
	
	 require '../conexion.php';
	
	 $query="SELECT * from laboratorio;";
	 $listalabs=mysqli_query($mysqli,$query) or die;
		$resultado= mysqli_fetch_array($listalabs);	
		//var_dump($resultado); die;

	   $name = $_SESSION['nombre'];
	   $apellido = $_SESSION['apellido'];
	   $email = $_SESSION['email'];
	   $activo = $_SESSION['activo'];

}
?>
<html>
<html>
<head>
    <meta charset="utf-8">

	<title>Usuarios</title>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
	<style>
	
		.reveal-modal {
			top:65% !important;
		}
	</style>	
    <?php 
    include('header_in.php');
    include ('dtheader.php');
	
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            if (isset($_POST['register'])) { 

                require 'register.php';
                $mensaje=$_SESSION['alert'];
                $mensaje_error=$_SESSION['alert-error'];
				
            }
        }
    ?>
	<script type="text/javascript" src="../js/password.js"></script>
	<link rel="stylesheet" href="resources/form.css">
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
						label:"Laboratorio",
						type:"select",
						name:"usuario.laboratorio",
						placeholder:"Seleccione Laboratorio"
				},
                    {
                        label:"Estatus",
                        name:"usuario.activo",
                        type:"select",
                        options:[
                            { label:"Inactivo", value:0 },
                            { label:"Activo",   value:1}
                        ]
                },
				{
						label:"Reenvio de correo",
						type:"checkbox",
						name:"usuario.sent",
						   options: [
							{ label: "Enviar", value: 'si'}
							],
						separator: '',
						unselectedValue: 'no'
				},
				{
						label:"hash",
						name:"usuario.hash",
						type:"hidden"
				}
                ],
					i18n: {
							edit: {submit: "Guardar"},
							create:{submit:"Crear"},
							remove:{
								submit:"Borrar",
								confirm:{
									_: "¿Estás seguro que deseas borrar %d lineas?",
									1: "¿Estás seguro que deseas borrar este usuario?"
								}
						}	
					}						
            });
			
			editor.dependent( 'usuario.perfil', function ( val ) {
				if (val != 1) $("#DTE_Field_usuario-laboratorio").val(0);
			return val == 1 ?
			
			{ show: ['usuario.laboratorio'] }
				:
			
            { hide: ['usuario.laboratorio'] };
			} );
			 
			
			
			
            
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
					{data:"laboratorio.NombreLaboratorio"},
                    {data:"usuario.activo",
						 render: function(data){
							return data==1? 'Activo' : 'Inactivo';  
                        }
					},
					{data:"usuario.hash", "visible":false}
				
					
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
				text: 'Exportar Excel',
                extend: 'excel'
            }

            ] );
			
			$.validate({
				form : '#signup'
			});
			
		
			
            } );

    </script>  
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    </head>
    
    <body>
        <nav class="top-bar" data-topbar role="navigation">
            <?php include('menu.php'); ?>
        </nav>
    
    <div class="row">
	<h2>Alta de usuarios</h2>
		<div id="signup">   
			<form action="registrousuario.php" method="post" autocomplete="off" id="miform">
					<div class="row">
					
						<div class="medium-6 columns">
						  <label>
							Apellido<span class="req">*</span>
						  </label>
						  <input type="text" name='apellido'  data-validation="length" data-validation-length="4-15" 
							data-validation-error-msg="Captura un nombre válido"/>
						 
						</div>
        
						<div class="medium-6 columns">
						 <label>
								Nombre(s)<span class="req">*</span>
						  </label>
						  <input type="text" name='nombre' data-validation="required length"
							data-validation-length="4-15"						  
						  data-validation-error-msg="Captura un nombre válido"/>
						</div>
				</div>
				
				<div class="row">
			
				<div class="medium-4 columns">
				<div class="row collapse">
				<div class="merge">
							<label>
								  Correo electrónico<span class="req">*</span>
							<span class="text-right">&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
							&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							Enviar</span>
							</label>
							<div class="medium-9 columns">
								<input type="email"  name='email' data-validation="email"
								data-validation-error-msg="Captura un correo electrónico válido"/>
							</div>
							<div class="medium-3 columns">
							
							<div class="switch">
									  <input type="checkbox" name="enviar" id="miswitch" value="si">
									  <label for="miswitch"></label>
							</div> 
						</div>
					</div>
				</div>
				</div>
						<div class="medium-4 columns">
							<div class="row collapse">
								<label>
									  <span class="req">Contraseña</span>
								</label>
								<div class="medium-10 columns" id="generador">
									
									<input type="text" name='password' data-validation="length"
									data-validation-length="5-15"
									data-validation-error-msg="La contraseña debe tener al menos 5 carácteres"/>
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
								  Teléfono<span class="req">*</span>
								</label>
								<input type="text" name="telefono" data-validation="required"data-validation-error-msg="Captura un teléfono válido"/>
						</div>
				</div>
		
			
			<div class="row">
				<div class="medium-4 columns">
								<label>
								  Perfil<span class="req">*</span>
								</label>
								<select name="perfil" id="perfil">
									<option value="2">Médico</option>
									<option value="1">Laboratorista</option>
									<option value="3">Paciente</option>
									<option value="4">Admin</option>
								</select>
				</div>
				<div class="medium-4 columns">
					<label id="span-lab">
						 Laboratorio<span class="req">*</span>
					</label>				
					<select name="laboratorio" id="lab">		
						<option value="0"> Seleccione laboratorio.. </option>
						<?php
						while($rows = mysqli_fetch_array($listalabs)){
							echo "<option value=".$rows['IdLaboratorio'].">".$rows['NombreLaboratorio']."</option>";
							}			
						?>			
					</select>
					</div>
						<div class="medium-4 columns">
							<button type="submit" class="button small" name="register" style="margin-top:15px; width:100%;">Registrar</button>
						</div>
			
			</div>
			
			

			</form>	
			<div class="row">
	
			<div class="medium-4 columns">
				<?php if($mensaje){ echo '<div data-alert class="alert-box success" tabindex="0" aria-live="assertive" role="alertdialog">'.$mensaje.'<button tabindex="0" class="close" aria-label="Close Alert">&times;</button>
				</div>';} else 
				if($mensaje_error){ echo '<div data-alert class="alert-box alert" tabindex="0" aria-live="assertive" role="alertdialog">'.$mensaje_error.'<button tabindex="0" class="close" aria-label="Close Alert">&times;</button>
				</div>';}  ?>
			</div>
			</div>			
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
						<th>Laboratorio</th>
                        <th>Estatus</th>
						<th></th>
					
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
	<script>
		$(document).ready(function(){
			$("#lab").hide();
			$("#span-lab").hide();
			$("#perfil").on('change', function(){
				if($(this).val()==1)
				{
					$("#span-lab").show();
					$("#lab").val('0');
					$("#lab").show();
					
					
				}
				else{
					$("#lab").val('0');
					$("#lab").hide();
					$("#span-lab").hide();
				}
				
			});
		
			
			
		});
		
		
		
	</script>
	
    
    
    </body>
    
    
</html>
