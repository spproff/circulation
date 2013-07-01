<?php 

class ImagesPreviewsWidget extends YWidget {
	
	public $id;
	
    public function run()
    {
    	$model = Product::model()->findByPk($this->id);
        $this->render('imagesPreviewsWidget', array( 'model' => $model ));
    }
	
}