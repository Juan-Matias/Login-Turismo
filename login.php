<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "test";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("No hay conexión: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["txtusuario"];
    $pass = $_POST["txtpassword"];

    $query = mysqli_query($conn, "SELECT * FROM login WHERE usuario = '".$nombre."' AND password = '".$pass."'");
    $nr = mysqli_num_rows($query);

    if ($nr == 1) {
        echo "<script> window.location= 'acceso.html' </script>";
        //header("Location: bienvenido.png");
    } else if ($nr == 0) {
        //header("Location: Login.html");
        echo "<script> alert('Contraseña incorrecta');window.location= 'login.html' </script>";
        //header("Location: alto.png");
    }
}
?>