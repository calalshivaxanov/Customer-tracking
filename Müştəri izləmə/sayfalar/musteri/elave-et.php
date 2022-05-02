<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Müştəri Qeydiyyat</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=SITE_URL;?>">Home</a></li>
                    <li class="breadcrumb-item active">Müştəri Qeydiyyat</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">



                <?php

                if(isset($_POST['musterikayit']))
                {
                    $name = helper::temizle($_POST['name']);
                    $surname = helper::temizle($_POST['surname']);
                    $email = helper::temizle($_POST['email']);
                    $adres = helper::temizle($_POST['adres']);
                    $phone = helper::temizle($_POST['phone']);


                    if(!empty($name) and !empty($surname) and !empty($email) and !empty($phone))
                    {

                        $control = $baglanti->db->prepare("SELECT * FROM customers WHERE email = :email");//DB`dən məlumatları çəkirik
                        $control->bindParam(":email", $email, PDO::PARAM_STR); //Parametrləri daxil edirik...Buradakı emaillərin biri SQLdəki emaildi digəri isə istifadəçinin yazdığı emaildi
                        $control->execute(); //Yuxarıdakı əmri işlədirik
                        $sayi = $control->rowCount(); //Əgər Email əvvəlcədən varsa, sayını çıxardırıq
                        if ($sayi == 0) //Əgər həmin email`in DB`də sayı sıfırdısa yəni yoxdursa onda Qəbul elə
                        {
                            $sorgu = $baglanti->db->prepare("INSERT INTO customers(name,surname,phone,adres,email) VALUES(?,?,?,?,?)");
                            $calistir = $sorgu->execute(array($name, $surname, $phone, $adres, $email));

                            if($calistir)
                            {
                                $general->log($name." ".$surname." müştərisi əlavə edildi");
                                helper::alert("success","Təbriklər! İstifadəçi uğurla Əlavə olundu");
                            }
                            else
                            {
                                helper::alert("danger","Müştəri Əlavə olunmadı");
                            }
                        }
                        else
                        {
                            helper::alert("warning","Bu istifadəçi Database`də mövcuddur");
                        }
                    }
                    else
                    {
                        helper::alert("warning","Lütfən bütün yerləri Doldurun");
                    }


                }



                ?>





                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Yeni Müştəri</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="" method="POST">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="exampleInputEmail1">AD</label>
                                <input type="text" class="form-control" id="" name="name" placeholder="Adını Daxil edin...">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">SOYAD</label>
                                <input type="text" class="form-control" id="" name="surname" placeholder="Soyadını Daxil edin...">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">EMAİL</label>
                                <input type="email" class="form-control" id="" name="email" placeholder="Email Daxil edin..">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">ADRES</label>
                                <input type="text" class="form-control" id="" name="adres" placeholder="Adres Daxil edin..">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">TELEFON</label>
                                <input type="text" class="form-control" id="" name="phone" placeholder="Telefon nömrəni Daxil edin...">
                            </div>

                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" name="musterikayit" value="Əlavə et">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>
</div>
