<?php
require_once(realpath(dirname(__FILE__)) . '/Nauczyciel.php');
require_once(realpath(dirname(__FILE__)) . '/Uczen.php');
require_once(realpath(dirname(__FILE__)) . '/Dzienniczek.php');

use Nauczyciel;
use Uczen;
use Dzienniczek;

/**
 * @access public
 * @author karpasz1
 */
class Ocena extends Dzienniczek {
	/**
	 * @AttributeType string
	 */
	private $_nazwaOceny;
	/**
	 * @AttributeType unsigned int
	 */
	private $_wartoscOceny = [1..6];
	/**
	 * @AttributeType unsigned int
	 */
	private $_wagaOceny;
	/**
	 * @AttributeType string
	 */
	private $_nauczyciel;
	/**
	 * @AttributeType time_t
	 */
	private $_dataWpisania;
	/**
	 * @AttributeType Nauczyciel
	 * /**
	 *  * @AssociationType Nauczyciel
	 *  * /
	 */
	public function wyswietlSzczegoly() {
		// Not yet implemented
	}
}
?>