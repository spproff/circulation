<?php

class OutcomeTableWidget extends YWidget
{
	public $product_id;
	
    public function run()
    {
    	$data_provider = new CActiveDataProvider(
    		'Outcome', array(
    		'criteria' => array(
                	'condition' => 'product_id=' . $this->product_id,
            	),
            )
    	);
        $this->render('outcomeTable', array( 'data_provider' => $data_provider ));
    }

}