<?php
/**
 * Отображение для view:
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
        $model->id,
    );

    $this->pageTitle = Yii::t('tag', 'Теги - просмотр');

    $this->menu = array(
        array('icon' => 'list-alt', 'label' => Yii::t('tag', 'Управление Тегами'), 'url' => array('/tag/admin/index')),
        array('icon' => 'plus-sign', 'label' => Yii::t('tag', 'Добавить Тег'), 'url' => array('/tag/admin/create')),
        array('label' => Yii::t('tag', 'Тег') . ' «' . mb_substr($model->id, 0, 32) . '»'),
        array('icon' => 'pencil', 'label' => Yii::t('tag', 'Редактирование Тега'), 'url' => array(
            '/tag/admin/update',
            'id' => $model->id
        )),
        array('icon' => 'eye-open', 'label' => Yii::t('tag', 'Просмотреть Тег'), 'url' => array(
            '/tag/admin/view',
            'id' => $model->id
        )),
        array('icon' => 'trash', 'label' => Yii::t('tag', 'Удалить Тег'), 'url' => '#', 'linkOptions' => array(
            'submit' => array('/tag/admin/delete', 'id' => $model->id),
            'confirm' => Yii::t('tag', 'Вы уверены, что хотите удалить Тег?'),
        )),
    );
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('tag', 'Просмотр') . ' ' . Yii::t('tag', 'Тега'); ?><br />
        <small>&laquo;<?php echo $model->id; ?>&raquo;</small>
    </h1>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'data'       => $model,
    'attributes' => array(
        'id',
        'label',
        'description',
        'weight',
    ),
)); ?>
