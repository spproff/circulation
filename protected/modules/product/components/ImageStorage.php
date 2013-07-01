<?php 

class ImageStorage extends CApplicationComponent {
	
	private $_id;
	
	private $_types = array('jpg', 'jpeg', 'png', 'gif');
	
	public function setId($id) {
		$this->_id = $id;
		return $this;
	}
	
	private function _getPath() {
		$base_path = ROOT_PATH . Yii::app()->getModule('product')->images_path;
		$id = $this->_id;
		$path = $base_path . $id . '/';
		if (! file_exists($path)) {
			mkdir($path, 0777);
		}
		return $path;
	}
	
	public function getImageList() {
		
		$path = $this->_getPath();
		
		$files = $this->_listFile($path);
		if (! $files)
			return false;
			
		$urls = $this->_filter($files);
		
		return $urls;
	}
	
	private function _listFile ( $dir ) {
		$files = false;
	    if ( $dir [ strlen( $dir ) - 1 ] != '/' ) {
	        $dir .= '/'; //добавляем слеш в конец если его нет
	    }
	    $nDir = opendir( $dir );
	    while ( false !== ( $file = readdir( $nDir ) ) ) {
	        if ( $file != "." AND $file != ".." ) {
	            if ( !is_dir( $dir . $file ) ) { 
	                //если это не директория
	                $files [] = $file;
	            }
	        }
	    }
	    closedir( $nDir );
	    return $files;
	}
	
	private function _filter($files) {
		
		$res = array();
		
		foreach ($files as $file) {
			$info = pathinfo($file);
			if (in_array($info['extension'], $this->_types)) {
				$res[] = str_replace(ROOT_PATH, '', $file);
			}
		}
		return $res;
	}
	
	public function uploadFile($url) {
		$path = $this->_saveFile($url);
		if (! $this->_isNew($path)) {
			unlink($path);
		}
		return true;
	}
	
	private function _saveFile($url) {
		$file = md5(basename($url) . time());
		$path = $this->_getPath() . $file;
		$content = file_get_contents($url);
		$f = fopen( $path, "w" );
		fwrite( $f, $content );
		fclose( $f );
		return $path;
	}
	
	private function _isNew($path) {
		$md5 = md5_file($path);
		$files_path = $this->_getPath();
		$files = $this->_listFile($files_path);
		$md5_path = $files_path . $md5 . '.md5';
		if (! $files || ! in_array($md5 . '.md5', $files)) {
			file_put_contents($md5_path, "");
			return true;
		}
		return false;
	}

}