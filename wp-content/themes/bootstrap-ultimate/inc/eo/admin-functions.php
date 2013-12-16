<?php
// - - FONT FUNCTIONS  - - 

function eo_default_font_faces() {
			$def_os_fontz = array(
			'Helvetica Neue, Helvetica, Arial, sans-serif'=> 'Helvetica-Arial',
			// Bah ! Who'd use that anyway ? 'Arial Black, Gadget, sans-serif' => 'Arial Black'
			// NO!.. just no! 'Comic Sans MS, Comic Sans MS, cursive'
			'Courier New, Courier New, monospace' => 'Courier New',
			'Georgia, Georgia, serif' => 'Georgia',
			// Not sure why would anyone want this one, but maybe for headings...
			'Impact, Impact, Charcoal, sans-serif' => 'Impact',
			'Lucida Console, Monaco, monospace' => 'Lucida Console',
			'Lucida Grande, Lucida Sans Unicode, sans-serif' => 'Lucida Grande',
			'Palatino Linotype, Book Antiqua, Palatino, serif' => 'Palatino',
			'Tahoma, Geneva, sans-serif' => 'Tahom-Geneva',
			'Times New Roman, Times New Roman, Times, serif' => 'Times New Roman',
			'Trebuchet, Trebuchet MS, sans-serif' => 'Trebuchet',
			'Verdana, Verdana, Geneva, sans-serif' => 'Verdana-Geneva',
			'MS Sans Serif, Geneva, sans-serif' => 'Ms Serif-Geneva',
			'MS Serif, New York, serif' => 'Serif'
			);
	return $def_os_fontz;
}


function eo_combined_font_faces() {
	$eo_fnts_prep = get_option ( 'eo_all_fonts_arr' );
	$comb_faces_trans = get_transient( 'eo_comb_faces_trans');
	if($comb_faces_trans) {
	//	delete_transient( 'eo_comb_faces_trans');
		$merged_faces = $comb_faces_trans;
	}
	else {
		// Rebuild faces for easy use
		if($eo_fnts_prep && ! empty($eo_fnts_prep["gwf_font"]) && is_array($eo_fnts_prep["gwf_font"]) && ! empty($eo_fnts_prep["os_font"]) && is_array($eo_fnts_prep["os_font"]) ){
			$merged_faces = array();
			$def_faces = $eo_fnts_prep["os_font"]["font_faces"];
			$ggl_faces = $eo_fnts_prep["gwf_font"]["font_faces"];
			if($def_faces && is_array($def_faces) ) {
				$merged_faces["os_font"] = $def_faces;
			}
			if($ggl_faces && is_array($ggl_faces) ) {
				$ggl_final_faces = array();
				foreach ($ggl_faces as $slug => $val) {
					// lowercase slugs make it hard, just store the option val as name, maybe only a space to + replace
				//	$ggl_final_faces[$slug] = $val["name"];
					$fslug = str_replace(" ","+",$val["name"]);
					$ggl_final_faces[$fslug] = $val["name"];
				}
				$merged_faces["gwf_font"] = $ggl_final_faces;
			}
			// save the restructured array for later use for a short time - 30 mins
			set_transient( 'eo_comb_faces_trans', $merged_faces, 60 * 300 );
			//return	eo_default_font_faces();
		}
		else {
			$merged_faces = eo_default_font_faces();
		}
	}
	return $merged_faces;
}



function eo_get_font_sources() {
	$fonts_all = get_option ( 'eo_all_fonts_arr' );
	if( $fonts_all && is_array($fonts_all) ) {
		$all_fonts_sources = array();
		foreach ( $fonts_all as $all_fonts_source ) {
			$all_fonts_sources[$all_fonts_source["font_src_slug"]] = $all_fonts_source["font_src_name"];	
			//var_dump($all_fonts_sources);
		}
		return $all_fonts_sources;
	}		
}

//quick page list
function eo_get_q_pages() {
	$page_ids_arr = get_all_page_ids();
	$page_opt_arr = array();
	foreach ( $page_ids_arr as $the_page_idd ) {
		$page_opt_arr[$the_page_idd] = 	get_the_title($the_page_idd);
	}
	return $page_opt_arr;
}

