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
?>

/* autobox-list is the dropdown list */
ul.autobox-list {
  position: absolute;
  overflow: hidden;
  background-color: #fff;
  border: 1px solid #aaa;
  margin: 0px;
  padding: 0;
  list-style: none;
  font: normal 1.0em/1.0em "Lucida Grande", "Verdana", sans-serif;
  color: #333;
}
ul.autobox-list li {
  display: block;
  padding: .3em .5em .3em .3em;
  overflow: hidden;
  width: 100%;
}
ul.autobox-list li.active {
  background-color: #3875d7;
  color: #fff;
}

/* autobx-hldr is the selected list */
ul.autobox-hldr {
  background:white;
  width: 500px;
  border: 1px solid #999;
  overflow: hidden;
  height: auto !important;
  height: 1%;
  padding: 4px 5px 0;
  font: 11px "Lucida Grande", "Verdana";
}
ul.autobox-hldr li {
  float: left;
  list-style-type: none;
  padding: 0 5px 4px 0;
  margin-right: 5px;
}
ul.autobox-hldr li.bit-box {
  -moz-border-radius: 6px;
  -webkit-border-radius: 6px;
  border-radius: 6px;
  border: 1px solid #cae8f3;
  background: #dee7f8;
  padding: 1px 5px 2px;
  margin-bottom: 3px;
}
ul.autobox-hldr li.bit-box {
  padding-right: 15px;
  position: relative;
}
ul.autobox-hldr li.autobox-input input {
  border:none;
  width: 150px;
  margin: 0;
  outline: 0;
  padding: 3px 0 2px 2px;
} /* no left/right padding here please */
ul.autobox-hldr li.bit-box a.closebutton {
  position: absolute;
  right: 4px; top: 5px;
  display: block;
  width: 7px; height: 7px;
  font-size: 1px;
  background: url(<?php echo $vars['url'] ?>mod/autobox/vendors/close.gif); }
ul.autobox-hldr li.bit-box a.closebutton:hover {
  background-position: 7px;
}
ul.autobox-hldr li.bit-box-focus a.closebutton,
ul.autobox-hldr li.bit-box-focus a.closebutton:hover {
  background-position: bottom;
}

.matching {
font-weight:bold;
text-decoration:none;
}
