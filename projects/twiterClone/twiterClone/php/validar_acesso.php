<?php
    session_start();
    require_once("conexao.php");

    $usuario = $_POST["usuario"];
    $senha = md5($_POST["senha"]);

    $sql = "SELECT id, usuario, email FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha' ";

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $resultado_id = mysqli_query($link, $sql);

    if($resultado_id){
        $dados_usuario = mysqli_fetch_array($resultado_id);

        if(isset($dados_usuario['usuario'])){

            $_SESSION['usuario'] = $dados_usuario['usuario'];
            $_SESSION['email'] = $dados_usuario['email'];
            $_SESSION['id_usuario'] = $dados_usuario['id'];

            header('Location: home.php');
            
        }else{
            header('Location: index.php?erro=1');
        }
    }else{
        echo'Erro na execução da consulta, por favor entrar em contato com o suporte';
    }
