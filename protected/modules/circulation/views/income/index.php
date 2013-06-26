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
        Yii::app()->getModule('circulation')->getCategory() => array(),
        Yii::t('circulation', 'Приходы') => array('/circulation/income/index'),
        Yii::t('circulation', 'Управление'),
    );

    $this->pageTitle = Yii::t('circulation', 'Приходы - управление');

    $this->menu = array(
        array('icon' => 'list-alt', 'label' => Yii::t('circulation', 'Управление Приходами'), 'url' => array('/circulation/income/index')),
        array('icon' => 'plus-sign', 'label' => Yii::t('circulation', 'Добавить Приход'), 'url' => array('/circulation/income/create')),
    );
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('circulation', 'Приходы'); ?>
        <small><?php echo Yii::t('circulation', 'управление'); ?></small>
    </h1>
</div>

<button class="btn btn-small dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
    <i class="icon-search">&nbsp;</i>
    <?php echo CHtml::link(Yii::t('circulation', 'Поиск Приходов'), '#', array('class' => 'search-button')); ?>
    <span class="caret">&nbsp;</span>
</button>

<div id="search-toggle" class="collapse out search-form">
<?php
Yii::app()->clientScript->registerScript('search', "
    $('.search-form form').submit(function() {
        $.fn.yiiGridView.update('income-grid', {
            data: $(this).serialize()
        });
        return false;
    });
");
$this->renderPartial('_search', array('model' => $model));
?>
</div>

<br/>

<p> <?php echo Yii::t('circulation', 'В данном разделе представлены средства управления Приходами'); ?>
</p>

<?php
 $this->widget('application.modules.yupe.components.YCustomGridView', array(
    'id'           => 'income-grid',
    'type'         => 'condensed',
    'dataProvider' => $model->search(),
    'filter'       => $model,
    'columns'      => array(
        'id',
        'date',
        'product_id',
        'amount',
        'price',
        'supplier_id',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
)); ?>
