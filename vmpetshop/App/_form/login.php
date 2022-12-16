<?php
session_start();
include_once "../../Util/conn.php";

if((isset($_POST['login'])) && (isset($_POST['pass']))){
    $usuario = mysqli_real_escape_string($conn, $_POST['login']);
    $senha = mysqli_real_escape_string($conn, $_POST['pass']);
    $senhaMD5 = md5($senha);

    $result = "SELECT usu_login, usu_senha FROM tbl_usuario WHERE usu_login = '$usuario' && usu_senha = '$senhaMD5' LIMIT 1";
    $query = mysqli_query($conn, $result) or die("Erro ao Conectar: ". $conn->error);
    $Query = mysqli_fetch_assoc($query);

    if(isset($Query)){
        $_SESSION['usu_login'] = $Query['usu_login'];
        header("Location: administrativo.php");
    }else{
        echo"<script>alert('Usuário ou senha invalidos')</script>";
        $_SESSION['loginErro'] = "Usuário ou senha Inválido";
        header("Location: ../../index.php");
    }
}else{
    echo"<script>alert('Usuário ou senha invalidos')</script>";
    $_SESSION['loginErro'] = "Usuário ou senha inválido";
    header("Location: ../../index.php");
}