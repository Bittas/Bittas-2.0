
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Proje-Ögrenci-Danışman Eşleşmesi</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Proje</th>
                  <th>Öğrenci</th>
                  <th>Danışman</th>
                </tr>
                <?php komisyonEslesmeGor(); ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
