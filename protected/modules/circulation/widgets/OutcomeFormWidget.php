<?php

class OutcomeFormWidget extends YWidget
{
    public $product_id;
	
    public function run()
    {
        $model = new Outcome();
        $this->render('outcomeForm', array( 'model' => $model ));
    }

}