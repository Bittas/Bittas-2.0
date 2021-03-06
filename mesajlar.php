<?php
	include_once("Controller/mesajlarC.php");
	$aliciAdiSoyadi=MesajlarC::getMetoduIleAliciAdiSoyadi();
	$id=$_SESSION['staj']['id'];
	
	if(@$_POST){
		echo MesajlarC::mesajGonder();
	}
?>

<!doctype html>
<html>
<head>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<link href="projem.css" rel="stylesheet" type="text/css">
 

<script language="javascript" type="text/javascript">
			$(function()
			{
				$(".aliciarama_sonuc").hide();
				$("input[name=alici]").keyup(function(){
					var value=$(this).val();
					var konu="value="+value;
					if(value!="")
					{
						$.ajax({
							type:"POST",
							url:"mesajAjax.php",
							data:konu,
							success:function(sonuc)
							{
								$(".aliciarama_sonuc").show().html(sonuc);
							}
						});
						$(".aliciarama_sonuc").click(function(){
							$(".aliciarama_sonuc").hide();
						});
					}
					else{
						$(".aliciarama_sonuc").hide();
						$(".aliciarama_sonuc").click(function(){
							$(".aliciarama_sonuc").hide();
						});
					}
				});
			});
		</script>

</head>

<body>
<?php
		$diziMesajlarSayisi=MesajlarC::gelenGidenMesajSayisi();
?>
<div id="mesaj">
	<div id="mesajright">
		
		<div class="box box-solid">
            <div class="box-header with-border box box-primary">
              <h3 class="box-title">Mesajlar</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
			<div id="yeniTikla" class="btn btn-primary btn-block margin-bottom" >Yeni Mesaj Gönder</div>
              <ul class="nav nav-pills nav-stacked">
                <li id="gelenTikla" class="active" >
					<a href="#"><i class="fa fa-inbox"></i> Gelen Kutusu
					<span class="label label-primary pull-right"><?php echo $diziMesajlarSayisi['gelen'][0]; ?></span></a></li>
                <li id="gidenTikla" ><a href="#"><i class="fa fa-envelope-o"></i> Giden Kutusu
					<span class="label label-warning pull-right"><?php echo $diziMesajlarSayisi['giden'][0]; ?></span></a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
	</div>
 
 
 
 
 
	<div id="mesajleft" class="gelenKutusu" style="overflow-y: scroll;" height="100">
	<div class="col-md-9" style="width:100%">
          <div class="box box-primary" >
		<div class="box-header with-border">
				<h3 class="box-title">Gelen Kutusu</h3>
				<div class="box-tools pull-right">
					<?php echo " ".Date("j-n-o"); ?>
              </div>
            </div>
			<!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
		<?php $sonuc=MesajlarC::gelenKutusu();
		
		while($sutun=mysqli_fetch_row($sonuc)){
            if ($sutun[5]=='1') {
                echo '
                <tr>
                <td><img src="'.$sutun[2].'" width="80px" height="64px" /></td>
                <td class="mailbox-name" ><a href="#" id="'.$sutun[4].'" class="mesajiicerik" >'.$sutun[0]." ".$sutun[1].'</a></td>
                <td class="mailbox-date">'.$sutun[3].'</td>
                </tr>
                ';
            }
            else{
                echo '
                <tr>
                <td><img src="'.$sutun[2].'" width="80px" height="64px" /></td>
                <td class="mailbox-name" ><b><a href="#" id="'.$sutun[4].'" class="mesajiicerik">'.$sutun[0]." ".$sutun[1].'</a></b></td>
                <td class="mailbox-date"><b>'.$sutun[3].'</b></td>
                </tr>
                ';
            }
        }
		
		 ?>	
		</tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
              </div>
            </div>
		</div>
          <!-- /. box -->
        </div>
	</div>


	
	
	<div id="mesajleft" class="gidenKutusu" style="visibility:hidden; overflow-y: scroll;" height="100">
		<div class="col-md-9" style="width:100%">
          <div class="box box-primary" >
		<div class="box-header with-border">
				<h3 class="box-title">Giden Kutusu</h3>
				<div class="box-tools pull-right">
					<?php echo " ".Date("j-n-o"); ?>
              </div>
            </div>
			<!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
		<?php $sonuc=MesajlarC::gidenKutusu(); 
		
			while($sutun=mysqli_fetch_row($sonuc)){
				echo 
				'<tr>
				<td><img src="'.$sutun[2].'" width="64px" height="64px" /></td>
				<td class="mailbox-name" ><a href="#" id="'.$sutun[4].'" class="mesajiicerikGiden" >'.$sutun[0]." ".$sutun[1].'</a></td>
				<td class="mailbox-date">'.$sutun[3].'</td>
				</tr>
				';
			}

		?>
		</tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
              </div>
            </div>
		</div>
          <!-- /. box -->
        </div>		
	</div>
	

	
	<!--  Mesaj i??ni buraya yazd?raca?m  -->
	
