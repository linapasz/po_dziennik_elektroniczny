<?php
/**
 * @access public
 * @author karpasz1
 */
class Ocena extends Dzienniczek {
	/**
	 * @AttributeType string
	 */
	private $nazwaOceny;
	/**
	 * @AttributeType unsigned int
	 */
	private $wartoscOceny;
	/**
	 * @AttributeType unsigned int
	 */
	private $wagaOceny;
	/**
	 * @AttributeType string
	 */
	private $nauczyciel;
	/**
	 * @AttributeType time_t
	 */
	private $dataWpisania;
	/**
	 * @AttributeType Nauczyciel
	 * /**
	 *  * @AssociationType Nauczyciel
	 *  * /
	 */

	public function wyswietlSzczegoly() {
		//pobranie wybranej wczesniej oceny
		$idOceny= $_SESSION["idOceny"];

		$sql = "SELECT ocenyczastkowe.idoceny, ocenyczastkowe.wartoscoceny, ocenyczastkowe.wagaoceny, ocenyczastkowe.datawpisania, przedmioty.nazwaprzedmiotu, klasa.nazwaklasy, uzytkownicy.imie, uzytkownicy.nazwisko
		FROM ocenyczastkowe
		INNER JOIN uzytkownicy ON uzytkownicy.iduz=ocenyczastkowe.idnauczyciela
		INNER JOIN przedmioty ON przedmioty.uzytkownicy_iduz=ocenyczastkowe.idnauczyciela
		INNER JOIN klasa ON klasa.idklasy=przedmioty.klasa_idklasy
		WHERE ocenyczastkowe.idoceny=$idOceny";
		
		//polaczenie z baza danych
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');
		$result = mysqli_query($conn, $sql);
		$records = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

		$nazwaPrzedmiotu = $row['nazwaprzedmiotu'];
		$nazwaKlasy = $row['nazwaklasy'];
		$wartoscOceny = $row['wartoscoceny'];
		$wagaOceny = $row['wagaoceny'];
		$dataWpisania = $row['datawpisania'];
		$nazwiskoNauczyciela = $row['nazwisko'];
		$imieNauczyciela = $row['imie'];

		echo '<meta http-equiv="Refresh" content="0;url=szczegoly_oceny.php">';
	}
}
?>