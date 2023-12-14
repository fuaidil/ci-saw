<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Alternatif</h3>
                </div>
                <div class="card-body">
                    <?php
                        $no = 1;
                        foreach($dataa as $row) :
                        $no++;
                    ?>

                    <form action="<?= site_url('home/edit_alt/'.$row->id_alternatif)?>" method="post">
                        <input type="hidden" name="id" class="form-control" value="<?=$row->id_alternatif?>">

                        <label for="">Nama Usaha</label>
                        <input type="text" name="nama" class="form-control" value="<?= $row->nama_usaha ?>"><br>

                        <label for="">C1</label>
                        <input type="number" name="nilai1" class="form-control" value="<?= $row->C1 ?>"><br>

                        <label for="">C2</label>
                        <input type="number" name="nilai2" class="form-control" value="<?= $row->C2 ?>"><br>

                        <label for="">C3</label>
                        <input type="number" name="nilai3" class="form-control" value="<?= $row->C3 ?>"><br>

                    
                        <button class="btn btn-success">Update</button>
                    </form>
                    <button class="btn btn-danger" onclick="location.href='<?=site_url('home/view_alt')?>'" style="margin-left: 90px; margin-top: -65px;">
                        Cancel
                    </button>
                    <?php endforeach; ?>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>