<?php
require_once(realpath(dirname(__FILE__)) . '/Ucze�.php');
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
	public $_nazwaKlasy;
	/**
	 * @AttributeType unsigned int
	 */
	private $_rokRozpoczecia;
	/**
	 * @AttributeType string
	 */
	private $_wychowawca;
	/**
	 * @AttributeType string[]
	 */
	private $_uczniowie;
	/**
	 * @AttributeType string[]
	 */
	private $_przedmioty;
	/**
	 * @AttributeType Ucze�
	 * /**
	 *  * @AssociationType Ucze�
	 *  * /
	 */

}
?>