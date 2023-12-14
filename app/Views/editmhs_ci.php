<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data Mahasiswa</h3>
                </div>
                <div class="card-body">
                <form method="post" action="<?= site_url('Mhs/simpanmhs') ?>">
                    <label for="">Nama Mahasiswa</label>
                    <input type="text" name="nama" class="form-control"><br>
                    <label for="">NIM</label>
                    <input type="number" name="nim" class="form-control"><br>
                    <label for="">Jurusan</label>
                    <select name="jurusan" class="form-control">
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Teknik Arsitektur">Teknik Arsitektur</option>
                    </select><br>
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" class="form-control"><br>
                    <button class="btn btn-primary">Submit</button>
                </form>
                    <button class="btn btn-secondary" onclick="location.href='<?=site_url('mhs/')?>'" style="margin-left: 90px; margin-top: -65px;">
                        Kembali
                    </button>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>