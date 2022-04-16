<?php
class db {
    private $host = 'localhost';
    private $user = 'root';
    private $senha = '';
    private $database = 'twiter_clone';

    public function conecta_mysql(){

        // criar conexao
        $conn = mysqli_connect($this->host, $this->user, $this->senha, $this->database);
    
        // ajustar o charset de comunicaçao entre a aplicaçao e o banco de dados
        mysqli_set_charset($conn, 'uft8');

        // verificar se houve erro de conexao
        if(mysqli_connect_error()){
            echo'Erro ao tentar se conectar ao banco de dados: '.mysqli_connect_error();
        }
        return $conn;
    }
}
?>