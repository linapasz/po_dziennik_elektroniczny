<?php
require_once(realpath(dirname(__FILE__)) . '/Przedmiot.php');
require_once(realpath(dirname(__FILE__)) . '/Obecnosc.php');

use Przedmiot;
use Obecnosc;

/**
 * @access public
 * @author karpasz1
 */
class Lekcja {
	/**
	 * @AttributeType string
	 */
	private $_tematLekcji;
	/**
	 * @AttributeType time_t
	 */
	private $_dataLekcji;
	/**
	 * @AttributeType time_t
	 */
	private $_czasTrwania;
	/**
	 * @AttributeType Przedmiot
	 * /**
	 *  * @AssociationType Przedmiot
	 *  * /
	 */
	
	/**
	 * @access public
	 */
	public function wyswietlSzczegolyLekcji() {
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');
	
		$sql = "SELECT * FROM lekcje
		WHERE idlekcji='".$_POST["idlekcji"]."'"  ;

		if (mysqli_query($conn, $sql)) {
			
		}
		else{
			echo "<script>alert('Błąd lekcji');</script>";
			echo "<script>window.location.href='plan_lekcji.php';</script>";
		}
	mysqli_close($conn);
	}

	/**
	 * @access public
	 */
	public function wpiszTemat() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function sprawdzObecnosc() {
		// Not yet implemented
	}
}
?>