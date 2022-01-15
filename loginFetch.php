<?php
require_once 'session.php';
require_once 'DBManager.php';
require_once 'timeZone.php';

$db = new DBManager();

if(isset($_POST["user_name"])){
    $user_name = $_POST["user_name"];
    $password = $_POST["password"];
    $encrypted_password = md5($password);

    $select_user = "SELECT
                        users.strPassword,
                        users.intUserId,
                        users.strUserName
                    FROM
                        users
                    WHERE
                        users.strUserName = '$user_name'
                        AND
                        users.strPassword = '$encrypted_password'
                        ";
    $result = $db->RunQuery($select_user);
    $check_availability = $db->QueryCount($select_user);
    if($check_availability == 1){
        $get_data = mysqli_fetch_array($result);
        $_SESSION["UserID"] = $get_data['intUserId'];
        $get_password = $get_data['strPassword'];
        $get_user_id = $get_data['intUserId'];
        $get_user_name = $get_data['strUserName'];

        if($encrypted_password == $get_password){
            $update_last_login = "UPDATE `users`
                                    SET `dtmlastLogin` = '$actualDate'
                                    WHERE
                                        (`intUserId` = '$get_user_id')
                                    AND (`strUserName` = '$get_user_name')";
            $run_update_last_login = $db->RunQuery($update_last_login);

            echo json_encode(1);
        }else{
            echo json_encode(2);
        }
    }else{
       echo json_encode(2);
    }

    

    

}