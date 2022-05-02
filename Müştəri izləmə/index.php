<?php
ob_start();
require_once "config/baglanti.php";


if($sessionManager->isLogged()) //Əgər istifadəçi giriş edibsə
{
    require_once "template/header.php";
    require_once "template/left.php";

    if(isset($_GET['mode'])) //Əgər yuxarl Link paneldə ?mode gələrsə
    {
        $mode = $_GET['mode'].'.php'; // Həmin mode`u tanımla
        echo $mode;
    }
    else //Əgər mode gəlməzsə
    {
        $mode = "index.php"; // Avtomatik olarak mode tanımlasın
    }
    require_once "sehifeler/".$mode; //Həmin mode`u çağır.

    require_once "template/footer.php";
}
else //Əgər istifadəçi giriş etməyibsə
{
    helper::yonlendir('sehifeler/login.php');
}



?>