<?php

$id = intval($_GET['id']);
$sayi = $IstifadeciModel->IstifadeciKontrol($id);

if(!empty($sayi))
{
    $melumat = $IstifadeciModel->IstifadeciMelumat($id);

    $sorgu = $baglanti->db->prepare("DELETE FROM customers WHERE id = ?");
    $sil = $sorgu->execute(array($id));

    if($sil)
    {

        $general->log($melumat['name']." ".$melumat['surname']." müştərisi silindi");
        helper::yonlendir("?mode=musteri/listele");
    }
    else
    {
        helper::yonlendir("?mode=musteri/listele&alert");
    }
}
else
{
    helper::yonlendir(SITE_URL);
}
