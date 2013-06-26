<?php
/**
 * Отображение для update:
 *
 *   @category YupeView
 *   @package  YupeCMS
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 **/
    $this->breadcrumbs = array(
        Yii::app()->getModule('circulation')->getCategory() => array(),
        Yii::t('circulation', 'Расходы') => array('/outcome/index'),
        $model->id => array('/outcome/view', 'id' => $model->id),
        Yii::t('circulation', 'Редактирование'),
    );

    $this->pageTitle = Yii::t('circulation', 'Расходы - редактирование');

    $this->menu = array(
        array('icon' => 'list-alt', 'label' => Yii::t('circulation', 'Управление Расходами'), 'url' => array('/outcome/index')),
        array('icon' => 'plus-sign', 'label' => Yii::t('circulation', 'Добавить Расход'), 'url' => array('/outcome/create')),
        array('label' => Yii::t('circulation', 'Расход') . ' «' . mb_substr($model->id, 0, 32) . '»'),
        array('icon' => 'pencil', 'label' => Yii::t('circulation', 'Редактирование Расхода'), 'url' => array(
            '/outcome/update',
            'id' => $model->id
        )),
        array('icon' => 'eye-open', 'label' => Yii::t('circulation', 'Просмотреть Расход'), 'url' => array(
            '/outcome/view',
            'id' => $model->id
        )),
        array('icon' => 'trash', 'label' => Yii::t('circulation', 'Удалить Расход'), 'url' => '#', 'linkOptions' => array(
            'submit' => array('/outcome/delete', 'id' => $model->id),
            'confirm' => Yii::t('circulation', 'Вы уверены, что хотите удалить Расход?'),
        )),
    );
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('circulation', 'Редактирование') . ' ' . Yii::t('circulation', 'Расхода'); ?><br />
        <small>&laquo;<?php echo $model->id; ?>&raquo;</small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>