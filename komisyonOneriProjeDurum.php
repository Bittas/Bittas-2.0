
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danışman Proje Önerileri
              </h3>

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
                  <th>ID</th>
                  <th>Öneren</th>
                  <th>Proje</th>
                  <th>Proje Konu</th>
                  <th>Kişi Sayısı</th>
                  <th>Danışman Sayısı</th>
                  <th>Projenin Durumu</th>
                </tr>
                <?php
                include_once("Controller/onerilenProjelerC.php");
                include_once("Model/proje.php");
                $sonuc=OnerilenProjelerC::komisyonOnerilenProjeDurum();
                
               while($row=mysqli_fetch_array($sonuc))
               {
                 echo '<tr data-cost='.$row["pId"].'>';
                 echo '<td>'.$row["pId"].'</td>';
                 echo '<td>'.$row["dAdi"].' '.$row["dSoyadi"].'</td>';
                 echo '<td>'.$row["pAdi"].'</td>';
                 echo '<td>'.$row["pKonu"].'</td>';
                 echo '<td>'.$row["kisi_sayisi"].'</td>';
                 echo '<td>'.$row["danisman_sayisi"].'</td>';
                 echo '<td>';
                 echo '<div class="form-group">';
                 echo '<select class="form-control">';
                 $sonuc2=Proje::projeDurumList();
                 $i=0;
                 while ($row2=mysqli_fetch_array($sonuc2)) {
                   if($row["pdId"]==$i)
                    echo '<option value="'.$i.'" selected>'.$row2["durum"].'</option>';
                   else
                    echo '<option value="'.$i.'">'.$row2["durum"].'</option>';
                   $i++;
                }
                echo '</select>';
                echo '</div>';
                echo '</td>';
                echo '</tr>';
                }

                ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
      <script type="text/javascript">
      var durum;
        $( "select").change(function(){
          var durum=$(this).val();
          var data =$(this).closest("tr").data();
          var cost = data.cost;
          console.log('projeID: '+cost+'  projeDurum: '+durum);



            $.ajax({
              type:"POST",
              url:"projeDurumAjax.php",
              data:'&projeDurum='+durum+'&projeID='+cost,
              success:function(sonuc)
              {
                console.log(sonuc);
                if(durum==2)
                  window.location = "index.php?sayfa=mesajlar&aliciId="+sonuc+"";
              }
            });
        });
      </script>