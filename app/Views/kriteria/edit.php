<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Kriteria</h3>
                </div>
                <div class="card-body">
                    <?php
                        $no = 1;
                        foreach($dataa as $row) :
                        $no++;
                    ?>

                    <form action="<?= site_url('home/edit_kriteria/'.$row->kode_kriteria)?>" method="post">
                        <input type="hidden" name="id" class="form-control" value="<?=$row->kode_kriteria?>">

                        <label>Nama Kriteria</label>
                        <input type="text" name="nama" class="form-control" value="<?=$row->nama_kriteria?>"><br>

                        <label>Nilai Kriteria</label>
                        <input type="text" name="nilai" class="form-control" value="<?=$row->nilai_kriteria?>"><br>

                        <label>Tipe Kriteria</label>
                        <input type="text" name="tipe" class="form-control" value="<?=$row->tipe_kriteria?>"><br>

                    
                        <button class="btn btn-success">Update</button>
                    </form>
                    <button class="btn btn-danger" onclick="location.href='<?=site_url('home/view_kriteria')?>'" style="margin-left: 90px; margin-top: -65px;">
                        Cancel
                    </button>
                    <?php endforeach; ?>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>