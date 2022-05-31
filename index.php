<!DOCTYPE html>
<html lang="pt_br">
<head>
       <title>Título da Página</title>
       <meta charset="utf-8"/>
       <link rel="stylesheet" href="estilos/estilo.css"/>
</head>
<body>
    <?php
    require_once "includes/banco.php";
    ?>
    <div id="corpo">
<h1>Escolha seu jogo</h1>
<table class="listagem">
    <?php
        $busca = $banco->query("SELECT * FROM jogos ORDER BY nome");
        if (!$busca){
            echo "<tr><td>Infelizmente a busca de errados";
        }else{
            if($busca->num_rows== 0){
                echo "<tr><td>Nenhum registro encontrado";
            }else{
                while($reg = $busca->fetch_object()){
                    echo "<tr><td>capa<td>$reg->nome";
                    echo "<td>Adm";
                }
            }
        }
    ?>
</table>
    </div>
    <?php $banco->close(); ?>
</body>
</html>
