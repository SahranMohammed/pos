<br><br>
<div class="add-category-custom">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Unit</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Unit Name</label>
                  <input type="text" class="form-control" id="strUnitName">
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Unit Details</label>
                  <textarea id="strUnitDetails" class="form-control" name="w3review" rows="4" cols="50"></textarea>
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
                <button type="button" class="btn btn-primary" onclick="addUOM()">Submit</button>
              </div>
            </form>
          </div>
  </div>



  <section class="content" style="width:90%">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Units</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" >
              <table id="display_sub_cats" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Title</th>
                  <th>Details</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody >
                <?php
                $SQL_select_units = "SELECT
                                        uom.intId,
                                        uom.strTitle,
                                        uom.strDetails,
                                        uom.intStatus
                                    FROM
                                        `UOM`";
                $run_select_units = $db->RunQuery($SQL_select_units);
                $count = 0;
                while($get_select_units = mysqli_fetch_array($run_select_units)){
                    $uom_intId = $get_select_units['intId'];
                    $uom_strTitle = $get_select_units['strTitle'];
                    $uom_strDetails = $get_select_units['strDetails'];
                    $uom_intStatus = $get_select_units['intStatus'];

                    $count++;
                                      
                ?>
                <tr>
                  <td><?php echo $count; ?></td>
                  <td><?php echo $uom_strTitle; ?></td>
                  <td><?php echo $uom_strDetails; ?></td>
                  <td style="text-align:center; width:09%"><?php if($uom_intStatus == 1){echo '<span class="pull-right badge bg-blue">Active</span>';} if($uom_intStatus == 0){echo '<span class="pull-right badge bg-red">Inactive</span>';} ?></td>
                  <td style="width: 10%;"> <button style="width: 50%;" type="button" onclick="editUOM(<?php echo $uom_intId; ?>)" class="btn btn-block btn-success btn-xs" data-toggle="modal" data-target="#edit_uom"><span class="glyphicon glyphicon-pencil"></span></button></td>
                  <td style="width: 10%;"><button style="width: 50%;" type="button" class="btn btn-block btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></td>
                </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Title</th>
                  <th>Details</th>
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



    <!--  EDIT UOM  -->
    <div class="modal modal-info fade" id="edit_uom">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Measure Units</h4>
              </div>
              <div class="modal-body">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" id="strUomTitle" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Details</label>
                  <textarea id="strUomDetails" class="form-control" name="w3review" rows="4" cols="50"></textarea>
                </div>
                <label for="exampleInputEmail1">Status</label>
                  <select class="form-control" id="intStatusEdit">
                </select>
                </div>
              </div>
              </div>
              <div class="modal-footer" id="uomUpdata">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>