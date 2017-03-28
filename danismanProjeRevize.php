<?php
	include_once("/Controller/danismanProjeOnerC.php");
  include_once("/Controller/danismanProjeRevizeC.php");
	include_once("/Controller/danismanProjeTuruHepsiniGetirC.php");

	$projeOner = new danismanProjeOnerC();
    if (@$_POST["projeOner"])
    {
	        if (@$_POST["projeAdi"] !="" &&
	        @$_POST["projeAciklama"] !=""&&
	        @$_POST["projeTuru"] !="")
	        {
            $projeOner->danismanProjeSil($_GET["id"]);
						$projeOner->danismanProjeOner();
	        }else
	        echo errorMesaj("Lütfen boşlukları doldurunuz..");
     }

?>
<div class="col-xs-12">
<form method="POST">

<?php

 $projeRevize = new danismanProjeRevizeC();
 $sonuc= $projeRevize->danismanProjeRevize($_GET["id"]);

 while($row=mysqli_fetch_array($sonuc)){
?>

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Proje Önerme</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                  <label>Proje Adı</label>
                  <input name="projeAdi" type="text" class="form-control" value='<?php echo $row["adi"]; ?>'>
                </div>

                <div class="form-group">
                  <label>Proje Açıklama</label>
                  <textarea name="projeAciklama" class="form-control" value=''><?php echo $row["konu"]; ?></textarea>
                </div>

                <div class="form-group">
                  <label>Proje Türü</label>
                  <select name="projeTuru" class="form-control">
                    <?php
                    if ($row["turu"] == 1 )
										{
                    echo '<option value="1" selected>Tasarım Projesi</option >';
										echo '<option value="2">Bitime Projesi</option>';
										echo '<option value="3">Bitirme Projesi(Tasarım Projesi)</option>';
									  }else if ($row["turu"] == 2 ){
											echo '<option value="1">Tasarım Projesi</option>';
											echo '<option value="2" selected>Bitime Projesi</option >';
											echo '<option value="3">Bitirme Projesi(Tasarım Projesi)</option>';
									  }else if ($row["turu"] == 3 ){
											echo '<option value="1">Tasarım Projesi</option>';
											echo '<option value="2">Bitime Projesi</option>';
											echo '<option value="3" selected>Bitirme Projesi(Tasarım Projesi)</option >';
									  }
                  ?>
                  </select>
                </div>
                <!-- radio -->
                <fieldset><div class="form-group">
        <?php if ($row["kisi_sayisi"] == 1 )
                 echo '
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios1" id="optionsRadios1" value="option1" checked>
                      Bireysel Proje
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios1" id="optionsRadios2" value="option2">
                      Grup proje
                    </label>
                  </div>
					<div id="grupRadioDiv" >
                  <label for="grupSayisi">Kişi sayısı</label>
                  <input name="grupSayisi" type="text" class="form-control" placeholder="kişi sayısını giriniz...">
					</div>
              </div></fieldset>';
        else if ($row["kisi_sayisi"] > 1 )
            echo '
             <div class="radio">
               <label>
                 <input type="radio" name="optionsRadios1" id="optionsRadios1" value="option1" >
                 Bireysel Proje
               </label>
             </div>
             <div class="radio">
               <label>
                 <input type="radio" name="optionsRadios1" id="optionsRadios2" value="option2" checked>
                 Grup proje
               </label>
             </div>
             <div id="form-group" >
                     <label for="grupSayisi">Kişi sayısı</label>
                     <input name="grupSayisi" type="text" class="form-control" value='.$row["kisi_sayisi"].'>
             </div>
         </div></fieldset>'
         ; ?>

        <?php
         if ($row["danisman_sayisi"] == 1 )
         echo '
         <fieldset><div class="form-group">
           <div class="radio">
             <label>
               <input type="radio" name="optionsRadios2" id="optionsRadios3" value="option1" checked>
               Tek Danışmanlı
             </label>
           </div>
           <div class="radio">
             <label>
               <input type="radio" name="optionsRadios2" id="optionsRadios4" value="option2">
               Çok Danışmanlı
             </label>
           </div>
         <div id="danısmanRadioDiv" class="form-group" >
                   <label for="danismanSayisi">Danışman sayısı</label>
                   <input name="danismanSayisi" type="text" class="form-control" placeholder="danışman sayısını giriniz...">
         </div>
       </div> </fieldset>
       ';

       if ($row["danisman_sayisi"] > 1 )
       echo '
       <fieldset><div class="form-group">
         <div class="radio">
           <label>
             <input type="radio" name="optionsRadios2" id="optionsRadios3" value="option1" >
             Tek Danışmanlı
           </label>
         </div>
         <div class="radio">
           <label>
             <input type="radio" name="optionsRadios2" id="optionsRadios4" value="option2" checked>
             Çok Danışmanlı
           </label>
         </div>
       <div id="form-group" class="form-group" >
                 <label for="danismanSayisi">Danışman sayısı</label>
                 <input name="danismanSayisi" type="text" class="form-control" value='.$row["danisman_sayisi"].'>
       </div>
     </div> </fieldset>

			  <div class="box-footer">
				  <input type="submit" name="projeOner" class="btn btn-primary">
			  </div>
        </div>
				';
	       } ?>
        </form>
        </div>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script>
$(document).ready(function()
{
    $("#grupRadioDiv").hide();
    $("#danısmanRadioDiv").hide();

    $( "#optionsRadios2" ).on( "click", function() {
    $( "#grupRadioDiv" ).show();
  });
    $( "#optionsRadios1" ).on( "click", function() {
    $( "#grupRadioDiv" ).hide();
  });

    $( "#optionsRadios4" ).on( "click", function() {
    $( "#danısmanRadioDiv" ).show();
  });
    $( "#optionsRadios3" ).on( "click", function() {
    $( "#danısmanRadioDiv" ).hide();
  });
});
</script>
