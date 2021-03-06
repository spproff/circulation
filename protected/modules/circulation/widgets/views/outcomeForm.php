<h4 class='collapsed-form-header'>Форма расхода</h4>

<div class='collapsed-form-body'>
<?php
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', array(
        'id'                     => 'product-form',
        'enableAjaxValidation'   => false,
        'enableClientValidation' => true,
        'type'                   => 'vertical',
        'htmlOptions'            => array('class' => 'well', 'enctype' => 'multipart/form-data'),
        'inlineErrors'           => true,
		'action'				 => '/circulation/outcome/create/'
    )
);
?>
    <?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model, 'product_id', array('value'=>$this->product_id)); ?>

    <div class="row-fluid control-group <?php echo $model->hasErrors('amount') ? 'error' : ''; ?>">
        <?php echo $form->textFieldRow($model, 'amount', array('class' => 'span12 popover-help', 'size' => 60, 'maxlength' => 255, 'data-original-title' => $model->getAttributeLabel('amount'), 'data-content' => $model->getAttributeDescription('amount'), 'value' =>1)); ?>
    </div>
    <div class="row-fluid control-group <?php echo $model->hasErrors('price') ? 'error' : ''; ?>">
        <?php echo $form->textFieldRow($model, 'price', array('class' => 'span12 popover-help', 'data-original-title' => $model->getAttributeLabel('price'), 'data-content' => $model->getAttributeDescription('price'))); ?>
    </div>
    
    <div class="row-fluid control-group <?php echo $model->hasErrors('client') ? 'error' : ''; ?>">
        <?php echo $form->textFieldRow($model, 'client', array('class' => 'span12 popover-help', 'data-original-title' => $model->getAttributeLabel('client'), 'data-content' => $model->getAttributeDescription('client'))); ?>
    </div>
    
	<div class="row-fluid control-group <?php echo $model->hasErrors('comment') ? 'error' : ''; ?>">
        <?php echo $form->textAreaRow($model, 'comment', array('class' => 'span12 popover-help', 'rows' => 6, 'cols' => 50, 'data-original-title' => $model->getAttributeLabel('comment'), 'data-content' => $model->getAttributeDescription('comment'))); ?>
    </div>
    
    <?php
    $this->widget(
        'bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type'       => 'primary',
            'label'      => Yii::t('product', 'Сохранить'),
        )
    ); ?>

<?php $this->endWidget(); ?>
</div>