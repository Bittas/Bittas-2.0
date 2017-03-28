<span id="sonuc"></span>

<input type="text" class="hidden page" name="<?php echo sayfa(); ?>" />
<div class="container">
  <form class="form-inline" action="" method="post">
   <div class="form-group">
      <label for="proje adi">Proje Adı:</label>
      <input type="text" class="form-control" name="projeAdi" placeholder="Ad Giriniz...">
    </div>
    <div class="form-group">
        <label class="control-label" for="projeTuru">Proje Türü:</label>
        <select class="form-control" name="projeTuru"  id="projeTuru" onChange="danismanProjeleriListele(this);">
            <option value="1">Tasarım Projeleri</option>
            <option value="2">Bitirme Projeleri</option>
            <option value="3">Bitirme(Tasarım) Projeleri</option>
        </select>
    </div>
    <div class="form-group">
        <label class="control-label" for="projeOnay">Onay:</label>
        <select class="form-control" name="projeOnay"  id="projeOnay" onChange="danismanProjeleriListele(this);">
            <option value="">Tümü</option>
            <option value="1">Onaylananlar</option>
            <option value="0">Onaylanmayanlar</option>
        </select>
    </div>
    <input type="submit" class="btn  btn-success" name="listele" value="Listele"/>
  </form>
</div>



  <div class="box">
            <div class="box-header">
              <h1 class="box-title text-primary">
                <?php
                 echo tabloBaslik() ;
                ?>
                </h1>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="databaseTablo" class="table table-bordered table-striped">

                <tbody>
                    <?php
                    	include_once("/Controller/komisyonProjeyeDanismanEkleC.php");
                      $komisyonNesne = new komisyonProjeyeDanismanEkleC();
                    $sayfa=sayfa();
                     if(@$_POST["listele"] && $sayfa=="komisyon-danisman-ekle"){
                       $komisyonNesne->komisyonProjeleriListele();
                    }
                    else if($sayfa=="komisyon-danisman-ekle")
                       $komisyonNesne->komisyonProjeleriListeleHepsi();
                    ?>
                   <span id="listeleme"></span>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
