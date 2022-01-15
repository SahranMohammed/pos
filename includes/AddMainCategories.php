<br><br>
<div class="add-category-custom">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Main Categories</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Category</label>
                  <input type="text" class="form-control" id="strCategory" placeholder="Enter Category Title">
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Status (optional)</label>
                  <select class="form-control" id="intStatus">
                  <option selected="selected" value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="button" class="btn btn-primary" onclick="addMainCategory()">Submit</button>
              </div>
            </form>
          </div>
  </div>


<!-- ADD SUB CATEGORIES -->

  <br><br>
<div class="add-category-custom">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Sub Categories</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="add_sub_cats">
              <div class="box-body">
                <div class="form-group">
                <label>Main Category</label>
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
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Category</label>
                  <input type="text" class="form-control" id="strCategorySub" placeholder="Enter Category Title">
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Status (optional)</label>
                  <select class="form-control" id="intStatusSub">
                  <option selected="selected" value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="button" class="btn btn-primary" onclick="addSubCategory()">Submit</button>
              </div>
            </form>
          </div>
  </div>
  

  <!-- CATEGORIES TABLE -->

    <!-- Main content -->
    <section class="content" style="width:90%">
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
                  <td style="text-align: center; width:09%"><?php if($intStatus == 1){echo '<span class="pull-right badge bg-blue">Active</span>';} if($intStatus == 0){echo '<span class="pull-right badge bg-red">Inactive</span>';} ?></td>
                  <td style="width: 10%;"> <button style="width: 50%;" type="button" onclick="editMainCategories(<?php echo $intId; ?>)" class="btn btn-block btn-success btn-xs" data-toggle="modal" data-target="#edit_main_cats"><span class="glyphicon glyphicon-pencil"></span></button></td>
                  <td style="width: 10%;"><button style="width: 50%;" type="button" class="btn btn-block btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></td>
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



    <!--  EDIT MAIN CATEGORIES  -->
    <div class="modal modal-info fade" id="edit_main_cats">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Info Modal</h4>
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