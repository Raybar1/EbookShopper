<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Bolsas artesanales</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
          
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="index.html"><img src="images/home/logo.png" alt="" width="100px" height="100px" /></a>
						</div>
						<div class="btn-group pull-right clearfix">
						</div>
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<li><a href="http://localhost/eshopper/pedidos.php"><i class="fa fa-crosshairs"></i> Pedidos</a></li>
								<li><a href="compra.html"><i class="fa fa-shopping-cart"></i> Carrito</a></li> 
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.html">Home</a></li>
								<li class="dropdown"><a href="#" class="active">Tienda<i
											class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="http://localhost/eshopper/shop.php">Catálogo</a></li> 
										<li><a href="http://localhost/eshopper/pedidos.php" class="active">Pedidos</a></li>
										<li><a href="compra.html">Carrito</a></li> 
                                    </ul>
                                </li> 
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Buscar"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
    <section>
        <div class= "container">           
            <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                        <tr>
                            <th>Id del pedido</th>							
							<th>Fecha del pedido</th>  
                            <th>Monto total</th>   
							<th>Nombre del usuario</th>                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            //include_once "db_empresa.php";
                            $con = mysqli_connect("localhost","root","","tienda");
                            $query = "SELECT id_pedido,fecha,monto_total,usuario FROM pedidos;";
                            $res = mysqli_query($con, $query);
                            while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id_pedido']; ?></td>	
							<td><?php echo $row['fecha']; ?></td>
							<td>$<?php echo $row['monto_total']; ?></td>
							<td><?php
								$ide3 = $row['usuario'];
								$query3 = "SELECT nombre FROM usuarios WHERE id LIKE '%$ide3%';";
								$res3 = mysqli_query($con, $query3);
								if ($row = mysqli_fetch_assoc($res3)){
									 echo $row['nombre'];								
								}
								?></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
		</div>

		<div class = "container">
			<form action="" method="get">
				Buscar id del pedido: <input type="text" name="busqueda">
				<input type="submit" name="enviar" value="buscar">
			</form>
			<div class="table-responsive">
					<table class="table table-hover">
					<thead>
							<tr>
								<th>Id del pedido</th>
								<th>Id del libro</th>   
								<th>Modelo</th>                     
							</tr>
						</thead>

						<tbody>
							<?php
								if(isset($_GET['enviar'])){
									$busqueda = $_GET['busqueda'];
									$con = mysqli_connect("localhost","root","","tienda");
									$query = "SELECT pedido_id_pedido,bolsa_id FROM pedidos_bolsa WHERE pedido_id_pedido LIKE '%$busqueda%';";
									$res = mysqli_query($con, $query);
									while ($row = mysqli_fetch_assoc($res)) {
										
							?>							
							<tr>	
								<th><?php echo $row['pedido_id_pedido']; ?></th>
								<th><?php echo $row['bolsa_id']; ?></th>
								<th><?php
								$ide = $row['bolsa_id'];
								$query2 = "SELECT modelo FROM libros WHERE id LIKE '%$ide%';";
								$res2 = mysqli_query($con, $query2);
								if ($row = mysqli_fetch_assoc($res2)){ ?>
									<?php echo $row['modelo'];?>
								<?php
								}
								?></th>
							</tr>
							<?php
								}
							}
							?>							
						</tbody>
					</table>
				</div>
		

		</div>		
		       
    </section>    
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>