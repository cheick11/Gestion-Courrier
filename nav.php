<?php

include('connexion.php');

$sqlagent=" SELECT nomAgent AS nom FROM agent WHERE idAgent='".$_SESSION['idAgent']."'";

$reqagent=$cnx->query($sqlagent);
	$doneesagent=$reqagent->fetch();


?>	


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php"><span>NBB-MALI</span>  Gestion Courrier 	<div  class="container-fluid">
					<?php
setlocale(LC_TIME, 'fr_FR.UTF8');
echo strftime('%d/%m/%y'); 
echo strftime(' %H:%M'); 
?>
				</div></a>
			

				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg><?php echo $doneesagent['nom']; ?><span class="caret"></span></a>            
												

						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>

							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							<li><a href="deconnection.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
</body>
</html>



