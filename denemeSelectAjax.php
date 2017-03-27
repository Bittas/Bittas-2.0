<?php
 require_once("include/config.php");
if(isset($_POST['get_option'])&&isset($_POST['isaret']))
{
	global $conn;
	global $ogrId;
$isaret=$_POST['isaret'];
   $isaretId = $_POST['get_option'];
   echo "isaret: $isaret";
   if ($isaret=='fakulte') {
$selectValue="fakulte_adi";
  $query ="Select id,uni_id,fakulte_adi from tbl_fakulte WHERE uni_id=$isaretId";
    echo "<option value='-1'>Fakulte Seç</option>";
   }
   elseif ($isaret=='bolum') {
$selectValue="bolum_adi";
    $query ="Select id,bolum_adi from tbl_bolum WHERE fakulte_id=$isaretId";
      echo "<option value='-1'>Bölüm Seç</option>";
   }
   elseif ($isaret=='ilce') {
$selectValue="ilce";
     $query ="Select id,ilce from tbl_ilce WHERE il_id=$isaretId";
       echo "<option value='-1'>İlçe Seç</option>";
   }
 $find=mysqli_query($conn,$query);
 while($row=mysqli_fetch_array($find))
 {
   /*if($row["id"]== $id)
   {
     echo "<option selected='selected' value='".$row["id"]."'>".$row["fakulte_adi"]."</option>";
   }
   else
   {*/
     echo "<option value='".$row["id"]."'>".$row[$selectValue]."</option>";
   //}
 }
 exit;
}
?>