// quick cat list
function eo_get_q_cats() {
	$category_ids = get_all_category_ids();
	$cat_arr = array();
	foreach($category_ids as $cat_id) {
	  $cat_name = get_cat_name($cat_id);
	//  echo $cat_id . ': ' . $cat_name;
	$cat_arr[$cat_id] = $cat_name;	
	}
	ksort($cat_arr);
	$st_cat_arr = array(0 => "ALL");
	$fin_cat_arr = array_merge($st_cat_arr,$cat_arr);
	return $fin_cat_arr;
}
function eo_order_arr() {
	$order_arr  = array("ASC" => "ASC", "DESC" => "DESC" );
	return $order_arr;
}
function eo_order_by_arr() {
	$order_arr  = array(
		"date" => "Date",
		"ID" => "ID",
		"rand" => "Random",
		"name" => "Name",
		"title" => "Title",
		"author" => "Author",
		"modified" => "Modified",
		"comment_count" => "Comment Count",
	);
	return $order_arr;
}

function eo_chck_gen_cl($cl_tc, $cl_tr, $add_cl = '',$absl = '') {
		$gen_opt_cl = get_option('eo_gen_opt_cl' );
	//	var_dump($gen_opt_cl[$cl_tc]);
		return (strpos($gen_opt_cl[$cl_tc],$cl_tr) !== false ) ? true : false;
	}
