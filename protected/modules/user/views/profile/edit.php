<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
	UserModule::t("Profile")=>array('profile'),
	UserModule::t("Edit"),
);
$this->menu=array(
	((UserModule::isAdmin())
		?array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'))
		:array('label'=>'')),
    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
    array('label'=>UserModule::t('Profile'), 'url'=>array('/user/profile')),
    array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword')),
    array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
);
?><h1><?php echo UserModule::t('Edit profile'); ?></h1>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'profile-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

		<?php echo $form->errorSummary(array($model,$profile)); ?>

	<div class="row-fluid">
		<div class="span6">
			<div class="portlet">
				<div class="portlet-decoration">
					<div class="portlet-title">Datos pesonales</div>
				</div>
				<div class="portlet-content">
					<div class="row">
						<?php echo $form->labelEx($profile,'titulo_perfil'); ?>
						<?php echo $form->textField($profile,'titulo_perfil',array('size'=>60,'maxlength'=>128)); ?>
						<?php echo $form->error($profile,'titulo_perfil'); ?>
					</div>
					<div class="row">
						<?php echo $form->labelEx($model,'email'); ?>
						<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
						<?php echo $form->error($model,'email'); ?>
					</div>
				</div>
			</div>
			<div class="row buttons">
				<?php $this->widget('bootstrap.widgets.TbButton', array(
				    'type'=>'primary',
				    'label'=>$model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save'),
				    'block'=>false,
				    'buttonType'=>'submit'
				)); ?>
			</div>
		</div>
		<div class="span6">
			<div class="portlet">
				<div class="portlet-decoration">
					<div class="portlet-title">Datos académicos</div>
				</div>
				<div class="portlet-content">
			 
					<div class="row">
						<?php echo $form->labelEx($model,'email'); ?>
						<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
						<?php echo $form->error($model,'email'); ?>
					</div>
					<div class="row">
						<?php echo $form->labelEx($model,'email'); ?>
						<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
						<?php echo $form->error($model,'email'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span6">
		</div>
		<div class="span6">
			<div class="portlet">
				<div class="portlet-decoration">
					<div class="portlet-title">Datos profesionales</div>
				</div>
				<div class="portlet-content">
			
					<div class="row">
						<?php echo $form->labelEx($model,'email'); ?>
						<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
						<?php echo $form->error($model,'email'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php 
			//$profileFields=$profile->getFields();
			$profileFields=''; // Para no mostrar nada de forma automática
			if ($profileFields) {
				foreach($profileFields as $field) {
				?>
		<div class="row">
			<?php echo $form->labelEx($profile,$field->varname);
			
			if ($widgetEdit = $field->widgetEdit($profile)) {
				echo $widgetEdit;
			} elseif ($field->range) {
				echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
			} elseif ($field->field_type=="TEXT") {
				echo $form->textArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
			} else {
				echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
			}
			echo $form->error($profile,$field->varname); ?>
		</div>	
				<?php
				}
			}
	?>	

<?php $this->endWidget(); ?>

</div><!-- form -->
