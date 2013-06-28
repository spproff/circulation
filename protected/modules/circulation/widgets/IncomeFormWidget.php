<?php

class IncomeFormWidget extends YWidget
{
	public $product_id;
	
    public function run()
    {
        $this->render('incomeForm', array( 'model' => new Income() ));
    }

}