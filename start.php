<?php

	/**
	 * Autobox Friendly autocomplete for tags.
	 * 
	 * @package autobox
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Pedro Prez
	 * @copyright 2009
	 * @link http://www.pedroprez.com.ar/
 	*/
	
	function autobox_init()
	{
		global $CONFIG;
		extend_view('metatags','autobox/javascript');
		
		//** VIEWS	
		// Extend CSS
		    extend_view('css','autobox/css');
	}
	
	//**BEGIN
	register_elgg_event_handler('init','system','autobox_init');
?>
