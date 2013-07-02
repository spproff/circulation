<?php 

class ImagesPreviewsWidget extends YWidget {
	
	public $article;
	
    public function run()
    {
    	$article = $this->article;
    	
    	if(! Yii::app()->request->isAjaxRequest){
    		Yii::app()->clientScript->registerScriptFile( '/web/vendor/jquery.fancybox/fancybox/jquery.fancybox-1.3.4.pack.js');
    		Yii::app()->clientScript->registerCssFile( '/web/vendor/jquery.fancybox/fancybox/jquery.fancybox-1.3.4.css');
    		
	    	$image_gallery_url = Yii::app()->getModule('product')->image_gallery_url;
	    	
	    	$script = "
	    			  $(function(){
	    			  	$('.iload').fancybox();
    				  });
	    		   	  
	    			  function getImages(article, selector){
		    			if (! article) 
		    				return false;
		    			$.get('{$image_gallery_url}',{article:article},function(data){
		    				$(selector).html(data);
		    			},'html');
		    			return false;
		    		  }";
	    	
	    	Yii::app()->getClientScript()->registerScript(__CLASS__, $script);
    	}
    	
		$storage = new ImageStorage();
		$list = $storage->setId($article)->getImageList();
		if ($list){
			foreach ($list as $url) {
				echo CHtml::openTag('a', array('href'=>$url, 'class'=>'iload'));
				echo CHtml::image($url, '', array('style'=>'height: 120px; width: auto;'));
				echo CHtml::closeTag('a');
			}
		}
    }
	
}