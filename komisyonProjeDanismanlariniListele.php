<span id="sonuc"></span>

 <input type="text" class="hidden page" name="<?php echo sayfa(); ?>" />
<div class="container">
  <form class="form-inline" action="" method="post">
 <div class="form-group">
      <label for="dadi">Adı:</label>
      <input type="text" class="form-control" name="dadi"  placeholder="Danışm adı..">
    </div>
    <div class="form-group">
      <label for="dasoyadi">Soyadı:</label>
      <input type="text" class="form-control" name="dasoyadi" placeholder="Danışman soyadı..">
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
                <thead>
                <tr><th>Sıra</th>
                  <th>Adı</th>
                  <th>Soyadı</th>
                  <th>İşlem</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                     include_once("/Controller/komisyonProjeDanismanlariListeleC.php");
                     $danismanListeleNesne = new komisyonProjeDanismanlariListeleC();
                if(@$_POST["listele"])
					 	         $danismanListeleNesne->komisyonDanismanlariListele();
					       else
                     $danismanListeleNesne->komisyonTumDanismanlariListele();

					?>
                   <span id="listeleme"></span>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
