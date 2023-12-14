<section class="content">
    <div class="container-fluid">
    <button class="btn btn-success" onclick="location.href='<?= site_url('Mhs/input') ?>'"><i class="fas fa-plus"></i> Data</button><br><br>
        <div class="row">
            <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Mahasiswa</h3>
                </div>
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Jurusan</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($dataq as  $row): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row->nim ?></td>
                            <td><?= $row->nama ?></td>
                            <td><?= $row->jurusan ?></td>
                            <td><?= $row->alamat ?></td>
                            <td>
                                <button class="btn btn-warning" onclick="location.href='<?= site_url('mhs/formeditmhs/'.$row->id_mhs) ?>'">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger" onclick="location.href='<?= site_url('mhs/'.$row->id_mhs) ?>'">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <!-- <a href="<?= site_url('home/formeditmhs/'.$row->id_mhs) ?>"><i class="fas fa-edit"></i> Edit</a>
                                <a href="<?= site_url('home/deletemhs/'.$row->id_mhs) ?>">Hapus</a> -->
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>