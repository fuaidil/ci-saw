<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data Alternatif</h3>
                </div>
                <div class="card-body">
                <form method="post" action="<?= site_url('home/simpan_alt') ?>">

                    <label for="">Nama Usaha</label>
                    <input type="text" name="nama" class="form-control"><br>

                    <label for="">C1</label>
                    <input type="number" name="nilai1" class="form-control"><br>

                    <label for="">C2</label>
                    <input type="number" name="nilai2" class="form-control"><br>

                    <label for="">C3</label>
                    <input type="number" name="nilai3" class="form-control"><br>

                    <button class="btn btn-primary">Submit</button>
                </form>
                <button class="btn btn-secondary" onclick="location.href='<?=site_url('home/view_alt')?>'" style="margin-left: 90px; margin-top: -65px;">
                    Kembali
                </button>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>