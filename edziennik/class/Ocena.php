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
		echo '<meta http-equiv="Refresh" content="0;url=szczegoly_oceny.php">';
	}
}
?>