<?php
require_once("Controller/komisyonProjeDanismanSayisiC.php");
$projeDanismanSayisi=new KomisyonProjeDanismanSayisiC();
 ?>

<div class="container">
  <form class="form-inline" action="" method="post">
    <div class="form-group">
      <label for="proje adi">Proje Adı:</label>
      <input type="text" class="form-control" name="adi" placeholder="Proje Adını Giriniz...">
    </div>
    <div class="form-group">
      <label for="danisman sayisi">Danışman Sayısı:</label>
      <input type="text" class="form-control" name="danismanSayisi" placeholder="Danışman Sayısını Giriniz...">
    </div>

    <div class="form-group">
        <label class="control-label" for="projeTuru">Proje Türü:</label>
        <select class="form-control" name="tur"  id="tur" >
            <option value="1">Tasarım Projeleri</option>
            <option value="2">Bitirme Projeleri</option>
            <option value="3">Bitirme(Tasarım) Projeleri</option>
        </select>
    </div>
    <div class="form-group">
        <label class="control-label" for="onay">Durum:</label>
        <select class="form-control" name="durum"  id="durum">
            <option value="1">Aktif Proje</option>
            <option value="4">Bitmiş Proje</option>
        </select>
    </div>
    <input type="text" class=" hidden" name="projeTipi" id="grup" value="<?php echo @$_GET['kisi']; ?>" />
    <input type="submit" class="btn  btn-success" name="listele" value="Listele"/>
  </form>
</div>
<span id="sonuc"></span>
<div class="box">
            <div class="box-header">
              <h1 class="box-title text-primary">
                 Proje Danışman Sayısı İşlem Tablosu
                </h1>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Öneren Danışman</th>
                  <th>Proje Adı</th>
                  <th>Konu</th>
                  <th>Kişi Sayısı</th>
                  <th>Danışman Sayısı</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                  $projeDanismanSayisi->listele();

                    ?>
                   <span id="listeleme"></span>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
<!--consultantCountIncrease() komisyon içerisinde projeListeleDanismanSayisiIslem fonksiyonunda  -->
<script>
function  consultantCountIncrease(element){
    var check_active = $(element).is(':checked') ? 1 : 0;
    var activeConsultantCount = $(element).attr('activeConsultantCount');
    var id = $(element).attr('id');
    var selecter=$(element).attr('selecter');
        $.ajax({
            type: "POST",
            url: "ajaxKomisyonDanismanSayisiIslemleri.php",
            data: {activeConsultantCount: activeConsultantCount,id:id,selecter:selecter},
            success: function(cevap){
                $("#sonuc").html(cevap);
                setTimeout(function() {
                $('.alert').remove();
                window.location.assign("index.php?sayfa=proje-danisman-sayisi");
              }, 500);
            }
        });

    return true;

}
</script>
