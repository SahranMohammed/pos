<?php 
require_once 'DBManager.php';
$db = new DBManager();
require_once 'session.php';
if(isset($_SESSION["UserID"])) {
    $user = $_SESSION["UserID"];
    $select_user = "SELECT
                        users.intUserRoll,
                        users.intStoreId,
                        users.strRealName,
                        user_rolls.intRollId,
                        user_rolls.strRollName
                    FROM
                        users
                    INNER JOIN user_rolls ON users.intUserRoll = user_rolls.intRollId
                    WHERE
                        users.intUserId = '$user'
                    AND users.intStatus = '1'
                    AND user_rolls.intStatus = '1'";

    $result = $db->RunQuery($select_user);
    $get_user_data = mysqli_fetch_array($result);
    $intUserRoll = $get_user_data['intUserRoll'];
    $intStoreId = $get_user_data['intStoreId'];
    $strRealName = $get_user_data['strRealName'];
    $intRollId = $get_user_data['intRollId'];
    $strRollName = $get_user_data['strRollName'];

    $select_user_permissions = "SELECT
                                    permission_provider.intPermissionId
                                FROM
                                    permission_provider
                                INNER JOIN user_permissions ON permission_provider.intPermissionId = user_permissions.intPermissionId
                                WHERE
                                    permission_provider.intUserRoll = '$intRollId'
                                AND user_permissions.intStatus = '1'";

    $result_user_permissions = $db->RunQuery($select_user_permissions);
    $permissions = array();
    while($get_user_permissions = mysqli_fetch_array($result_user_permissions)){
        array_push($permissions,$get_user_permissions['intPermissionId']);
    }
    

    include ("template.php");
}else{
    include ("login.php");
}