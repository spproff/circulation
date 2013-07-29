<div class='container-fluid'>

	<div class='row'>
		
		<div class='span6'>
		
			<?php
			$form = $this->beginWidget(
			    'bootstrap.widgets.TbActiveForm', array(
			        'id'                     => 'product-form',
			        'enableAjaxValidation'   => false,
			        'enableClientValidation' => true,
			        'type'                   => 'vertical',
			        'htmlOptions'            => array('class' => 'well', 'enctype' => 'multipart/form-data'),
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
			        <?php echo $form->textFieldRow($model, 'label', array('class' => 'span12 popover-help', 'size' => 60, 'maxlength' => 255, 'data-original-title' => $model->getAttributeLabel('label'), 'data-content' => $model->getAttributeDescription('label'))); ?>
			    </div>
			    
			    <div class="row-fluid control-group ">
				    <?php echo $form->labelEx($model, 'tags', array('class'=>'control-label')); ?>
				    <?php $this->widget('application.modules.tag.widgets.TagFormWidget', array(
				    			'model' => $model,
				    			'attribute' => 'tags',
				    		));
				    ?>
				    <?php echo $form->error($model, 'work_types'); ?>
				</div>
				
			    <div class="row-fluid control-group">
			    	<div class='span4'>
			    		<?php echo $form->textFieldRow($model, 'url', array('class' => 'span12 popover-help', 'data-original-title' => $model->getAttributeLabel('url'), 'data-content' => $model->getAttributeDescription('url'))); ?>
			    	</div>
			    	<div class='span1'>
			    		<label for="">&nbsp;</label>
			    		<?php $this->widget('application.modules.product.widgets.ParseButtonWidget', array('model' => $model,));?>
			    	</div>
			    	<div class='span1'>
			    	</div>
			    	<div class='span3'>
						<?php echo $form->textFieldRow($model, 'article', array('class' => 'span12 popover-help', 'data-original-title' => $model->getAttributeLabel('article'), 'data-content' => $model->getAttributeDescription('article'))); ?>						
					</div>
					<div class='span3'>
						<?php echo $form->dropDownListRow($model, 'unit', CHtml::listData(Unit::model()->findAll(),'id', 'label'), array('class' => 'span12 popover-help', 'data-original-title' => $model->getAttributeLabel('unit'), 'data-content' => $model->getAttributeDescription('unit'))); ?>
					</div>
			    </div>
			    
				<div class="row-fluid control-group <?php echo $model->hasErrors('description') ? 'error' : ''; ?>">
				 	
				 	<div class='span4'>
				 	
				 		<?php echo $form->textFieldRow($model, 'price', array('class' => 'span12 popover-help', 'data-original-title' => $model->getAttributeLabel('price'), 'data-content' => $model->getAttributeDescription('price'))); ?>
				 		
				 		<?php echo $form->textFieldRow($model, 'weight', array('class' => 'span12 popover-help', 'data-original-title' => $model->getAttributeLabel('weight'), 'data-content' => $model->getAttributeDescription('weight'))); ?>
						<?php echo $form->checkBoxRow($model, 'active', array('class' => 'popover-help', 'data-original-title' => $model->getAttributeLabel('active'), 'data-content' => $model->getAttributeDescription('active'))); ?>
						<?php echo $form->checkBoxRow($model, 'booking', array('class' => 'popover-help', 'data-original-title' => $model->getAttributeLabel('booking'), 'data-content' => $model->getAttributeDescription('booking'))); ?>
						
					</div>
					
					<div class='span8'>
			        	<?php echo $form->textAreaRow($model, 'description', array('class' => 'span12 popover-help', 'rows' => 7, 'cols' => 50, 'data-original-title' => $model->getAttributeLabel('description'), 'data-content' => $model->getAttributeDescription('description'))); ?>
			        </div>
			        
			    </div>
				
				<div id="images-gallery" class="row-fluid control-group">
			    	<?php $this->widget('application.modules.product.widgets.ImagesPreviewsWidget', array('article' => $model->article));?>
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
		</div>
		
		<div class='span6'>
			
			<?php if (isset($model->id)):?>
			
			<div class='collapsed-form'>
			<?php
			    $this->widget('application.modules.circulation.widgets.IncomeFormWidget',array('product_id' => $model->id)); 
			?>
			</div>
			
			<?php
			    $this->widget('application.modules.circulation.widgets.IncomeTableWidget',array('product_id' => $model->id)); 
			?>
			<hr/>
			<div class='collapsed-form'>
			<?php
			    $this->widget('application.modules.circulation.widgets.OutcomeFormWidget',array('product_id' => $model->id)); 
			?>
			</div>
			
			<?php
			    $this->widget('application.modules.circulation.widgets.OutcomeTableWidget',array('product_id' => $model->id)); 
			?>
			
			<?php
			    $this->widget('application.modules.circulation.widgets.BalanceWidget',array('product_id' => $model->id)); 
			?>
			
			<?php 
			Yii::app()->getClientScript()->registerScript(__CLASS__,'
		    	$(function(){
		    		$(".collapsed-form").each(function(){
		    			var $self = $(this);
		    			$self.find(".collapsed-form-header").click(function(){
		    				$self.find(".collapsed-form-body").slideToggle();
		    			});
		    		});	
		    	});'
	    	);
	    	?>
			
			<?php endif;?>
		
		</div>
		
	</div>
	
</div>