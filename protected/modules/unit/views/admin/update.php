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
        Yii::app()->getModule('unit')->getCategory() => array(),
        Yii::t('unit', 'Единицы') => array('/admin/index'),
        $model->id => array('/admin/view', 'id' => $model->id),
        Yii::t('unit', 'Редактирование'),
    );

    $this->pageTitle = Yii::t('unit', 'Единицы - редактирование');

    $this->menu = array(
        array('icon' => 'list-alt', 'label' => Yii::t('unit', 'Управление Единицами'), 'url' => array('/admin/index')),
        array('icon' => 'plus-sign', 'label' => Yii::t('unit', 'Добавить Единицу'), 'url' => array('/admin/create')),
        array('label' => Yii::t('unit', 'Единица') . ' «' . mb_substr($model->id, 0, 32) . '»'),
        array('icon' => 'pencil', 'label' => Yii::t('unit', 'Редактирование Единицы'), 'url' => array(
            '/admin/update',
            'id' => $model->id
        )),
        array('icon' => 'eye-open', 'label' => Yii::t('unit', 'Просмотреть Единицу'), 'url' => array(
            '/admin/view',
            'id' => $model->id
        )),
        array('icon' => 'trash', 'label' => Yii::t('unit', 'Удалить Единицу'), 'url' => '#', 'linkOptions' => array(
            'submit' => array('/admin/delete', 'id' => $model->id),
            'confirm' => Yii::t('unit', 'Вы уверены, что хотите удалить Единицу?'),
        )),
    );
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('unit', 'Редактирование') . ' ' . Yii::t('unit', 'Единицы'); ?><br />
        <small>&laquo;<?php echo $model->id; ?>&raquo;</small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>