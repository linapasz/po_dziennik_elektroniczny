<?php

/**
 * @access public
 * @author karpasz1
 */
class Przedmiot {
	/**
	 * @AttributeType string
	 */
	private $_nazwaPrzedmiotu;
	/**
	 * @AttributeType string
	 */
	private $_prowadzacy;
	/**
	 * @AttributeType int[]
	 */
	private $_oceny;
	/**
	 * @AttributeType unsigned int
	 */
	private $_rokRealizacji;
	/**
	 * @AttributeType string[]
	 */
	private $_uczniowie;
	/**
	 * @AttributeType Klasa
	 * /**
	 *  * @AssociationType Klasa
	 *  * /
	 */
	/**
	 * @access public
	 */
	public function zmienProwadzacego() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function dodajUcznia() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function usunUcznia() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function wyswietlSzczegolyPrzedmiotu() {
		echo '<meta http-equiv="Refresh" content="0;url=szczegoly_przedmiotu.php">';
	}
}
?>