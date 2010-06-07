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

	$site_tags = get_tags(1,50,'tags',"object");
	$aux = array();
	foreach($site_tags as $id_tag => $tag){
		$aux[$id_tag] = $tag->tag;
	}
	$site_tags = $aux;
	
	if(isloggedin()){
		$user_tags = get_tags(0,50,'tags',"object",'',get_loggedin_userid());
		$aux = array();
		foreach($user_tags as $id_tag => $tag){
			$aux[$id_tag] = $tag->tag;
		}
		$user_tags = $aux;
	}
	
	$class = $vars['class'];
	if (!$class) $class = "input-tags";
	
	$tags = "";
	$tags_to_send = '';
    if (!empty($vars['value'])) {
    	if (is_array($vars['value'])) {
    		foreach($vars['value'] as $tag) {
	    		if (!empty($tags)) {
	                $tags .= "', '";
	                $tags_to_send .= ", ";
	            }else{
	            	$tags .= "'";
	            }
	            if (is_string($tag)) {
	            	$tags .= $tag;
	            	$tags_to_send .= $tag;
	            } else {
	            	$tags .= $tag->value;
	            	$tags_to_send .= $tag->value;
	            }
	            
	        }
    	} else {
    		$tags = "'" . $vars['value'];
    		$tags_to_send = $vars['value'];
    	}
    }
    if(!empty($tags))
    	$tags .= "'";
    	
    $rand_number = rand(1,99999);  
	$input_id = $rand_number;
	
	$str_tag_bd = '';
	if($site_tags) foreach($site_tags as $tag){
		if(empty($str_tag_bd)){
			$str_tag_bd .= "{text: '$tag'}";
		}else{
			$str_tag_bd .= ", {text: '$tag'}";
		}
	}
?>

<input type="hidden" name="<?php echo $vars['internalname']; ?>" value="<?php echo htmlentities($tags, ENT_QUOTES, 'UTF-8'); ?>"/>
<input id="<?php echo $input_id ?>" type="text" <?php if ($vars['disabled']) echo ' disabled="yes" '; ?><?php echo $vars['js']; ?> class="<?php echo $class; ?>"/>


<script type="text/javascript">
	
	if(!window.console){
     	 console = typeof(console) !== 'undefined' ? console : { log: function(msg) { $('#log').html(msg + '<br/>\n' + $('#log').html() ); } };
    }


      var list1 = [<?php echo $str_tag_bd; ?>];
      var box =
      $('input#<?php echo $input_id ?>').autobox({
        list: list1,
        match: function(typed) {
          this.typed = typed;
          this.pre_match = this.text;
          this.match = this.post_match = '';
          if (!this.ajax && !typed || typed.length == 0) { return true; }
          var match_at = this.text.search(new RegExp("\\b" + typed, "i"));
          if (match_at != -1) {
            this.pre_match = this.text.slice(0,match_at);
            this.match = this.text.slice(match_at,match_at + typed.length);
            this.post_match = this.text.slice(match_at + typed.length);
            return true;
          }
          return false;
        },
        insertText: function(obj) { return obj.text },
        templateText: "<li><%= pre_match %><span class='matching' ><%= match %></span><%= post_match %></li>",
        prevals : [<?php echo $tags; ?>]
      });
</script>
 