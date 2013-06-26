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
        Yii::app()->getModule('tag')->getCategory() => array(),
        Yii::t('tag', 'Теги') => array('/admin/index'),
        $model->id => array('/admin/view', 'id' => $model->id),
        Yii::t('tag', 'Редактирование'),
    );

    $this->pageTitle = Yii::t('tag', 'Теги - редактирование');

    $this->menu = array(
        array('icon' => 'list-alt', 'label' => Yii::t('tag', 'Управление Тегами'), 'url' => array('/admin/index')),
        array('icon' => 'plus-sign', 'label' => Yii::t('tag', 'Добавить Тег'), 'url' => array('/admin/create')),
        array('label' => Yii::t('tag', 'Тег') . ' «' . mb_substr($model->id, 0, 32) . '»'),
        array('icon' => 'pencil', 'label' => Yii::t('tag', 'Редактирование Тега'), 'url' => array(
            '/admin/update',
            'id' => $model->id
        )),
        array('icon' => 'eye-open', 'label' => Yii::t('tag', 'Просмотреть Тег'), 'url' => array(
            '/admin/view',
            'id' => $model->id
        )),
        array('icon' => 'trash', 'label' => Yii::t('tag', 'Удалить Тег'), 'url' => '#', 'linkOptions' => array(
            'submit' => array('/admin/delete', 'id' => $model->id),
            'confirm' => Yii::t('tag', 'Вы уверены, что хотите удалить Тег?'),
        )),
    );
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('tag', 'Редактирование') . ' ' . Yii::t('tag', 'Тега'); ?><br />
        <small>&laquo;<?php echo $model->id; ?>&raquo;</small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>