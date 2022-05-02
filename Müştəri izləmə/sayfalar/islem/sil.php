<?php

$id = intval($_GET['id']);
$sayi = $islemModel->islemControl($id);

if(!empty($sayi))
{
    $melumat = $islemModel->IslemMelumat($id);

    $sorgu = $baglanti->db->prepare("DELETE FROM transaction WHERE id = ?");
    $sil = $sorgu->execute(array($id));

    if($sil)
    {

        $general->log($melumat['name']." işləmi silindi");
        helper::yonlendir("?mode=islem/listele");
    }
    else
    {
        helper::yonlendir("?mode=islem/listele&alert");
    }
}
else
{
    helper::yonlendir(SITE_URL);
}
