<?php


function getMemberInfo($mt, $ms, $mid, $searchobj, $conn){
	$arrinfo=[];
	$arrlist=[];

	$sqlName = "SELECT * FROM name_table";
	if($mt != "All" and $ms != "All"){
		$sqlName.= " WHERE type_membership = '$mt' and  member_status = '$ms'  ";
	}else if($mt != "All" and $ms == "All"){
		$sqlName.= " WHERE type_membership = '$mt' ";
	}else if($mt == "All" and $ms != "All"){
		$sqlName.= " WHERE member_status = '$ms' ";
	}

	$sqlName.= " order by last_name asc, first_name asc";
	
	$resultName = $conn->query($sqlName);
	if($resultName->num_rows > 0){
		while ($row = mysqli_fetch_array($resultName)) {
			$arrinfo[0] = $row['id_number'];
			$arrinfo[1] = $row['account_number'];
			$arrinfo[2] = $row['first_name'];
			$arrinfo[3] = $row['middle_name'];
			$arrinfo[4] = $row['last_name'];
			$arrinfo[5] = $row['type_membership'];
			$arrinfo[6] = $row['member_status'];
			$arrinfo[7] = $row['referral'];
			$arrinfo[8] = $row['encoded_by'];
			$arrinfo[9] = $row['date_membership'];

			$sqlContact = "SELECT * FROM  contact_table WHERE id_number = '$arrinfo[0]'";
			$resultContact = $conn->query($sqlContact);
			while ($rowc = mysqli_fetch_array($resultContact)) {
				$arrinfo[10] = $rowc['mobile_number'];
				$arrinfo[11] = $rowc['email_address'];
				$arrinfo[12] = $rowc['emergency_contact_name'];
				$arrinfo[13] = $rowc['emergency_contact_number'];
			}

			$sqlAddressInfo = "SELECT * FROM  address_table WHERE id_number = '$arrinfo[0]'";
			$resultAddressInfo = $conn->query($sqlAddressInfo);
			while ($rowa = mysqli_fetch_array($resultAddressInfo)) {
				$arrinfo[14] = $rowa['present_address'];
				$arrinfo[15] = $rowa['permanent_address'];
				$arrinfo[16] = $rowa['provincial_address'];
			}

			$sqlOtherInfo = "SELECT * FROM  other_info_table WHERE id_number = '$arrinfo[0]'";
			$resultOtherInfo = $conn->query($sqlOtherInfo);
			while ($rowo = mysqli_fetch_array($resultOtherInfo)) {
				$arrinfo[17] = $rowo['birth_place'];
				$arrinfo[18] = $rowo['birth_date'];
				$arrinfo[19] = $rowo['tin_number'];
				$arrinfo[20] = $rowo['sss_number'];
				$arrinfo[21] = $rowo['religion'];
				$arrinfo[22] = $rowo['educational_attainment'];
				$arrinfo[23] = $rowo['occupation'];
				$arrinfo[24] = $rowo['br_number'];
				$arrinfo[25] = $rowo['gender'];
				$arrinfo[26] = $rowo['civil_status'];
			}

			array_push($arrlist, $arrinfo);
		}

		if($searchobj == "l"){
			return($arrlist);
		}else if($searchobj == "i"){
			return($arrinfo);
		}else{
			return($arrinfo[$searchobj]);
		}
	}
}


?>