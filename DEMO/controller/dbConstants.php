<?php
ini_set('error_log', 'db-error.log');
	class DBConstants
	{
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

        function get_columns_in_array($constant)
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = "SELECT cn.`value` FROM `constants` cn WHERE cn.company = ".$_SESSION["company"]." AND cn.constant_name = '".$constant."'";
			$resultmaster = $db->query($query);
            $rowcol=$bodb->fall($resultmaster);
            $retArray = explode(",", $rowcol[0]["value"]);
			return $retArray;
        }

        function get_values($constant)
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = "SELECT cn.`value` FROM `constants` cn WHERE cn.company = ".$_SESSION["company"]." AND cn.constant_name = '".$constant."'";
            $resultmaster = $db->query($query);
            $rowcol=$bodb->fall($resultmaster);
			return $rowcol;
        }

	}

?>