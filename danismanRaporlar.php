          <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php
              if ($_GET["tur"]=="tasarim")
                echo "Tasarım Projesi Raporları";
              else if ($_GET["tur"]=="bitirme")
                echo "Bitirme Projesi Raporları";
              ?></h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Öğrenci</th>
                  <th>Proje</th>
                  <th>Son rapor tarihi</th>
                  <th>Kişi Sayısı</th>
                  <th>Danısman</th>
                  <th>Durum</th>
                </tr>
                <?php
                include_once("Controller/danismanRaporC.php");
                include_once("Model/rapor.php");
                $rapor=Rapor::getRaporNesne();
                $sonuc= DanismanRaporC::danismanRaporOgrenciListeGetir();
                while ($row=mysqli_fetch_array($sonuc)) {
                    $sonuc2=$rapor->sonRaporTarihi($row["pID"],$row["oID"]);
                    if ($sonuc2) {
                        $row2_length=mysqli_num_rows($sonuc2);
                        if ($row2_length>0) {
                        $row2=mysqli_fetch_array($sonuc2);
                            echo '
                                    <tr>
                                    <td><a href="index.php?sayfa=danisman-raporlar-detay&projeID='.$row["pID"].'&ogrenciID='.$row["oID"].'">'.$row["kAdi"].' '.$row["kSoyadi"].'</a></td>
                                    <td>'.$row["pAdi"].'</td>
                                    <td>'.$row2["date"].'</td>
                                    <td><span class="label label-danger">'.$row["kisi_sayisi"].'</span></td>
                                    <td><span class="label label-warning">'.$row["danisman_sayisi"].'</span></td>
                                    <td>
                                    ';
                                    if($row["projedurum_id"]==4)
                                        echo'<span class="label label-danger">'.$row["durum"].'</span>';
                                    else if($row["projedurum_id"]==1)
                                        echo'<span class="label label-success">'.$row["durum"].'</span>';
                                    echo'</td>
                                    </tr>
                                    ';

                        }
                    }
                        else return "sorgu2 hatalı";
                }
                ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
              <small style="color: brown;font-weight: bold;"><p>*raporları görüntülemek için 'öğrenci ismi'ne tıklayınız</p></small>
          <!-- /.box -->
          </div>