function eo_opt_dept($opt_td,$opt_tb,$col = '',$addc='') {
	$optionsframework_settings = get_option('optionsframework' );
	$opts = get_option(  $optionsframework_settings['id'] );	
//	$dopt = optionsframework_options();
	//	_eo-todo: build multiple dependencies, for example display page selector only if Jumbo disp. is set to page.
	$idf = ' dept dp-'.$opt_td.'';
	$ret_cl = '';
	$ret_cl .= $idf;
	$counter = 0;
	//if dependant columns is recieved explode true|false
	if(strpos($opt_tb,"-") !== false) {
		$opt_tba = explode("-",$opt_tb);
	}
	else {
		$opt_tba = array($opt_tb);
	}
	foreach ($opt_tba as $opt_tb) {
	($opts[$opt_td]) ? $ret_cl .= " exist" : " non-exist";
		if( !empty($col) && ! is_array($col) )	{
		//	var_dump($col);
				$mlcl = strpos($col, "|");
				if ($mlcl !== false) $cola = explode("|",$col);
				(is_array($cola) ) ? $col = $cola : $col = $col;
		}

		if ($opts[$opt_td] == '' && strpos($ret_cl,"empty") === false ) {
			$ret_cl .= " empty";
			if ( !empty($ret_cl) && strpos($ret_cl,"col") === false ) {
				(is_array($col)) ? $kol = str_replace("col"," kol",$col[0]).' '.$col[1] : $kol = $col;
				$ret_cl .= $kol;
			}
		}
		else if ( $opt_tb == "|is_ua_code|") {
	//		var_dump("desc: " . $desc);
			if(	!empty($opts[$opt_td]) ) {
				// skip if already valid
				$optcl = $opts[$opt_td]["class"];
		//		var_dump($opts[$opt_td]);
				$chckua = strpos($optcl, "lvalidl");
				if ($chckua === false) {
					$chckuacd = strpos($opts[$opt_td], "UA");
					if ($chckuacd !== false) {
						$search = array('UA', '-');
						$replace = array('', '');
						$numonly = str_replace($search, $replace, $opts[$opt_td]);
				//		var_dump($numonly);
						if(is_numeric($numonly) && strlen($numonly >= 7) ) {
							$ret_cl .= " lvalidl";
							(is_array($col)) ? $kol = str_replace("col"," kol",$col[1]) : $kol = $col;
							//if( !is_ar$cola = explode("|",$col);
						}	
						else {
							$ret_cl .= " linvalidl";	
						//	$desc = $opts[$opt_td]["desc"];
						}
					}
					else {
						$ret_cl .= " linvalidl";
					}
				}
				else {
					$ret_cl .= "not-eval";
				}
			}
		}
		else if (  $opts[$opt_td] == $opt_tb) {
			// _eo-check: checkboxes with value "0" are not being stored, returning false
			$ret_cl .= " match ";
			(is_array($col)) ? $kol = str_replace("col"," kol",$col[1]).' '.$col[0] : $kol = $col;
			$ret_cl .= $kol;
		}
		else if (  $opts[$opt_td] != $opt_tb) {
			 $ret_cl .= " not-met altcl ";
			(is_array($col)) ? $kol = str_replace("col"," kol",$col[0]).' '.$col[1] : $kol = $col;
			$ret_cl .= $kol;			//return false;
			
		}
		else  {
			$ret_cl .= " unknwn";
		}
	}
	$ret_classes = preg_replace('!\s+!', ' ', $ret_cl);
	$occc = substr_count($ret_classes, $idf) ;
	if ( $occc > 1 )	$ret_classes = preg_replace('/'.$idf.'/', '', $ret_classes, 2);

	if( get_option('eo_gen_opt_cl') ) {
	$opt_cl_gen = get_option('eo_gen_opt_cl');
	}
	else {
		$opt_cl_gen = array();
	}
	if( $opts[$opt_td] && get_option('eo_gen_opt_cl') ) {
					return $ret_classes;
	}
	else {
		
//		var_dump("No prior val: return to opts as".$ret_classes);

		return $ret_classes;
	}
	//var_dump($opt_td,$opt_tb);
}
function eo_prep() {
	$optionsframework_settings = get_option('optionsframework' );
	
	$options =& _optionsframework_options();
	$eo_opts = get_option('eo_opts');

	$eo_fnts_prep = get_option('eo_all_fonts_arr');
	
	// CREATE GROUPS OPTION GROUPS FOR OPTIONS IF WE HAVE AND STORE THEM IN OPTIONS FOR LATER USE.
	// _eo-review: Regroup the options better.
	$grouped_opts = array();
	
	// ASSIGN ICONS TO GROUPS
/*		$grouped_icons = array(
					"slider" => "home",
					"slider" => "text-height",
					"slider" => "",
					"slider" => "",						
	);*/
	//$eo_opts =  get_option('eo_opts');

	$optcount = count($options);
	if($eo_opts) $last_gr_c = count($eo_opts["groups"]);
//	var_dump($optcount,$eo_opts["last_cnt"]);
	// CREATE OPTION GROUPS
	// _eo-todo: Find a better & more accurate way to find out if groups has changed also review the iteration
	if( empty($eo_opts) || $eo_opts["last_cnt"] != $optcount ) {
		foreach ( $options as $key => $optval ) {
			if (array_key_exists('id', $optval) && array_key_exists('group', $optval))  {
				if(!empty($optval["group"]) ) {
					//	var_dump($optval["group"]);
					if ( array_key_exists($optval["group"], $grouped_opts) && is_array($grouped_opts[$optval["group"]]) ) {
						array_push($grouped_opts[$optval["group"]], $optval);			
								//		var_dump($grouped_opts[$optval["group"]]);
						//	array_push($eo_opts['groups'][$optval["group"]], $eo_groups_summary );
						$eo_opts['groups'][$optval["group"]]["last_item"] = $optval["id"];	
					}
					else {
						$grouped_opts[$optval["group"]] = array();														
						array_push($grouped_opts[$optval["group"]], $optval);
						
						$eo_opts['groups'][$optval["group"]] = array("first_item" => $optval["id"],"last_item" => $optval["id"]);
					}
				//	unset($options[$key]);
				}
		//		var_dump($grouped_opts);
			//var_dump($options);

		//	update_option( 'optionsframework', $optionsframework_settings );
			}
		}
					$eo_opts["last_gr_cnt"] = count($grouped_opts);;
					$eo_opts["last_cnt"] = $optcount;
					$eo_opts["init_refreshed"] = "no";
					update_option( 'eo_opts', $eo_opts );
	}
	
	
	$gf_dump_file =  get_template_directory().'/panel/inc/gfdump.php';
	if($eo_fnts_prep && ! empty($eo_fnts_prep["gwf_font"]) && is_array($eo_fnts_prep["gwf_font"]) && ! empty($eo_fnts_prep["os_font"]) && is_array($eo_fnts_prep["os_font"]) ){
		// All Good.. Nothing to see here..
	} 
	else {
		// We dont have both the system and the Google fonts it seems..
		if( ! $eo_fnts_prep ) {
			// Check if we have some font source -- probably none at this point, so set some default fonts
			
			// Create an empty array to store fonts
			if( ! is_array($eo_fnts_prep) ) $eo_fnts_prep = array();
			
			$def_os_fonts = array(
			'Helvetica Neue, Helvetica, Arial, sans-serif'=> 'Helvetica-Arial',
			// Bah ! Who'd use that anyway ? 'Arial Black, Gadget, sans-serif' => 'Arial Black'
			// NO!.. just no! 'Comic Sans MS, Comic Sans MS, cursive'
			'Courier New, Courier New, monospace' => 'Courier New',
			'Georgia, Georgia, serif' => 'Georgia',
			// Not sure why would anyone want this one, but maybe for headings...
			'Impact, Impact, Charcoal, sans-serif' => 'Impact',
			'Lucida Console, Monaco, monospace' => 'Lucida Console',
			'Lucida Grande, Lucida Sans Unicode, sans-serif' => 'Lucida Grande',
			'Palatino Linotype, Book Antiqua, Palatino, serif' => 'Palatino',
			'Tahoma, Geneva, sans-serif' => 'Tahom-Geneva',
			'Times New Roman, Times New Roman, Times, serif' => 'Times New Roman',
			'Trebuchet, Trebuchet MS, sans-serif' => 'Trebuchet',
			'Verdana, Verdana, Geneva, sans-serif' => 'Verdana-Geneva',
			'MS Sans Serif, Geneva, sans-serif' => 'Ms Serif-Geneva',
			'MS Serif, New York, serif' => 'Serif'
			);

			// Check if System Font Families exist
			// Unnecessary check.. if(!empty($def_os_fonts) && is_array($def_os_fonts) ) {
			$os_font_src_arr = array(
				"font_src_slug" => "os_font",
				"font_src_name" => "Stock OS Fonts",
				"font_faces" => $def_os_fonts
			);
			$all_fonts["os_font"] = $os_font_src_arr;
			update_option('eo_all_fonts_arr',$all_fonts);
			// Maybe skip this and do both updates at once ?
		//	var_dump($all_fonts);
		}
		else if( $eo_fnts_prep && is_array($eo_fnts_prep["os_font"]) ) {
			// We should already have default os fonts from above but Google Fonts ?
			
			// We might have a value from a recent Google Font check..
			$google_f_opt = get_option( 'eo_googlefonts_arr' );
			if($google_f_opt && is_array($google_f_opt)) {
				$eo_fnts_prep["gwf_font"] = $google_f_opt;
				//Update fonts with Google Fonts and be done with it
				update_option( 'eo_all_fonts_arr', $eo_fnts_prep );	
				
				//$gwf_faces_trans = get_transient('gwf_faces_trans');

			}
			else if( file_exists($gf_dump_file)) { 
			// Load Google fonts from local file
				include_once($gf_dump_file);
			//	var_dump($def_gf_array);
				$eo_fnts_prep["gwf_font"] = $def_gf_array;
				update_option( 'eo_def_gf_array', $def_gf_array );	//test
					//Update fonts with Google Fonts and be done with it
				update_option( 'eo_all_fonts_arr', $eo_fnts_prep );	
				
			}
			else {
				// Cant get Google font for some reason ??
			}
		} // os font + google addition
	} // We dont have any fonts + os font addition
//	var_dump($options);
//	update_option( $optionsframework_settings['id'], $options );
}
?>
