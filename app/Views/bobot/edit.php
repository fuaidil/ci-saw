<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Bobot</h3>
                </div>
                <div class="card-body">
                    <?php
                        $no = 1;
                        foreach($dataa as $row) :
                        $no++;
                    ?>

                    <form action="<?= site_url('home/edit_bobot/'.$row->nama_bobot)?>" method="post">
                        <input type="hidden" name="id" class="form-control" value="<?=$row->nama_bobot?>">
                        <label for="">Nama Kriteria</label>
                        <select name="nama" class="form-control">
                            <?php foreach($datajoin as $rows) : ?>
                                <option value="<?=$rows->nama_kriteria?>"><?=$rows->nama_kriteria?></option>
                            <?php endforeach ?>
                        </select><br>

                        <label>Nama Bobot</label>
                        <input type="text" name="namabo" class="form-control" value="<?=$row->nama_bobot?>"><br>

                        <label>Nilai Bobot</label>
                        <input type="number" name="nilai" class="form-control" value="<?=$row->nilai_bobot?>"><br>

                    
                        <button class="btn btn-success">Update</button>
                    </form>
                    <button class="btn btn-danger" onclick="location.href='<?=site_url('home/view_bobot')?>'" style="margin-left: 90px; margin-top: -65px;">
                        Cancel
                    </button>
                    <?php endforeach; ?>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>