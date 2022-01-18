<?php
require_once(realpath(dirname(__FILE__)) . '/Ocena.php');

use Ocena;

/**
 * @access public
 * @author karpasz1
 */
class Dzienniczek {
	/**
	 * @AttributeType Ocena[]
	 */
	private $_oceny;
	/**
	 * @AttributeType string
	 */
	private $_uczeñ;
	/**
	 * @AttributeType unsigned int
	 */
	private $_ocenaKoncowa;

	/**
	 * @access public
	 */
	public function wpiszOcene() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function usunOcene() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function edytujOcene() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function wyswietlOceny() {
		// Not yet implemented
	}
}
?>