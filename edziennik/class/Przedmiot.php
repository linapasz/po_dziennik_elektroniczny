<?php
require_once(realpath(dirname(__FILE__)) . '/Klasa.php');
require_once(realpath(dirname(__FILE__)) . '/Nauczyciel.php');

use Klasa;
use Nauczyciel;

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
	public function zmienProwadzocego() {
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
		// Not yet implemented
	}
}
?>