<span id="sonuc"></span>
 <?php 
 global $conn;
	$sql = "Select * from tbl_kullanici as K
	inner join tbl_ogrenci as O on O.user_id = K.id
	where O.id=".$_GET['id']."";
	$sonuc=@mysqli_query($conn,$sql);
	while ($row = mysqli_fetch_array($sonuc)) {
        $adi = $row['adi'];
		$soyadi = $row['soyadi'];
		$foto = $row['foto'];
		
	}
 ?>
 
<input type="text" class="hidden page" name="<?php echo sayfa(); ?>" />
<div class="box box-widget widget-user">
<div class="widget-user-header bg-aqua-active">
<h2 class="widget-user-desc"><?php echo "Danışman Onaylama"; ?></h2>
<h3 class="widget-user-username"><?php echo  $adi." ".$soyadi; ?></h3>
<h5 class="widget-user-desc"><?php echo  $_GET["numara"]; ?></h5>
</div>
<div class="widget-user-image">
<img class="img-circle" src="<?php echo  $foto; ?>" alt="User Avatar">
</div>
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
                <tr>
                  <th>Sıra</th>
                  <th>Adı</th>
                  <th>Soyadı</th>
                  <th>Danışman Sayısı</th>
				  <th>Onay</th>
                </tr>
                </thead>
                <tbody>
<?php
	$ogrid =$_GET['id'];
	$numara = $_GET['numara'];
	$proje_id = $_GET['pid'];
	if (isset($ogrid)) 
	{
	
	$sayac=0;
    global $conn;
	$sql = "Select K.adi,K.soyadi,P.danisman_sayisi as d_sayi,D.id as dnid
	,OD.onay,P.id as proje_idsi from tbl_danisman as D
inner join tbl_Kullanici as K on K.id = D.user_id
inner join tbl_ogrenci_danisman as OD on OD.danisma_id = D.id 
inner join tbl_ogrenci as O on O.id = OD.ogr_id 
inner join tbl_proje as P on P.id = OD.proje_id
where OD.proje_id='$proje_id' and OD.ogr_id='$ogrid' and P.projedurum_id='1'";
    $sonuc=@mysqli_query($conn,$sql);
	
	if(mysqli_num_rows($sonuc) > 0)
	{
    while ($row = mysqli_fetch_array($sonuc)) {
		$sayac++;
        $dnid = $row['dnid'];
		$onay = $row['onay'];
		$pid = $row['proje_idsi'];
		$projedurum_id = "1";
		if($onay == "0")
		{
		echo"<tr><td>".$sayac."</td>
		<td >". $row['adi'] ."</td>
		<td>". $row['soyadi'] ."</td>
		<td>". $row['d_sayi'] ."</td>
		<td>
		<input type='checkbox' ogr_id='$ogrid' id='$pid' 
		onay='$onay' numara='$pid' onchange='komisyononayla(this)' danisid='$dnid' >
		</td></tr>";
		}
		else if ($onay == "1")
		{
		echo"<tr><td>".$sayac."</td>
		<td >". $row['adi'] ."</td>
		<td>". $row['soyadi'] ."</td>
		<td>". $row['d_sayi'] ."</td>
		<td>
		<input type='checkbox' ogr_id='$ogrid' id='$pid' 
		onay='$onay' numara='$pid' onchange='komisyononayla(this)' danisid='$dnid' checked>
		</td></tr>";
		}}
	}else
		echo warningMesaj("Başvuru bulunamadı");
	}
    ?>
	             <span id="listeleme"></span>
              </table>
            </div>
            <!-- /.box-body -->
          </div>