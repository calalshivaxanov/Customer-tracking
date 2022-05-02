<?php

$cek = $baglanti->db->prepare("SELECT * FROM customers");
$cek->execute();
$veriler = $cek->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Müştəri Siyahısı
                        <small>Müştərilərin Siyahılanması</small>
                    </h1>
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

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">SİYAHI</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>İD</th>
                        <th>AD</th>
                        <th>SOYAD</th>
                        <th>EMAİL</th>
                        <th>NÖMRƏ</th>
                        <th>ADRESS</th>

                        <th>/DƏYİŞDİR</th>
                        <th>/SİL</th>
                    </tr>
                    </thead>

                    <?php

                    if(!empty(count($veriler))) //Əgər məlumatlar boş deyilsə
                    {
                        foreach ($veriler as $key=>$value)
                        {
                            ?>

                            <tbody>
                            <tr>
                                <td><?=$value['id'];?></td>
                                <td><?=$value['name'];?></td>
                                <td><?=$value['surname'];?></td>
                                <td><?=$value['email'];?></td>
                                <td><?=$value['phone'];?></td>
                                <td><?=$value['adres'];?></td>

                                <td>
                                    <a href="?mode=musteri/duzenle&id=<?=$value['id'];?>">Dəyişdir</a>
                                </td>
                                <td>
                                    <a href="?mode=musteri/sil&id=<?=$value['id'];?>">Sil</a>
                                </td>

                            </tr>
                            </tbody>

                    <?php
                        }
                    }
                    else
                    { ?>

                        <tbody>
                        <tr>
                            <td>Veri Yok</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td></td>
                            <td></td>

                        </tr>
                        </tbody>

                   <?php }

                    ?>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
    </section>
</div>