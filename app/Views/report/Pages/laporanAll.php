<?= $this->extend('layout/tamplate'); ?>
<?php session(); ?>
<?= $this->section('content'); ?>
<?php $bulan = ["Januari", "Februari", "Maret", "Mei", "Juni", "Juli", "Agustus", "Oktober", "November", "Desember"]; ?>
<div class="container">
    <div class="row">
        <div class="col">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Laporan Buku Harian</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">DataTables</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h1 class="card-title" style="font-weight: bold">Laporan Buku Harian Seluruh Pegawai Puskesmas Mlati II</h1>
                                </div>
                                <form action="/laporan/laporanall/" method="post">
                                    <div class="col-4 my-2">
                                        <select class="form-control" id="bln" name="bln">
                                            <?php
                                            $i = 1;
                                            for ($i = 0; $i < 12; $i++) {
                                                $i++;
                                            }
                                            foreach ($bulan as $b) { ?>
                                                <option value="<?= $i; ?>"><?= $b; ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-4 my-2">
                                        <select class="form-control" id="thn" name="thn">
                                            <?php for ($i = date("Y"); $i <= date("Y") + 5; $i++) : ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php endfor ?>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-info">Cari</button>
                                    </div>
                                </form>

                                <!-- /.card-header -->
                                <div class=" card-body">

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Profesi</th>
                                                <th>Aktivitas(Menit)</th>
                                                <th>Target</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($report as $r) : ?>
                                                <tr>
                                                    <td scope="row"><?= $i++; ?></td>
                                                    <td><?= $r['Nama']; ?></td>
                                                    <td><?= $r['Profesi']; ?></td>
                                                    <td><?= $r['Aktivitas (Menit)']; ?></td>
                                                    <td><?= $r['Target (Menit) per Bulan']; ?></td>
                                                    <td><?= $r['Status']; ?></td>
                                                    <td>
                                                        <input type="button" class="btn btn-info" onclick="loadDetail()" value="Detail">
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <!-- <tfoot>
                                            <tr>
                                                <th>Rendering engine</th>
                                                <th>Browser</th>
                                                <th>Platform(s)</th>
                                                <th>Engine version</th>
                                                <th>CSS grade</th>
                                            </tr>
                                        </tfoot> -->

                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                        </div>
                        <!-- /.col -->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Detail Aktivitas</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <!-- <button class="btn btn-warning">Hapus</button> -->
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Rendering engine</th>
                                                        <th>Browser</th>
                                                        <th>Platform(s)</th>
                                                        <th>Engine version</th>
                                                        <th>CSS grade</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Other browsers</td>
                                                        <td>All others</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>U</td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Rendering engine</th>
                                                        <th>Browser</th>
                                                        <th>Platform(s)</th>
                                                        <th>Engine version</th>
                                                        <th>CSS grade</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container-fluid -->
            </section>


        </div>
    </div>
</div>
<!-- /.content-wrapper -->



<?= $this->endSection(); ?>