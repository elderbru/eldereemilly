<!DOCTYPE html>
<?php
include("config.php");
$codigo = $_GET['codigo'];
if (isset($_POST['valor'])){
	extract($_POST);
	if($consulta = $conexao->query("update tb_vendas set ven_plt_codigo = '$planta',
	ven_cli_codigo = '$cliente', ven_data = '$data', ven_valor = '$valor', ven_quantidade = '$quantidade'
	where ven_codigo = '$codigo';")){
		header ("Location: venda-listar.php");
	} else {
		echo "Erro";
	}
}
$consulta2 = $conexao->query("select * from tb_vendas where ven_codigo = $codigo");
$resultado2 = $consulta2->fetch_assoc()
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="eplant.css">
    <script src="https://kit.fontawesome.com/1ec0db38fb.js" crossorigin="anonymous"></script>
    <title>Cadastrar cliente</title>
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
                <li><i class="fas fa-address-book"></i> <a href ="cliente-listar.php">Clientes </a><i class="fas fa-angle-down"></i>
                    <ul class="clientes">
                        <li><a href="cliente-listar.php"><i class="fas fa-users"></i> Ver clientes </a></li>
                        <li><a href="cliente-cadastro.php"><i class="fas fa-user-plus"></i> Cadastrar clientes </a></li>
                    </ul>
                </li>
                <hr class="barra">
                <li><i class="fas fa-seedling"></i> <a href ="planta-listar.php">Plantas</a> <i class="fas fa-angle-down"></i>
                    <ul class="plantas">
                        <li><a href="planta-listar.php"><i class="fas fa-tree"></i>Ver plantas</a></li>
                        <li><a href="planta-cadastro.php"><i class="fas fa-leaf"></i> Cadastrar plantas </a></li>
                    </ul>
                </li>
                <hr class="barra">
                <li><i class="fas fa-shopping-cart"></i> <a href ="venda-listar.php">Vendas</a> <i class="fas fa-angle-down"></i>
                    <ul class="vendas">
                        <li><a href="venda-listar.php"><i class="fas fa-check"></i> Ver vendas </a></li>
                        <li><a href="venda-cadastro.php"><i class="fas fa-cart-plus"></i> Cadastrar venda </a></li>
			</ul>
                </li>
            </ul>
        </nav>
        <div class="cadastro container">
			<h1> Editar Venda </h1>
			<form method="post" action="?codigo=<?php echo $resultado2['ven_codigo']; ?>">
				<label>Planta: </label>
				<input type="number" name="planta" required value="<?php echo
				$resultado2['ven_plt_codigo']?>"><br/>
				<label>Cliente: </label>
				<input type="number" name="cliente" required value="<?php echo
				$resultado2['ven_cli_codigo']?>"><br/>
				<label>Data: </label>
				<input type="date" name="data" required value="<?php echo
				$resultado2['ven_data']?>"><br/>
				<label>Valor: </label>
				<input type="float" name="valor" required value="<?php echo
				$resultado2['ven_valor']?>"><br/>
				<label>Quantidade: </label>
				<input type="int" name="quantidade" required value="<?php echo
				$resultado2['ven_quantidade']?>"><br/>
				<input type="submit" value="Alterar">
			</form>
        </div>
    </main>
    <header class="cabecalhoinicial cabecalhonovo">
        <h2><i class="fas fa-user-plus"></i> Cadastrar novo cliente</h2>
    </header>
</body>
</html>