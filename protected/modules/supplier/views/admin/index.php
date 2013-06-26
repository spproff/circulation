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
        Yii::app()->getModule('supplier')->getCategory() => array(),
        Yii::t('supplier', 'Постащики') => array('/admin/index'),
        Yii::t('supplier', 'Управление'),
    );

    $this->pageTitle = Yii::t('supplier', 'Постащики - управление');

    $this->menu = array(
        array('icon' => 'list-alt', 'label' => Yii::t('supplier', 'Управление Поставщиками'), 'url' => array('/admin/index')),
        array('icon' => 'plus-sign', 'label' => Yii::t('supplier', 'Добавить Поставщика'), 'url' => array('/admin/create')),
    );
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('supplier', 'Постащики'); ?>
        <small><?php echo Yii::t('supplier', 'управление'); ?></small>
    </h1>
</div>

<button class="btn btn-small dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
    <i class="icon-search">&nbsp;</i>
    <?php echo CHtml::link(Yii::t('supplier', 'Поиск Поставщиков'), '#', array('class' => 'search-button')); ?>
    <span class="caret">&nbsp;</span>
</button>

<div id="search-toggle" class="collapse out search-form">
<?php
Yii::app()->clientScript->registerScript('search', "
    $('.search-form form').submit(function() {
        $.fn.yiiGridView.update('supplier-grid', {
            data: $(this).serialize()
        });
        return false;
    });
");
$this->renderPartial('_search', array('model' => $model));
?>
</div>

<br/>

<p> <?php echo Yii::t('supplier', 'В данном разделе представлены средства управления Поставщиками'); ?>
</p>

<?php
 $this->widget('application.modules.yupe.components.YCustomGridView', array(
    'id'           => 'supplier-grid',
    'type'         => 'condensed',
    'dataProvider' => $model->search(),
    'filter'       => $model,
    'columns'      => array(
        'id',
        'label',
        'description',
        'phone',
        'email',
        'address',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
)); ?>
