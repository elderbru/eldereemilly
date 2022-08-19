<!DOCTYPE html>
<?php
include("config.php");
if(isset($_GET['excluir'])){
	$codigo = $_GET['excluir'];
	if($consulta = $conexao->query("update tb_vendas set ven_atividade = 1 where ven_codigo = '$codigo'")) {
		header("Location: venda-listar.php");
	} else {
		echo "Erro na exclusão";
	}
}	
$consulta = $conexao->query("select * from tb_vendas join tb_clientes
on ven_cli_codigo = cli_codigo join tb_plantas on ven_plt_codigo = plt_codigo");
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
			<h1>Vendas</h1>
			<table border = 1>
				<tr style="background-color:#ccc">
					<th>Planta</th>
					<th>Cliente</th> 
					<th>Data</th>
					<th>Valor</th>
					<th>Quantidade</th>
				</tr>
				<?php 
					while($resultado = $consulta->fetch_assoc()){			
				?>
				<tr>
				<?php
					if ($resultado['ven_atividade'] == 1) {
						
					} else {
				?>
					<td><?php echo $resultado['plt_nome']; ?></td>
					<td><?php echo $resultado['cli_nome']; ?></td>
					<td><?php echo $resultado['ven_data']; ?></td>
					<td><?php echo $resultado['ven_valor']; ?></td>
					<td><?php echo $resultado['ven_quantidade']; ?></td>
					<td>
					<a href="venda-editar.php?codigo=<?php echo $resultado['ven_codigo']; ?>"><img src="img/editar.jpg"></a> | | | | | |
					<a href="?excluir=<?php echo $resultado['ven_codigo']; ?>" onclick="return confirm('Deseja realmente apagar?');"><img src="img/lixeira.png"><a/>
					</td>
				<?php } ?>
				</tr>
				<?php } ?>
			</table>
			<a href="venda-cadastro.php"> Nova Venda</a>
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
                <li><i class="fas fa-seedling"></i><a href ="planta-listar.php"> Plantas</a> <i class="fas fa-angle-down"></i>
                    <ul class="plantas">
                        <li><a href="planta-listar.php"><i class="fas fa-tree"></i>Ver plantas </a></li>
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