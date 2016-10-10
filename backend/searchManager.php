<?php
	include('../backend/dbManager.php');
	$sql=" ";

	function searchSchool($school_name)
	{
		$conn = dbConnect();
		$sql = "select * from school where school.school_name like '%$school_name' ";
		$result=$conn->query($sql);

		$search_result_school = array();
		$i = 0;
		if ($result->num_rows > 0) { // if the number of result is greater than 0
		    while($row = $result->fetch_assoc()) { // get each result and put them into the array
		    	$school_name = $row["school_name"];
		    	$school_type = $row["type"];
		    	$school_location = $row["location"];
		    	$school_telephone = $row["Telephone"];
		    	$school_email = $row["Email"];
		    	$school_subject = $row["subjects"];

		    	$search_result_school[$i] = ['school_name'=>$school_name,
		    								'school_type'=>$school_type,
		    								'school_location'=>$school_location,
		    								'school_telephone'=>$school_telephone,
		    								'school_email'=>$school_email,
		    								'school_subject'=>$school_subject];

		    	$i++;
		    }
		} else {
			$search_result_school = $search_result_school;
		}
		//print_r($search_result_school);
		return $search_result_school;
	}


	function searchPrimarySchool($location, $cca, $subjects) {
		$conn = dbConnect();

		$whereClause = " where 1=1 ";

		if(!empty($location)){
			$whereClause .= " and school.location like '%$location%'";
		}

		if(!empty($cca)){
			$whereClause .= " and school.CCA like '%$cca%'";
		}

		if(!empty($subjects)){
			$whereClause .= " and school.subjects like '%$subjects%'";
		}

		$sql = "select * from school".$whereClause;
		//echo $sql;
		$result = $conn->query($sql);
		//echo $sql;die;
		// Create an empty array to store each row of school information
		$search_result_school = array();
		$i = 0;
		if ($result->num_rows > 0) { // if the number of result is greater than 0
		    while($row = $result->fetch_assoc()) { // get each result and put them into the array
		    	$school_name = $row["school_name"];
		    	$school_type = $row["type"];
		    	$school_location = $row["location"];
		    	$school_telephone = $row["Telephone"];
		    	$school_email = $row["Email"];
		    	$school_subject = $row["subjects"];

		    	$search_result_school[$i] = ['school_name'=>($school_name),
		    								'school_type'=>$school_type,
		    								'school_location'=>$school_location,
		    								'school_telephone'=>$school_telephone,
		    								'school_email'=>$school_email,
		    								'school_subject'=>$school_subject];

		    	$i++;
		    }
		} else {
			$search_result_school = $search_result_school;
		}
		echo "<pre>";
		//print_r($search_result_school);
		return $search_result_school;
	}

	function searchSecondarySchool($type, $category, $score, $location, $cca) {
		$conn = dbConnect();

		$whereClause = "where 1=1 ";

		if(!empty($location)){
			$whereClause .= " and school.location like '%$location%'";
		}

		if(!empty($cca)){
			$whereClause .= " and school.CCA like '%$cca%'";
		}

		if(!empty($type)){
			if($type=="range")
			{
				switch($category){
				case "E":
					$sql = "select school.*, PSLE_score.psle_E_min as lowest, PSLE_score.psle_E_max as highest from school left join PSLE_score on PSLE_score.school_id = school.school_id ".$whereClause."and $score BETWEEN PSLE_score.psle_E_min and PSLE_score.psle_E_max";
					break;
				case "N":
					$sql = "select school.*, PSLE_score.psle_N_min as lowest, PSLE_score.psle_N_max as highest from school left join PSLE_score on PSLE_score.school_id = school.school_id ".$whereClause ." and $score BETWEEN PSLE_score.psle_N_min and PSLE_score.psle_N_max";
					break;
				case "N/T":
					$sql = "select school.*, PSLE_score.psle_N/T_min as lowest, PSLE_score.psle_N/T_max as highest from school left join PSLE_score on PSLE_score.school_id = school.school_id ".$whereClause ." and $score BETWEEN PSLE_score.psle_N/T_min and PSLE_score.psle_N/T_max";
					break;
				default:
					$sql = "select school.*, PSLE_score.psle_E_min as lowest, PSLE_score.psle_E_max as highest from school left join PSLE_score on PSLE_score.school_id = school.school_id ".$whereClause ." and $score BETWEEN PSLE_score.psle_E_min and PSLE_score.psle_E_max ";
					break;
				}
			}
		}
			if($type=="min")
			{
				switch($category){
				case "E":
				$sql = "select school.*, PSLE_score.psle_E_min as lowest from school left join PSLE_score on PSLE_score.school_id = school.school_id ".$whereClause ."and PSLE_score.psle_E_min>=$score";
				break;
				case "N":
				 $sql = "select school.*, PSLE_score.psle_N_min as lowest from school left join PSLE_score on PSLE_score.school_id = school.school_id ".$whereClause ."and PSLE_score.psle_N_min>=$score";
				 break;
				case "N/T":
				$sql = "select school.*, PSLE_score.psle_N/T_min as lowest from school left join PSLE_score on PSLE_score.school_id = school.school_id ".$whereClause ."and PSLE_score.psle_N/T_min>=$score";
				break;
				default:
				$sql = "select school.*, PSLE_score.psle_E_min as lowest from school left join PSLE_score on PSLE_score.school_id = school.school_id ".$whereClause ."and PSLE_score.psle_E_min>=$score";
				break;
			}

		}
		if(empty($type))
		{
				switch($category){
				case "E":
					$sql = "select school.*, PSLE_score.psle_E_min as lowest, PSLE_score.psle_E_max as highest from school left join PSLE_score on PSLE_score.school_id = school.school_id ".$whereClause."and $score BETWEEN PSLE_score.psle_E_min and PSLE_score.psle_E_max";
					break;
				case "N":
					$sql = "select school.*, PSLE_score.psle_N_min as lowest, PSLE_score.psle_N_max as highest from school left join PSLE_score on PSLE_score.school_id = school.school_id ".$whereClause ." and $score BETWEEN PSLE_score.psle_N_min and PSLE_score.psle_N_max";
					break;
				case "N/T":
					$sql = "select school.*, PSLE_score.psle_N/T_min as lowest, PSLE_score.psle_N/T_max as highest from school left join PSLE_score on PSLE_score.school_id = school.school_id ".$whereClause ." and $score BETWEEN PSLE_score.psle_N/T_min and PSLE_score.psle_N/T_max";
					break;
				default:
					$sql = "select school.*, PSLE_score.psle_E_min as lowest, PSLE_score.psle_E_max as highest from school left join PSLE_score on PSLE_score.school_id = school.school_id ".$whereClause ." and $score BETWEEN PSLE_score.psle_E_min and PSLE_score.psle_E_max ";
					break;
				}
		}

		//echo $sql;
		$result = $conn->query($sql);
		//echo $sql;die;
		// Create an empty array to store each row of school information
		$search_result_school = array();
		$i = 0;
		if ($result->num_rows > 0) { // if the number of result is greater than 0
		    while($row = $result->fetch_assoc()) { // get each result and put them into the array
		    	$school_name = $row["school_name"];
		    	$school_type = $row["type"];
		    	$school_location = $row["location"];
		    	$school_telephone = $row["Telephone"];
		    	$school_email = $row["Email"];
		    	$school_subject = $row["subjects"];

		    	if(empty($row['highest'])){
		    		$psle_score = $row["lowest"];
		    	} else {
		    		$psle_score = $row['lowest']."-".$row['highest'];
		    	}


		    	$search_result_school[$i] = ['school_name'=>$school_name,
		    								'school_type'=>$school_type,
		    								'school_location'=>$school_location,
		    								'school_telephone'=>$school_telephone,
		    								'school_email'=>$school_email,
		    								'school_subject'=>$school_subject,
		    								'PSLE_score'=>$psle_score];
		    	$i++;
		    }
		} else {
			$search_result_school = $search_result_school;
		}
		//echo "<pre>";
		//print_r($search_result_school);
		return $search_result_school;

	}
	// Get values from front end
	$option = 0; // 0 is primary school

	// Determine which search functions to use
	/*switch ($option){
		case 0: // primary school
			$location = "";
			$cca = "brownies";
			$subject = "";
			$result = searchPrimarySchool($location, $cca, $subject);
		break;
		case 1: // secondary school
			$location = "";
			$cca = "";
			$type = "range";
			$category= "E";
			$score="210";
			//$result = searchSecondarySchool($type, $category, $score, $location, $cca);
		break;
		case 2: // ITE

		break;
		case 3: // JC

		break;
		case 4: // Poly

		break;
		case 5: // Uni

		break;
	}*/

// Return values to front end
?>