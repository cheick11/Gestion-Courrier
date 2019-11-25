<?php
session_start();

include('connexion.php');
if(isset($_POST['submit'])){

$usersName=htmlspecialchars($_POST['usersName']);
$password= htmlspecialchars($_POST['password']);

$sql=" SELECT * FROM agent WHERE login ='".$usersName."' AND password='".$password."'";

if($req=$cnx->query($sql)){
	$donees=$req->fetch();
	$_SESSION['idDepartement']=$donees['idDepartement'];
	$_SESSION['idAgent']=$donees['idAgent'];
if($donees['role']=='1'){



?>	
<script type="text/javascript">window.location.href="admin.php"</script>
<?php
}
if($donees['role']=='2'){



?>	
<script type="text/javascript">window.location.href="espace_agent.php"</script>
<?php
}

if($donees['role']=='3'){



?>	
<script type="text/javascript">window.location.href="espace_assistdir.php"</script>
<?php
}


}


}





?>




<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>GESTION COURRIER</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="styles.css">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body id="login">
	
	<div class="row" >
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form method="post" action="index.php" role="form">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="login" name="usersName" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							
							<button  name="submit" class="btn btn-primary"> Se connecter</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
		

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>



</html>
