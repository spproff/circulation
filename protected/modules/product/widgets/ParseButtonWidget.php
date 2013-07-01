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
				'label'      => Yii::t('product', 'Загрузить данные'),
    			'id' 		 =>	$id,
    	));
	    
    	$alert_id = $id.'-alert';
    	echo CHtml::openTag('div', array('class'=>'hidden'));
	    
	    $this->widget(
		    'bootstrap.widgets.TbAlert', array(
		        'block'  =>true,
	    		'id' => $alert_id,
		        'alerts' =>array(
		            'info' => array('block' => true),
		        ),
		    )
		); 
	    
	    echo CHtml::closeTag('div'); 
	    
    	Yii::app()->getClientScript()->registerScript(__CLASS__.'#'.$id,"jQuery('#{$id}')
    		.click(
	    		function(){
	    			var url = jQuery('#" . get_class( $model ) . "_url').val();
	    			$.get('$service_url',{url:url},function(data){
	    				jQuery('#{$alert_id}').removeClass('hidden');
	    				jQuery('#{$alert_id}').text(data.message);
	    			},'json');
	    			return false;
	    		}
	    	);"
    	);
    	
    }
	
}