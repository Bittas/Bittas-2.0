      <?php
      include_once("Controller/mesajlarC.php");
        $diziMesajlarSayisi=MesajlarC::gelenGidenMesajSayisi($id);
      ?>
      <ul class="sidebar-menu">
        <li class="header">KOMİSYON  İŞLEMLERİ</li>

   	<li class="treeview">
  		  <a href="#">
              <i class="fa fa-pencil-square-o"></i><span>Danışman İşlemleri</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
      		      <li><a href="index.php?sayfa=komisyon-danisman-islemleri"><i class="fa fa-user"></i> <span>Sisteme Danışman Ekle</span></a></li>

      		      <li><a href="index.php?sayfa=komisyon-danisman-ekle"><i class="fa fa-user"></i> <span>Projeye Danışman Ekle</span></a></li>

      		      <li><a href="index.php?sayfa=proje-danisman-sayisi"><i class="fa fa-user"></i> <span>Proje Danışman Sayısı</span></a></li>
            </ul>
    </li>
		<li class="treeview">
		  <a href="#">
            <i class="fa fa-pencil-square-o"></i><span>Öğrenci Başvuru Şekli</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?sayfa=komisyon-proje-tabanli"><i class="fa "></i>Proje Tabanlı</a></li>
          </ul>
        </li>
    <li class="treeview">
      <a href="#">
            <i class="fa fa-pencil-square-o"></i><span>Proje Önerileri</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?sayfa=komisyon-proje-onerileri&rol=2"><i class="fa "></i>Danışman Proje Önerisi</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="index.php?sayfa=proje-basvuru">
            <i class="fa fa-text-height"></i> <span>Tasarım Projesi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?sayfa=eslesme&tur=tasarim"><i class="fa  fa-arrows-h"></i>Eşlemeler</a></li>
            <!--<li><a href="index.php?sayfa=bireysel-projeler"><i class="fa  fa-line-chart"></i>Proje Takip</a></li> -->
            <li class="active treeview">
				<a href="index.php?sayfa=grup-projeler">
					<i class="fa fa-list-ul"></i> <span>Listeleme ve Bitirme</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
			</a>
				<ul class="treeview-menu">
					<li><a href="index.php?sayfa=listele&tur=1&kisi=grup"><i class="fa fa-group"></i>Grup</a></li>
					<li class="active"><a href="index.php?sayfa=listele&tur=1&kisi=bireysel"><i class="fa fa-user"></i>Bireysel</a></li>
				</ul>
			</li>
          </ul>
        </li>

         <li class="treeview">
          <a href="index.php?sayfa=proje-basvuru">
            <i class="fa fa-btc"></i> <span>Bitirme Çalışması</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?sayfa=eslesme&tur=bitirme"><i class="fa fa-arrows-h"></i>Eşlemeler</a></li>
           <!-- <li><a href="index.php?sayfa=bireysel-projeler"><i class="fa  fa-line-chart"></i>Proje Takip</a></li> -->
            <li class="active treeview">
				<a href="index.php?sayfa=grup-projeler">
					<i class="fa fa-list-ul"></i> <span>Listeleme ve Bitirme</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
			</a>
				<ul class="treeview-menu">
					<li><a href="index.php?sayfa=listele&tur=2&kisi=grup"><i class="fa fa-group"></i>Grup</a></li>
					<li class="active"><a href="index.php?sayfa=listele&tur=2&kisi=bireysel"><i class="fa fa-user"></i>Bireysel</a></li>
				</ul>
			</li>
          </ul>
        </li>
                 <li class="treeview">
                  <a href="index.php?sayfa=proje-basvuru">
                    <i class="fa fa-btc"></i> <span>Mesaj İşlemleri</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
            					<li><a href="index.php?sayfa=mesajlar"><i class="fa fa-group"></i>Bireysel Mesaj
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow"><?php echo $diziMesajlarSayisi['giden'][0]; ?></small>
              <small class="label pull-right bg-blue"><?php echo $diziMesajlarSayisi['gelen'][0]; ?></small>
            </span></a></li>
          					<li><a href="index.php?sayfa=mesajlarToplu"><i class="fa fa-group"></i>Toplu Mesaj</a></li>
                  </ul>
