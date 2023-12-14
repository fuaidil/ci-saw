<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <!-- Hitung NORMALISASI -->
        <div class="card">
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Barang</th>
                  <th>Hasil Nilai</th>
                  <th>Ranking</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 0;
                foreach ($dataMb['all'] as $row) :
                  foreach ($dataMb['B1'] as $x) :
                    foreach ($dataMb['B2'] as $y) :
                      foreach ($dataMb['B3'] as $z) :
                        foreach($dataMb['B4'] as $a):
                          foreach($dataMb['B5'] as $b):
                            foreach($dataMb['B6'] as $c):
                              foreach($dataMb['B7'] as $d):
                                foreach($dataMb['B8'] as $e):
                        $no++;
                        foreach ($dataMb['maxmin'] as $rowx) :
                          $c1 =  $rowx->maxminK1/$row->C1;
                          $c2 =  $row->C2/$rowx->maxminK2;
                          $c3 =  $row->C3/$rowx->maxminK3;
                          $c4 =  $row->C4/$rowx->maxminK4;
                          $c5 =  $row->C5/$rowx->maxminK5;
                          $c6 =  $row->C6/$rowx->maxminK6;
                          $c7 =  $row->C7/$rowx->maxminK7;
                          $c8 =  $rowx->maxminK8/$row->C8;

                ?>
                <tr>
                  <th> <?= $no; ?></th>
                  <td><?= $row->nama_barang; ?></td>

                  <?php $jumlah = round(($c1)*$x->nilai_kriteria,4)+round(($c2)*$y->nilai_kriteria,4)+round(($c3)*$z->nilai_kriteria,4)+round(($c4)*$a->nilai_kriteria,4)+round(($c5)*$b->nilai_kriteria,4)+round(($c6)*$c->nilai_kriteria,4)+round(($c7)*$d->nilai_kriteria,4)+round(($c8)*$e->nilai_kriteria,4);?>
                  <td><?= $jumlah?></td>
                  <td><?php if ($jumlah > 0.8) {
                        echo "Mendapat Bantuan";
                      } else {
                        echo "Tidak Mendapat Bantuan";
                      } ?></td>
                </tr>
                <?php
                        endforeach;
                                endforeach;
                              endforeach;
                            endforeach;
                          endforeach;
                        endforeach;
                      endforeach;
                    endforeach;
                  endforeach;
                endforeach;
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>