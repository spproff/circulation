<?php 

class AliParser extends CApplicationComponent {
	
	private $_html;
	
	public function parse($url) {
		try {
			$this->_prepareHtml($url);
		} catch (Exception $e) {
			return array('success' => false, 'message' => $e->getMessage());
		}
		$image_src = $this->_getImageSrc();
		$article = $this->_getArticle();
		$image_storage = new ImageStorage();
		$res = $image_storage->setId($article)->uploadFile($image_src);
		if (! $res && ! is_array(res)) {
			return array('success' => false, 'message' => 'Error while upload image');
		}
		return $res;
	}
	
	private function _prepareHtml($url) {
		if (! $this->_validateUrl($url))
			throw new Exception('This is not correct Uri');
		try {
			require_once 'simple_html_dom.php';
			$html = file_get_html($url);
		} catch (Exception $e) {
			throw $e;
		}
		$this->_html = $html;
		return $this;
	}
	
	private function _getImageSrc() {
		$html = $this->_html;
		$src = $html->find('#img .image-item a img', 0)->src;
		return $src;
	}
	
	private function _getArticle() {
		$html = $this->_html;
		$article_tag = $html->find('.prod-id span');
		$article_tag = preg_replace('/.*\:\s/', '', $article_tag);
		if (! $article_tag) 
			return false;
		$article_tag = $article_tag[0];
		return strip_tags($article_tag);
	}
	
	private function _validateUrl($url) {
		$v = new CUrlValidator();
		return $v->validateValue($url);
	}
}