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
        Yii::app()->getModule('circulation')->getCategory() => array(),
        Yii::t('circulation', 'Приходы') => array('/circulation/income/index'),
        $model->id,
    );

    $this->pageTitle = Yii::t('circulation', 'Приходы - просмотр');

    $this->menu = array(
        array('icon' => 'list-alt', 'label' => Yii::t('circulation', 'Управление Приходами'), 'url' => array('/circulation/income/index')),
        array('icon' => 'plus-sign', 'label' => Yii::t('circulation', 'Добавить Приход'), 'url' => array('/circulation/income/create')),
        array('label' => Yii::t('circulation', 'Приход') . ' «' . mb_substr($model->id, 0, 32) . '»'),
        array('icon' => 'pencil', 'label' => Yii::t('circulation', 'Редактирование Прихода'), 'url' => array(
            '/circulation/income/update',
            'id' => $model->id
        )),
        array('icon' => 'eye-open', 'label' => Yii::t('circulation', 'Просмотреть Приход'), 'url' => array(
            '/circulation/income/view',
            'id' => $model->id
        )),
        array('icon' => 'trash', 'label' => Yii::t('circulation', 'Удалить Приход'), 'url' => '#', 'linkOptions' => array(
            'submit' => array('/circulation/income/delete', 'id' => $model->id),
            'confirm' => Yii::t('circulation', 'Вы уверены, что хотите удалить Приход?'),
        )),
    );
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('circulation', 'Просмотр') . ' ' . Yii::t('circulation', 'Прихода'); ?><br />
        <small>&laquo;<?php echo $model->id; ?>&raquo;</small>
    </h1>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'data'       => $model,
    'attributes' => array(
        'id',
        'date',
        'product_id',
        'amount',
        'price',
        'supplier_id',
    ),
)); ?>
