<?php
	/*
	Plugin Name: FW SubPageInADiv (SPIAD)
	Plugin URI: http://weblog.fairweb.fr/plugins-wordpress/fw-subpageinadiv-spiad/
	Description: SPIAD (Special Page in A Div) displays the content of a subpage in a div element for specific pages
	Author: Myriam Faulkner
	Author URI: http://www.fairweb.fr
	Version: 1.0
	*/ 

	/*  Copyright 2007  Myriam Faulkner  (email : web@fairweb.fr)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

$fw_spiad_default = "fw-spiad-default.php";
$fw_spiad_pagename = "spiad";
define("FW_SPIAD_THEMEPATH",ABSPATH . "/wp-content/plugins/fw-spiad/themes");

function fw_spiad_exists_custom ($pageid) {
global $wpdb, $fw_spiad_pagename;
	
	$req = $wpdb->get_row("SELECT ID FROM ".$wpdb->posts." WHERE post_parent = ".$pageid." AND post_title = '".$fw_spiad_pagename."' AND post_status = 'publish'", ARRAY_A);
	if ($req == NULL) {
		return false; 
		} else {
		return $req['ID'];
		}
}


function fw_spiad_customtheme ($req_array, $display_title=0) { // 0 = no page title
	$title = $req_array ["post_title"];
	$content = apply_filters('the_content', $req_array ["post_content"]);
	$output ='<div id="spiad">';
		if ($display_title !=0) { 
	$output .= '<h3>'.$title.'</h3>';
	 } 	
	$output .=$content;
	$output .='</div>';
	echo $output;
 }
 

function get_fw_spiad ($pageid, $display_title=0) { // $pageid=0 ---> will display default spiad
global $wpdb, $fw_spiad_default;
 
 switch ($pageid) {
 
 	case 0 : load_template( FW_SPIAD_THEMEPATH . '/'.$fw_spiad_default); break;
	
	default :
			$pagefind = fw_spiad_exists_custom ($pageid);
				if ($pagefind == NULL) {
					load_template( FW_SPIAD_THEMEPATH . '/'.$fw_spiad_default);
				} else {
					$req = $wpdb->get_row("SELECT * FROM ".$wpdb->posts." WHERE ID = ".$pagefind ."", ARRAY_A);
					fw_spiad_customtheme ($req, $display_title);
					
				}
	}

}

function fw_spiad_header () {
?>
<link rel="stylesheet" href="<?php bloginfo('url');?>/wp-content/plugins/fw-spiad/themes/fw-spiad.css" type="text/css" media="screen" />
<?php
}

add_action('wp_head', 'fw_spiad_header'); 
?>