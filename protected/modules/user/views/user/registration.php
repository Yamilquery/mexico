<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Registration");
$this->breadcrumbs=array(
	UserModule::t("Registration"),
);
?>

<div class="page-header">
	<h1><?php echo UserModule::t("Registration"); ?> <small>de cuenta</small></h1>
</div>

<?php if(Yii::app()->user->hasFlash('registration')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('registration'); ?>
</div>
<?php else: ?>

<div class="form" style="margin-left:10px;">
<?php $form=$this->beginWidget('UActiveForm', array(
	'id'=>'registration-form',
	'enableAjaxValidation'=>true,
	'disableAjaxValidationAttributes'=>array('RegistrationForm_verifyCode'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
	
	<?php echo $form->errorSummary(array($model,$profile)); ?>
	
	<div class="fila">
	<?php echo $form->labelEx($model,'username'); ?>
	<div class="input-prepend"><span class="add-on"><i class="icon icon-user"></i></span>
	<?php echo $form->textField($model,'username'); ?>
	</div>
	<?php echo $form->error($model,'username'); ?>
	</div>
	
	<div class="fila">
	<?php echo $form->labelEx($model,'password'); ?>
	<div class="input-prepend"><span class="add-on"><i class="icon icon-eye-open"></i></span>
	<?php echo $form->passwordField($model,'password'); ?>
	</div>
	<?php echo $form->error($model,'password'); ?>
	<p class="hint">
	<?php echo UserModule::t("Minimal password length 4 symbols."); ?>
	</p>
	</div>
	
	<div class="fila">
	<?php echo $form->labelEx($model,'verifyPassword'); ?>
	<div class="input-prepend"><span class="add-on"><i class="icon icon-eye-open"></i></span>
	<?php echo $form->passwordField($model,'verifyPassword'); ?>
	</div>
	<?php echo $form->error($model,'verifyPassword'); ?>
	</div>
	
	<div class="fila">
	<?php echo $form->labelEx($model,'email'); ?>
	<div class="input-prepend"><span class="add-on"><i class="icon icon-envelope"></i></span>
	<?php echo $form->textField($model,'email',array('placeholder'=>'usuario@dominio.com')); ?>
	</div>
	<?php echo $form->error($model,'email'); ?>
	</div>
	
<?php 
		$profileFields=$profile->getFields();
		$profileFields=''; // Para no mostrar nada de forma automática
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
	<div class="fila">
		<?php echo $form->labelEx($profile,$field->varname); ?>
		<?php 
		if ($widgetEdit = $field->widgetEdit($profile)) {
			echo $widgetEdit;
		} elseif ($field->range) {
			echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo$form->textArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
		 ?>
		<?php echo $form->error($profile,$field->varname); ?>
	</div>	
			<?php
			}
		}
?>
	<?php if (UserModule::doCaptcha('registration')): ?>
	<div class="fila">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode',array('style'=>'width:100px;')); ?>
		<?php echo $form->error($model,'verifyCode'); ?>
		
		<p class="hint"><?php echo UserModule::t("Please enter the letters as they are shown in the image above."); ?>
		<br/><?php echo UserModule::t("Letters are not case-sensitive."); ?></p>
	</div>
	<?php endif; ?>
	
	<div class="fila submit">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			    'label'=>UserModule::t("Register"),
			    'type'=>'warning', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			    'buttonType'=>'submit',
			    'size'=>'large', // null, 'large', 'small' or 'mini'
			)); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<?php endif; ?>