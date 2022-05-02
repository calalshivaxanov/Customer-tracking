<?php


class islemModel extends baglanti
{
    public function islemControl($id) //İstifadəçi Sayını çəkmək
    {
        $sorgu = $this->db->prepare("SELECT * FROM transaction WHERE id = ?");
        $sorgu->execute(array($id));
        return $sorgu->rowCount();
    }


    public function IslemMelumat($id) //İstifadəçi məlumatlarını çəkmək
    {
        $sorgu = $this->db->prepare("SELECT * FROM transaction WHERE id = ?");
        $sorgu->execute(array($id));
        return $sorgu->fetch(PDO::FETCH_ASSOC);
    }
}