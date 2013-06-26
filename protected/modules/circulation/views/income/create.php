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
        Yii::app()->getModule('circulation')->getCategory() => array(),
        Yii::t('circulation', 'Приходы') => array('/income/index'),
        Yii::t('circulation', 'Добавление'),
    );

    $this->pageTitle = Yii::t('circulation', 'Приходы - добавление');

    $this->menu = array(
        array('icon' => 'list-alt', 'label' => Yii::t('circulation', 'Управление Приходами'), 'url' => array('/income/index')),
        array('icon' => 'plus-sign', 'label' => Yii::t('circulation', 'Добавить Приход'), 'url' => array('/income/create')),
    );
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('circulation', 'Приходы'); ?>
        <small><?php echo Yii::t('circulation', 'добавление'); ?></small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>