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
        Yii::app()->getModule('product')->getCategory() => array(),
        Yii::t('product', 'Товары') => array('/admin/index'),
        Yii::t('product', 'Добавление'),
    );

    $this->pageTitle = Yii::t('product', 'Товары - добавление');

    $this->menu = array(
        array('icon' => 'list-alt', 'label' => Yii::t('product', 'Управление Товарами'), 'url' => array('/admin/index')),
        array('icon' => 'plus-sign', 'label' => Yii::t('product', 'Добавить Товар'), 'url' => array('/admin/create')),
    );
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('product', 'Товары'); ?>
        <small><?php echo Yii::t('product', 'добавление'); ?></small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>