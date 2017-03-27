<div class="container">
  <form class="form-inline" action="" method="post">
   <div class="form-group">
      <label for="numarasi">Numara:</label>
      <input type="text" class="form-control" name="ogrenciNumara" placeholder="Numara">
    </div>
    <div class="form-group">
      <label for="adi">Adı:</label>
      <input type="text" class="form-control" name="ogrenciAdi" placeholder="Adı">
    </div>
    <div class="form-group">
      <label for="soyadi">Soyadı:</label>
      <input type="text" class="form-control" name="ogrenciSoyadi" placeholder="Soyadı">
    </div>
	<div class="form-group">
        <label class="control-label" for="projeTuru">Proje Türü:</label>         
       <select name="projeTuru" class="form-control" >
	<option value="" selected>Tüm Projeler</option>
	<option value="3">Her tasarım hem bitirme Projeleri</option>
	<option value="2">Bitirme Projeleri</option>
	<option value="1">Tasarım Projeleri</option>
	</select>
    </div> 
	 <input type="submit" class="btn  btn-success" name="gonder" value="Listele"/>
	</form>
	</div>
  <div class="box">
             <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>Sıra</th>
                  <th>Numarası</th>
                  <th>Adı</th>
                  <th>Soyadı</th>
                  <th>Proje Adı</th>
				  <th>Proje Türü</th>
				  <th>İşlem</th>
                </tr>
                </thead>
                <tbody>
				<?php
                    $sayfa=sayfa();
                     if(@$_POST["gonder"] && $sayfa=="ogrenci-danisman-basvurusu"){
						ogrenci_proje_getir();
                    }
                    else if($sayfa=="ogrenci-danisman-basvurusu")
                        ogrenci_proje_hepsini_getir();

				?>
                  <span id="listeleme"></span>
              </table>
            </div>
            <!-- /.box-body -->
          </div>