<?php
require_once('conexao.php');

$objDb = new db();
$link = $objDb->conecta_mysql();

$id_usuario = $_SESSION['id_usuario'];

//--qtde de tweets

$sql = " SELECT COUNT(*) AS qtde_tweets FROM tweet WHERE id_usuario = $id_usuario";
$resultado_id = mysqli_query($link, $sql);
$qtde_tweets = 0;
if ($resultado_id) {
    $registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
    $qtde_tweets = $registro['qtde_tweets'];
} else {
    echo 'Erro ao executar a Query';
}

//--qtde de seguidores

$sql = " SELECT COUNT(*) AS qtde_seguidores FROM usuarios_seguidores WHERE seguindo_id_usuario = $id_usuario";
$resultado_id = mysqli_query($link, $sql);
$qtde_seguidores = 0;
if ($resultado_id) {
    $registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
    $qtde_seguidores = $registro['qtde_seguidores'];
} else {
    echo 'Erro ao executar a Query';
}
