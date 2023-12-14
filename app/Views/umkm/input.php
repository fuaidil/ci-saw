<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data UMKM</h3>
                </div>
                <div class="card-body">
                <form method="post" action="<?= site_url('Home/simpan_umkm') ?>">
                    <label for="">Nama UMKM</label>
                    <input type="text" name="nama" class="form-control"><br>

                    <label for="">Nama Pimpinan</label>
                    <input type="text" name="namap" class="form-control"><br>

                    <label for="">Nama Jalan</label>
                    <input type="text" name="namaj" class="form-control"><br>

                    <label for="">Nama Desa</label>
                    <input type="text" name="namad" class="form-control"><br>

                    <label for="">Nama Kecamatan</label>
                    <input type="text" name="namak" class="form-control"><br>

                    <label for="">Nama Jenis Usaha</label>
                    <select name="ju" class="form-control">
                        <?php foreach($dataa as $row) : ?>
                            <option value="<?=$row->kode_jenis_usaha?>"><?=$row->nama?></option>
                        <?php endforeach ?>
                    </select><br>

                    <button class="btn btn-primary">Submit</button>
                </form>
                <button class="btn btn-secondary" onclick="location.href='<?=site_url('home/view_ju')?>'" style="margin-left: 90px; margin-top: -65px;">
                    Kembali
                </button>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>