<?php 
ini_set('error_log', 'cont-error.log');

class Operations{

    function getCurrentDate()
    {
        require("constants.php");
        $date = new DateTime("now", new DateTimeZone($timezone));
        return $date->format('Y-m-d');
    }

    function getCurrentTime()
    {
        require("constants.php");
        $date = new DateTime("now", new DateTimeZone($timezone) );
        return $date->format('H:i:s');
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

    function user_registration($data)
    {
        $db = self::connect();
        $bodb = self::bo();
        extract($data);
        $Password = md5($Password);
        $query = "CALL user_registration(1,'". $Email ."','". $KnownName ."','','". $LastName ."','". $UserName ."','". $Password ."','". $Salutation ."',4,0)";
        $resultmaster = $db->query($query);
        $rowcol=$bodb->fall($resultmaster);
        return $rowcol;
    }

    function addReadBarcodes($data)
    {
        $db = self::connect();
        $bodb=self::bo();
        extract($data);
        $query = "CALL add_barcode('$barcode',". $_SESSION["userID"] . ");";
        $resultmaster = $db->query($query);
        $rowcol=$bodb->fall($resultmaster);
        return $rowcol;
    }

    function clearBarcodeDemoTable()
    {
        $db = self::connect();
        $bodb=self::bo();
        $query = "CALL update_barcode_demo_table();";
        $resultmaster = $db->query($query);
        $rowcol=$bodb->fall($resultmaster);
        return $rowcol;
    }

    function get_unique_print_id($data)
    {
        $db = self::connect();
        $bodb=self::bo();
        extract($data);
        $query = "CALL get_barcode_print_unique_id(".$_SESSION["company"].",".$AutoFlag.");";

        $rowcol=$bodb->fall_multi($query);
        if(count($rowcol[1]) > 0)
        {
            return $rowcol[1];
        }
        else
            return -1;
    }

    function get_grn_details_for_asset($data)
    {
        $db = self::connect();
        $bodb=self::bo();
        extract($data);
        $query = "CALL get_grn_details_for_asset(".$_SESSION["company"].",".$asset_id.");";

        $rowcol=$bodb->fall_multi($query);
        if(count($rowcol[1]) > 0)
        {
            return $rowcol[1];
        }
        else
            return -1;
    }

    function get_asset_and_grn_details($data)
    {
        $db = self::connect();
        $bodb=self::bo();
        extract($data);
        $query = "CALL get_details_for_asset_and_grn(".$_SESSION["company"].",".$asset_id.",".$grn_id.");";

        $rowcol=$bodb->fall_multi($query);
        if(count($rowcol[2]) > 0)
        {
            return $rowcol[2];
        }
        else
            return -1;
    }

    function get_audit_counts($data)
    {
        $db = self::connect();
        $bodb=self::bo();
        extract($data);
        $query = "CALL get_audit_counts(".$_SESSION["company"].");";
        $rowcol=$bodb->fall_multi($query);
        if(count($rowcol[3]) > 0)
        {
            return $rowcol[3];
        }
        else
            return -1;
    }

    function save_print_details($data)
    {
        require("constants.php");
        $db = self::connect();
        $bodb=self::bo();
        $date=self::getCurrentDate();
        $time=self::getCurrentTime();
        extract($data);
        $query = "CALL " . $print_save_proc . "(".$_SESSION["company"].",".$unique_id.",'".$asset_id."','".$grn_id."','".$pcode."',".$autoflag.",'".$bno."','".$price."','".$sseq."','".$qty."','".$date."','".$time."');";

        $rowcol=$bodb->fall_multi($query);
        if(count($rowcol[1]) > 0)
        {
            return $rowcol[1];
        }
        else
            return -1;
    }

    function save_grn_ey($data)
    {
        require("constants.php");
        $db = self::connect();
        $bodb=self::bo();
        $date=self::getCurrentDate();
        $time=self::getCurrentTime();
        extract($data);
        $query = "CALL " . $grn_save_ey . "(".$_SESSION["company"].",'".$asset_id."','".$pono."','".$uomem."','".$l_qty."','".$s_qty."','".$d_qty."','".$tot_qty."','".$loc."','".$price_in."','".$curr."','".$date."','".$time."');";
        
        $rowcol=$bodb->fall_multi($query);
        if(count($rowcol[1]) > 0)
        {
            return $rowcol[1];
        }
        else
            return -1;
    }

    function save_new_grn_ey($data)
    {
        require("constants.php");
        $db = self::connect();
        $bodb=self::bo();
        $date=self::getCurrentDate();
        $time=self::getCurrentTime();
        extract($data);
        $query = "CALL save_new_item_grn(".$_SESSION["company"].",'".$asset_name."','".$asset_desc."','".$asset_no."','".$serial_no."','".$barcode_id."','".$POnumber."','".$price."','".$uom."','".$Location."','".$curr."','".$ac_date."','".$dep_method."','".$ac_cost."','".$use_life."','".$date."','".$time."');";
        
        $rowcol=$bodb->fall_multi($query);
        if(count($rowcol[0]) > 0)
        {
            return $rowcol[0];
        }
        else
            return -1;
    }

    function update_audit_start($data)
    {
        require("constants.php");
        $db = self::connect();
        $bodb=self::bo();
        $date=self::getCurrentDate();
        $time=self::getCurrentTime();
        extract($data);
        $query = "CALL " . $update_location_audit_start_proc . "(".$_SESSION["company"].",'".$_GET["loc_id"]."');";
        $rowcol=$bodb->fall_multi($query);
        if(count($rowcol[1]) > 0)
        {
            return $rowcol[1];
        }
        else
            return -1;
    }

    function save_audit_ey($data)
    {
        require("constants.php");
        $db = self::connect();
        $bodb=self::bo();
        $date=self::getCurrentDate();
        $time=self::getCurrentTime();
        extract($data);
        $query = "CALL " . $save_audit . "('".$auditName."','".$initBy."','".$date."','".$time."',".$_SESSION["company"].");";
        $resultmaster = $db->query($query);
        $rowcol=$bodb->fall($resultmaster);

        if($rowcol[0]["VAL"] > 0)
        {
            //$locArray =  explode(',', $locations);
            foreach ($locations as $loc) {
                $db = self::connect();
                $locQuery = "CALL save_audit_locations(".$rowcol[0]["VAL"].",".$loc.");";
                $resmaster = $db->query($locQuery);
                $rowcolloc=$bodb->fall($resmaster);
            }

            //$userArray =  explode(',', $users);
            foreach ($users as $user) {
                $db = self::connect();
                $userQuery = "CALL save_audit_users(".$rowcol[0]["VAL"].",".$user.");";
                $resmaster = $db->query($userQuery);
                $rowcoluser=$bodb->fall($resmaster);
            }

            if($rowcolloc[0]["VAL"] > 0 && $rowcoluser[0]["VAL"] > 0)
            {
                return 1; //success
            }
            else
            {
                return 0; //error while inserting locations and users
            }
        }
        else
        {
            return -1; //error while inserting audit header
        }
    }

    function save_grn_sunshine($data)
    {
        require("constants.php");
        $db = self::connect();
        $bodb=self::bo();
        $date=self::getCurrentDate();
        $time=self::getCurrentTime();
        extract($data);
        $query = "CALL " . $grn_save_sunshine . "(".$_SESSION["company"].",'".$asset_id."','".$bno."','".$exp_date."','".$uomem."','".$car_p_size."','".$car_qty."','".$l_qty."','".$s_qty."','".$d_qty."','".$tot_qty."','".$loc."','".$price_in."','".$curr."','".$date."','".$time."');";
        
        $rowcol=$bodb->fall_multi($query);
        if(count($rowcol[1]) > 0)
        {
            return $rowcol[1];
        }
        else
            return -1;
    }

    function get_barcode_details($data)
    {
        $db = self::connect();
        $bodb=self::bo();
        extract($data);
        $query = "CALL get_barcode_details(".$_SESSION["company"].",'".$uni_id."','".$auto_string."');";

        $rowcol=$bodb->fall_multi($query);
        if(count($rowcol[2]) > 0)
        {
            return $rowcol[2];
        }
        else
            return -1;
    }

    function get_total_asset_count_for_location($data)
    {
        $db = self::connect();
        $bodb=self::bo();
        extract($data);
        $query = "CALL get_total_asset_count_for_location(".$_SESSION["company"].",'".$loc_id."');";

        $rowcol=$bodb->fall_multi($query);
        if(count($rowcol[0]) > 0)
        {
            return $rowcol[0];
        }
        else
            return -1;
    }

    function get_last_audit_location_flag($data)
    {
        $db = self::connect();
        $bodb=self::bo();
        extract($data);
        $query = "CALL get_last_audit_location_flag(".$_SESSION["company"].");";
        $rowcol=$bodb->fall_multi($query);
        if(count($rowcol[1]) > 0)
        {
            return $rowcol[1];
        }
        else
            return -1;
    }

    function end_current_location($data)
    {
        $db = self::connect();
        $bodb=self::bo();
        extract($data);
        $query = "CALL update_audit_location_end(".$_SESSION["company"].");";
        $rowcol=$bodb->fall_multi($query);
        if(count($rowcol[1]) > 0)
        {
            return $rowcol[1];
        }
        else
            return -1;
    }

    function complete_audit($data)
    {
        $db = self::connect();
        $bodb=self::bo();
        extract($data);
        $date=self::getCurrentDate();
        $time=self::getCurrentTime();
        $query = "CALL update_audit_completion(".$_SESSION["company"].",'".$date."','".$time."');";
        $rowcol=$bodb->fall_multi($query);

        if(count($rowcol[1]) > 0)
        {
            return $rowcol[1];
        }
        else
            return -1;
    }

    function update_audit_barcode_read($data)
    {
        $db = self::connect();
        $bodb=self::bo();
        extract($data);
        $query = "CALL update_audit_barcode_read(".$_SESSION["company"].",'".$_GET["barcode"]."',".$_SESSION["userID"].");";
        $rowcol=$bodb->fall_multi($query);
        if(count($rowcol[1]) > 0)
        {
            return $rowcol[1];
        }
        else
            return -1;
    }

    function create_audit_summary_excel($data)
    {
        $db = self::connect();
        $bodb=self::bo();
        extract($data);
        $query = "CALL get_audit_summary_report(".$_SESSION["company"].",23);";
        $rowcol=$bodb->fall_multi($query);

        try{
            // Include the PHPExcel libraries
            require_once '../plugins/PHPExcel/PHPExcel.php';
            $phpExcel = new PHPExcel();

            if(count($rowcol) == 0)
            {
                return -1;
            }

            $rowCount = count($rowcol[0]);
            $phpExcel->getActiveSheet()->fromArray($rowcol[0], null, 'A1');

            //set column widths
            $phpExcel->getActiveSheet()->getColumnDimension('A')->setWidth(40);
            $phpExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
            $phpExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
            $phpExcel->getActiveSheet()->getColumnDimension('D')->setWidth(12);
            $phpExcel->getActiveSheet()->getColumnDimension('E')->setWidth(12);
            $phpExcel->getActiveSheet()->getColumnDimension('F')->setWidth(12);

            //Headers
            $phpExcel->getActiveSheet()->getStyle('A1:F1')->getFont()->setSize(11);
            $phpExcel->getActiveSheet()->getStyle('A1:F1')->getFont()->setBold(true);

            //Number formats
            //$phpExcel->getActiveSheet()->getStyle('G2:K' . $rowCount)->getNumberFormat()->setFormatCode('#,##0.00');

            //column styles
            $phpExcel->getActiveSheet()->getStyle('A1:F1')->getFill()
            ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()->setARGB('b8b7b2');

            //Total column bold
            //$phpExcel->getActiveSheet()->getStyle('A' . $rowCount . ':F' . $rowCount)->getFont()->setSize(11);
            //$phpExcel->getActiveSheet()->getStyle('A' . $rowCount . ':F' . $rowCount)->getFont()->setBold(true);

            //column borders
            $border_style = array('borders' => array(
                'allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN,'color' => array('argb' => '000000'),)));
            $sheet = $phpExcel->getActiveSheet();
            $sheet->getStyle("A1:F" . $rowCount)->applyFromArray($border_style);

            $i=0;
                while ($i < 2) {

                // Add new sheet
                $objWorkSheet = $phpExcel->createSheet($i); //Setting index when creating

                //Write cells
                $objWorkSheet->fromArray($rowcol[1], null, 'A1');

                // Rename sheet
                $objWorkSheet->setTitle("Detected");
                
                $i++;
            }

            $timestamp = time();
            $objWriter = PHPExcel_IOFactory::createWriter($phpExcel, 'Excel2007');
            $filename = '../Excels/Audit_Summary_' . $timestamp . '.xlsx';

            $objWriter->save($filename);

            return "1";
            //echo "<script>$('#downLink').attr('href','". $filename ."');</script>";
            //echo "<script>$('#downLink')[0].click();</script>";
        }
        catch(Exception $ex)
        {
            return "-2";
            //echo "<script>alert('An error occured :" . $ex . "')</script>";
        }
    }
}



?>