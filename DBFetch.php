<?php
require_once 'DBManager.php';
$db = new DBManager();

/////////  CATEGORIES ////////////

if(isset($_POST["strCategory"])){
    $strCategory = $_POST["strCategory"];
    $intStatus = $_POST["intStatus"]; 

    $insert_main_categories = "INSERT INTO `main_categories` (`strTitle`, `intStatus`)
                                VALUES
                                    ('$strCategory', '$intStatus')";
    $run_insert_main_category = $db ->RunQuery($insert_main_categories);

    if($run_insert_main_category){
        echo json_encode(1);
    }else{
        echo json_encode(2);
    }
}


if(isset($_POST["main_cat_id"])){
    $main_cat_id = $_POST["main_cat_id"];
    $strCategorySub = $_POST["strCategorySub"];
    $intStatusSub = $_POST["intStatusSub"];

    $insert_sub_cats = "INSERT INTO `sub_categories` (
                            `intMainCat`,
                            `strTitle`,
                            `intStatus`
                        )
                        VALUES
                            ('$main_cat_id', '$strCategorySub', '$intStatusSub')";
    $run_insert_sub_cats = $db->RunQuery($insert_sub_cats);
    if($run_insert_sub_cats){
       echo json_encode(1);
    }else{
        echo json_encode(2);
    }
}

if(isset($_POST["get_cat_id"])){
    $get_cat_id = $_POST["get_cat_id"];

    $select_category_info = "SELECT
                                    sub_categories.intMainCat,
                                    sub_categories.strTitle AS sub_strTitle,
                                    sub_categories.intStatus,
                                    main_categories.intId,
                                    main_categories.strTitle AS main_sub_strTitle
                                FROM
                                    main_categories
                                INNER JOIN sub_categories ON sub_categories.intMainCat = main_categories.intId
                                WHERE
                                    sub_categories.intId = '$get_cat_id'";
    
    $run_cat_info = $db ->RunQuery($select_category_info);
    $get_cat_info = mysqli_fetch_array($run_cat_info);
    $intMainCat = $get_cat_info['intMainCat'];
    $cat_title = $get_cat_info['sub_strTitle'];
    $intStatus = $get_cat_info['intStatus'];
    $intId = $get_cat_info['intId'];
    $main_sub_strTitle = $get_cat_info['main_sub_strTitle'];

     $return_cat_info[] = array(
        "intMainCat" => $intMainCat,
         "cat_title" => $cat_title,
         "intStatus" => $intStatus,
         "intId" => $intId,
         "main_sub_strTitle" => $main_sub_strTitle,
         "get_cat_id" => $get_cat_id
     );
    echo json_encode($return_cat_info);
    //echo json_encode("Sahran");
}


if(isset($_POST["sub_cat_id"])){
    $sub_cat_id = $_POST["sub_cat_id"];
    $strCategoryEdit = $_POST["strCategoryEdit"];
    $main_cat_id11 = $_POST["main_cat_id11"];
    $intStatusSub1 = $_POST["intStatusSub1"];

    $update_sub_cat = "UPDATE `sub_categories`
                        SET `intMainCat` = '$main_cat_id11',
                        `strTitle` = '$strCategoryEdit',
                        `intStatus` = '$intStatusSub1'
                        WHERE
                            (`intId` = '$sub_cat_id')";
    $run_update_sub_cat = $db->RunQuery($update_sub_cat);
    if($run_update_sub_cat){
        echo json_encode(1);
    }
    else{
        echo json_encode(2);
    }

}


if(isset($_POST["main_cat_id_edit"])){
    $main_cat_id_edit = $_POST["main_cat_id_edit"];

    $sql_select_main_cat_edit = "SELECT
                                    main_categories.strTitle,
                                    main_categories.intStatus
                                FROM
                                    main_categories
                                WHERE
                                    main_categories.intId = '$main_cat_id_edit'";
    $run_select_main_cat_edit = $db->RunQuery($sql_select_main_cat_edit);
    $get_main_cat_edit = mysqli_fetch_array($run_select_main_cat_edit);
    $edit_strTitle = $get_main_cat_edit['strTitle'];
    $edit_intStatus = $get_main_cat_edit['intStatus'];

    $edit_main_cat_result['strTitle'] = $edit_strTitle;
    $edit_main_cat_result['intStatus'] = $edit_intStatus;

    echo json_encode($edit_main_cat_result);
}

if(isset($_POST["update_main_cat"])){
    $update_main_cat = $_POST["update_main_cat"];
    $update_main_title = $_POST["update_main_title"];
    $update_main_status = $_POST["update_main_status"];

    $sql_update_main_cat = "UPDATE `main_categories`
                            SET `strTitle` = '$update_main_title',
                            `intStatus` = '$update_main_status'
                            WHERE
                                (`intId` = '$update_main_cat')";

    $run_update_main_cat = $db->RunQuery($sql_update_main_cat);
    if($run_update_main_cat){
        echo json_encode(1);
    }
    else{
        echo json_encode(2);
    }
}