<?php
include('Wiadomosc.php');
/**
 * @access public
 * @author karpasz1
 */
class Skrzynka_odbiorcza {
	/**
	 * @AttributeType Wiadomosc
	 * /**
	 *  * @AssociationType Wiadomosc
	 *  * /
	 */

	/**
	 * @access public
	 */
	public function usunWiadomosc($idWiadomosci) {
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');
		$sql = "DELETE FROM wiadomosci WHERE idwiadomosci='$idWiadomosci'"; 
		if (mysqli_query($conn, $sql)) {
			echo "<script>alert('Usunieto');</script>";
			echo "<script>window.location.href='poczta.php';</script>";
			exit();
			}
		mysqli_close($conn);
		}
	

	/**
	 * @access public
	 */
	public function wyswietlWiadomosc() {
		//sprawdzenie istnienia wiadomosci, jesli istnieje - wyswietl
		if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST[$row["idwiadomosci"]])){	
			$_SESSION["idWiadomosci"] = $row["idwiadomosci"];
		}
		//przejscie do formularza wyswietlajacego
		echo '<meta http-equiv="Refresh" content="0;url=wiadomosc.php">';
	}

	/**
	 * @access public
	 */
	public function wyswietlSkrzynke() {
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');

		$sql = "SELECT idwiadomosci, temat, idnadawcy, datawyslania, uzytkownicy_iduz FROM wiadomosci WHERE uzytkownicy_iduz='".$_SESSION["userid"]."' ORDER BY datawyslania ASC";
		$result = mysqli_query($conn, $sql);
		$records = mysqli_num_rows($result);
	
		if ($records > 0) {
			$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
			$count = 1;
			foreach ($row as $row) { 
				echo "<tr>";
				echo "<th>" . $row['temat'] ."</th>";
				echo "<th>" . $row['idnadawcy'] ."</th>";
				echo "<th>" . $row['datawyslania'] ."</th>";
				echo '<th>
				<form method="post">
				<button type="submit" name="'.$row["idwiadomosci"].'" class="btn btn-success btn-xs">Wyswietl</button>
				</form></th>';
				if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST[$row["idwiadomosci"]])){
					$_SESSION["idWiadomosci"] = $row["idwiadomosci"];
					Skrzynka_odbiorcza::wyswietlWiadomosc();
				}
				echo "</tr>";
			}
	}
	}

	public function nowaWiadomosc($temat,$idNadawcy,$dataWyslania,$tresc,$idOdbiorcy) {	
		$wiadomosc = new Wiadomosc();
		$wiadomosc->wyslij($temat,$idNadawcy,$dataWyslania,$tresc,$idOdbiorcy);
}

}
?>