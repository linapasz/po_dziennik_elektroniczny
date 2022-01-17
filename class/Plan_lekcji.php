<?php
require_once(realpath(dirname(__FILE__)) . '/Uzytkownik.php');

use Uzytkownik;

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
	public $_._;

	/**
	 * @access public
	 */
	public function wyswietlPlan() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function dodajLekcje() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function usunLekcje() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function edytujLekcje() {
		// Not yet implemented
	}
}
?>