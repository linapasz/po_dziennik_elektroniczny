<?php
require_once('Uzytkownik.php');
//use Uzytkownik;

/**
 * @access public
 * @author karpasz1
 */
class Lista_uzytkownikow {
	/**
	 * @AttributeType U�ytkownik[]
	 */
	private $_lista;
	/**
	 * @AttributeType Uzytkownik
	 * /**
	 *  * @AssociationType Uzytkownik
	 *  * /
	 */

	public function edytujUzytkownika($_iduz,$_imie, $_nazwisko, $_dataUrodzenia, $_pesel, $_miejsceZamieszkania, $_telefonKontaktowy, $_typUzytkownika, $_aktywny) {
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');
	
		$sql = "UPDATE uzytkownicy  SET iduz='$_iduz', imie='$_imie', nazwisko='$_nazwisko', dataurodzenia='$_dataUrodzenia', 
		pesel='$_pesel', miejscezamieszkania='$_miejsceZamieszkania', telefonkontaktowy='$_telefonKontaktowy',typuzytkownika='$_typUzytkownika', aktywny='$_aktywny'
		WHERE iduz='".$_SESSION["idChange"]."'"  ;

		if (mysqli_query($conn, $sql)) {
			echo "<script>alert('Zapisano');</script>";
			echo "<script>window.location.href='uzytkownicy.php';</script>";
			exit();
		}
		else{
			echo "<script>alert('Niepoprawne dane');</script>";
			echo "<script>window.location.href='edytuj_uzytkownika.php';</script>";
		}
	mysqli_close($conn);
	}


	/**
	 * @access public
	 */
	public function dodajUzytkownika($_iduz,$_imie, $_nazwisko, $_dataUrodzenia, $_pesel, $_miejsceZamieszkania, $_telefonKontaktowy, $_typUzytkownika, $_aktywny) {
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');
	
			$sql = "INSERT INTO uzytkownicy (iduz, imie, nazwisko, dataurodzenia, pesel, miejscezamieszkania, telefonkontaktowy,typuzytkownika, aktywny) 
			VALUES ('$_iduz','$_imie', '$_nazwisko', '$_dataUrodzenia', '$_pesel', '$_miejsceZamieszkania', '$_telefonKontaktowy', '$_typUzytkownika', '$_aktywny')";

			if (mysqli_query($conn, $sql)) {
				echo "<script>alert('Dodano');</script>";
				echo "<script>window.location.href='uzytkownicy.php';</script>";
				exit();
			}
			else{
				echo "<script>alert('Niepoprawne dane');</script>";
				echo "<script>window.location.href='dodaj_uzytkownika.php';</script>";
			}
		mysqli_close($conn);
		}


	/**
	 * @access public
	 */
	public function znajdzUzytkownika() {
		//poco?
	}

	public static function usunUzytkownika($_iduz) {
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');
		$sql = "SELECT * FROM uczniowie, rodzice, przedmioty WHERE uczniowie.uzytkownicy_iduz='$_iduz' OR przedmioty.uzytkownicy_iduz='$_iduz' OR rodzice.uzytkownicy_iduz='$_iduz'" ; 
		$result = mysqli_query($conn, $sql);
		if ($result!=NULL){
			echo "<script>alert('Uzytkownik przypisany, brak mozliwosci usuniecia. Zmien aktywnosc');</script>";
		}
		else{
			$sql = "DELETE FROM uzytkownicy WHERE iduz='$_iduz'"; 

			if (mysqli_query($conn, $sql)) {
				echo "<script>alert('Usunieto');</script>";
				echo "<script>window.location.href='uzytkownicy.php';</script>";
				exit();
			}
		mysqli_close($conn);
		}
		
	}


	/**
	 * @access public
	 */
	public function wyswietlListeUzytkownikow() {
	
	$conn = mysqli_connect('localhost', 'root','', 'edziennik');

	$sql = "SELECT iduz, imie, nazwisko, typUzytkownika, aktywny FROM uzytkownicy ORDER BY iduz ASC";
	$result = mysqli_query($conn, $sql);
	$records = mysqli_num_rows($result);

	if ($records > 0) {
		$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
		$count = 1;
		foreach ($row as $row) { 
			echo "<tr>";
			echo "<th>" . $row['iduz'] ."</th>";
			echo "<th>" . $row['imie'] ."</th>";
			echo "<th>" . $row['nazwisko'] ."</th>";
			echo "<th>" . $row['typUzytkownika'] ."</th>";
			echo "<th>" ;
			if( $row['aktywny']==1){
				echo "tak";
			}
			else{
				echo "nie";
			}
			echo "</th>";
			if($_SESSION['usertype']=='admin'){
			echo '<th>
			<form action="uzytkownicy.php" method="post">
			<button type="submit" name="'.$row["iduz"].'" class="btn btn-success btn-xs">Wybierz</button>
			</form></th>';
			if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST[$row["iduz"]])){				
				$_SESSION["idChange"] = $row["iduz"];
				$_SESSION["idChangeActivity"] = $row["aktywny"];
				echo '<meta http-equiv="Refresh" content="0;url=uzytkownicy.php">';
			}
			echo "</tr>";
		}

	}

	}
}
	/**
	 * @access public
	 */
	public function zmienAktywnosc() {
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');
		if($_SESSION["idChangeActivity"]!=0){
			$sql = "UPDATE uzytkownicy SET aktywny=0 WHERE iduz='".$_SESSION["idChange"]."'";
		}
		else{
			$sql = "UPDATE uzytkownicy SET aktywny=1 WHERE iduz='".$_SESSION["idChange"]."'";
		}
		$result=mysqli_query($conn, $sql);
		if ($result == TRUE) {
			echo "Aktywnosc zmieniona";
		  } else {
			echo "Error przy zmienianiu aktywnosci: " . $conn->error;
		  }
	}
}
?>