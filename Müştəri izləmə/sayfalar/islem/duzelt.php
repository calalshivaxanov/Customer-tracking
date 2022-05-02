<?php

$id = intval($_GET['id']);
$sayi = $islemModel->islemControl($id);

if(!empty($sayi))
{

    $melumat = $islemModel->IslemMelumat($id);

$sorgu = $baglanti->db->prepare("SELECT * FROM customers");
$sorgu->execute();
$cek = $sorgu->fetchAll(PDO::FETCH_ASSOC);

?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>İşləm Dəyişdir</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?=SITE_URL;?>">Home</a></li>
                        <li class="breadcrumb-item active">İşləm Dəyişdir</li>
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

                    if(isset($_POST['islemdeyistir']))
                    {
                        $customersId = intval($_POST['customersId']);
                        $kontrol = $IstifadeciModel->kullaniciControl($customersId); //Bu funksiya güvənlik üçündür..Əgər kimsə inspect elementdə İDni dəyişdirib nəsə məlumat yükləməy istəsə kontrol edir dbdən gələn id customersİd yə bərabərdirmi deyə
                        $name = helper::temizle($_POST['name']);
                        $text = helper::temizle($_POST['text']);
                        $date = helper::temizle($_POST['date']);
                        $price = helper::temizle($_POST['price']);

                        if($kontrol != 0 and !empty($name) and !empty($text) and !empty($price))
                        {
                            $sorgu = $baglanti->db->prepare("UPDATE transaction SET customersid = ? , name = ? , text = ? , date = ? , price = ? WHERE id = ?");
                            $deyistir = $sorgu->execute(array($customersId,$name,$text,$date,$price,$id));

                            if($deyistir)
                            {
                                $general->log($name." işləmi dəyişdi");
                                helper::alert("success","Kayıt başarıyla deyiştirildi");
                            }
                            else
                            {
                                helper::alert("danger","Kayıt deyişmedi");
                            }
                        }
                        else
                        {
                            helper::alert("danger","Lütfen tüm alanları doldurun");
                        }
                    }




                    ?>





                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Yeni İşləm Əlavə et</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="" method="POST">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Müştəri Seçin</label>
                                    <select name="customersId" id="" class="form-control">
                                        <?php
                                        if(!empty($cek)) //Əgər məlumatlar boş deyilsə
                                        {
                                            foreach ($cek as $key => $value)
                                            {
                                                $melumat2 = $IstifadeciModel->kullaniciBilgi($value['id']);
                                                echo '<option value="'.$value['id'].'"';
                                                if($melumat['customersId'] == $value['id'])
                                                    {
                                                        echo "Selected";
                                                    }
                                                echo '>'.$melumat2['name'].' '.$melumat2['surname'].'</option>';
                                            }
                                        }
                                        else
                                        {
                                            echo '<option value="0">Sistemdə Heçbir istifadəçi yoxdur</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Edilən İş</label>
                                    <input type="text" class="form-control" id="" name="name" value="<?=$melumat['name']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Açıqlama</label>
                                    <input type="text" class="form-control" id="" name="text" value="<?=$melumat['text']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tarix</label>
                                    <input type="date" class="form-control" id="" name="date" value="<?=$melumat['date']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Qiymət</label>
                                    <input type="text" class="form-control" id="" name="price" value="<?=$melumat['price']; ?>">
                                </div>

                                <div class="card-footer">
                                    <input type="submit" class="btn btn-primary" name="islemdeyistir" value="Əlavə et">
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
else
{
    helper::yonlendir(SITE_URL);
}
