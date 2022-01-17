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
		// Not yet implemented
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