 <!-- CATEGORIES TABLE -->

    <!-- Main content -->
    <section class="content" style="width:100%">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Main Categories</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" >
              <table id="display_sub_cats" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody >
                <?php
                $select_main_categories = "SELECT
                                              main_categories.intId,
                                              main_categories.strTitle,
                                              main_categories.intStatus
                                            FROM
                                              `main_categories`";
                $run_selected_main_cats = $db->RunQuery($select_main_categories);
                $count = 0;
                while($get_main_cats = mysqli_fetch_array($run_selected_main_cats)){
                  $intId = $get_main_cats['intId'];
                  $strTitle = $get_main_cats['strTitle'];
                  $intStatus = $get_main_cats['intStatus'];
                  $count++;
                ?>
                <tr>
                  <td><?php echo $count; ?></td>
                  <td><?php echo $strTitle; ?></td>
                  <td style="text-align:center; width:09%"><?php if($intStatus == 1){echo '<span class="pull-right badge bg-blue">Active</span>';} if($intStatus == 0){echo '<span class="pull-right badge bg-red">Inactive</span>';} ?></td>
                  <td style="width: 10%;"> <button style="width: 50%;" type="button" onclick="editMainCategories(<?php echo $intId; ?>)" class="btn btn-block btn-success btn-xs" data-toggle="modal" data-target="#edit_main_cats"><span class="glyphicon glyphicon-pencil"></span></button></td>
                  <td style="width: 10%; text-align:center"><button style="width: 50%;" type="button" class="btn btn-block btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></td>
                </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>




     <!--END CATEGORIES TABLE -->

     <!-- Sub Categories -->

    <!-- Main content -->
    <section class="content" style="width:100%">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Sub Categories</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" >
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Main Category</th>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody >
                <?php
                $select_sub_cats = "SELECT
                                      sub_categories.intId,
                                      sub_categories.intMainCat,
                                      sub_categories.strTitle AS sub_cat_strTitle,
                                      sub_categories.intStatus,
                                      main_categories.strTitle AS main_cat_strTitle
                                    FROM
                                      sub_categories
                                    INNER JOIN main_categories ON sub_categories.intMainCat = main_categories.intId
                                    ORDER BY
                                      main_cat_strTitle ASC";
                                //echo $select_sub_cats;
                $run_select_sub_cats = $db->RunQuery($select_sub_cats);
                $countSub = 0;
                while($get_run_select_sub_cats = mysqli_fetch_array($run_select_sub_cats)){
                    $sub_cat_intId = $get_run_select_sub_cats['intId'];
                    $sub_cat_intMainCat = $get_run_select_sub_cats['intMainCat'];
                    $sub_cat_strTitle = $get_run_select_sub_cats['sub_cat_strTitle'];
                    $sub_cat_intStatus = $get_run_select_sub_cats['intStatus'];
                    $main_cat_strTitle = $get_run_select_sub_cats['main_cat_strTitle'];
                    $countSub++;
                
                ?>
                <tr>
                  <td><?php echo $countSub; ?></td>
                  <td><?php echo $main_cat_strTitle; ?> >></td>
                  <td><?php echo $sub_cat_strTitle; ?></td>
                  <td style="text-align: center; width:09%"><?php if($sub_cat_intStatus == 1){echo '<span class="pull-right badge bg-blue">Active</span>';} if($sub_cat_intStatus == 0){echo '<span class="pull-right badge bg-red">Inactive</span>';} ?></td>
                  <td style="width: 10%;"> <button style="width: 50%;" type="button" class="btn btn-block btn-success btn-xs" onclick="load_cat_data(<?php echo $sub_cat_intId; ?>)" data-toggle="modal" data-target="#modal-info"><span class="glyphicon glyphicon-pencil"></span></button></td>
                  <td style="width: 10%;"><button style="width: 50%;" type="button" class="btn btn-block btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></td>
                </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Main Category</th>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>


<!-- CATEGORY EDIT MODELS -->
    <div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Sub Categories</h4>
              </div>
              <div class="modal-body">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Category</label>
                  <input type="text" class="form-control" id="strCategoryEdit" >
                </div>
                <label for="exampleInputEmail1">Main Category</label>
                <select id="main_cat_id" class="form-control select2" class="form-control" style="width: 100%; border-radius:0px;">
                  <option value="0" selected="selected">Select one</option>
                  <?php
                  $select_main_cats = "SELECT
                                        main_categories.intId,
                                        main_categories.strTitle
                                      FROM
                                        `main_categories`
                                      WHERE
                                        main_categories.intStatus = '1'";
                  $run_main_cats = $db->RunQuery($select_main_cats);
                  while($get_main_cats = mysqli_fetch_array($run_main_cats)){
                    $intId = $get_main_cats['intId'];
                    $strTitle = $get_main_cats['strTitle'];
                  ?>
                  <option value="<?php echo $intId; ?>"><?php echo $strTitle; ?></option>
                  <?php } ?>
                </select><br><br>
                <label for="exampleInputEmail1">Status</label>
                  <select class="form-control" id="intStatusSub">
                </select>
                </div>
              </div>
              </div>
              <div class="modal-footer" id="sub_cat_update">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>




      <!--  EDIT MAIN CATEGORIES  -->
        <div class="modal modal-info fade" id="edit_main_cats">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Main Categories</h4>
              </div>
              <div class="modal-body">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Category</label>
                  <input type="text" class="form-control" id="strMainCategoryEdit" >
                </div>
                <label for="exampleInputEmail1">Status</label>
                  <select class="form-control" id="intStatusMain">
                </select>
                </div>
              </div>
              </div>
              <div class="modal-footer" id="main_cat_update">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>