<div id="mesajlarim" >
<div id="yenimesajlarim">
	<div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Mesaj Oku</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <div id="ileti"></div>
                <div id="gonderen"></div>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
              </div>
              <!-- /.mailbox-controls -->
              <div id="gonderenMesaj" class="mailbox-read-message">

              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
			  <form action="" method="post">
				<input type="hidden" id="idGizli" name="idgizli" /></input>
				<button type="submit" class="btn btn-default"><i class="fa fa-trash-o"></i> Sil</button>
				<button type="button" class="btn btn-default"><i class="fa fa-print"></i> Yazdır</button>
			</form>
			  </div>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
	</div>
	
	
	<!-- Yeni Mesaj Yeri -->
	<div id="yeniMesajYolla">
		<div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Yeni Mesaj Gönder</h3>
            </div>
            <!-- /.box-header -->
			<form action="" method="post">
				<div class="box-body">
				  <div class="form-group">
						<div id="aliciaramabolumu"><?php echo '<input type="text" '; 
						if(isset($_GET["aliciId"]) && $_GET["aliciId"]!=null){ echo ' value="'.$aliciAdiSoyadi.'"'; }
						echo 'id="alici" name="alici" placeholder="Alıcı Adı:" class="form-control" autocomplete="off">';
						 ?>
							<div class="alicikarama_sonuc" style="position:absolute;">
								<div class="aliciarama_sonuc" style="cursor:pointer; background-color: black;">
								<span>Sonuc</span>
								</div>
							</div>
						</div>
				  </div>
				  <div class="form-group">
					<input class="form-control" placeholder="Konu:" name="konu">
				  </div>
				  <div class="form-group">
						<textarea id="compose-textarea" class="form-control" style="height: 300px" name="alicininMesaj">
						</textarea>
				  </div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
				  <div class="pull-right">
				  		<input type="hidden" name="m" value="gitti" /><?php echo '<input type="hidden" '; 
						if(isset($_GET["aliciId"]) && $_GET["aliciId"]!=null){ echo ' value="'.$_GET["aliciId"].'"'; }
						echo ' name="aliciIDgiden" id ="aliciIDgidenid"></input>';
						 ?>
					<button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Gönder</button>
				  </div>
				</div>
			</form>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
	</div>
</div>



</div>




