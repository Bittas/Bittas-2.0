<?php
require_once("Controller/OgrenciProjeBasvuruC.php");
   $proje=new OgrenciProjeBasvuruC();

 ?>

<span id="sonuc"></span>

<input type="text" class="hidden page" name="<?php echo sayfa(); ?>" />
<div class="container">
  <form class="form-inline" action="" method="post">
    <div class="form-group">
      <label for="proje adi">Proje Adı:</label>
      <input type="text" class="form-control" name="adi" placeholder="Proje Adını Giriniz...">
    </div>
    <div class="form-group">
      <label for="danışman sayisi">Danışman Sayısı:</label>
      <input type="text" class="form-control" name="kisi" placeholder="Sayı Giriniz...">
    </div>
    <div class="form-group">
           <label class="control-label" for="projeler">Durum :</label>
        <select class="form-control" name="durum"  id="durum"  >
            <option value=" ">Tümü</option>
            <option value="1">Başvurulanlar</option>
            <option value="2">Başvurulmayanlar</option>
        </select>
    </div>
    <input type="submit" class="btn  btn-success" name="listele" value="Listele"/>
  </form>
</div>



  <div class="box">
          
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Proje Adı</th>
                  <th>Konu</th>
                  <th>Kişi Sayısı</th>
                  <th>Danışman Sayısı</th>
                  <th>İşlem</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    $sayfa=sayfa();
                    if(@$_POST["listele"] && $sayfa=="bireysel-projeler" ){
                        $proje->ogrenciProjeBasvuruListeleDetayli("=");
                    }
                    else if(@$_POST["listele"] && $sayfa=="grup-projeler"){
                          $proje->ogrenciProjeBasvuruListeleDetayli(">");
                    }
                    else if($sayfa=="bireysel-projeler"){
                         $proje->ogrenciProjeBasvuruListeleHepsi("=");}
                    else if($sayfa=="grup-projeler")
                         $proje->ogrenciProjeBasvuruListeleHepsi(">");
                   else if($sayfa=="basvurulan-projeleri"){
                        $proje-> ogrenciTumProjeBasvurulariniListele();
                       echo '<script> $(".container").remove(); </script>';
                       }

                    ?>
                   <span id="listeleme"></span>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
