<div class="wrapper">
    <div class="sidebar" data-background-color="black" data-active-color="danger">
    <div class="sidebar-wrapper" id="sideLinks">
            <div class="logo">
                <a href="dashboard.php" class="simple-text">
                    Menu
                </a>
            </div>
            <ul class="nav">
                <li class="" id="dzienniczek">
                    <a href="dzienniczek.php" class="menu-link">
                        <i class="ti-crown"></i>
                        <p>Dzienniczek</p>
                    </a>
                </li>
                <li id="listaUzytkownikow">
                    <a href="uzytkownicy.php" class="menu-link">
                        <i class="ti-user"></i>
                        <p>Lista Uzytkownikow</p>
                    </a>
                </li>
                <li id="planLekcji">
                    <a href="plan_lekcji.php" class="menu-link">
                        <i class="ti-blackboard"></i>
                        <p>Plan Lekcji</p>
                    </a>
                </li>
				<li id="obecnosci">
                    <a href="obecnosci.php" class="menu-link">
                        <i class="ti-bar-chart-alt"></i>
                        <p>Obecnosci</p>
                    </a>
                </li>  
                <li id="poczta">
                    <a href="poczta.php" class="menu-link">
                        <i class="ti-harddrives"></i>
                        <p>Poczta</p>
                    </a>
                </li>  
            </ul>
    	</div>
    </div>

<div class="main-panel">
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar bar1"></span>
					<span class="icon-bar bar2"></span>
					<span class="icon-bar bar3"></span>
				</button>
				<a class="navbar-brand" href="#">eDziennik</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="ti-user"></i>
						<p class="notification"></p>
						<p><strong><?php echo $_SESSION["userid"]; ?></strong></p>
						<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
						<a href="logout.php"><i class="fa fa-power-off"></i> <strong>Logout</strong></a>
						</li>
						</ul>
					</li>
				</ul>
				</li>
				</ul>
			</div>
		</div>
	</nav>