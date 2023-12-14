<center><h2>Form Data Mahasiswa</h2>
<form action="<?= site_url('home/simpanmhs') ?>" method="post">
    <input type="number" name="nim_mhs" placeholder="nim"><br>
    <input type="text" name="nama_mhs" placeholder="nama"><br>
    <select name="jurusan_mhs" >
        <option value="Teknik Informatika">Teknik Informatika</option>
        <option value="Teknik Arsitektur">Teknik Arsitektur</option>
    </select><br>
    <input type="text" name="alamat_mhs" placeholder="alamat">
    <br><br>
    <input type="submit" value="Simpan Data"></input>
    &nbsp;
    <a href="<?= site_url('home/viewmhs') ?>">Lihat Data</a>
</form></center>