<!DOCTYPE html>
<html lang="pt_br">

<head>
    <title>Título da Página</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="estilos/estilo.css" />

</head>

<body>
    <?php
    require_once "includes/banco.php";
    require_once "includes/funcoes.php";
    $ordem = $_GET['0'] ?? "n";
    ?>
    <div id="corpo">
        <?php include_once 'topo.php'; ?>
        <h1>Escolha seu jogo</h1>
        <form method="get" action="index.php" id="busca">
            Ordernar:
            <a href="index.php?o=n"> Nome</a> |
            <a href="index.php?o=p"> Produtora </a>|
            <a href="index.php?o=n1"> Nota Alta </a> |
            <a href="index.php?o=n2"> Nota baixa </a> |
            Buscar: <input type="text" name="c" size="10" maxlength="40" />
            <input type="submit" value="OK" />
        </form>
        <table class="listagem">
            <?php
            $q = "SELECT j.cod, j.nome, g.genero, p.produtora,
             j.capa  FROM jogos j JOIN generos g ON j.genero = g.cod
             JOIN produtoras p ON j.produtora = p.cod ";

            switch ($ordem) {
                case "p":
                    $q .= " ORDER BY p.produtora";
                    break;
                case "n1";
                    $q .= " ORDER BY j.nota DESC";
                    break;

                case "n2";
                    $q .= " ORDER BY j.nota ASC";
                    break;

                default:
                    $q .= " ORDER BY j.nome";
                    break;
            }
            $busca = $banco->query($q);
            if (!$busca) {
                echo "<tr><td>Infelizmente a busca de errados";
            } else {
                if ($busca->num_rows == 0) {
                    echo "<tr><td>Nenhum registro encontrado";
                } else {
                    while ($reg = $busca->fetch_object()) {
                        $t = thumb($reg->capa);
                        echo "<tr><td><img src='$t' class='mini'/>";
                        echo "<td><a href='detalhes.php?cod=$reg->cod'>$reg->nome</a>";
                        echo "[$reg->genero]";
                        echo "<br/>$reg->produtora";
                        echo "<td>Adm";
                    }
                }
            }
            ?>
        </table>
    </div>
    <?php include_once "rodape.php"; ?>
</body>

</html>