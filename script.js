////////////    CATEGORIES   ////////////   
function addMainCategory(){
    var strCategory = $('#strCategory').val();
    var intStatus = $('#intStatus').val();
    if(strCategory == ""){
        swal("Invalid Input");
        //alert("Invalid Input");
        return false;
    }

    if(intStatus == 1 || intStatus == 0){
    }else{
        return false;
    }

    $.ajax({
        url:"DBFetch.php",
        method:"POST",
        data:{
            strCategory:strCategory,
            intStatus:intStatus
        },
        dataType:"JSON",
        success:function(data){
            if(data == 1){
                swal("Success", "", "success");
                $('#strCategory').val('');
                $("#example1").load(window.location + " #example1");
                $("#add_sub_cats").load(window.location + " #add_sub_cats");
            }
            if(data == 2){
                swal("Something went wrong", "", "error");
            }
        }
    })
}

function addSubCategory(){
    var main_cat_id = $('#main_cat_id').val();
    var strCategorySub = $('#strCategorySub').val();
    var intStatusSub = $('#intStatusSub').val();


    if(main_cat_id == 0){
        swal("Please Select Main Category");
        return false;
    }
    if(strCategorySub == ""){
        swal("Incomplete Fields");
        return false;
    }

    $.ajax({
        url:"DBFetch.php",
        method:"POST",
        data:{
            main_cat_id:main_cat_id,
            strCategorySub:strCategorySub,
            intStatusSub:intStatusSub
        },
        dataType:"JSON",
        success:function(data){
            if(data == 1){
                swal("Success", "", "success");
                $("#add_sub_cats").load(window.location + " #add_sub_cats");
            }
            if(data == 2){
                swal("Something went wrong", "", "error");
            }
        }
    })
}

function load_cat_data(cat_id){
    var get_cat_id = cat_id;
    $('#button_save_changes').remove();
    $('#intStatusSub').children().remove().end();

    $.ajax({
        url:"DBFetch.php",
        method:"POST",
        data:{get_cat_id:get_cat_id},
        dataType:"JSON",
        success:function(data){
            var dataLenth = data.length;
            for(var i=0; i<dataLenth; i++){
                var cat_title = data[i].cat_title;
                var intMainCat = data[i].intMainCat;
                var main_sub_strTitle = data[i].main_sub_strTitle;
                var intStatus = data[i].intStatus;
                var get_cat_id = data[i].get_cat_id;
            }
            $('#strCategoryEdit').val(cat_title);

            var str_option = "<option selected value='" + intMainCat + "'>" + main_sub_strTitle + "</option>";
            $('#main_cat_id').append(str_option);

            if(intStatus == 1){
                var str_option_status_active1 = "<option selected value='1'>Active</option>";
                var str_option_status_active2 = "<option  value='0'>Inactive</option>";

                $('#intStatusSub').append(str_option_status_active1);
                $('#intStatusSub').append(str_option_status_active2);
            }
            if(intStatus == 0){
                var str_option_status_inactive1 = "<option  value='1'>Active</option>";
                var str_option_status_inactive2 = "<option selected value='0'>Inactive</option>";

                $('#intStatusSub').append(str_option_status_inactive1);
                $('#intStatusSub').append(str_option_status_inactive2);
            }
            var button_save_changes = "<button type='button' id='button_save_changes' class='btn btn-outline' onclick=save_sub_cat_changes("+get_cat_id+")>Save changes</button>";
            $('#sub_cat_update').append(button_save_changes);
        }
    })

}


function save_sub_cat_changes(sub_cat_id){
    var sub_cat_id = sub_cat_id;
    var strCategoryEdit = $('#strCategoryEdit').val();
    var main_cat_id11 = $('#main_cat_id').val();
    var intStatusSub1 = $('#intStatusSub').val();

    if(main_cat_id == 0){
        swal("Please Select Parent Category");
        return false;
    }

    $.ajax({
        url:"DBFetch.php?ReqestType=save_sub_cat_changes",
        method:"POST",
        data:{
            sub_cat_id:sub_cat_id,
            strCategoryEdit:strCategoryEdit,
            main_cat_id11:main_cat_id11,
            intStatusSub1:intStatusSub1
        },
        dataType:"JSON",
        success:function(data){
            if(data == 1){
                swal("Success", "", "success");
                $("#example1").load(window.location + " #example1");
                $('#modal-info').modal('hide');
            }
        }
    })
}


function editMainCategories(id){
    var main_cat_id_edit = id;
    //alert(main_cat_id_edit);
    $('#button_save_changes_main').remove();
    $('#intStatusMain').children().remove().end();

    $.ajax({
        url:"DBFetch.php",
        method:"POST",
        data:{main_cat_id_edit:main_cat_id_edit},
        dataType:"JSON",
        success:function(data){
            let main_cat_title = data['strTitle'];
            let main_cat_status = data['intStatus'];

            $('#strMainCategoryEdit').val(main_cat_title);

            if(main_cat_status == 1){
                let str_option_status_active1 = "<option selected value='1'>Active</option>";
                let str_option_status_active2 = "<option  value='0'>Inactive</option>";

                $('#intStatusMain').append(str_option_status_active1);
                $('#intStatusMain').append(str_option_status_active2);
            }
            if(main_cat_status == 0){
                let str_option_status_inactive1 = "<option  value='1'>Active</option>";
                let str_option_status_inactive2 = "<option selected value='0'>Inactive</option>";

                $('#intStatusMain').append(str_option_status_inactive1);
                $('#intStatusMain').append(str_option_status_inactive2);
            }
            let button_save_changes1 = "<button type='button' id='button_save_changes_main' class='btn btn-outline' onclick=save_main_cat_changes("+main_cat_id_edit+")>Save changes</button>";
            $('#main_cat_update').append(button_save_changes1);

        }
    })
}



function save_main_cat_changes(id){
    let update_main_cat = id;
    let update_main_title = $('#strMainCategoryEdit').val();
    let update_main_status = $('#intStatusMain').val();

    $.ajax({
        url:"DBFetch.php",
        method:"POST",
        data:{
            update_main_cat:update_main_cat,
            update_main_title:update_main_title,
            update_main_status:update_main_status
        },
        dataType:"JSON",
        success:function(data){
            if(data == 1){
                swal("Success", "", "success");
                $("#display_sub_cats").load(window.location + " #display_sub_cats");
                $('#edit_main_cats').modal('hide');
            }
            if(data == 2){
                swal("Something went wrong", "", "error");
            }
        }
    })
}
