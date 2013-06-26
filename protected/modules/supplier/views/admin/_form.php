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
        'id'                     => 'supplier-form',
        'enableAjaxValidation'   => false,
        'enableClientValidation' => true,
        'type'                   => 'vertical',
        'htmlOptions'            => array('class' => 'well'),
        'inlineErrors'           => true,
    )
);
?>

    <div class="alert alert-info">
        <?php echo Yii::t('supplier', 'Поля, отмеченные'); ?>
        <span class="required">*</span>
        <?php echo Yii::t('supplier', 'обязательны.'); ?>
    </div>

    <?php echo $form->errorSummary($model); ?>

    <div class="row-fluid control-group <?php echo $model->hasErrors('label') ? 'error' : ''; ?>">
        <?php echo $form->textFieldRow($model, 'label', array('class' => 'span3 popover-help', 'size' => 60, 'maxlength' => 255, 'data-original-title' => $model->getAttributeLabel('label'), 'data-content' => $model->getAttributeDescription('label'))); ?>
    </div>
    <div class="row-fluid control-group <?php echo $model->hasErrors('description') ? 'error' : ''; ?>">
        <?php echo $form->textAreaRow($model, 'description', array('class' => 'span5 popover-help', 'rows' => 6, 'cols' => 50, 'data-original-title' => $model->getAttributeLabel('description'), 'data-content' => $model->getAttributeDescription('description'))); ?>
    </div>
    <div class="row-fluid control-group <?php echo $model->hasErrors('phone') ? 'error' : ''; ?>">
        <?php echo $form->textFieldRow($model, 'phone', array('class' => 'span3 popover-help', 'size' => 60, 'maxlength' => 30, 'data-original-title' => $model->getAttributeLabel('phone'), 'data-content' => $model->getAttributeDescription('phone'))); ?>
    </div>
    <div class="row-fluid control-group <?php echo $model->hasErrors('email') ? 'error' : ''; ?>">
        <?php echo $form->textFieldRow($model, 'email', array('class' => 'span3 popover-help', 'size' => 60, 'maxlength' => 50, 'data-original-title' => $model->getAttributeLabel('email'), 'data-content' => $model->getAttributeDescription('email'))); ?>
    </div>
	<div class="row-fluid control-group <?php echo $model->hasErrors('url') ? 'error' : ''; ?>">
        <?php echo $form->textFieldRow($model, 'url', array('class' => 'span3 popover-help', 'size' => 60, 'maxlength' => 50, 'data-original-title' => $model->getAttributeLabel('url'), 'data-content' => $model->getAttributeDescription('url'))); ?>
    </div>
    <div class="row-fluid control-group <?php echo $model->hasErrors('address') ? 'error' : ''; ?>">
        <?php echo $form->textAreaRow($model, 'address', array('class' => 'span5 popover-help', 'rows' => 6, 'cols' => 50, 'data-original-title' => $model->getAttributeLabel('address'), 'data-content' => $model->getAttributeDescription('address'))); ?>
    </div>

    <?php
    $this->widget(
        'bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type'       => 'primary',
            'label'      => Yii::t('supplier', 'Сохранить Поставщика и закрыть'),
        )
    ); ?>
    <?php
    $this->widget(
        'bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'htmlOptions'=> array('name' => 'submit-type', 'value' => 'index'),
            'label'      => Yii::t('supplier', 'Сохранить Поставщика и продолжить'),
        )
    ); ?>

<?php $this->endWidget(); ?>