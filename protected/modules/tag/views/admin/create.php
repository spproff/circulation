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
        Yii::app()->getModule('tag')->getCategory() => array(),
        Yii::t('tag', 'Теги') => array('/admin/index'),
        Yii::t('tag', 'Добавление'),
    );

    $this->pageTitle = Yii::t('tag', 'Теги - добавление');

    $this->menu = array(
        array('icon' => 'list-alt', 'label' => Yii::t('tag', 'Управление Тегами'), 'url' => array('/admin/index')),
        array('icon' => 'plus-sign', 'label' => Yii::t('tag', 'Добавить Тег'), 'url' => array('/admin/create')),
    );
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('tag', 'Теги'); ?>
        <small><?php echo Yii::t('tag', 'добавление'); ?></small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>