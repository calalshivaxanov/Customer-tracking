<?php

$id = intval($_GET['id']);
$sayi = $IstifadeciModel->IstifadeciKontrol($id);

if(!empty($sayi))
{
    $melumat = $IstifadeciModel->IstifadeciMelumat($id);

?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Müştəri Məlumatlarını Dəyişdir</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?=SITE_URL;?>">Home</a></li>
                        <li class="breadcrumb-item active">Dəyişdir</li>
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

                    if(isset($_POST['musteriduzenle']))
                    {
                        $name = helper::temizle($_POST['name']);
                        $surname = helper::temizle($_POST['surname']);
                        $email = helper::temizle($_POST['email']);
                        $adres = helper::temizle($_POST['adres']);
                        $phone = helper::temizle($_POST['phone']);


                        if(!empty($name) and !empty($surname) and !empty($email) and !empty($phone))
                        {
                            $sorgu = $baglanti->db->prepare("UPDATE customers SET name = ?, surname = ? , phone = ? , adres = ? , email = ? WHERE id = ?");
                            $deyistir = $sorgu->execute(array($name,$surname,$phone,$adres,$email,$id));
                            if($deyistir)
                                {
                                    $general->log($name." ".$surname." müştərisi dəyişdi");
                                    helper::alert("success","Qeydiyyat uğurla dəyişdi");
                                }
                            else
                                {
                                    helper::alert("danger","Qeydiyyat dəyişmədi");
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
                                    <input type="text" class="form-control" id="" name="name" value="<?=$melumat['name'];?> ">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">SOYAD</label>
                                    <input type="text" class="form-control" id="" name="surname" value="<?=$melumat['surname'];?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">E-MAİL</label>
                                    <input type="email" class="form-control" id="" name="email" value="<?=$melumat['email'];?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">ADRES</label>
                                    <input type="text" class="form-control" id="" name="adres" value="<?=$melumat['adres'];?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">TELEFON</label>
                                    <input type="text" class="form-control" id="" name="phone" value="<?=$melumat['phone'];?>">
                                </div>

                                <div class="card-footer">
                                    <input type="submit" class="btn btn-primary" name="musteriduzenle" value="Dəyişdir">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div>

<?php
}

else //Əgər belə məlumatlar yoxdursa
{
    helper::yonlendir(SITE_URL);
}
?>