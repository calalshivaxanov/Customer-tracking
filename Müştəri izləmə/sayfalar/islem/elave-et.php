<?php

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
                    <h1>Müştəri İşləmləri</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?=SITE_URL;?>">Home</a></li>
                        <li class="breadcrumb-item active">Müştəri İşləmləri</li>
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

                    if(isset($_POST['islemkayit']))
                    {
                        $customersId = intval($_POST['customersId']);
                        $kontrol = $IstifadeciModel->IstifadeciKontrol($customersId); //Bu funksiya güvənlik üçündür..Əgər kimsə inspect elementdə İDni dəyişdirib nəsə məlumat yükləməy istəsə kontrol edir dbdən gələn id customersİd yə bərabərdirmi deyə
                        $name = helper::temizle($_POST['name']);
                        $text = helper::temizle($_POST['text']);
                        $date = helper::temizle($_POST['date']);
                        $price = helper::temizle($_POST['price']);

                        if($kontrol != 0 and !empty($name) and !empty($text) and !empty($price))
                        {
                            $sorgu = $baglanti->db->prepare("INSERT INTO transaction(customersid,name,text,date,price) VALUES(?,?,?,?,?)");
                            $calistir = $sorgu->execute(array($customersId,$name,$text,$date,$price));

                            if($calistir)
                            {
                                $general->log($name." işləmi əlavə edildi");
                                helper::alert("success","İşlem başarıyla Eklendi");
                            }
                            else
                            {
                                helper::alert("danger","İşlem eklenemedi");
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
                                                echo '<option value="'.$value['id'].'">'.$value['name'].' '.$value['surname'].'</option>';
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
                                    <input type="text" class="form-control" id="" name="name" placeholder="Edilən işi Daxil edin...">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Açıqlama</label>
                                    <input type="text" class="form-control" id="" name="text" placeholder="Açıqlama Daxil edin..">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tarix</label>
                                    <input type="date" class="form-control" id="" name="date" placeholder="Tarixi Daxil edin..">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Qiymət</label>
                                    <input type="text" class="form-control" id="" name="price" placeholder="Qiyməti Daxil edin...">
                                </div>

                                <div class="card-footer">
                                    <input type="submit" class="btn btn-primary" name="islemkayit" value="Əlavə et">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div>
