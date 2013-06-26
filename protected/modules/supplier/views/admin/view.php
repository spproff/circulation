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
        Yii::app()->getModule('supplier')->getCategory() => array(),
        Yii::t('supplier', 'Постащики') => array('/admin/index'),
        $model->id,
    );

    $this->pageTitle = Yii::t('supplier', 'Постащики - просмотр');

    $this->menu = array(
        array('icon' => 'list-alt', 'label' => Yii::t('supplier', 'Управление Поставщиками'), 'url' => array('/admin/index')),
        array('icon' => 'plus-sign', 'label' => Yii::t('supplier', 'Добавить Поставщика'), 'url' => array('/admin/create')),
        array('label' => Yii::t('supplier', 'Поставщик') . ' «' . mb_substr($model->id, 0, 32) . '»'),
        array('icon' => 'pencil', 'label' => Yii::t('supplier', 'Редактирование Поставшика'), 'url' => array(
            '/admin/update',
            'id' => $model->id
        )),
        array('icon' => 'eye-open', 'label' => Yii::t('supplier', 'Просмотреть Поставщика'), 'url' => array(
            '/admin/view',
            'id' => $model->id
        )),
        array('icon' => 'trash', 'label' => Yii::t('supplier', 'Удалить Поставщика'), 'url' => '#', 'linkOptions' => array(
            'submit' => array('/admin/delete', 'id' => $model->id),
            'confirm' => Yii::t('supplier', 'Вы уверены, что хотите удалить Поставщика?'),
        )),
    );
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('supplier', 'Просмотр') . ' ' . Yii::t('supplier', 'Поставшика'); ?><br />
        <small>&laquo;<?php echo $model->id; ?>&raquo;</small>
    </h1>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'data'       => $model,
    'attributes' => array(
        'id',
        'label',
        'description',
        'phone',
        'email',
        'address',
    ),
)); ?>
