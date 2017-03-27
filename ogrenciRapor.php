

<?php
if(isset($_FILES['file-2'])){
  echo raporYukle($_FILES['file-2']);
}
?>


    <!-- Main content -->
    <section class="content">
    <?php echo raporYukleyebilirMi() ?>
        <!-- The time line -->
        <ul class="timeline">
          <!-- timeline time label -->
          <?php raporGetirKisiyeGore(); ?>
          <!-- END timeline item -->
        </ul>
      <!-- /.col -->
    </section>
    <!-- /.content -->