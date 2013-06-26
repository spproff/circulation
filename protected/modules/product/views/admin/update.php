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
        Yii::app()->getModule('product')->getCategory() => array(),
        Yii::t('product', 'Товары') => array('/admin/index'),
        $model->id => array('/admin/view', 'id' => $model->id),
        Yii::t('product', 'Редактирование'),
    );

    $this->pageTitle = Yii::t('product', 'Товары - редактирование');

    $this->menu = array(
        array('icon' => 'list-alt', 'label' => Yii::t('product', 'Управление Товарами'), 'url' => array('/admin/index')),
        array('icon' => 'plus-sign', 'label' => Yii::t('product', 'Добавить Товар'), 'url' => array('/admin/create')),
        array('label' => Yii::t('product', 'Товар') . ' «' . mb_substr($model->id, 0, 32) . '»'),
        array('icon' => 'pencil', 'label' => Yii::t('product', 'Редактирование Товара'), 'url' => array(
            '/admin/update',
            'id' => $model->id
        )),
        array('icon' => 'eye-open', 'label' => Yii::t('product', 'Просмотреть Товар'), 'url' => array(
            '/admin/view',
            'id' => $model->id
        )),
        array('icon' => 'trash', 'label' => Yii::t('product', 'Удалить Товар'), 'url' => '#', 'linkOptions' => array(
            'submit' => array('/admin/delete', 'id' => $model->id),
            'confirm' => Yii::t('product', 'Вы уверены, что хотите удалить Товар?'),
        )),
    );
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('product', 'Редактирование') . ' ' . Yii::t('product', 'Товара'); ?><br />
        <small>&laquo;<?php echo $model->id; ?>&raquo;</small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>