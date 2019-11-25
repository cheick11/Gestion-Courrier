
<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="#"><a href="#"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Tableau de bord</a></li>
			
			
			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#courrier"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Courrier 
				</a>
				<ul class="children collapse" id="courrier">
					<li>
						<a class="" href="courrier_agent_valide.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Courrier Valide 
						</a>
					</li>
					<li>
						<a class="" href="espace_agent.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Courrier en Attente
						</a>
					</li>
				</ul>
			</li>

			

			<li class="parent ">
				<a href="liste_agent_agent.php">
					<span data-toggle="collapse" href="#agent"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Agent 
				</a>
				<ul class="children collapse" id="agent">
					<li>
						<a class="" href="liste_agent_agent.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Liste Agent
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Ajout Agent
						</a>
					</li>
				</ul>
			</li>
		</ul>

	</div><!--/.sidebar-->
</body>
</html>>


