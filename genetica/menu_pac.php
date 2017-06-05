       <ul class="title-area">
                <li class="name">
                    <h1><a href="#"></a></h1>
                </li>
                <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>
          <section class="top-bar-section">
           
            <ul class="right">
                <li class="has-dropdown not-click">
                    <a href="#"><i class="fi-torso"></i> <?php echo $nombre ?> </a>
                    <ul class="dropdown">
                        <li><a href="profile.php">Perfil</a></li>
                        <li><a href="../logout.php">Salir</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="left">
			<?php if($perfil==3){
				echo '<li><a href="reportePaciente.php">Reporte</a></li>';
			}
			else 
				if($perfil==2){
				echo '<li><a href="reporteMedico.php">Reporte</a></li>';
				}
				else{
					echo '<li><a href="reporteLaboratorio.php">Reporte</a></li>';
				}
				
				?>
            </ul>
          </section>