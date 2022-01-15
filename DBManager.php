
<?php
/**
 * @Sahran Mohammed 
 * @copyright 2020 - 2021
 * Database Handling Module 
 */
require_once 'session.php';
class DBManager {

    private $server = 'localhost';
    private $userName = 'root';
    private $password = '';
    private $database = 'pos';
    private $con = null;
    private $formName = '';
	
	
    public function setFormName($name) {
        $this->formName = $name;
    }

    public function getFormName() {
        return $this->formName;
    }

    public function SetConnectionString($Server, $UserName, $Password, $Database) {
        $this->server = $Server;
        $this->userName = $UserName;
        $this->password = $Password;
        $this->database = $Database;
    }

    public function OpenConnection() {
        $con = $this->con = mysqli_connect($this->server, $this->userName, $this->password);
        if(!$con){
            echo "Failed to connect to MySQL: " . $this->con -> connect_error;
        }
    }

    public function RunQuery($SQL) {

        $this->OpenConnection();
        mysqli_select_db($this->con,$this->database);
        createQueryString($SQL, $this->formName);
        $result = mysqli_query($this->con,$SQL);
        if (!$result > 0) {
            failQuery($SQL);
        }
        $this->CloseConnection();
        return $result;
    }

    public function QueryCount($SQL) {

        $this->OpenConnection();
        mysqli_select_db($this->con,$this->database);
        createQueryString($SQL, $this->formName);
        $result = mysqli_query($this->con,$SQL);
        $no = mysqli_num_rows($result);
        //if (mysqli_error())
        //echo mysqli_error() . "<br>" . $SQL . "<br>";	
        $this->CloseConnection();
        return $no;
    }

    public function open($SQL) {
        mysqli_select_db($this->con,$this->database);
        createQueryString($SQL, $this->formName);
        $result = mysqli_query($this->con,$SQL);
        if (!$result > 0) {
            failQuery($SQL);
        }
        return $result;
    }

    public function ExecuteQuery($SQL) {
        $this->OpenConnection();
        mysqli_select_db($this->con,$this->database);
        createQueryString($SQL, $this->formName);
        $result = mysqli_query($this->con,$SQL);
        if (!$result > 0) {
            failQuery($SQL);
        }
        if (mysqli_error($this->con))
            $result = false;
        $this->CloseConnection();
        return $result;
    }

    public function AutoIncrementExecuteQuery($SQL) {
        $id = -1;
        $this->OpenConnection();
        mysqli_select_db($this->con,$this->database);
        createQueryString($SQL, $this->formName);
        $result = mysqli_query($this->con,$SQL);
        //echo mysqli_error();	
        $id = mysqli_insert_id($this->con);
        $this->CloseConnection();
        return $id;
    }

    public function AffectedExecuteQuery($SQL) {
        $id = 0;
        $this->OpenConnection();
        mysqli_select_db($this->con,$this->database);
        createQueryString($SQL, $this->formName);
        $result = mysqli_query($this->con,$SQL);	
        $id = mysqli_affected_rows($this->con);
        $this->CloseConnection();
        return $id;
    }

    public function CheckRecordAvailability($SQL) {
        $this->OpenConnection();
        mysqli_select_db($this->con,$this->database);
        $result = mysqli_query($this->con,$SQL);
        $this->CloseConnection();
        while ($row = mysqli_fetch_array($result)) {
            return true;
        }
        return false;
    }

    public function CloseConnection() {
        mysqli_close($this->con);
    }

    //######### All Function Begin From Here ######
    function beginTransaction() {
        
        $sqlA = "BEGIN";        
        $resultsA = $this->RunQueryTransaction($sqlA);
        
    }

    function commit() {
        
        $sqlE = "COMMIT";
        $resultsE = $this->RunQueryTransaction($sqlE);
        
    }

    function rollback() {
        
        $sqlD = "ROLLBACK";
        $resultsD = $this->RunQueryTransaction($sqlD);
    }

   // ##### This function is use to test the result and pass an exception from itself #####
    function createException($results) {
        //print_r($results);
        if ($results) {
            return true;
        } else {
            throw new Exception("Query fail");
        }
    }

    public function RunQueryTransaction($SQL) {

        $this->OpenConnection();
        mysqli_select_db($this->con,$this->database);
        createQueryString($SQL, $this->formName);
        $result = mysqli_query($this->con,$SQL);
        if (!$result) {
            failQuery($SQL);
        }
        return $result;
    }

}



function createQueryString($SQL,$formName) {
    $query = strtoupper("#" . $SQL);
    $query2 = "#" . $SQL;
	
    $intPos = stripos($query, "INSERT INTO");
    if ($intPos > 0) {
        $strTable = trim(substr($query2, $intPos + 11, strpos($query, "(") - ($intPos + 11)));
        saveQueries($strTable, 1, $SQL, $formName);
    } else {
        $intPos = stripos($query, "UPDATE");
        if ($intPos > 0) {
            $strTable = trim(substr($query2, $intPos + 6, strpos($query, "SET") - ($intPos + 6)));
            saveQueries($strTable, 2, $SQL, $formName);
        } else {
            $intPos = stripos($query, "DELETE FROM");
            if ($intPos > 0) {
                $strTable = trim(substr($query2, $intPos + 11, strpos($query, "WHERE") - ($intPos + 11)));
                saveQueries($strTable, 3, $SQL, $formName);
            }
        }
    }
}

function failQuery($SQL) {
    $query = strtoupper("#" . $SQL);
    $query2 = "#" . $SQL;
    $intPos = stripos($query, "INSERT INTO");
    if ($intPos > 0) {
        $strTable = trim(substr($query2, $intPos + 11, strpos($query, "(") - ($intPos + 11)));
        saveFailQueries($strTable, 1, $SQL);
    } else {
        $intPos = stripos($query, "UPDATE");
        if ($intPos > 0) {
            $strTable = trim(substr($query2, $intPos + 6, strpos($query, "SET") - ($intPos + 6)));
            saveFailQueries($strTable, 2, $SQL);
        } else {
            $intPos = stripos($query, "DELETE FROM");
            if ($intPos > 0) {
                $strTable = trim(substr($query2, $intPos + 11, strpos($query, "WHERE") - ($intPos + 11)));
                saveFailQueries($strTable, 3, $SQL);
            }
        }
    }
}
    $server = 'localhost';
    $userName = 'root';
    $password = '';
    $database = 'pos';
    $private_connection_for_query_management = mysqli_connect($server,$userName,$password,$database);
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
} 
$ip = getIPAddress();
            
function saveFailQueries($tableName, $operation, $query) {
    global $ip;
    global $private_connection_for_query_management;
    global $_SESSION;

    $userCode = $_SESSION["UserID"];


    $sql = "INSERT INTO queries_fail(tableName,operation,sqlStatement,userID, IP) VALUES(\"" . $tableName . "\"," . $operation . ",\"" . $query . "\",\"" . $userCode . "\",\"" . $ip . "\");";

    mysqli_query($private_connection_for_query_management,$sql);
}

function saveQueries($tableName, $operation, $query, $formName){
    global $ip;
    global $private_connection_for_query_management;
    global $_SESSION;
    $userCode = $_SESSION["UserID"];	
    $query = str_replace("'", "\'", $query);
    $query = str_replace('"', '\"', $query);
    $_SESSION["currentForm"] = 1;

    $sql = "INSERT INTO queries(tableName,operation,sqlStatement,userID, IP) VALUES(\"" . $tableName . "\"," . $operation . ",\"" . $query . "\",\"" . $userCode . "\",\"" . $ip . "\")";
    mysqli_query($private_connection_for_query_management,$sql);
}



