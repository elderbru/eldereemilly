<!DOCTYPE html>
<?php
include("config.php");
$codigo = $_GET['codigo'];
if (isset($_POST['nome'])){
	extract($_POST);
	if($consulta = $conexao->query("update tb_plantas set plt_nome = '$nome',
	plt_bio_codigo = '$bioma', plt_esp_codigo = '$especie',
	plt_stt_codigo = '$status', plt_valor = '$valor'
	where plt_codigo = '$codigo';")){
		header ("Location: planta-listar.php");
	} else {
		echo "Erro";
	}
}
$consulta2 = $conexao->query("select * from tb_plantas where plt_codigo = $codigo");
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
			<h1> Editar Planta </h1>
			<form method="post" action="?codigo=<?php echo $resultado2['plt_codigo']; ?>">
				<label>Nome: </label>
				<input type="text" name="nome" required value="<?php echo
				$resultado2['plt_nome']?>"><br/>
				<label>Bioma: </label>
				<input type="number" name="bioma" required value="<?php echo
				$resultado2['plt_bio_codigo']?>"><br/>
				<label>Espécie: </label>
				<input type="number" name="especie" required value="<?php echo
				$resultado2['plt_esp_codigo']?>"><br/>
				<label>Status: </label>
				<input type="number" name="status" required value="<?php echo
				$resultado2['plt_stt_codigo']?>"><br/>
				<label>Valor: </label>
				<input type="float" name="valor" required value="<?php echo
				$resultado2['plt_valor']?>"><br/>
				<input type="submit" value="Alterar">
			</form>
        </div>
    </main>
    <header class="cabecalhoinicial cabecalhonovo">
        <h2><i class="fas fa-user-plus"></i> Cadastrar novo cliente</h2>
    </header>
</body>
</html>