<?php 
include("config.php");
if (isset($_POST['quantidade'])){
	extract($_POST);
} else {
	$quantidade = 0;
}
if (isset($_POST['codigocli'])){
	extract($_POST);
	if($consulta = $conexao->query("insert into tb_vendas (ven_cli_codigo,
	ven_plt_codigo, ven_data, ven_valor, ven_quantidade) values('$codigocli','$codigoplanta','$datavenda',
	'$valortotal','$quantas');")){
		header("Location: venda-listar.php");
	} else {
		echo "error";
	}
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="eplant.css">
    <script src="https://kit.fontawesome.com/1ec0db38fb.js" crossorigin="anonymous"></script>
    <title>Cadastrar venda</title>
</head>
<body class="bodycadastro">
    <main class="barramenu">
        <img src="img/natureza.png" id="fotomain">
        <input type="checkbox" id="checkmenu">
        <label class="labelcheck" for="checkmenu">
            <i class="fas fa-bars"></i>
        </label>
        <nav class="menu container">
            <ul>
                <hr class="barra">
                <li><a href="paginainicial.html"><i class="fas fa-home"></i> Home </a></li>
                <hr class="barra">
                <li><i class="fas fa-address-book"></i><a href="cliente-listar.php"> Clientes</a><i class="fas fa-angle-down"></i>
                    <ul class="clientes">
                        <li><a href="cliente-listar.php"><i class="fas fa-users"></i> Ver clientes </a></li>
                        <li><a href="cliente-cadastro.php"><i class="fas fa-user-plus"></i> Cadastrar clientes </a></li>
                    </ul>
                </li>
                <hr class="barra">
                <li><i class="fas fa-seedling"></i><a href="planta-listar.php"> Plantas</a> <i class="fas fa-angle-down"></i>
                    <ul class="plantas">
                        <li><a href="planta-listar.php"><i class="fas fa-tree"></i> Ver plantas </a></li>
                        <li><a href="planta-cadastro.php"><i class="fas fa-leaf"></i> Cadastrar plantas </a></li>
                    </ul>
                </li>
                <hr class="barra">
                <li><i class="fas fa-shopping-cart"></i><a href="venda-listar.php"> Vendas</a> <i class="fas fa-angle-down"></i>
                    <ul class="vendas">
                        <li><a href="venda-listar.php"><i class="fas fa-check"></i> Ver vendas </a></li>
                        <li><a href="venda-cadastro.php"><i class="fas fa-cart-plus"></i> Cadastrar venda </a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="cadastro container">
			<form method="POST" class="cadastrar">
				<label>Código do cliente: </label>
                <input type="number" name="codigocli" required>																																							
				<label>Código da planta: </label>
				<input type="number" name="codigoplanta" required>
				<label>Quantidade: </label>
                <input type="number" name="quantas" required>
                <label>Data: </label>	
                <input type="date" name="datavenda">
				<label>Valor total: </label>
                <input type="float" name="valortotal">
                <input class="botaocadastrar" type="submit" value="Cadastrar">
            </form>
        </div>
    </main>
    <header class="cabecalhoinicial cabecalhonovo">
        <h2><i class="fas fa-user-plus"></i> Cadastrar venda</h2>
    </header>
</body>
</html>