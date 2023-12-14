<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
    
        <!-- Hitung NORMALISASI -->
        <div class="card">
          <div class="card-body">   
            <p>[Note:  B = Benefit
                  C = Cost]</p>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Barang</th>
                  <th>N1 - Harga [C]</th>
                  <th>N2 - Kamera [B]</th>
                  <th>N3 - RAM [B]</th>
                  <th>N4 - Memori Internal [B]</th>
                  <th>N5 - Processor [B]</th>
                  <th>N6 - Baterai [B]</th>
                  <th>N7 - Jaringan [B]</th>
                  <th>N8 - Berat [C]</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no=0;
                  foreach($dataMb['all'] as $row):
                  $no++;
                  foreach($dataMb['maxmin'] as $rowx ):
                ?>
                <tr>
                  <th> <?= $no; ?></th>
                  <td><?= $row->nama_barang; ?></td>
                  <td><?= $rowx->maxminK1?>/<?= $row->C1?> = <?=round($rowx->maxminK1/$row->C1,2)?></td>
                  <td><?= $row->C2?>/<?= $rowx->maxminK2?> = <?=round($row->C2/$rowx->maxminK2,2)?></td>
                  <td><?= $row->C3?>/<?= $rowx->maxminK3?> = <?=round($row->C3/$rowx->maxminK3,2)?></td>
                  <td><?= $row->C4?>/<?= $rowx->maxminK4?> = <?=round($row->C4/$rowx->maxminK4,2)?></td>
                  <td><?= $row->C5?>/<?= $rowx->maxminK5?> = <?=round($row->C5/$rowx->maxminK5,2)?></td>
                  <td><?= $row->C6?>/<?= $rowx->maxminK6?> = <?=round($row->C6/$rowx->maxminK6,2)?></td>
                  <td><?= $row->C7?>/<?= $rowx->maxminK7?> = <?=round($row->C7/$rowx->maxminK7,2)?></td>
                  <td><?= $rowx->maxminK8?>/<?= $row->C8?> = <?=round($rowx->maxminK8/$row->C8,2)?></td>
                  <!-- <td><?= $rowx->maxminK3?>/<?= $row->C3?>= <?=round($rowx->maxminK3/$row->C3,2)?></td> -->
                  <!-- <td></td> -->
                </tr>
                <?php
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