<script>
$(document).ready(function()
{		
	$(".gidenKutusu").hide();
    var SearchString = window.location.search.substring(1); //sayfa=mesajlar&aliciId=2
    var VariableArray = SearchString.split('&');
		if(VariableArray.length>1){
			console.log("show time");
			$("#yeniMesajYolla").show();
		}
		else{
			console.log("hide time");
			$("#yeniMesajYolla").hide();
		}
	$("#yenimesajlarim").hide();
	//document.getElementsByClassName('gidenKutusu').style.visibility='hidden';
    $("msjkonu").click(function()
	{
        $("#msjkonu").load("brocem.html ");
    });
	
	$("#gelenTikla").click(function(){
		console.log("gelen kutusu tiklandi");
		$("#yeniMesajYolla").hide();
		$(".gidenKutusu").hide();
		$(".gelenKutusu").show();
		$("#yenimesajlarim").show();
		$("#gidenTikla").attr("class","");
		$("#gelenTikla").attr("class","active");
	});
	
	
	$("#gidenTikla").click(function(){
		console.log("giden kutusu tiklandi");
		$("#yeniMesajYolla").hide();
		$(".gelenKutusu").hide();
		$(".gidenKutusu").show();
		$("#gelenTikla").attr("class","");
		$("#gidenTikla").attr("class","active");
		$(".gidenKutusu").css("visibility","visible");
		$("#yenimesajlarim").show();
	});
	
	$("#yeniTikla").click(function(){	
		$(".gelenKutusu").show();
		$(".gidenKutusu").hide();
		$("#yenimesajlarim").hide();
		$("#yeniMesajYolla").show();
		console.log("tiklandi");
	});
	
	$(".mesajiicerik").click(function(){
		$("#yenimesajlarim").show();
		console.log("this: "+ this.id);
		$.ajax({
		  method: "POST",
		  url: "mesajIcerikGetirAjax.php",
		  data: { "q" : this.id },
		  dataType: "json",
		  success:function(veri){
			if(veri.don=="bbb"){
				console.log("d?nd?");
			}
			else{
				console.log("girdi");
				console.log(veri);
				console.log(veri["durum"]);
				if(veri=="")
				{ 
					console.log("veri bo?"); 
				}
				if(veri["durum"]==true){
					$("#gonderen").html("<h5>Kimden:"+veri["adi"]+" "+veri["soyadi"]+"</h5>");
					$("#ileti").html("<h3>"+veri["konu"]+"</h3>");
					$("#gonderenMesaj").html(veri["mesaj"]);
					$("#gonderenTd").text("");
					$("#gonderenTd").html("<strong>Gönderen</strong>");
					$("#idGizli").val(veri["id"]);
					//alert($("#gonderen").val())
					//console.log($("#gonderen").val());;  
					console.log(veri["adi"]);
					console.log(veri["soyadi"]);
					console.log(veri["mesaj"]);
				}
				else{
					console.log("girmedi");
				}
			}
			
		  }
		});
	});
	
	
	
	$(".mesajiicerikGiden").click(function()
	{

		console.log("this: "+ this.id);
		$.ajax({
		  method: "POST",
		  url: "mesajGidenMesajGetirAjax.php",
		  data: { "q" : this.id },
		  dataType: "json",
		  success:function(veri){
			if(veri.don=="bbb"){
				console.log("d?nd?");
			}
			else{
				console.log("girdi");
				console.log(veri);
				console.log(veri["durum"]);
				if(veri=="")
				{ 
					console.log("veri bo?"); 
				}
				if(veri["durum"]==true){
					$("#gonderen").html("<h5>Kime:"+veri["adi"]+" "+veri["soyadi"]+"</h5>");
					$("#ileti").html("<h3>"+veri["konu"]+"</h3>");
					$("#gonderenMesaj").html(veri["mesaj"]);
					$("#gonderenTd").text("");
					$("#gonderenTd").html("<strong>Alıcı</strong>");
					$("#idGizli").val(veri["id"]);
					//alert($("#gonderen").val())
					//console.log($("#gonderen").val());;  
					console.log(veri["adi"]);
					console.log(veri["soyadi"]);
					console.log(veri["mesaj"]);
				}
				else{
					console.log("girmedi");
				}
			}
			
		  }
		});
	});
	
	$(".aliciarama_sonuc").click(function(){
	
		var aliciAd = $(".aliciarama_icerik:hover").html();
		console.log(aliciAd);
		$("#alici").val(aliciAd);
		
		var aliciId = $(".aliciarama_icerik:hover").attr('id');
		console.log(aliciId);
		
		$("#aliciIDgidenid").val(aliciId);
		
		
		$(".aliciarama_sonuc").hide();
		
	});
	
	
});

</script>

<script>
  $(function () {
    $("#compose-textarea").wysihtml5();
  });
</script>


</body>
</html>
