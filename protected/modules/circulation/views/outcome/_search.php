<?php
/**
 * Отображение для _search:
 *
 *   @category YupeView
 *   @package  YupeCMS
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 **/
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', array(
        'action'      => Yii::app()->createUrl($this->route),
        'method'      => 'get',
        'type'        => 'vertical',
        'htmlOptions' => array('class' => 'well'),
    )
);
?>

    <fieldset class="inline">
        <div class="row-fluid control-group">
            <div class="span2">
                <?php echo $form->textFieldRow($model, 'id', array('class' => 'span3 popover-help', 'size' => 60, 'maxlength' => 60, 'data-original-title' => $model->getAttributeLabel('id'), 'data-content' => $model->getAttributeDescription('id'))); ?>
            </div>
            <div class="span2">
                <?php echo $form->textFieldRow($model, 'date', array('class' => 'span3 popover-help', 'size' => 60, 'maxlength' => 60, 'data-original-title' => $model->getAttributeLabel('date'), 'data-content' => $model->getAttributeDescription('date'))); ?>
            </div>
            <div class="span2">
                <?php echo $form->textFieldRow($model, 'product_id', array('class' => 'span3 popover-help', 'size' => 60, 'maxlength' => 60, 'data-original-title' => $model->getAttributeLabel('product_id'), 'data-content' => $model->getAttributeDescription('product_id'))); ?>
            </div>
            <div class="span2">
                <?php echo $form->textFieldRow($model, 'amount', array('class' => 'span3 popover-help', 'size' => 60, 'maxlength' => 60, 'data-original-title' => $model->getAttributeLabel('amount'), 'data-content' => $model->getAttributeDescription('amount'))); ?>
            </div>
            <div class="span2">
                <?php echo $form->textFieldRow($model, 'price', array('class' => 'span3 popover-help', 'size' => 60, 'maxlength' => 60, 'data-original-title' => $model->getAttributeLabel('price'), 'data-content' => $model->getAttributeDescription('price'))); ?>
            </div>
            <div class="span2">
                <?php echo $form->textAreaRow($model, 'client', array('class' => 'span5 popover-help', 'rows' => 6, 'cols' => 50, 'data-original-title' => $model->getAttributeLabel('client'), 'data-content' => $model->getAttributeDescription('client'))); ?>
            </div>
        </div>
    </fieldset>

    <?php
    $this->widget(
        'bootstrap.widgets.TbButton', array(
            'type'        => 'primary',
            'encodeLabel' => false,
            'buttonType'  => 'submit',
            'label'       => '<i class="icon-search icon-white">&nbsp;</i> ' . Yii::t('circulation', 'Искать Расход'),
        )
    ); ?>

<?php $this->endWidget(); ?>