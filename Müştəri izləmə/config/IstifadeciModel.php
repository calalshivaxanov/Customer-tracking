<?php


class IstifadeciModel extends baglanti
{
    public function IstifadeciKontrol($id) //İstifadəçi Sayını çəkmək
    {
        $sorgu = $this->db->prepare("SELECT * FROM customers WHERE id = ?");
        $sorgu->execute(array($id));
        return $sorgu->rowCount();
    }


    public function IstifadeciMelumat($id) //İstifadəçi məlumatlarını çəkmək
    {
        $sorgu = $this->db->prepare("SELECT * FROM customers WHERE id = ?");
        $sorgu->execute(array($id));
        return $sorgu->fetch(PDO::FETCH_ASSOC);
    }
}