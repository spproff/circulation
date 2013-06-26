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
        'id'                     => 'product-form',
        'enableAjaxValidation'   => false,
        'enableClientValidation' => true,
        'type'                   => 'vertical',
        'htmlOptions'            => array('class' => 'well'),
        'inlineErrors'           => true,
    )
);
?>

    <div class="alert alert-info">
        <?php echo Yii::t('product', 'Поля, отмеченные'); ?>
        <span class="required">*</span>
        <?php echo Yii::t('product', 'обязательны.'); ?>
    </div>

    <?php echo $form->errorSummary($model); ?>

    <div class="row-fluid control-group <?php echo $model->hasErrors('label') ? 'error' : ''; ?>">
        <?php echo $form->textFieldRow($model, 'label', array('class' => 'span3 popover-help', 'size' => 60, 'maxlength' => 255, 'data-original-title' => $model->getAttributeLabel('label'), 'data-content' => $model->getAttributeDescription('label'))); ?>
    </div>
    <div class="row-fluid control-group <?php echo $model->hasErrors('description') ? 'error' : ''; ?>">
        <?php echo $form->textAreaRow($model, 'description', array('class' => 'span5 popover-help', 'rows' => 6, 'cols' => 50, 'data-original-title' => $model->getAttributeLabel('description'), 'data-content' => $model->getAttributeDescription('description'))); ?>
    </div>
    <div class="row-fluid control-group <?php echo $model->hasErrors('images') ? 'error' : ''; ?>">
        <?php echo $form->textAreaRow($model, 'images', array('class' => 'span5 popover-help', 'rows' => 6, 'cols' => 50, 'data-original-title' => $model->getAttributeLabel('images'), 'data-content' => $model->getAttributeDescription('images'))); ?>
    </div>
    <div class="row-fluid control-group <?php echo $model->hasErrors('supplier_id') ? 'error' : ''; ?>">
        <?php echo $form->textFieldRow($model, 'supplier_id', array('class' => 'span3 popover-help', 'size' => 60, 'maxlength' => 60, 'data-original-title' => $model->getAttributeLabel('supplier_id'), 'data-content' => $model->getAttributeDescription('supplier_id'))); ?>
    </div>
    <div class="row-fluid control-group <?php echo $model->hasErrors('unit') ? 'error' : ''; ?>">
        <?php echo $form->textFieldRow($model, 'unit', array('class' => 'span3 popover-help', 'size' => 60, 'maxlength' => 60, 'data-original-title' => $model->getAttributeLabel('unit'), 'data-content' => $model->getAttributeDescription('unit'))); ?>
    </div>
    <div class="row-fluid control-group <?php echo $model->hasErrors('url') ? 'error' : ''; ?>">
        <?php echo $form->textAreaRow($model, 'url', array('class' => 'span5 popover-help', 'rows' => 6, 'cols' => 50, 'data-original-title' => $model->getAttributeLabel('url'), 'data-content' => $model->getAttributeDescription('url'))); ?>
    </div>

    <?php
    $this->widget(
        'bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type'       => 'primary',
            'label'      => Yii::t('product', 'Сохранить Товар и закрыть'),
        )
    ); ?>
    <?php
    $this->widget(
        'bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'htmlOptions'=> array('name' => 'submit-type', 'value' => 'index'),
            'label'      => Yii::t('product', 'Сохранить Товар и продолжить'),
        )
    ); ?>

<?php $this->endWidget(); ?>