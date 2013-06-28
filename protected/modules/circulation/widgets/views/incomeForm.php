<h4>Форма прихода</h4><?php$form = $this->beginWidget(    'bootstrap.widgets.TbActiveForm', array(        'id'                     => 'product-form',        'enableAjaxValidation'   => false,        'enableClientValidation' => true,        'type'                   => 'vertical',        'htmlOptions'            => array('class' => 'well', 'enctype' => 'multipart/form-data'),        'inlineErrors'           => true,    ));?>    <?php echo $form->errorSummary($model); ?>    <div class="row-fluid control-group <?php echo $model->hasErrors('amount') ? 'error' : ''; ?>">        <?php echo $form->textFieldRow($model, 'amount', array('class' => 'span12 popover-help', 'size' => 60, 'maxlength' => 255, 'data-original-title' => $model->getAttributeLabel('amount'), 'data-content' => $model->getAttributeDescription('amount'))); ?>    </div>    <div class="row-fluid control-group <?php echo $model->hasErrors('supplier_id') ? 'error' : ''; ?>">        <?php echo $form->dropDownListRow($model, 'supplier_id', CHtml::listData(Supplier::model()->findAll(),'id', 'label'), array('class' => 'span12 popover-help', 'data-original-title' => $model->getAttributeLabel('supplier_id'), 'data-content' => $model->getAttributeDescription('supplier_id'))); ?>    </div>    <div class="row-fluid control-group <?php echo $model->hasErrors('price') ? 'error' : ''; ?>">        <?php echo $form->textFieldRow($model, 'price', array('class' => 'span12 popover-help', 'data-original-title' => $model->getAttributeLabel('price'), 'data-content' => $model->getAttributeDescription('price'))); ?>    </div>	<div class="row-fluid control-group <?php echo $model->hasErrors('comment') ? 'error' : ''; ?>">        <?php echo $form->textAreaRow($model, 'comment', array('class' => 'span12 popover-help', 'rows' => 6, 'cols' => 50, 'data-original-title' => $model->getAttributeLabel('comment'), 'data-content' => $model->getAttributeDescription('comment'))); ?>    </div>        <?php    $this->widget(        'bootstrap.widgets.TbButton', array(            'buttonType' => 'submit',            'type'       => 'primary',            'label'      => Yii::t('product', 'Сохранить'),        )    ); ?><?php $this->endWidget(); ?>