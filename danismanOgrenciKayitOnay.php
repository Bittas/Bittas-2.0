
<span id="sonuc"></span> 
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Öğrenci Kaydı Onaylama</h3>

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
                  <th>Okul numarası</th>
                  <th>E-Posta</th>
                  <th>Onay</th>
                </tr>
                <?php
                include_once("Controller/danismanOgrenciKayitlariC.php");
                $sonuc=DanismanOgrenciKayitlariC::danismanOgrenciKayitOnayBekleyen();
                while($satir=mysqli_fetch_array($sonuc)){
                  echo '
                  <tr data-cost='.$satir["kID"].'>
                  <td>'.$satir["oNo"].'</td>
                  <td>'.$satir["oEmail"].'</td>
                  <td><input type="checkbox" class="pasif" id="'.$satir["kID"].'" onchange="OgrKayitOnay(this);"
                  value="'.$satir["kID"].'"></td>
                  <td><input type="submit" class="pasif" id="'.$satir["kID"].'" onclick="OgrKayitSil(this);"
                  value="Sil"></td>
                  </tr>
                  ';
                }
       ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


      <script type="text/javascript">
      function  OgrKayitOnay(element){
// store the values from the form checkbox box, then send via ajax below
var pasifYap = $(element).is(':checked') ? 1 : 0;
var id = $(element).attr('id');
    
    $.ajax({
        type: "POST",
        url: "ajaxOgrenciKayitOnayla.php",
        data: {pasifYap: pasifYap,id:id},
        success: function(cevap){
            $("#sonuc").html(cevap);
            setTimeout(function() {
            $('.alert').remove();
            }, 1500);
        }
    });
    
return true;
}
      </script>
      <script type="text/javascript">
      function  OgrKayitSil(element){
// store the values from the form checkbox box, then send via ajax below
var id = $(element).attr('id');
    
    $.ajax({
        type: "POST",
        url: "ajaxOgrenciKayitOnayla.php",
        data: {sil: "sil",id:id},
        success: function(cevap){
            $("#sonuc").html(cevap);
            setTimeout(function() {
            $('.alert').remove();
            }, 1500);
        }
    });
    
return true;
}
      </script>