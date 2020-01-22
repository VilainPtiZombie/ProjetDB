<?php
if (isset($_GET)) {
	

	$SearchEquip = $_GET['SearchAuctEquip'];
	$SearchServ = $_GET['SearchInsServ'];
	$SearchFm = $_GET['SearchFm'];
	$SearchPMax = $_GET['PrixMaxSearch'];

	$condSearch = array();
	$i = 0;


	if (isset($_GET['SearchAuctEquip']) && !empty($_GET['SearchAuctEquip'])) {
		$condSearch[] = "Auct_Equip = ".$SearchEquip."";
		
	}
	if (isset($_GET['SearchInsServ']) && !empty($_GET['SearchInsServ'])) {
		$condSearch[] = "Auct_Serv = ".$SearchServ."";
		
	}
	if (isset($_GET['SearchFm']) && !empty($_GET['SearchFm'])) {
		$condSearch[] = "auct_fm = ".$SearchFm."";
		
	}
	if (isset($_GET['PrixMaxSearch']) && !empty($_GET['PrixMaxSearch'])) {
		$condSearch[] = "Auct_prix_sell <= ".$SearchPMax."";
		
	}
 
	for ($i = 0; $i < (count($condSearch)); $i++) {
			$condSearch = implode(" AND ", $condSearch);
	}
	$ListSeach = " WHERE $condSearch";

}
?>
