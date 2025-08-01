<?php
ini_set('error_log', 'db-error.log');

	class DBOperations
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

        function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
            $output = NULL;
            if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
                $ip = $_SERVER["REMOTE_ADDR"];
                if ($deep_detect) {
                    if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                    if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                        $ip = $_SERVER['HTTP_CLIENT_IP'];
                }
            }
            $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
            $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
            $continents = array(
                "AF" => "Africa",
                "AN" => "Antarctica",
                "AS" => "Asia",
                "EU" => "Europe",
                "OC" => "Australia (Oceania)",
                "NA" => "North America",
                "SA" => "South America"
            );
            if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
                $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
                if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                    switch ($purpose) {
                        case "location":
                            $output = array(
                                "city"           => @$ipdat->geoplugin_city,
                                "state"          => @$ipdat->geoplugin_regionName,
                                "country"        => @$ipdat->geoplugin_countryName,
                                "country_code"   => @$ipdat->geoplugin_countryCode,
                                "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                                "continent_code" => @$ipdat->geoplugin_continentCode
                            );
                            break;
                        case "address":
                            $address = array($ipdat->geoplugin_countryName);
                            if (@strlen($ipdat->geoplugin_regionName) >= 1)
                                $address[] = $ipdat->geoplugin_regionName;
                            if (@strlen($ipdat->geoplugin_city) >= 1)
                                $address[] = $ipdat->geoplugin_city;
                            $output = implode(", ", array_reverse($address));
                            break;
                        case "city":
                            $output = @$ipdat->geoplugin_city;
                            break;
                        case "state":
                            $output = @$ipdat->geoplugin_regionName;
                            break;
                        case "region":
                            $output = @$ipdat->geoplugin_regionName;
                            break;
                        case "country":
                            $output = @$ipdat->geoplugin_countryName;
                            break;
                        case "countrycode":
                            $output = @$ipdat->geoplugin_countryCode;
                            break;
                    }
                }
            }
            return $output;
        }
        
        function getUserIpAddr(){
            if(!empty($_SERVER['HTTP_CLIENT_IP'])){
                //ip from share internet
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                //ip pass from proxy
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }else{
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            return $ip;
        }

        function getSalutations()
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = "SELECT * FROM get_user_salutations";
			$resultmaster = $db->query($query);
			$rowcol=$bodb->fall($resultmaster);
			return $rowcol;
        }

        function getUserLevels()
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = "SELECT * FROM get_user_levels";
			$resultmaster = $db->query($query);
			$rowcol=$bodb->fall($resultmaster);
			return $rowcol;
        }

        function getAllCountries()
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = "SELECT * FROM get_all_countries";
			$resultmaster = $db->query($query);
			$rowcol=$bodb->fall($resultmaster);
			return $rowcol;
        }

        function getAllCompanies()
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = "SELECT * FROM get_all_companies";
			$resultmaster = $db->query($query);
			$rowcol=$bodb->fall($resultmaster);
			return $rowcol;
        }

        function getAllSoftware()
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = "SELECT * FROM get_all_downloadable_software";
			$resultmaster = $db->query($query);
			$rowcol=$bodb->fall($resultmaster);
			return $rowcol;
        }

        function getAllCompletedAudits()
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = "SELECT * FROM get_all_completed_audits WHERE company = " . $_SESSION['company'];
			$resultmaster = $db->query($query);
			$rowcol=$bodb->fall($resultmaster);
			return $rowcol;
        }

        function getStartedAudit()
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = "CALL get_started_audit(".$_SESSION['company'].");";
			$resultmaster = $db->query($query);
			$rowcol=$bodb->fall($resultmaster);
			return $rowcol;
        }

        function getNavigationAccess($userId,$navid)
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = "CALL check_user_access($userId,$navid,".$_SESSION['company'].");";
			$resultmaster = $db->query($query);
			$rowcol=$bodb->fall($resultmaster);
			return $rowcol;
        }

        function getAllZones()
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = "SELECT * FROM get_all_zones;";
			$resultmaster = $db->query($query);
			$rowcol=$bodb->fall($resultmaster);
			return $rowcol;
        }

        function getAllLines()
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = "SELECT * FROM get_all_lines;";
			$resultmaster = $db->query($query);
			$rowcol=$bodb->fall($resultmaster);
			return $rowcol;
        }

        function getUniqueGRNID()
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = "call get_grn_unique_id(".$_SESSION["company"].")";
            $rowcol=$bodb->fall_multi($query);
            if(count($rowcol[1]) > 0)
            {
                return $rowcol[1];
            }
        }

        function getLevelWiseData($zoneId,$lineId)
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = "CALL get_zonewise_assets($zoneId,$lineId);";
			$resultmaster = $db->query($query);
			$rowcol=$bodb->fall($resultmaster);
			return $rowcol;
        } 

        function getStoredAssets()
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = "SELECT * FROM get_stored_assets;";
			$resultmaster = $db->query($query);
			$rowcol=$bodb->fall($resultmaster);
			return $rowcol;
        }

        function getAllLocations()
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = "SELECT * FROM get_all_locations WHERE company = ".$_SESSION["company"].";";
			$resultmaster = $db->query($query);
			$rowcol=$bodb->fall($resultmaster);
			return $rowcol;
        }

        function getDepreciationMethods()
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = "SELECT * FROM get_depreciation_methods WHERE company = ".$_SESSION["company"].";";
			$resultmaster = $db->query($query);
			$rowcol=$bodb->fall($resultmaster);
			return $rowcol;
        }

        function getAllUnits()
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = "SELECT * FROM get_all_units WHERE company = ".$_SESSION["company"].";";
			$resultmaster = $db->query($query);
			$rowcol=$bodb->fall($resultmaster);
			return $rowcol;
        }

        function getAuditUsers()
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = "call get_audit_users(".$_SESSION["company"].");";
			$resultmaster = $db->query($query);
			$rowcol=$bodb->fall($resultmaster);
			return $rowcol;
        }

        function checkIfAuditStarted()
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = 'CALL get_started_audit('.$_SESSION["company"].')';
			$resultmaster = $db->query($query);
			$rowcol=$bodb->fall($resultmaster);
			return $rowcol;
        }

        function getStartedAuditLocation()
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = 'CALL get_started_audit_location('.$_SESSION["company"].');';
			$resultmaster = $db->query($query);
			$rowcol=$bodb->fall($resultmaster);
			return $rowcol;
        }

        function get_audit_counts()
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = "CALL get_audit_counts(".$_SESSION["company"].");";
            $rowcol=$bodb->fall_multi($query);
            if(count($rowcol[2]) > 0)
            {
                return $rowcol[2];
            }
            else
            {
                return -1;
            }
        }

        function get_audit_counts_partial($company)
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = "CALL get_audit_counts(".$company.");";
            $rowcol=$bodb->fall_multi($query);
            if(count($rowcol[2]) > 0)
            {
                return $rowcol[2];
            }
            else
            {
                return -1;
            }
        }

        function getUnfinishedAuditLocation()
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = 'CALL get_unfinished_audit_locations('.$_SESSION["company"].')';
			$resultmaster = $db->query($query);
			$rowcol=$bodb->fall($resultmaster);
			return $rowcol;
        }

        function getAllCurrency()
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = "SELECT * FROM get_all_currency;";
			$resultmaster = $db->query($query);
			$rowcol=$bodb->fall($resultmaster);
			return $rowcol;
        }

        function getProducts()
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = "call get_all_products(".$_SESSION["company"].")";
            $rowcol=$bodb->fall_multi($query);
            if(count($rowcol[1]) > 0)
            {
                return $rowcol[1];
            }
        }

        function getProductsForLoc($company,$location_id)
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = "call get_all_products_for_location('".$company."','".$location_id."')";
            $rowcol=$bodb->fall_multi($query);
            if(count($rowcol[1]) > 0)
            {
                return $rowcol[1];
            }
        }

        function getBlandNTIAssets($company,$value)
        {
            require("constants.php");
            $db = self::connect();
            $bodb=self::bo();
            $query = "call " . $bl_nbl_nti_assets_proc . "('".$company."','".$value."')";
            $rowcol=$bodb->fall_multi($query);
            if(count($rowcol[2]) > 0)
            {
                return $rowcol[2];
            }
        }

        function viewAllGRN()
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = "CALL view_grn(".$_SESSION["company"].")";
            $rowcol=$bodb->fall_multi($query);
            if(count($rowcol[2]) > 0)
            {
                return $rowcol[2];
            }
        }

        function getReadBarcodes()
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = "SELECT * FROM get_read_barcodes;";
			$resultmaster = $db->query($query);
			$rowcol=$bodb->fall($resultmaster);
			return $rowcol;
        }

        function getLevelDetails($zoneId,$lineId,$levelId)
        {
            $db = self::connect();
            $bodb=self::bo();
            $query = "CALL get_levelwise_pallets($zoneId,$lineId,$levelId)";
            //$resultmaster = $db->query($query);
            $rowcol=$bodb->fall_multi($query);
			//$rowcol=$bodb->fall($resultmaster);
			return $rowcol;
        }

	}

?>