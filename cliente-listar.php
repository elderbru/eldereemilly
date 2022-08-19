<!DOCTYPE html>
<?php
include("config.php");
if(isset($_GET['excluir'])){
	$codigo = $_GET['excluir'];
	if($consulta = $conexao->query("update tb_clientes set cli_atividade = 1 where cli_codigo = '$codigo'")) {
		header("Location: cliente-listar.php");
	} else {
		echo "Erro na exclusão";
	}
}	
$consulta = $conexao->query("select * from tb_clientes");
$consulta1 = $conexao->query("select * from tb_telefones");
$consulta2 = $conexao->query("select * from tb_emails");
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="eplant.css">
    <script src="https://kit.fontawesome.com/1ec0db38fb.js" crossorigin="anonymous"></script>
    <title>E-plant</title>
</head>
<body class="bodyinicial">
	<div class="infos container infos3">
			<h1>Clientes</h1>
			<table border = 1>
				<tr style="background-color:#ccc">
					<th>Código</th>
					<th>Nome</th>
					<th>Telefones</th>
					<th>Emails</th>
					<th>Logradouro</th>
					<th></th>
				</tr>
				<?php 	while($clientesCON = $consulta->fetch_assoc()){
						$telefonesCON = $consulta1->fetch_assoc();
						$emailsCON = $consulta2->fetch_assoc();
				?>
				<tr>
				<?php
					if ($clientesCON['cli_atividade'] == 1) {
						
					} else {
					?>
					<td><?php echo $clientesCON['cli_codigo']; ?></td>
					<td><?php echo $clientesCON['cli_nome']; ?></td>
					<td><?php echo $telefonesCON['tel_telefone1'];
						if ($telefonesCON['tel_telefone2'] != 0){
						echo '<br/>'.$telefonesCON['tel_telefone2'];
						}
					?></td>
					<td><?php echo $emailsCON['eml_email1'];
						if ($emailsCON['eml_email2'] == 0){
						echo '<br/>'.$emailsCON['eml_email2'];
						}
					?></td>
					<td><?php echo $clientesCON['cli_logradouro']; ?></td>
		
					<td>
					<a href="cliente-editar.php?codigo=<?php echo $clientesCON ['cli_codigo']; ?>"><img src="img/editar.jpg" width="100%"></a> | | | | | |
					<a href="?excluir=<?php echo $clientesCON['cli_codigo']; ?>" onclick="return confirm('Deseja realmente apagar?');"><img src="img/lixeira.png" width="1%"><a/>
					</td>
					<?php } ?>
				</tr>
				<?php } ?>
			</table>
			<a href="cliente-cadastro.php"> Novo Cliente</a>
		 </div>
    <main class="barramenu">
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
    </main>
    <header class="cabecalhoinicial">
        <img src="img/natureza.png">
        <h2 class="eplantnome">E-plant</h2>
    </header>
</body>
</html>