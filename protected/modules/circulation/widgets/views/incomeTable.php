<h4>Приход</h4>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$data_provider,
    'columns'=>array(
        'amount',          // display the 'title' attribute
        'price',  // display the 'name' attribute of the 'category' relation
    ),
));
?>