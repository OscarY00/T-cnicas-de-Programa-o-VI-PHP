<?php

require_once('conexao.php');

$numero = '';
$tipo = '';
$valor = '';
$status = '';
$id = '';

if(isset($_GET['id']) && $_GET['id'] != ""){
  $sql = "select * from pousada where id = ".$_GET['id'];
  $resultado = mysqli_query($conexao, $sql);
  if($resultado){
     $dados = mysqli_fetch_array($resultado);
     $numero = $dados['numero'];
     $tipo = $dados['tipo'];
     $valor = $dados['valor'];
     $status = $dados['status'];
     $id = $dados['id'];
 }
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Formulário Quarto</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body background-color = "gray">
    <div width=60% align=center>
        <form class="formulario" method="post" action="reserva.php" align=left> 
            <p> Entre com os dados para a Reserva da Pousada</p>

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="field">
                <label for="numero">Número da Porta:</label>
                <input type="text" id="numero" name="numero" value="<?php echo $numero; ?>" placeholder="Digite o número da porta*" required>
            </div>

            <div class="field radiobox">
                <span>Escolha o tipo de quarto</span>
                <input type="radio" name="tipo" id="simples" value="simples" <?php if($tipo=='simples'){echo 'checked';} ?> ><label for="simples">Simples</label>
                <input type="radio" name="tipo" id="duplo" value="duplo" <?php if($tipo=='duplo'){echo 'checked';} ?> ><label for="duplo">Duplo</label>
                <input type="radio" name="tipo" id="triplo" value="triplo" <?php if($tipo=='triplo'){echo 'checked';} ?> ><label for="triplo">Triplo</label>
            </div>

            <div class="field">
                <label for="valor">Valor:</label>
                <input type="text" id="valor" name="valor" value="<?php echo $valor; ?>" placeholder="Digite o valor*" required>
            </div>        
            <div class="field radiobox">
                <span>Status</span>
                <input type="radio" name="status" id="livre" value="livre" <?php if($status=='livre'){echo 'checked';} ?> ><label for="livre">Livre</label>
                <input type="radio" name="status" id="ocupado" value="ocupado" <?php if($status=='ocupado'){echo 'checked';} ?> ><label for="ocupado">Ocupado</label>
                <input type="radio" name="status" id="bloqueado" value="bloqueado" <?php if($status=='bloqueado'){echo 'checked';} ?> ><label for="bloqueado">Bloqueado</label>
            </div>


            <input type="submit" name="quartos" value="Enviar">
        </form>
    </div>
</body>
</html>