<?php 

class ImageColumnAdapter {
	
	public static function get($id) {
		if (! $id)
			return ;
		$storage = new ImageStorage();
		$list = $storage->setId($id)->getImageList();
		if (! $list)
			return ;
		return CHtml::openTag('a',array('href' => $list[0], 'class' => 'iload')) .
				CHtml::image($list[0],"",array("style"=>"width:50px;height:50px;")) .
			   CHtml::closeTag('a');
			;
	} 
	
}