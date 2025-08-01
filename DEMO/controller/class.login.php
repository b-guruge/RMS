<?php

//error_reporting(0);
session_name("cbsportal");
session_start();
class logme
{
    //table fields
    var $user_table = 'user_login';     //Users table name
    var $user_column = 'user_name';     //USERNAME column (value MUST be valid email)
    var $pass_column = 'password';      //PASSWORD column

    //encryption 
    var $encrypt = true;       //set to true to use md5 encryption for the password

    //connect to database
    function dbconnect(){
        require_once('controllers/db.php');
        $newDb = new DataBase();
        $newDb->getConnection();
        return $newDb->db;
    }

    function connect() 
    {
        require_once("db.php");
        $newDb = new DataBase();
        $newDb->getConnection();
        return $newDb->db;
    }

    function bo() {
        require_once("db.php");
        $newDb = new DataBase();
        return $newDb;
    }

    //prevent injection
    function qry($query) {
        $data=$this->dbconnect();
        $args  = func_get_args();
        $query = array_shift($args);
        $query = str_replace("?", "%s", $query);
        array_unshift($args,$query);
        $query = call_user_func_array('sprintf',$args);
        $result = $data->query($query);
        return $result; 
    }

    function user_login($data)
    {
        $bodb = self::bo();
        extract($data);
        $realPass = $Password;
        $Password = md5($Password);
        $query = "CALL user_signin('". $UserName ."','". $Password ."','". $Company ."')";
        $rowcol=$bodb->fall_multi($query);

        if(count($rowcol) > 1 && count($rowcol[0]) > 0)
        {
            //login successful
            $_SESSION["loggedIn"] = true;
            $_SESSION["userID"] = $rowcol[0][0]["id"];
            $_SESSION["knownName"] = $rowcol[0][0]["known_name"];
            $_SESSION["userName"] = $rowcol[0][0]["user_name"];
            $_SESSION["firstName"] = $rowcol[0][0]["first_name"];
            $_SESSION["lastName"] = $rowcol[0][0]["last_name"];
            $_SESSION["salutation"] = $rowcol[0][0]["salutation"];
            $_SESSION["salID"] = $rowcol[0][0]["sal_id"];
            $_SESSION["userLevel"] = $rowcol[0][0]["user_level"];
            $_SESSION["email"] = $rowcol[0][0]["email"];
            $_SESSION["company"] = $rowcol[0][0]["company"];
            $_SESSION["user_image_path"] = ($rowcol[0][0]["salutation"] == "Mrs." || $rowcol[0][0]["salutation"] == "Ms." ? "Uploads/Users/Images/default_f.png" : "Uploads/Users/Images/default_m.png");
            $_SESSION["MAINNAV"] = $rowcol[1];
            $_SESSION["SUBNAV"] = $rowcol[2];
            $_SESSION["CurPage"] = "";
            $_SESSION["CurController"] = "Dashboard";
            $_SESSION["CurMenuLabel"] = "Dashboard 1";
            $_SESSION['exceptionFlag'] = "";
            $_SESSION['exceptionHeader'] = "";
            $_SESSION['exceptionMsg'] = "";
            $_SESSION["mainLabel"] = "";
            $_SESSION["subDesc"] = "";
            
            //setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
            if($RememberMe == "true")
            {
                setcookie("username", $rowcol[0][0]["USER_NAME"], time() + (86400 * 30), "/"); // 86400 = 1 day
                setcookie("password", $realPass, time() + (86400 * 30), "/"); // 86400 = 1 day
                setcookie("rememberMe", "true", time() + (86400 * 30), "/"); // 86400 = 1 day
            }
            else
            {
                //setcookie("user", "", time() - 3600); delete cookies
                setcookie("username", "", time() + (86400 * 30), "/"); // 86400 = 1 day
                setcookie("password", "", time() + (86400 * 30), "/"); // 86400 = 1 day
                setcookie("rememberMe", "false", time() + (86400 * 30), "/");
            }

            return "1";
        }
        else if(count($rowcol) == 1)
        {
            return "02";
            //admin approval needed
        }
        else
        {
            return "03";
            //invalid username / password
        }
    }

    function user_logout()
    {
        session_destroy();
        return;
    }
}

?>