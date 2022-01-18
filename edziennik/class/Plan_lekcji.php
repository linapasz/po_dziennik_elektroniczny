<?php
require_once('Uzytkownik.php');

//use Uzytkownik;

/**
 * @access public
 * @author karpasz1
 */
class Plan_lekcji {
	/**
	 * @AttributeType string
	 */
	private $_przedmiot;
	/**
	 * @AttributeType unsigned int
	 */
	private $_rokObowiazywania;
	/**
	 * @AttributeType string
	 */
	private $_nazwaUzytkownika;
	/**
	 * @AttributeType Uzytkownik
	 * /**
	 *  * @AssociationType Uzytkownik
	 *  * /
	 */
	/**
	 * @access public
	 */
	public function wyswietlPlan() {
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');

		$sql = "SELECT idlekcji, datalekcji, przedmioty.nazwaprzedmiotu, przedmioty.idprzedmiotu, klasa.nazwaklasy, uzytkownicy.imie, uzytkownicy.nazwisko 
		FROM lekcje 
		INNER JOIN przedmioty ON lekcje.przedmioty_idprzedmiotu=przedmioty.idprzedmiotu
		INNER JOIN uzytkownicy ON przedmioty.uzytkownicy_iduz = uzytkownicy.iduz
		INNER JOIN klasa ON klasa.idklasy=przedmioty.klasa_idklasy
		ORDER BY datalekcji ASC";
		$result = mysqli_query($conn, $sql);
		$records = mysqli_num_rows($result);
	
		if ($records > 0) {
			$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
			$count = 1;
			foreach ($row as $row) { 
				echo "<tr>";
				echo "<th>" . $row['datalekcji'] ."</th>";
				echo "<th>" . $row['przedmioty.nazwaprzedmiotu'] ."</th>";
				echo "<th>" . $row['przedmioty.idprzedmiotu'] ."</th>";
				echo "<th>" . $row['klasa.nazwaklasy'] ."</th>";
				echo "<th>" . $row['uzytkownicy.imie'] . $row['uzytkownicy.nazwisko'] ;
				echo "</th>";
				echo '<th>
				<form action="plan_lekcji.php" method="post">
				<button type="submit" name="'.$row["idlekcji"].'" class="btn btn-success btn-xs">Wybierz</button>
				</form></th>';
				if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST[$row["iduz"]])){				
					$_SESSION["idChange"] = $row["idlekcji"];
					//echo '<meta http-equiv="Refresh" content="0;url=uzytkownicy.php">';
				}
				echo "</tr>";
			}
	}
}

	/**
	 * @access public
	 */
	public function dodajLekcje($_idLekcji, $_dataLekcji,$_idKlas,$_rokRealizacji,$_idPrzedmiotu) {
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');
	
		$sql = "INSERT INTO lekcje VALUES ( '$_dataLekcji', '$_rokRealizacji', '$_idPrzedmiotu','$_idKlas')" ;

		if (mysqli_query($conn, $sql)) {
			echo "<script>alert('Dodano');</script>";
			echo "<script>window.location.href='uzytkownicy.php';</script>";
			exit();
		}
		else{
			echo "<script>alert('Niepoprawne dane');</script>";
			echo "<script>window.location.href='edit.php';</script>";
		}
	mysqli_close($conn);
	}

	/**
	 * @access public
	 */
	public function usunLekcje($_idlekcji) {
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');
		$sql = "SELECT * FROM lekcje WHERE idlekcji='$_idlekcji'" ; 
		$result = mysqli_query($conn, $sql);
		if ($result!=NULL){
			echo "<script>alert('Brak mozliwosci usuniecia lekcji. Zmien aktywnosc');</script>";
		}
		else{
			$sql = "DELETE FROM lekcje WHERE idlekcji='$_idlekcji'"; 

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
	public function edytujLekcje($_idLekcji, $_dataLekcji,$_rokRealizacji,$_idPrzedmiotu,$_idKlas) {
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');
	
		$sql = "UPDATE lekcje  SET dataLekcji='$_dataLekcji', rokrealizacji='$_rokRealizacji', przedmioty_idprzedmiotu='$_idPrzedmiotu',klasa_idklasy='$_idKlas'
		WHERE idlekcji='$_idLekcji'"  ;

		if (mysqli_query($conn, $sql)) {
			echo "<script>alert('Zapisano');</script>";
			echo "<script>window.location.href='uzytkownicy.php';</script>";
			exit();
		}
		else{
			echo "<script>alert('Niepoprawne dane');</script>";
			echo "<script>window.location.href='edit.php';</script>";
		}
	mysqli_close($conn);
	}
}
?>