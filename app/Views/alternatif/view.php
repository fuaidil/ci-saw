<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Alternatif</h3>
                </div>
                <div class="card-body">
                <button class="btn btn-success" onclick="location.href='<?= site_url('home/input_alt') ?>'"><i class="fas fa-plus"></i> Data</button><br><br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Barang</th>
                            <th>C1</th>
                            <th>C2</th>
                            <th>C3</th>
                            <th>C4</th>
                            <th>C5</th>
                            <th>C6</th>
                            <th>C7</th>
                            <th>C8</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($dataa as  $row): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row->nama_barang ?></td>
                            <td><?= $row->C1 ?></td>
                            <td><?= $row->C2 ?></td>
                            <td><?= $row->C3 ?></td>
                            <td><?= $row->C4 ?></td>
                            <td><?= $row->C5 ?></td>
                            <td><?= $row->C6 ?></td>
                            <td><?= $row->C7 ?></td>
                            <td><?= $row->C8 ?></td>
                            <td>
                                <button class="btn btn-sm btn-warning" onclick="location.href='<?= site_url('home/formeditalt/'.$row->id_alternatif) ?>'">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="confirm('Anda Yakin Ingin Menghapus?') ? 
                                location.href='<?= site_url('home/delete_alt/'.$row->id_alternatif)?>' : location.href='<?= site_url('home/view_alt')?>'">
                                    <i class="fas fa-trash"></i>
                                </button>
                                
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