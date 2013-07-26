<h4>Приход</h4>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$data_provider,
    'columns'=>array(
    	'supplier.label',    
    	'amount', 
		'exchange',
        'price', 
		array(
            'class'=>'CButtonColumn',
			'template'=>'{delete}{update}',
			'updateButtonUrl' => 'Yii::app()->controller->createUrl("/circulation/income/update",array("id"=>$data->primaryKey))',
			'deleteButtonUrl' => 'Yii::app()->controller->createUrl("/circulation/income/delete",array("id"=>$data->primaryKey))'
        ),
    ),
));
?>