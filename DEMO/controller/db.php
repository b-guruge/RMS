<?php

ini_set('error_log', 'custom_error.log');
error_log("Header", 0);

	class DataBase
	{
	    /*
		public $mytb ='catsys_ats';
		public $pass ='';
		public $host ='localhost';
		public $db; 
		public $user = 'root';
		*/

		public $mytb ='crosspoint_ats';
		public $pass ='dev_Buddhija123';
		public $host ='localhost';
		public $db;
		
		public function getConnection() {
			$this->db = new mysqli($this->host,'crosspoint_buddhija',$this->pass,$this->mytb);
			//$this->db = new mysqli($this->host,'crosspoint_buddhija',$this->pass,$this->mytb);
			return $this->db;
		}

		public function fall($result) {
			$array = array();
			while($row = $result->fetch_assoc())
			{
				$array[] = $row;
			}
			return $array;
		}

		public function fall_multi($query) {
			$con = mysqli_connect($this->host,'crosspoint_buddhija',$this->pass,$this->mytb); //login function purposes
			//$con = mysqli_connect($this->host,'crosspoint_buddhija',$this->pass,$this->mytb);
			$i = 0;
			$resultarr = $ar1 = $ar2 = $ar3 = $ar4 = $ar5 = $ar6 = array();
			if (mysqli_multi_query($con, $query)) {
				do {
					$array = array();
					// Store first result set
					if ($result = mysqli_store_result($con)) {
					while ($row = mysqli_fetch_all($result,MYSQLI_ASSOC)) {
						$array[] = $row;
					}
					mysqli_free_result($result);
					}

					//store array
					if($i == 0)
					{
						$ar1 = $array;
					}
					else if($i == 1)
					{
						$ar2 = $array;
					}
					else if($i == 2)
					{
						$ar3 = $array;
					}
					else if($i == 3)
					{
						$ar4 = $array;
					}
					else if($i == 4)
					{
						$ar5 = $array;
					}
					else if($i == 5)
					{
						$ar6 = $array;
					}

					// if there are more result-sets, the print a divider
					if (mysqli_more_results($con)) {
						$i = $i + 1;
					}
					//Prepare next result set
				} while (mysqli_more_results($con) && mysqli_next_result($con));
			}

			//merge array
			if($i == 0)
			{
				$resultarr = $ar1;
			}
			else if($i == 1)
			{
				$resultarr = array_merge($ar1,$ar2);
			}
			else if($i == 2)
			{
				$resultarr = array_merge($ar1,$ar2,$ar3);
			}
			else if($i == 3)
			{
				$resultarr = array_merge($ar1,$ar2,$ar3,$ar4);
			}
			else if($i == 4)
			{
				$resultarr = array_merge($ar1,$ar2,$ar3,$ar4,$ar5);
			}
			else if($i == 5)
			{
				$resultarr = array_merge($ar1,$ar2,$ar3,$ar4,$ar5,$ar6);
			}

			mysqli_close($con);
			return $resultarr;
		}

	}
?>