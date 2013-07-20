<?php
/**
 * @access public
 * @author TEST
 * @package DataModel
 */
class Interventie {
	/**
	 * @AttributeType int
	 */
	public $id;
	/**
	 * @AttributeType datetime
	 */
	public $data;
	/**
	 * @AttributeType string
	 */
	public $constatari;
	/**
	 * @AttributeType string
	 */
	public $remedieri;
	/**
	 * @AttributeType string
	 */
	public $materiale_folosite;
	/**
	 * @AttributeType int
	 */
	public $utilizator_id;
	/**
	 * @AttributeType int
	 */
	public $echipament_id;

	/**
	 * @access public
	 */
	public function creeaza() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function arhiveaza() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function actualizeaza() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function read() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function get() {
		// Not yet implemented
	}
}
?>