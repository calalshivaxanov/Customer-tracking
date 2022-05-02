<?php

$cek = $baglanti->db->prepare("SELECT * FROM log ORDER BY id DESC");
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
                        LOG
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?=SITE_URL;?>">Home</a></li>
                        <li class="breadcrumb-item active">LOG</li>
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
                                <th>TARİX</th>
                                <th>LOG</th>

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
                                        <td><?=$value['date'];?></td>
                                        <td><?=$value['text'];?></td>


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