


function  komDanismanEkle(element){
// store the values from the form checkbox box, then send via ajax below
var check_active = $(element).is(':checked') ? 1 : 0;
var projeId = $(element).attr('name');
var danismanId = $(element).attr('value');
var page = $(".page").attr('name');
    $.ajax({
        type: "POST",
        url: "ajaxKomisyonProjeyeDanismanEkle.php",
        data: {projeId: projeId, danismanId:danismanId, active:check_active, page:page},
        success: function(cevap){
            $("#sonuc").html(cevap);
            setTimeout(function() {
            $('.alert').remove();
            }, 1000);
            var selected_durum = $("#projeler").val();
            if(selected_durum=="basvurulmayanlar"||selected_durum=="basvurulanlar")
            listeleme(element);

        }
    });

return true;
}



function  listeleme(element)
{
$("table").remove("#databaseTablo");
var page = $(".page").attr('name');
var selected_durum = $("#databaseTablo2").val();

    $.ajax({
        type: "POST",
        url: "ajaxDanismanbasvurulariListele.php",
        data: {durum:selected_durum,page:page},
        success: function(cevap){
             $("#listeleme").html(cevap);
        }
    });
return true;
}


function  danismanProjeleriListele(element){
$("table").remove("#databaseTablo");
var page = $(".page").attr('name');
var select_onay = $("#projeOnay").val();
var select_projeTuru = $("#projeTuru").val();


    $.ajax({
        type: "POST",
        url: "ajaxKomisyonDanismanEkle.php",
        data: {selectOnay:select_onay,selectProjeTuru:select_projeTuru,page:page},
        success: function(cevap){
             $("#listeleme").html(cevap);
        }
    });
return true;
}
