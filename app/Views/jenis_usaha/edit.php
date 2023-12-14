<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data Mahasiswa</h3>
                </div>
                <div class="card-body">
                    <?php
                        $no = 1;
                        foreach($dataju as $row) :
                        $no++;
                    ?>

                    <form action="<?= site_url('home/edit_ju/'.$row->kode_jenis_usaha)?>" method="post">
                        <input type="hidden" name="id" class="form-control" value="<?=$row->kode_jenis_usaha?>">
                        <label>Nama Jenis Usaha</label>
                        <input type="text" name="nama" class="form-control" value="<?=$row->nama?>"><br>
                        <button class="btn btn-success">Update</button>
                    </form>
                    <button class="btn btn-danger" onclick="location.href='<?=site_url('home/view_ju')?>'" style="margin-left: 90px; margin-top: -65px;">
                        Cancel
                    </button>
                    <?php endforeach; ?>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>