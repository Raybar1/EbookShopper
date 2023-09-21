<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <!--  <link rel="stylesheet" href="css2/bootstrap.min.css"> -->
    <script src="js/popper.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">   
    <link rel="stylesheet" href="css2/sweetalert2.min.css">


    
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/price-range.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    



    <title>Catalogo | E-Shopper</title>
</head>

<body>

    <header id="header">
        <div class="header-middle">
			<!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="index.html"><img src="images/home/logo.png" alt="" width="100px" height="100px" /></a>
						</div>
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<!--<li><a href=""><i class="fa fa-user"></i> Cuenta</a></li>-->
								<!-- <li><a href=""><i class="fa fa-star"></i> Wishlist</a></li> -->
								<li><a href="http://localhost/eshopper/pedidos.php"><i class="fa fa-crosshairs"></i> Pedidos</a></li>
								<li><a href="compra.html"><i class="fa fa-shopping-cart"></i> Carrito</a></li>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/header-middle-->

		<div class="header-bottom">
			<!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse"
								data-target=".navbar-collapse">
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
										<li><a href="http://localhost/eshopper/shop.php" class="active">Catálogo</a></li>
										<!-- <li><a href="product-details.html">Productos</a></li> -->
										<li><a href="http://localhost/eshopper/pedidos.php">Pedidos</a></li>
										<li><a href="compra.html">Carrito</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Buscar" />
						</div>
					</div>
				</div>
			</div>
		</div>
        

        <div class="container">
            <div class="row align-items-stretch justify-content-between">
                <nav class="navbar navbar-expand-md navbar-white fixed-top bg-white">
                    <div class="collapse navbar-collapse pull-right" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">
                                <img src="images/shop/carrito.jpg" class="nav-link dropdown-toggle img-fluid" height="70px"
                                    width="70px" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"></img>
                                <div id="carrito" class="dropdown-menu" aria-labelledby="navbarCollapse">
                                    <table id="lista-carrito" class="table">
                                        <thead>
                                            <tr>
                                                <th>Imagen</th>
                                                <th>Nombre</th>
                                                <th>Precio</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>

                                    <a href="#" id="vaciar-carrito" class="btn btn-primary btn-block">Vaciar Carrito</a>
                                    <a href="#" id="procesar-pedido" class="btn btn-danger btn-block">Procesar
                                        Compra</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <div class="container" id="lista-productos">
            
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="features_items">
                            <h2 class="title text-center">Libros en venta</h2>
                            <?php
                                //include_once "db_empresa.php";
                                $con = mysqli_connect("localhost","root","","tienda");
                                $query = "SELECT id,cantidad,descripcion,imagen,modelo,precio FROM libros;";
                                $res = mysqli_query($con, $query);
                                while ($row = mysqli_fetch_assoc($res)) {
                            ?>
                            <div class="col-sm-4">
    
    
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <div class="card mb-4 shadow-sm">
                                                <div class="card-header">
                                                    <h4 class="my-0 font-weight-bold"><?php echo $row['modelo']; ?></h4>
                                                </div>
                                                <div class="card-body">
                                                    <img src="<?php echo $row['imagen']; ?>" class="card-img-top">
                                                    <h1 class="card-title pricing-card-title precio">$ <span class=""><?php echo $row['precio']; ?></span></h1>
                                                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="<?php echo $row['id']; ?>">Comprar</a>
                                                </div>
                                            </div>
                                        </div>									
                                    </div>
                                </div>						
                            </div>															
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

                
        </div>
    </main>

    <script src="js2/jquery-3.4.1.min.js"></script>
    <script src="js2/bootstrap.min.js"></script>
    <script src="js2/sweetalert2.min.js"></script>
    <script src="js2/carrito.js"></script>
    <script src="js2/pedido.js"></script>


    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>


    

</body>

</html>