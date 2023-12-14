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
                  <th>Keterangan</th>
                  
                  <th>C1 - Harga [C] | min</th>
                  <th>C2 - Kamera [B] | max</th>
                  <th>C3 -  RAM [B] | max</th>
                  <th>C4 -  Memori Internal [B] | max</th>
                  <th>C5 -  Processor [B] | max</th>
                  <th>C6 -  Baterai [B] | max</th>
                  <th>C7 -  Jaringan [B] | max</th>
                  <th>C8 -  Berat [C] | min</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php
                  $no=0;
                  foreach($dataMb as $row):
                    $no++;
                    
                ?>
                <tr>
                    <th> Nilai Max/Min Kriteria</th>
                    <td><?= $row->maxminK1?></td>
                    <td><?= $row->maxminK2?></td>
                    <td><?= $row->maxminK3?></td>
                    <td><?= $row->maxminK4?></td>
                    <td><?= $row->maxminK5?></td>
                    <td><?= $row->maxminK6?></td>
                    <td><?= $row->maxminK7?></td>
                    <td><?= $row->maxminK8?></td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>