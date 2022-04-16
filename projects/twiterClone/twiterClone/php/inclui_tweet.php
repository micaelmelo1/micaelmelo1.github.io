<?php
    session_start();

    if (!isset($_SESSION['usuario'])) {
        header('Location: index.php?erro=1');
    }

    require_once('conexao.php');

    $text_tweet = $_POST['text_tweet'];
    $id_usuario = $_SESSION['id_usuario'];

    if($text_tweet != '' && $id_usuario != ''){
        $objDb = new db();
        $link = $objDb->conecta_mysql();

        $sql = "INSERT INTO tweet(id_usuario, tweet) values ($id_usuario, '$text_tweet')";

        mysqli_query($link, $sql);
    }
?>