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
        Yii::app()->getModule('tag')->getCategory() => array(),
        Yii::t('tag', 'Теги') => array('/tag/admin/index'),
        Yii::t('tag', 'Управление'),
    );

    $this->pageTitle = Yii::t('tag', 'Теги - управление');

    $this->menu = array(
        array('icon' => 'list-alt', 'label' => Yii::t('tag', 'Управление Тегами'), 'url' => array('/tag/admin/index')),
        array('icon' => 'plus-sign', 'label' => Yii::t('tag', 'Добавить Тег'), 'url' => array('/tag/admin/create')),
    );
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('tag', 'Теги'); ?>
        <small><?php echo Yii::t('tag', 'управление'); ?></small>
    </h1>
</div>

<button class="btn btn-small dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
    <i class="icon-search">&nbsp;</i>
    <?php echo CHtml::link(Yii::t('tag', 'Поиск Тегов'), '#', array('class' => 'search-button')); ?>
    <span class="caret">&nbsp;</span>
</button>

<div id="search-toggle" class="collapse out search-form">
<?php
Yii::app()->clientScript->registerScript('search', "
    $('.search-form form').submit(function() {
        $.fn.yiiGridView.update('tag-grid', {
            data: $(this).serialize()
        });
        return false;
    });
");
$this->renderPartial('_search', array('model' => $model));
?>
</div>

<br/>

<p> <?php echo Yii::t('tag', 'В данном разделе представлены средства управления Тегами'); ?>
</p>

<?php
 $this->widget('application.modules.yupe.components.YCustomGridView', array(
    'id'           => 'tag-grid',
    'type'         => 'condensed',
    'dataProvider' => $model->search(),
    'filter'       => $model,
    'columns'      => array(
        'id',
        'label',
        'description',
        'weight',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
)); ?>
