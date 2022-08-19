<!DOCTYPE html>
<?php
include("config.php");
$codigo = $_GET['codigo'];
if (isset($_POST['nome'])){
	extract($_POST);
	if($consulta = $conexao->query("update tb_clientes set cli_nome = '$nome',
	cli_logradouro = '$logradouro'
	where cli_codigo = '$codigo';")){
		if($consulta = $conexao->query("update tb_telefones set tel_telefone1 = '$telefone1', tel_telefone2 ='$telefone2'
		where tel_cli_codigo = '$codigo';")){
			header ("Location: cliente-listar.php");
		} else {
		echo "Erro3";
		}
	if($consulta = $conexao->query("update tb_emails set eml_email1 = '$email1', eml_email2 ='$email2'
		where eml_cli_codigo = '$codigo';")){
			header ("Location: cliente-listar.php");
		} else {
		echo "Erro2";
		}
	} else {
		echo "Erro";
	}
}
$consulta2 = $conexao->query("select * from tb_clientes where cli_codigo = $codigo");
$resultado2 = $consulta2->fetch_assoc();
$consulta3 = $conexao->query("select * from tb_telefones where tel_cli_codigo = $codigo");
$resultado3 = $consulta3->fetch_assoc();
$consulta4 = $conexao->query("select * from tb_emails where eml_cli_codigo = $codigo");
$resultado4 = $consulta4->fetch_assoc();
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
        </nav>
        <div class="cadastro container">
			<h1> Editar Cliente </h1>
			<form method="post" action="?codigo=<?php echo $resultado2['cli_codigo']; ?>">
				<label>Nome: </label>
				<input type="text" name="nome" required value="<?php echo
				$resultado2['cli_nome']?>"><br/>
				<label>Telefones: </label>
				<input type="text" name="telefone1" required value="<?php echo
				$resultado3['tel_telefone1']?>"><br/>
				<input type="text" name="telefone2" value="<?php echo
				$resultado3['tel_telefone2']?>"><br/>
				<label>E-mails: </label>
				<input type="email" name="email1" required value="<?php echo
				$resultado4['eml_email1']?>"><br/>
				<input type="email" name="email2" value="<?php echo
				$resultado4['eml_email2']?>"><br/>
				<label>Logradouro: </label>
				<input type="text" name="logradouro" required value="<?php echo
				$resultado2['cli_logradouro']?>"><br/>
				<input type="submit" value="Alterar">
			</form>
        </div>
    </main>
    <header class="cabecalhoinicial cabecalhonovo">
        <h2><i class="fas fa-user-plus"></i> Cadastrar novo cliente</h2>
    </header>
</body>
</html>