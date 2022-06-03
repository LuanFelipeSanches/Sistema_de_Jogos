<?php
function thumb($arq)
{
    $caminho = "fotos/$arq";
    if (is_null($arq) || !file_exists($caminho)) {
        return "fotos/indisponivel.png";
    } else {
        return $caminho;
    }
}

function voltar()
{
    return " <a href='index.php'><img src='icones/icoback.png'>
        </a>";
}
function msg_sucesso()
{
    $resp = "<div class='sucesso'><i class='material-icons'>check_circle</i> $m</div>";
    return $resp;
}
function msg_aviso()
{
    $resp = "<div class='aviso'><i class='material-icons'>info</i> $m</div>";
    return $resp;
}
function msg_erro()
{
    $resp = "<div class='erro'><i class='material-icons'>error</i> $m</div>";
    return $resp;
}
