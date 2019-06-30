<div class="menu-trigger">
		<span></span>
		<span></span>
		<span></span>
	</div>
	<header class="fixed-menu">
		<span class="menu-close"><i class="fa fa-times"></i></span>
		<div class="menu-header">
			<div class="logo d-flex justify-content-center">
				<img src="images/Logo.png" alt="" width="130px">
			</div>
		</div>

<?php
	if (empty($_SESSION['user'])) {
		# code...
	
?>

<!--================ Start Header Menu Area =================-->
	
		<div class="nav-wraper">
			<div class="navbar">
				<ul class="navbar-nav">
					<li class="nav-item"><a class="nav-link active" href="index.php"><img src="img/header/nav-icon1.png" alt="">Início</a></li>
					<li class="nav-item"><a class="nav-link" href="#"><img src="img/header/nav-icon2.png" alt="">Sobre</a></li>
					<li class="nav-item"><a class="nav-link" href="#"><img src="img/header/nav-icon3.png" alt="">Cardápio</a></li>
					<li class="nav-item"><a class="nav-link" href="#"><img src="img/header/nav-icon4.png" alt="">Reserva</a></li>
					<li class="nav-item"><a class="nav-link" href="#"><img src="img/header/nav-icon5.png" alt="">Garçons</a></li>
					<li class="nav-item" style="cursor: pointer;"><a class="nav-link" data-toggle="modal" data-target="#exampleModal"><img src="img/header/nav-icon6.png" alt="">Logins</a></li>
					
				</ul>
			</div>
		</div>
	</header>
	<!--================ End Header Menu Area =================-->
<?php
} if ($_SESSION['user'] == "prop") {
?>
	
		<div class="nav-wraper">
			<div class="navbar">
				<ul class="navbar-nav">
					<li class="nav-item"><a class="nav-link active" href="Administrador.php"><img src="img/header/nav-icon1.png" alt="">Início</a></li>
					<li class="nav-item"><a class="nav-link" href="gerentesView.php"><img src="img/header/nav-icon2.png" alt="">Gerentes</a></li>
					<li class="nav-item"><a class="nav-link" href="#"><img src="img/header/nav-icon3.png" alt="">Empresa</a></li>
					<li class="nav-item"><a class="nav-link" href="garconsView.php"><img src="img/header/nav-icon5.png" alt="">Garçons</a></li>
					<li class="nav-item" style="cursor: pointer;"><a class="nav-link" data-toggle="modal" data-target="#exampleModal"><img src="img/header/nav-icon6.png" alt="">Deslogar</a></li>
					
				</ul>
			</div>
		</div>
	</header>
<?php
} if($_SESSION['user'] == "ger") {
?>

		<div class="nav-wraper">
			<div class="navbar">
				<ul class="navbar-nav">
					<li class="nav-item"><a class="nav-link active" href="controlGerente.php"><img src="img/header/nav-icon1.png" alt="">Início</a></li>
					<li class="nav-item"><a class="nav-link" href="produtosView.php"><img src="img/header/nav-icon2.png" alt="">Produtos</a></li>
					<li class="nav-item"><a class="nav-link" href="#"><img src="img/header/nav-icon3.png" alt="">Comissões</a></li>
					<li class="nav-item"><a class="nav-link" href="#"><img src="img/header/nav-icon4.png" alt="">Reserva</a></li>
					<li class="nav-item"><a class="nav-link" href="garconsView.php"><img src="img/header/nav-icon5.png" alt="">Garçons</a></li>
					<li class="nav-item" style="cursor: pointer;"><a class="nav-link" data-toggle="modal" data-target="#exampleModal"><img src="img/header/nav-icon6.png" alt="">Deslogar</a></li>
					<li class="nav-item submenu dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true"
						 aria-expanded="false"><img src="img/header/nav-icon6.png" alt="">Cadastrar</a>
						<ul class="dropdown-menu">
							<li class="nav-item"><a class="nav-link" href="cadastrarGarcom.php">Garçom</a></li>
							<li class="nav-item"><a class="nav-link" href="cadastrarProduto.php">Produto</a></li>
						</ul>
					</li>
					
				</ul>
			</div>
		</div>
	</header>
<?php 
} if($_SESSION['user'] == "gar") {
?>

		<div class="nav-wraper">
			<div class="navbar">
				<ul class="navbar-nav">
					<li class="nav-item"><a class="nav-link active" href="controlGarcom.php"><img src="img/header/nav-icon1.png" alt="">Início</a></li>
					<li class="nav-item"><a class="nav-link" href="fazerPedido.php"><img src="img/header/nav-icon2.png" alt="">Pedido</a></li>
					<li class="nav-item"><a class="nav-link" href="contas.php"><img src="img/header/nav-icon3.png" alt="">Contas</a></li>
					<li class="nav-item"><a class="nav-link" href="#"><img src="img/header/nav-icon4.png" alt="">Reserva</a></li>
					<li class="nav-item"><a class="nav-link" href="Chefs.html"><img src="img/header/nav-icon5.png" alt="">Garçons</a></li>
					<li class="nav-item" style="cursor: pointer;"><a class="nav-link" data-toggle="modal" data-target="#exampleModal"><img src="img/header/nav-icon6.png" alt="">Deslogar</a></li>
					
				</ul>
			</div>
		</div>
	</header>
<?php 
}
?>