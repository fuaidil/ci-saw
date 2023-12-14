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
                        foreach($dataa as $row) :
                        $no++;
                    ?>

                    <form action="<?= site_url('home/edit_umkm/'.$row->kode_umkm)?>" method="post">
                        <input type="hidden" name="id" class="form-control" value="<?=$row->kode_umkm?>">
                        <label>Nama UMKM</label>
                        <input type="text" name="nama" class="form-control" value="<?=$row->nama_umkm?>"><br>

                        <label>Nama Pimpinan</label>
                        <input type="text" name="namap" class="form-control" value="<?=$row->nama_pimpinan?>"><br>

                        <label>Nama Jalan</label>
                        <input type="text" name="namaj" class="form-control" value="<?=$row->jalan?>"><br>

                        <label>Nama Desa</label>
                        <input type="text" name="namad" class="form-control" value="<?=$row->desa?>"><br>

                        <label>Nama Kecamatan</label>
                        <input type="text" name="namak" class="form-control" value="<?=$row->kecamatan?>"><br>

                        <label for="">Nama Jenis Usaha</label>
                        <select name="ju" class="form-control">
                            <?php foreach($datajoin as $rows) : ?>
                                <option value="<?=$rows->kode_jenis_usaha?>"><?=$rows->nama?></option>
                            <?php endforeach ?>
                        </select><br>
                    
                        <button class="btn btn-success">Update</button>
                    </form>
                    <button class="btn btn-danger" onclick="location.href='<?=site_url('home/view_umkm')?>'" style="margin-left: 90px; margin-top: -65px;">
                        Cancel
                    </button>
                    <?php endforeach; ?>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>