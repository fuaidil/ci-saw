<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data Kriteria</h3>
                </div>
                <div class="card-body">
                <form method="post" action="<?= site_url('home/simpan_kriteria') ?>">

                    <label for="">Nama Kriteria</label>
                    <input type="text" name="nama" class="form-control"><br>

                    <label for="">Nilai Kriteria</label>
                    <input type="text" name="nilai" class="form-control"><br>

                    <label for="">Tipe Kriteria</label>
                    <input type="text" name="tipe" class="form-control"><br>

                    <button class="btn btn-primary">Submit</button>
                </form>
                <button class="btn btn-secondary" onclick="location.href='<?=site_url('home/view_kriteria')?>'" style="margin-left: 90px; margin-top: -65px;">
                    Kembali
                </button>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>