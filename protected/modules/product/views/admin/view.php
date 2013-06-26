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
        Yii::app()->getModule('product')->getCategory() => array(),
        Yii::t('product', 'Товары') => array('/product/admin/index'),
        $model->id,
    );

    $this->pageTitle = Yii::t('product', 'Товары - просмотр');

    $this->menu = array(
        array('icon' => 'list-alt', 'label' => Yii::t('product', 'Управление Товарами'), 'url' => array('/product/admin/index')),
        array('icon' => 'plus-sign', 'label' => Yii::t('product', 'Добавить Товар'), 'url' => array('/product/admin/create')),
        array('label' => Yii::t('product', 'Товар') . ' «' . mb_substr($model->id, 0, 32) . '»'),
        array('icon' => 'pencil', 'label' => Yii::t('product', 'Редактирование Товара'), 'url' => array(
            '/product/admin/update',
            'id' => $model->id
        )),
        array('icon' => 'eye-open', 'label' => Yii::t('product', 'Просмотреть Товар'), 'url' => array(
            '/product/admin/view',
            'id' => $model->id
        )),
        array('icon' => 'trash', 'label' => Yii::t('product', 'Удалить Товар'), 'url' => '#', 'linkOptions' => array(
            'submit' => array('/product/admin/delete', 'id' => $model->id),
            'confirm' => Yii::t('product', 'Вы уверены, что хотите удалить Товар?'),
        )),
    );
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('product', 'Просмотр') . ' ' . Yii::t('product', 'Товара'); ?><br />
        <small>&laquo;<?php echo $model->id; ?>&raquo;</small>
    </h1>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'data'       => $model,
    'attributes' => array(
        'id',
        'label',
        'description',
        'images',
        'supplier_id',
        'unit',
        'url',
    ),
)); ?>
