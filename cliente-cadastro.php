<?php 
include("config.php");
if (isset($_POST['nome'])){
	extract($_POST);
	if($consulta = $conexao->query("insert into tb_clientes (cli_nome,
	cli_logradouro) values('$nome',
	'$logradouro');")){
		$ultimo = mysqli_insert_id($conexao);
		if ($consulta = $conexao->query("insert into tb_telefones (tel_telefone1, tel_telefone2, tel_cli_codigo)
			values ('$telefone1', '$telefone2','$ultimo');")) {
				if ($consulta = $conexao->query("insert into tb_emails (eml_email1, eml_email2, eml_cli_codigo)
			values ('$email1', '$email2','$ultimo');")) {
				header ("Location: cliente-listar.php");
			}
			}
		} else {
				echo "error2";
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
            <form method="POST" class="cadastrar">
				<label> Nome: </label>
                <input type="text" name="nome" required>
				<label> Telefones: </label>
                <input type="text" name="telefone1" required>
				<input type="text" name="telefone2">
				<label> E-mail's: </label>
                <input type="email" name="email1" required>
				<input type="email" name="email2">
				<label>Logradouro: </label>
                <input type="text" name="logradouro">
                <input class="botaocadastrar" type="submit" value="Cadastrar">
            </form>
        </div>
    </main>
    <header class="cabecalhoinicial cabecalhonovo">
        <h2><i class="fas fa-user-plus"></i> Cadastrar novo cliente</h2>
    </header>
</body>
</html>