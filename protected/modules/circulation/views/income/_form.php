<?php
/**
 * Отображение для _form:
 *
 *   @category YupeView
 *   @package  YupeCMS
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 **/
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', array(
        'id'                     => 'income-form',
        'enableAjaxValidation'   => false,
        'enableClientValidation' => true,
        'type'                   => 'vertical',
        'htmlOptions'            => array('class' => 'well'),
        'inlineErrors'           => true,
    )
);
?>

    <div class="alert alert-info">
        <?php echo Yii::t('circulation', 'Поля, отмеченные'); ?>
        <span class="required">*</span>
        <?php echo Yii::t('circulation', 'обязательны.'); ?>
    </div>

    <?php echo $form->errorSummary($model); ?>

    <div class="row-fluid control-group <?php echo $model->hasErrors('date') ? 'error' : ''; ?>">
        <?php echo $form->textFieldRow($model, 'date', array('class' => 'span3 popover-help', 'size' => 60, 'maxlength' => 60, 'data-original-title' => $model->getAttributeLabel('date'), 'data-content' => $model->getAttributeDescription('date'))); ?>
    </div>
    <div class="row-fluid control-group <?php echo $model->hasErrors('product_id') ? 'error' : ''; ?>">
        <?php echo $form->textFieldRow($model, 'product_id', array('class' => 'span3 popover-help', 'size' => 60, 'maxlength' => 60, 'data-original-title' => $model->getAttributeLabel('product_id'), 'data-content' => $model->getAttributeDescription('product_id'))); ?>
    </div>
    <div class="row-fluid control-group <?php echo $model->hasErrors('amount') ? 'error' : ''; ?>">
        <?php echo $form->textFieldRow($model, 'amount', array('class' => 'span3 popover-help', 'size' => 60, 'maxlength' => 60, 'data-original-title' => $model->getAttributeLabel('amount'), 'data-content' => $model->getAttributeDescription('amount'))); ?>
    </div>
    <div class="row-fluid control-group <?php echo $model->hasErrors('price') ? 'error' : ''; ?>">
        <?php echo $form->textFieldRow($model, 'price', array('class' => 'span3 popover-help', 'size' => 60, 'maxlength' => 60, 'data-original-title' => $model->getAttributeLabel('price'), 'data-content' => $model->getAttributeDescription('price'))); ?>
    </div>
    <div class="row-fluid control-group <?php echo $model->hasErrors('supplier_id') ? 'error' : ''; ?>">
        <?php echo $form->textFieldRow($model, 'supplier_id', array('class' => 'span3 popover-help', 'size' => 60, 'maxlength' => 60, 'data-original-title' => $model->getAttributeLabel('supplier_id'), 'data-content' => $model->getAttributeDescription('supplier_id'))); ?>
    </div>

    <?php
    $this->widget(
        'bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type'       => 'primary',
            'label'      => Yii::t('circulation', 'Сохранить Приход и закрыть'),
        )
    ); ?>
    <?php
    $this->widget(
        'bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'htmlOptions'=> array('name' => 'submit-type', 'value' => 'index'),
            'label'      => Yii::t('circulation', 'Сохранить Приход и продолжить'),
        )
    ); ?>

<?php $this->endWidget(); ?>