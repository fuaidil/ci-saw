<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Jenis Usaha</h3>
                </div>
                <div class="card-body">
                <button class="btn btn-success" onclick="location.href='<?= site_url('home/input_ju') ?>'"><i class="fas fa-plus"></i> Data</button><br><br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <!-- <th>Kode Jenis Usaha</th> -->
                            <th>Nama Jenis Usaha</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($dataa as  $row): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <!-- <td><?= $row->kode_jenis_usaha ?></td> -->
                            <td><?= $row->nama ?></td>
                            <td>
                                <button class="btn btn-sm btn-warning" onclick="location.href='<?= site_url('home/form_edit_ju/'.$row->kode_jenis_usaha) ?>'">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="confirm('Anda Yakin Ingin Menghapus?') ? 
                                location.href='<?= site_url('home/deleteju/'.$row->kode_jenis_usaha)?>' : location.href='<?= site_url('home/view_ju')?>'">
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