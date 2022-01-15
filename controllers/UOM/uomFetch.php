<?php

require_once '../../DBManager.php';
require_once '../../session.php';

$db = new DBManager();

if(isset($_POST['unit_name'])){
    $unit_name = $_POST['unit_name'];
    $unit_details = $_POST['unit_details'];
    $unit_status = $_POST['unit_status'];

    $SQL_insert_uom = "INSERT INTO `UOM` (
                            `strTitle`,
                            `strDetails`,
                            `intStatus`
                        )
                        VALUES
                            ('$unit_name', '$unit_details', '$unit_status')";
    $SQL_run_uom = $db->RunQuery($SQL_insert_uom);

    if($SQL_run_uom){
        echo json_encode(1);
    }else{
        echo json_encode(2);
    }
}


if(isset($_POST['editIntId'])){
    $editIntId = $_POST['editIntId'];

    $SQL_select_uom = "SELECT
                            uom.intId,
                            uom.strTitle,
                            uom.strDetails,
                            uom.intStatus
                        FROM
                            `UOM`
                        WHERE
                        uom.intId = '$editIntId'";

    $run_select_uom = $db->RunQuery($SQL_select_uom);
    $get_select_uom = mysqli_fetch_array($run_select_uom);

    $uom_intId_edit = $get_select_uom['intId'];
    $uom_strTitle_edit = $get_select_uom['strTitle'];
    $uom_strDetails_edit = $get_select_uom['strDetails'];
    $uom_intStatus_edit = $get_select_uom['intStatus'];

    $response_edit_data['uom_intId_edit'] = $uom_intId_edit;
    $response_edit_data['uom_strTitle_edit'] = $uom_strTitle_edit;
    $response_edit_data['uom_strDetails_edit'] = $uom_strDetails_edit;
    $response_edit_data['uom_intStatus_edit'] = $uom_intStatus_edit;

    echo json_encode($response_edit_data);
}


if(isset($_POST['edit_id'])){
    $edit_id = $_POST['edit_id'];
    $edit_title = $_POST['edit_title'];
    $edit_details = $_POST['edit_details'];
    $edit_status = $_POST['edit_status'];

    $SQL_update = "UPDATE `UOM`
                    SET `strTitle` = '$edit_title',
                    `strDetails` = '$edit_details',
                    `intStatus` = '$edit_status'
                    WHERE
                        (`intId` = '$edit_id')";
    $run_update = $db->RunQuery($SQL_update);

    if($run_update){
        echo json_encode(1);
    }
    else{
        echo json_encode(2);
    }
}