<?php
$ListSeach = "";
if (isset($_GET) == TRUE && !empty($_GET)) {
	

	$SearchEquip = htmlspecialchars($_GET['SearchAuctEquip']);
	$SearchServ = htmlspecialchars($_GET['SearchInsServ']);
	$SearchFm = htmlspecialchars($_GET['SearchFm']);
	$SearchPMax = htmlspecialchars($_GET['PrixMaxSearch']);

	$condSearch = array();
	$i = 0;


	if (isset($_GET['SearchAuctEquip']) && !empty($_GET['SearchAuctEquip'])) {
		$condSearch[] = "Auct_Equip = ".$SearchEquip."";
		
	}
	if (isset($_GET['SearchInsServ']) && !empty($_GET['SearchInsServ'])) {
		$condSearch[] = "Auct_Serv = ".$SearchServ."";
		
	}
	if (isset($_GET['SearchFm']) && !empty($_GET['SearchFm']) && is_numeric($_GET['SearchFm'])) {
		$condSearch[] = "auct_fm = ".$SearchFm."";
		
	}
	if (isset($_GET['PrixMaxSearch']) && !empty($_GET['PrixMaxSearch']) && is_numeric($_GET['PrixMaxSearch'])) {
		$condSearch[] = "Auct_prix_sell <= ".$SearchPMax."";
		
	}
 
	for ($i = 0; $i < (count($condSearch)); $i++) {
			$condSearch = implode(" AND ", $condSearch);
	}
	$ListSeach = " WHERE $condSearch";

}
?>
