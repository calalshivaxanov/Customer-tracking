<?php
session_start();

class baglanti
{
    public $db;
    function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=musteri;charset=utf8", "root","2352ceka20");
    }
}

$baglanti = new baglanti();

require_once "sessionManager.php";
require_once "helper.php";
require_once "settings.php";
require_once "IstifadeciModel.php";
require_once "islemModel.php";
require_once "general.php";


$sessionManager = new sessionManager();
$userInfo = $sessionManager->userInfo();
$IstifadeciModel = new IstifadeciModel();
$islemModel = new islemModel();
$general = new general();