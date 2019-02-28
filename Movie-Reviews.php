<?php
/*
 * Plugin Name: My test plugin
 * Plugin URI: http://test.sites-test.com
 * Description: Description
 * Version: 1.1.1
 * Author: Я
 * Author URI: http://test.sites-test.com
 * License: GPLv2 or later
 */

function insertFootNote($content) {

$taxes = get_the_taxonomies( $post);

if( $taxes )
	echo "<ul class='list-group' style='list-style-type:none'>\n\t<li  class='list-group-item'><span class='glyphicon glyphicon-star' aria-hidden='true'>&nbsp". implode("</span></li>\n\t<li  class='list-group-item'><span class='glyphicon glyphicon-star' aria-hidden='true'>&nbsp", $taxes ) ."</span></li>\n</ul>";



if(!is_feed() && !is_home()) {
                
		$content .= '<span class="badge badge-secondary"><span class="glyphicon glyphicon-euro" aria-hidden="true">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<p><b>Cost: ' . get_post_meta(get_the_ID(), 'description', 1) . '</b></p></span></span><br/><br/>';
		$content .= '<span class="badge badge-secondary"><span class="glyphicon glyphicon-list-alt" aria-hidden="true">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<p><b>Date: ' . get_post_meta(get_the_ID(), 'select', 1) . '</b></span></span></p>';
           	
		
        }
        return $content;
}
add_filter ('the_content', 'insertFootNote');

?>
