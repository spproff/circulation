<?php

class ProductModule extends YWebModule
{
	
	public $adminPageLinkNormalize = '/product/admin/index/';
	
	public $images_path = '/uploads/products/';
	
	public $parse_service_url = '/product/admin/parser/';
	
	public $image_gallery_url = '/product/admin/images/';
	
	public function getIcon()
    {
        return 'folder-open';
    }
	
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		parent::init();
		$this->setImport(array(
			'product.models.*',
			'product.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
