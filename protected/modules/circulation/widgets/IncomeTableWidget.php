<?php

class IncomeTableWidget extends YWidget
{
	public $product_id;
	
    public function run()
    {
    	$data_provider = new CActiveDataProvider(
    		'Income', array(
    		'criteria' => array(
                	'condition' => 'product_id=' . $this->product_id,
    				'with' => 'supplier',
            	),
            )
    	);
        $this->render('incomeTable', array( 'data_provider' => $data_provider ));
    }

}