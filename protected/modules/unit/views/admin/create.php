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
        Yii::app()->getModule('unit')->getCategory() => array(),
        Yii::t('unit', 'Единицы') => array('/admin/index'),
        Yii::t('unit', 'Добавление'),
    );

    $this->pageTitle = Yii::t('unit', 'Единицы - добавление');

    $this->menu = array(
        array('icon' => 'list-alt', 'label' => Yii::t('unit', 'Управление Единицами'), 'url' => array('/admin/index')),
        array('icon' => 'plus-sign', 'label' => Yii::t('unit', 'Добавить Единицу'), 'url' => array('/admin/create')),
    );
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('unit', 'Единицы'); ?>
        <small><?php echo Yii::t('unit', 'добавление'); ?></small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>