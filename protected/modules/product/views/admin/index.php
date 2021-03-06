<?php
/**
 * Отображение для index:
 *
 *   @category YupeView
 *   @package  YupeCMS
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 **/
    $this->breadcrumbs = array(
        Yii::app()->getModule('product')->getCategory() => array(),
        Yii::t('product', 'Товары') => array('/product/admin/index'),
        Yii::t('product', 'Управление'),
    );

    $this->pageTitle = Yii::t('product', 'Товары - управление');

    $this->menu = array(
        array('icon' => 'list-alt', 'label' => Yii::t('product', 'Управление Товарами'), 'url' => array('/product/admin/index')),
        array('icon' => 'plus-sign', 'label' => Yii::t('product', 'Добавить Товар'), 'url' => array('/product/admin/create')),
    );
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('product', 'Товары'); ?>
        <small><?php echo Yii::t('product', 'управление'); ?></small>
    </h1>
</div>

<button class="btn btn-small dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
    <i class="icon-search">&nbsp;</i>
    <?php echo CHtml::link(Yii::t('product', 'Поиск Товаров'), '#', array('class' => 'search-button')); ?>
    <span class="caret">&nbsp;</span>
</button>

<div id="search-toggle" class="collapse out search-form">
<?php
Yii::app()->clientScript->registerScript('search', "
    $('.search-form form').submit(function() {
        $.fn.yiiGridView.update('product-grid', {
            data: $(this).serialize()
        });
        return false;
    });
");
$this->renderPartial('_search', array('model' => $model));
?>
</div>

<br/>

<p> <?php echo Yii::t('product', 'В данном разделе представлены средства управления Товарами'); ?>
</p>

<?php
 $this->widget('application.modules.yupe.components.YCustomGridView', array(
    'id'           => 'product-grid',
    'type'         => 'condensed',
    'dataProvider' => $model->search(),
    'filter'       => $model,
 	'afterAjaxUpdate' => "js:function() {
			$('.iload').fancybox();
		}",
    'columns'      => array(
        'id',
 		'article',
        'label',
        'price',        
        'active',
        'booking',
 		'weight',
        array(
            'type' => 'html', 'value' => 'ImageColumnAdapter::get($data->article)'
        ),
        array(
        	'name' => 'Tags',
            'type' => 'html', 'value' => 'TagColumnAdapter::get($data->tag)',
        	'filter' => CHtml::activeDropDownList($model, 'tag', CHtml::listData(Tag::model()->findAll(), 'id', 'label')), 
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
)); ?>
