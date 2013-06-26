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
        Yii::t('circulation', 'Расходы') => array('/circulation/outcome/index'),
        Yii::t('circulation', 'Добавление'),
    );

    $this->pageTitle = Yii::t('circulation', 'Расходы - добавление');

    $this->menu = array(
        array('icon' => 'list-alt', 'label' => Yii::t('circulation', 'Управление Расходами'), 'url' => array('/circulation/outcome/index')),
        array('icon' => 'plus-sign', 'label' => Yii::t('circulation', 'Добавить Расход'), 'url' => array('/circulation/outcome/create')),
    );
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('circulation', 'Расходы'); ?>
        <small><?php echo Yii::t('circulation', 'добавление'); ?></small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>