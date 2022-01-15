var url = "controllers/UOM/uomFetch.php";

function addUOM(){
    let unit_name = $('#strUnitName').val();
    let unit_details = $('#strUnitDetails').val();
    let unit_status = $('#intStatus').val();

    if(unit_name == ""){
        swal("Incomplete Fields");
        return false;
    }

    $.ajax({
        url:url,
        method:"POST",
        data:{
            unit_name:unit_name,
            unit_details:unit_details,
            unit_status:unit_status
        },
        dataType:"JSON",
        success:function(data){
            if(data == 1){
                swal("Success", "", "success");
                $('#strUnitName').val('');
                $('#strUnitDetails').val('');
                $("#display_sub_cats").load(window.location + " #display_sub_cats");
            }
            if(data == 2){
                swal("Something went wrong", "", "error");
            }
        }
    })
}


function editUOM(intId){
    let editIntId = intId;

    $('#button_save_changes').remove();
    $('#intStatusEdit').children().remove().end();

    $.ajax({
        url:url,
        method:"POST",
        data:{editIntId:editIntId},
        dataType:"JSON",
        success:function(data){
            let uom_intId_edit = data['uom_intId_edit'];
            let uom_strTitle_edit = data['uom_strTitle_edit'];
            let uom_strDetails_edit = data['uom_strDetails_edit'];
            let uom_intStatus_edit = data['uom_intStatus_edit'];

            $('#strUomTitle').val(uom_strTitle_edit);
            $('#strUomDetails').val(uom_strDetails_edit);

            if(uom_intStatus_edit == 1){
                var str_option_status_active1 = "<option selected value='1'>Active</option>";
                var str_option_status_active2 = "<option  value='0'>Inactive</option>";

                $('#intStatusEdit').append(str_option_status_active1);
                $('#intStatusEdit').append(str_option_status_active2);
            }
            if(uom_intStatus_edit == 0){
                var str_option_status_inactive1 = "<option  value='1'>Active</option>";
                var str_option_status_inactive2 = "<option selected value='0'>Inactive</option>";

                $('#intStatusEdit').append(str_option_status_inactive1);
                $('#intStatusEdit').append(str_option_status_inactive2);
            }

            var button_save_changes = "<button type='button' id='button_save_changes' class='btn btn-outline' onclick=saveEditUOM("+ uom_intId_edit +")>Save changes</button>";
            $('#uomUpdata').append(button_save_changes);

        }
    })
}


function saveEditUOM(id){
    let edit_id =  id;
    let edit_title = $('#strUomTitle').val();
    let edit_details = $('#strUomDetails').val();
    let edit_status = $('#intStatusEdit').val();

    $.ajax({
        url:url,
        method:"POST",
        data:{
            edit_id:edit_id,
            edit_title:edit_title,
            edit_details:edit_details,
            edit_status:edit_status
        },
        dataType:"JSON",
        success:function(data){
            if(data == 1){
                swal("Success", "", "success");
                $("#display_sub_cats").load(window.location + " #display_sub_cats");
                $('#edit_uom').modal('hide');
            }
            if(data == 2){
                swal("Something went wrong", "", "error");
            }
        }
    })
}