<?php
require_once(realpath(dirname(__FILE__)) . '/Uczen.php');
require_once(realpath(dirname(__FILE__)) . '/Przedmiot.php');

use Uczen;
use Przedmiot;

/**
 * @access public
 * @author karpasz1
 */
class Klasa {
	/**
	 * @AttributeType string
	 */
	public $nazwaKlasy;
	/**
	 * @AttributeType unsigned int
	 */
	private $rokRozpoczecia;
	/**
	 * @AttributeType string
	 */
	private $wychowawca;
	/**
	 * @AttributeType string[]
	 */
	private $uczniowie;
	/**
	 * @AttributeType string[]
	 */
	private $przedmioty;
	/**
	 * @AttributeType Uczen
	 * /**
	 *  * @AssociationType Uczen
	 *  * /
	 */

}
?>