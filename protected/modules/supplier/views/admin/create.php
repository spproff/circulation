<?php
/**
 * Отображение для create:
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
        Yii::t('supplier', 'Добавление'),
    );

    $this->pageTitle = Yii::t('supplier', 'Постащики - добавление');

    $this->menu = array(
        array('icon' => 'list-alt', 'label' => Yii::t('supplier', 'Управление Поставщиками'), 'url' => array('/admin/index')),
        array('icon' => 'plus-sign', 'label' => Yii::t('supplier', 'Добавить Поставщика'), 'url' => array('/admin/create')),
    );
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('supplier', 'Постащики'); ?>
        <small><?php echo Yii::t('supplier', 'добавление'); ?></small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>