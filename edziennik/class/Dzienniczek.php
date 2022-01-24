<?php
/**
 * @access public
 * @author karpasz1
 */
class Dzienniczek {
	/**
	 * @AttributeType Ocena[]
	 */
	private $ocenyczastkowe;
	/**
	 * @AttributeType string
	 */
	private $uczen;
	/**
	 * @AttributeType unsigned int
	 */
	private $ocenaKoncowa;

	/**
	 * @access public
	 */

	 //wpisanie oceny do dziennika
	public function wpiszOcene( $wartoscOceny, $wagaOceny, $idNauczyciela, $dataWpisania, $idUcznia) {
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');
	
		$sql = "INSERT INTO ocenyczastkowe (wartoscoceny, wagaoceny, idnauczyciela, datawpisania, uczniowie_iduz) VALUES ('$wartoscOceny', '$wagaOceny', '$idNauczyciela', '$dataWpisania', '$idUcznia')" ;

		//jesli dodano
		if (mysqli_query($conn, $sql)) {
			echo "<script>alert('Dodano');</script>";
			echo "<script>window.location.href='dzienniczek.php';</script>";
			exit();
		}
		else{
			echo "<script>alert('Niepoprawne dane');</script>";
			echo "<script>window.location.href='dzienniczek.php';</script>";
		}
	mysqli_close($conn);
	}
	

	/**
	 * @access public
	 */
	//usuniecie oceny z bazy
	public function usunOcene($idOceny) {
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');
		$sql = "DELETE FROM ocenyczastkowe WHERE idoceny='$idOceny'" ; 
		$result = mysqli_query($conn, $sql);

			if (mysqli_query($conn, $sql)) {
				echo "<script>alert('Usunieto');</script>";
				echo "<script>window.location.href='dzienniczek.php';</script>";
				exit();
			}
		mysqli_close($conn);
		
	}
	/**
	 * @access public
	 */
	public function edytujOcene($idOceny, $wartoscOceny, $wagaOceny, $idNauczyciela, $datawpisania, $idUcznia) {
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');
		
		$sql = "UPDATE ocenyczastkowe SET wartoscoceny='$wartoscOceny', wagaoceny='$wagaOceny', idnauczyciela='$idNauczyciela', datawpisania='$datawpisania', uczniowie_iduz='$idUcznia'
		WHERE idoceny='$idOceny'"  ;

		if (mysqli_query($conn, $sql)) {
			echo "<script>alert('Zapisano');</script>";
			echo "<script>window.location.href='dzienniczek.php';</script>";
			exit();
		}
		else{
			echo "<script>alert('Niepoprawne dane');</script>";
			echo "<script>window.location.href='editLesson.php';</script>";
		}
	mysqli_close($conn);
	}

	/**
	 * @access public
	 */
	public function wyswietlOceny() {
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');

		//w zaleznosci od typu uzytkownika wyswietlane sa rozne zestawy ocen
		//admin - wszystkie
		if ($_SESSION['usertype']=='admin'){
			$sql = "SELECT ocenyczastkowe.idoceny, ocenyczastkowe.wartoscoceny, ocenyczastkowe.wagaoceny, ocenyczastkowe.datawpisania, ocenyczastkowe.idnauczyciela, uzytkownicy.imie, uzytkownicy.nazwisko, uzytkownicy.iduz
			FROM ocenyczastkowe
			INNER JOIN uzytkownicy ON uzytkownicy.iduz=ocenyczastkowe.uczniowie_iduz
			ORDER BY ocenyczastkowe.datawpisania ASC";
		}
		//nauczyciel - oceny wpisane przez tego nauczyciela
		else if($_SESSION['usertype']=='nauczyciel'){
			$sql = "SELECT ocenyczastkowe.idoceny, ocenyczastkowe.wartoscoceny, ocenyczastkowe.wagaoceny, ocenyczastkowe.datawpisania,ocenyczastkowe.idnauczyciela, klasa.nazwaklasy, uzytkownicy.imie, uzytkownicy.nazwisko, uzytkownicy.iduz
			FROM ocenyczastkowe
			INNER JOIN uzytkownicy ON uzytkownicy.iduz=ocenyczastkowe.uczniowie_iduz
			INNER JOIN przedmioty ON przedmioty.uzytkownicy_iduz=ocenyczastkowe.idnauczyciela
			INNER JOIN klasa ON klasa.idklasy=przedmioty.klasa_idklasy
			WHERE ocenyczastkowe.idnauczyciela='".$_SESSION["userid"]."'";
		}
		//uczen - jego oceny
		else if($_SESSION['usertype']=='uczen'){
			$sql = "SELECT ocenyczastkowe.idoceny, ocenyczastkowe.wartoscoceny, ocenyczastkowe.wagaoceny, ocenyczastkowe.datawpisania,ocenyczastkowe.idnauczyciela, klasa.nazwaklasy, uzytkownicy.imie, uzytkownicy.nazwisko, uzytkownicy.iduz
			FROM ocenyczastkowe
			INNER JOIN uzytkownicy ON uzytkownicy.iduz=ocenyczastkowe.uczniowie_iduz
			INNER JOIN przedmioty ON przedmioty.uzytkownicy_iduz=ocenyczastkowe.idnauczyciela
			INNER JOIN klasa ON klasa.idklasy=przedmioty.klasa_idklasy
			WHERE ocenyczastkowe.uczniowie_iduz='".$_SESSION["userid"]."'";
		}
		//rodzic - oceny dziecka
		else if($_SESSION['usertype']=='rodzic') {
			$sql = "SELECT ocenyczastkowe.idoceny, ocenyczastkowe.wartoscoceny, ocenyczastkowe.wagaoceny, ocenyczastkowe.datawpisania, ocenyczastkowe.idnauczyciela,klasa.nazwaklasy, uzytkownicy.imie, uzytkownicy.nazwisko, uzytkownicy.iduz
			FROM ocenyczastkowe
			INNER JOIN uzytkownicy ON uzytkownicy.iduz=ocenyczastkowe.uczniowie_iduz
			INNER JOIN przedmioty ON przedmioty.uzytkownicy_iduz=ocenyczastkowe.idnauczyciela
			INNER JOIN klasa ON klasa.idklasy=przedmioty.klasa_idklasy
			INNER JOIN rodzice ON rodzice.uzytkownicy_iduz=oceny.uczniowie_iduz
			WHERE rodzice.idrodzica='".$_SESSION["userid"]."'";
		}

		$result = mysqli_query($conn, $sql);
		$records = mysqli_num_rows($result);
	
		if ($records > 0) {
			$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
			$count = 1;
			foreach ($row as $row) { 
				echo "<tr>";
				echo "<th>" . $row['wartoscoceny'] ."</th>";
				echo "<th>" . $row['iduz'] ."</th>";
				echo "<th>" . $row['imie'] . ' ' . $row['nazwisko'] ;
				echo "<th>" . $row['idnauczyciela'] ."</th>";
				echo "<th>" . $row['datawpisania'] ."</th>";
				echo '<th>
				<form action="dzienniczek.php" method="post">
				<button type="submit" name="'.$row["idoceny"].'" class="btn btn-success btn-xs">Wybierz</button>
				</form></th>';

				//w przypadku wybrania oceny ustawienie wartosci $_SESSION w celu zachowania idoceny
				if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST[$row["idoceny"]])){				
					$_SESSION["idOceny"] = $row["idoceny"];
				}
				echo "</tr>";
			}
		}
	}
}
?>