<?php


class sessionManager extends baglanti
{
    static function SessionYarat($array = [])
    {
        if(!empty(count($array)))
        {
            foreach ($array as $key => $value)
            {
                $_SESSION[$key] = $value;
            }
        }
    }

    static function sessionSil()
    {
        session_destroy();
    }

    public function isLogged() //İstifadəçinin giriş edib etmədiyini yoxlamaq
    {
        if(isset($_SESSION['email']) and isset($_SESSION['password'])) //Əgər email və password varsa(Sessionda)
        {
            $email = helper::temizle($_SESSION['email']);
            $password = helper::temizle($_SESSION['password']);

            if (!empty($email) and !empty($password)) {
                $sorgu = $this->db->prepare("SELECT * FROM users WHERE email = :email and password = :password");
                $sorgu->bindParam(":email", $email, PDO::PARAM_STR);
                $sorgu->bindParam(":password", $password, PDO::PARAM_STR);
                $sorgu->execute();
                $netice = $sorgu->rowCount();

                if (!empty($netice)) //Əgər sonuc boş deyilsə, yəni DB də belə bir məlumat varsa
                {
                    return true;
                } else //Əgər sonuç boşdursa
                {
                    return false;
                }
            } else {
                return false;
            }
        }
        else //Əgər sessionda yoxdursa
        {
            return false;
        }
    }

    public function userInfo()
    {
        if($this->isLogged()) //Əgər istifadəçi varsa
        {
            $email = $_SESSION['email'];
            $password = $_SESSION['password'];

            //İstifadəçi məlumatlarını al
            $sorgu = $this->db->prepare("SELECT * FROM users WHERE email = :email and password = :password");
            $sorgu->bindParam(":email",$email,PDO::PARAM_STR);
            $sorgu->bindParam(":password",$password,PDO::PARAM_STR);
            $sorgu->execute();
            $cek = $sorgu->fetch(PDO::FETCH_ASSOC);
            return $cek;
        }
    }

}