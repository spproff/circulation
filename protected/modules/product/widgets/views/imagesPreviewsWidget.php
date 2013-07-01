<?php if ($model):?>
	<?php $article = $model->article?>
	<?php $storage = new ImageStorage()?>
	<?php $list = $storage->getImageList()?>
	<?php if ($list):?>
	<div>
		<?php foreach ($list as $url):?>
			<?php echo CHtml::openTag('a', array('href'=>$url, 'class'=>'iload'))?>
				<?php echo CHtml::image($src, array('width'=>'auto', 'height'=>'120'))?>
			<?php echo CHtml::closeTag('a')?>
		<?php endforeach;?>
	</div>
	<?php endif;?>
<?php endif;?>