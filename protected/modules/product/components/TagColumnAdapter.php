<?php 

class TagColumnAdapter {
	
	public static function get($tags) {
		if (! $tags)
			return ;
		$html = '';
		foreach ($tags as $tag) {
			$html .= '<span class="label label-info">' . $tag->label . '</span>';
		}	
			
		return $html;
	} 
	
}