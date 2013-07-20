<?php
/**
 * @access public
 * @author TEST
 * @package DataModel
 */
class Utilizator {
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
	public $password;
	/**
	 * @AttributeType string
	 */
	public $username;
	/**
	 * @AttributeType string
	 */
    /**
     * @AttributeType string
     */
	public $email;
	/**
     * @AttributeType string
     */
	public $telefon;
	/**
	 * Summary of $tip
	 * @var mixed
	 */
	public $tip;
	/**
	 * @AttributeType string
	 */
	public $nume;

    function __construct($id){
        $this->id = $id;
    }

}
?>