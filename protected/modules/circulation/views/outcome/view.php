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
        Yii::t('circulation', 'Расходы') => array('/circulation/outcome/index'),
        $model->id,
    );

    $this->pageTitle = Yii::t('circulation', 'Расходы - просмотр');

    $this->menu = array(
        array('icon' => 'list-alt', 'label' => Yii::t('circulation', 'Управление Расходами'), 'url' => array('/circulation/outcome/index')),
        array('icon' => 'plus-sign', 'label' => Yii::t('circulation', 'Добавить Расход'), 'url' => array('/circulation/outcome/create')),
        array('label' => Yii::t('circulation', 'Расход') . ' «' . mb_substr($model->id, 0, 32) . '»'),
        array('icon' => 'pencil', 'label' => Yii::t('circulation', 'Редактирование Расхода'), 'url' => array(
            '/circulation/outcome/update',
            'id' => $model->id
        )),
        array('icon' => 'eye-open', 'label' => Yii::t('circulation', 'Просмотреть Расход'), 'url' => array(
            '/circulation/outcome/view',
            'id' => $model->id
        )),
        array('icon' => 'trash', 'label' => Yii::t('circulation', 'Удалить Расход'), 'url' => '#', 'linkOptions' => array(
            'submit' => array('/circulation/outcome/delete', 'id' => $model->id),
            'confirm' => Yii::t('circulation', 'Вы уверены, что хотите удалить Расход?'),
        )),
    );
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('circulation', 'Просмотр') . ' ' . Yii::t('circulation', 'Расхода'); ?><br />
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
        'client',
    ),
)); ?>
