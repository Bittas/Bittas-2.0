<?php
	include("include/config.php");
	$projeID=$_POST["projeID"];
	$projeDurum=$_POST["projeDurum"];
	global $conn;
	$query="update tbl_proje set projedurum_id='$projeDurum' where id='$projeID'";
	$query2="SELECT d.user_id AS onerenID FROM tbl_proje AS p LEFT JOIN tbl_danisman AS d ON d.id=p.oneren_id WHERE p.id=$projeID";
	    $sonuc=mysqli_query($conn,$query);
		$sonuc2=mysqli_query($conn,$query2);
		 if($sonuc)
		 {
		 	//echo "başarılı";
			 if($sonuc2){
				while($row=mysqli_fetch_assoc($sonuc2)) 
				{ 
					echo $row["onerenID"];
				}
			 }
		 }
		 else
		 {
		 	echo "başarısız";
		 }
		 
?>