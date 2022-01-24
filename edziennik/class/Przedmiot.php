<?php
/**
 * @access public
 * @author karpasz1
 */

class Przedmiot {
	/**
	 * @AttributeType string
	 */
	private $nazwaPrzedmiotu;
	/**
	 * @AttributeType string
	 */
	private $prowadzacy;
	/**
	 * @AttributeType int[]
	 */
	private $oceny;
	/**
	 * @AttributeType unsigned int
	 */
	private $rokRealizacji;
	/** 
	 * @AttributeType string[]
	 */
	private $klasa;
	/**
	 * @AttributeType Klasa
	 * /**
	 *  * @AssociationType Klasa
	 *  * /
	 */
	/**
	 * @access public
	 */
	
	public function zmienProwadzacego($prowadzacy, $nazwaPrzedmiotu) {
		//polaczenie z baza
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');
	
		$sql = "UPDATE przedmioty SET iduz='$prowadzacy'
		WHERE nazwaprzedmiotu='$nazwaPrzedmiotu'"  ;

		//sprawdzanie poprawnosci
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
	public function wyswietlSzczegolyPrzedmiotu($nazwaPrzedmiotu) {

		//pobranie wczesniej przypisanego idprzedmiotu
		$idLekcji = $_SESSION["idChange"];

		$sql = "SELECT datalekcji, przedmioty.nazwaprzedmiotu, przedmioty.idprzedmiotu, klasa.nazwaklasy, klasa.idklasy, uzytkownicy.imie, uzytkownicy.nazwisko, uzytkownicy.iduz, tematlekcji
		FROM lekcje 
		INNER JOIN przedmioty ON lekcje.przedmioty_idprzedmiotu=przedmioty.idprzedmiotu
		INNER JOIN uzytkownicy ON przedmioty.uzytkownicy_iduz = uzytkownicy.iduz
		INNER JOIN klasa ON klasa.idklasy=przedmioty.klasa_idklasy
		WHERE nazwaprzedmiotu=$nazwaPrzedmiotu";

		//polaczenie z baza danych
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');
		$result = mysqli_query($conn, $sql);
		$records = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		//wyswietlenie
		$idPrzedmiotu= $row['idprzedmiotu'];
		$nazwaPrzedmiotu = $row['nazwaprzedmiotu'];
		$nazwaKlasy = $row['nazwaklasy'];
		$idKlasy = $row['idklasy'];
		$nazwiskoNauczyciela = $row['nazwisko'];
		$imieNauczyciela = $row['imie'];
		echo '<meta http-equiv="Refresh" content="0;url=szczegoly_przedmiotu.php">';
	}

}
?>