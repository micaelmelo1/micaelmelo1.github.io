<?php
    session_start();

    if (!isset($_SESSION['usuario'])) {
        header('Location: index.php?erro=1');
    }

    require_once('conexao.php');
    
    $id_usuario = $_SESSION['id_usuario'];

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = "SELECT DATE_FORMAT(t.data_include, '%d %b %Y %T') AS data_include_formatada, t.tweet, u.usuario";
    $sql.= " FROM tweet AS t JOIN usuarios AS u ON (t.id_usuario = u.id)";
    $sql.= " WHERE id_usuario = $id_usuario";
    $sql.= " OR id_usuario IN (SELECT seguindo_id_usuario FROM usuarios_seguidores WHERE id_usuario = $id_usuario)";
    $sql.= " ORDER BY data_include DESC";


    $resultado_id = mysqli_query($link, $sql);

    if($resultado_id){
        while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
            echo '<a href="#" class="list-group-item">';
                echo '<h4 class="list-group-item-heading">'.$registro['usuario'].' <small> - '.$registro['data_include_formatada'].'</small></h4>';
                echo '<p class="list-group-list-text">'.$registro['tweet'].'</p>';
            echo '</a>';
        }
    }else{
        echo 'Erro na consulta de Tweets no banco de dados';
    }

?>