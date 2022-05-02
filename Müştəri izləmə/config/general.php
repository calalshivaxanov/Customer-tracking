<?php


class general extends baglanti
{
    public function usersSayial()
    {
        $sorgu = $this->db->prepare("SELECT * FROM users");
        $sorgu->execute();
        return $sorgu->rowCount();
    }

    public function customersSayial()
    {
        $sorgu = $this->db->prepare("SELECT * FROM customers");
        $sorgu->execute();
        return $sorgu->rowCount();
    }

    public function transactionSayial()
    {
        $sorgu = $this->db->prepare("SELECT * FROM transaction");
        $sorgu->execute();
        return $sorgu->rowCount();
    }


    public function qiymet($id)
    {
        $sorgu = $this->db->prepare("SELECT SUM(price) FROM transaction WHERE customersid = ?"); //Toplam qiyməti çəkmək
        $sorgu->execute(array($id));
        $netice = $sorgu->fetch(PDO::FETCH_ASSOC);
        return $netice['SUM(price)'];
    }



    public function log($text)
    {
        $sorgu = $this->db->prepare("INSERT INTO log(date,text)VALUES(?,?)");
        $sorgu->execute(array(date("Y-m-d"),$text));

    }
}