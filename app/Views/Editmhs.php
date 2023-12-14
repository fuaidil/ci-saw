<center>
    <h2>Form Edit Mahasiswa</h2>
    <?php
        $no = 1;
        foreach($dataa as $row) :
        $no++;
    ?>

    <form action="<?= site_url('home/editmhs/'.$row->id_mhs)?>" method="post">
        <input type="hidden" name="idMhs" class="form-control" value="<?=$row->id_mhs?>">
        <label>NIM</label>
        <input type="number" name="nimMhs" value="<?=$row->nim?>" class="form-control"><br><br>
        <label>Nama Mahasiswa</label>
        <input type="text" name="namaMhs" class="form-control" value="<?=$row->nama?>">
        <label for="">Jurusan</label>
        <select name="jurusanMhs" >
            <option value="" disabled><?=$row->jurusan?></option>
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Teknik Arsitektur">Teknik Arsitektur</option>
        </select>
        <label for="">Alamat</label>
        <input type="text" name="alamatMhs" class="form-control" value="<?=$row->alamat?>">
        <input type="submit" value="Simpan Data">
    </form>
    <?php endforeach; ?>
</center>