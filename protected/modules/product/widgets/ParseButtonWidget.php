<?php 

class ParseButtonWidget extends YWidget {
	
	public $model;
	
    public function run()
    {
    	$id = 'parse-btn';
    	
    	$model = $this->model ;
    	
    	$service_url = Yii::app()->getModule('product')->parse_service_url;
    	
    	$this->widget(
    		'bootstrap.widgets.TbButton', array(
	    		'buttonType' => 'submit',
	    		'htmlOptions'=> array('name' => 'submit-type', 'value' => 'index'),
    			'id' 		 =>	$id,
    			'icon'		 => 'download-alt'
    	));
	    
    	$alert_id = $id.'-alert';
	    
	    $this->widget(
		    'bootstrap.widgets.TbAlert', array(
		        'block'  =>true,
	    		'id' => $alert_id,
		        'alerts' =>array(
		            'info' => array('block' => true),
		        ),
		    )
		); 
	    
    	Yii::app()->getClientScript()->registerScript(__CLASS__.'#'.$id,"jQuery('#{$id}')
    		.click(
	    		function(){
	    			var url = jQuery('#" . get_class( $model ) . "_url').val();
	    			if (! url) 
	    				return false;
	    			$.get('$service_url',{url:url},function(data){
	    				jQuery('#{$alert_id}').removeClass('hidden');
	    				jQuery('#{$alert_id}').text(data.message);
	    				jQuery('#" . get_class( $model ) . "_article').val(data.article);
	    				getImages(data.article, '#images-gallery');
	    			},'json');
	    			return false;
	    		}
	    	);"
    	);
    	
    }
	
}