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
	private $przedmiot;
	/*
	 * @AttributeType unsigned int
	 */
	private $rokObowiazywania;
	/**
	 * @AttributeType string
	 */
	private $nazwaUzytkownika;
	/**
	 * @AttributeType Uzytkownik
	 * /**
	 *  * @AssociationType Uzytkownik
	 *  * /
	 */
	/**
	 * @access public
	 */
	public function wyswietlPlan($idUz) {
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');
		//wyswietlanie planu w zaleznosci od zalogowanego uzytkownika
		//admin wszystkie
		if ($_SESSION['usertype']=='admin'){
			$sql = "SELECT idlekcji, datalekcji, przedmioty.nazwaprzedmiotu, klasa.nazwaklasy, uzytkownicy.imie, uzytkownicy.nazwisko
			FROM lekcje 
			INNER JOIN przedmioty ON lekcje.przedmioty_idprzedmiotu=przedmioty.idprzedmiotu
			INNER JOIN uzytkownicy ON przedmioty.uzytkownicy_iduz = uzytkownicy.iduz
			INNER JOIN klasa ON klasa.idklasy=przedmioty.klasa_idklasy
			ORDER BY datalekcji ASC";
		}
		//nauczyciel tylko jego lekcje
		else if($_SESSION['usertype']=='nauczyciel'){
			$sql = "SELECT idlekcji, datalekcji, przedmioty.nazwaprzedmiotu,  klasa.nazwaklasy, uzytkownicy.imie, uzytkownicy.nazwisko
			FROM lekcje 
			INNER JOIN przedmioty ON lekcje.przedmioty_idprzedmiotu=przedmioty.idprzedmiotu
			INNER JOIN uzytkownicy ON przedmioty.uzytkownicy_iduz = uzytkownicy.iduz
			INNER JOIN klasa ON klasa.idklasy=przedmioty.klasa_idklasy
			WHERE przedmioty.uzytkownicy_iduz='$idUz'
			ORDER BY datalekcji ASC";
		}
		//uczen jego lekcje
		else if($_SESSION['usertype']=='uczen'){
			$sql = "SELECT idlekcji, datalekcji, przedmioty.nazwaprzedmiotu,  klasa.nazwaklasy, uzytkownicy.imie, uzytkownicy.nazwisko
			FROM lekcje 
			INNER JOIN przedmioty ON lekcje.przedmioty_idprzedmiotu=przedmioty.idprzedmiotu
			INNER JOIN uzytkownicy ON przedmioty.uzytkownicy_iduz = uzytkownicy.iduz
			INNER JOIN klasa ON klasa.idklasy=przedmioty.klasa_idklasy
			INNER JOIN uczniowie ON uczniowie.klasa_idklasy=przedmioty.klasa_idklasy
			WHERE uczniowie.uzytkownicy_iduz='$idUz'
			ORDER BY datalekcji ASC";
		}
		//rodzic lekcje dziecka
		else if($_SESSION['usertype']=='rodzic') {
			$sql = "SELECT idlekcji, datalekcji, przedmioty.nazwaprzedmiotu,  klasa.nazwaklasy, uzytkownicy.imie, uzytkownicy.nazwisko
			FROM lekcje 
			INNER JOIN przedmioty ON lekcje.przedmioty_idprzedmiotu=przedmioty.idprzedmiotu
			INNER JOIN uzytkownicy ON przedmioty.uzytkownicy_iduz = uzytkownicy.iduz
			INNER JOIN klasa ON klasa.idklasy=przedmioty.klasa_idklasy
			INNER JOIN uczniowie ON uczniowie.klasa_idklasy=przedmioty.klasa_idklasy
			INNER JOIN rodzice ON rodzice.uzytkownicy_iduz=uczniowie.uzytkownicy_iduz
			WHERE rodzice.idrodzica='$idUz'
			ORDER BY datalekcji ASC";
		}

		$result = mysqli_query($conn, $sql);
		$records = mysqli_num_rows($result);
	
		if ($records > 0) {
			$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
			$count = 1;
			foreach ($row as $row) { 
				echo "<tr>";
				echo "<th>" . $row['datalekcji'] ."</th>";
				echo "<th>" . $row['nazwaprzedmiotu'] ."</th>";
				echo "<th>" . $row['nazwaklasy'] ."</th>";
				echo "<th>" . $row['imie'] . ' ' . $row['nazwisko'] ;
				echo "</th>";
				echo '<th>
				<form method="post">
				<button type="submit" name="'.$row["idlekcji"].'" class="btn btn-success btn-xs">Wybierz</button>
				</form></th>';
				//ustawienie zmiennej sesyjnej do zmiany lekcji
				if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST[$row["idlekcji"]])){				
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
	public function dodajLekcje($dataLekcji,$idPrzedmiotu) {
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');
	
		$sql = "INSERT INTO lekcje VALUES ( '$dataLekcji', '$idPrzedmiotu')" ;

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
	public function usunLekcje($idlekcji) {
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');
		$sql = "DELETE FROM lekcje WHERE idlekcji='$idlekcji'" ; 
		$result = mysqli_query($conn, $sql);

		if ($result!=NULL){
			echo "<script>alert('Brak mozliwosci usuniecia lekcji. Przypisano juz oceny);</script>";
		}
		else{
			$sql = "DELETE FROM lekcje WHERE idlekcji='$idlekcji'"; 

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
	public function edytujLekcje($idLekcji, $dataLekcji, $idPrzedmiotu, $tematLekcji) {
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');
		
		$sql = "UPDATE lekcje  SET dataLekcji='$dataLekcji', przedmioty_idprzedmiotu='$idPrzedmiotu', tematlekcji='$tematLekcji'
		WHERE idlekcji='$idLekcji'"  ;

		if (mysqli_query($conn, $sql)) {
			echo "<script>alert('Zapisano');</script>";
			echo "<script>window.location.href='plan_lekcji.php';</script>";
			exit();
		}
		else{
			echo "<script>alert('Niepoprawne dane');</script>";
			echo "<script>window.location.href='editLesson.php';</script>";
		}
	mysqli_close($conn);
	}
}
?>