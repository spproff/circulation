<h4>Приход</h4>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$data_provider,
    'columns'=>array(
    	'supplier.label',    
    	'amount', 
		'exchange',
        'price', 
    ),
));
?>