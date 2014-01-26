<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
$this->breadcrumbs=array(
	UserModule::t("Login"),
);
?>

<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

<div class="success">
	<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
</div>

<?php endif; ?>
<!--
<div class="sidebar-nav">  
	<ul id="yw5">
    	<li class="active"><a href="/yiitheme/abound/index.php?r=site/index"><i class="icon icon-home"></i>  Dashboard <span class="label label-info pull-right">BETA</span></a></li>
    	<li><a href="http://www.webapplicationthemes.com/abound-yii-framework-theme/"><i class="icon icon-search"></i> About this theme <span class="label label-important pull-right">HOT</span></a></li>
    	<li><a href="#"><i class="icon icon-envelope"></i> Messages <span class="badge badge-success pull-right">12</span></a></li>
  	</ul>   
</div>

<table class="table table-striped table-bordered">
          <tbody>
            <tr>
              <td width="50%">Bandwith Usage</td>
              <td>
              	<div class="progress progress-danger">
                  <div class="bar" style="width: 80%"></div>
                </div>
              </td>
            </tr>
            <tr>
              <td>Disk Spage</td>
              <td>
             	<div class="progress progress-warning">
                  <div class="bar" style="width: 60%"></div>
                </div>
              </td>
            </tr>
            <tr>
              <td>Conversion Rate</td>
              <td>
             	<div class="progress progress-success">
                  <div class="bar" style="width: 40%"></div>
                </div>
              </td>
            </tr>
            <tr>
              <td>Closed Sales</td>
              <td>
              	<div class="progress progress-info">
                  <div class="bar" style="width: 20%"></div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
-->
<!-- <p><?php echo UserModule::t("Please fill out the following form with your login credentials:"); ?></p> -->
<div class="page-header">
	<h1>Acceso <small>a tu cuenta</small></h1>
</div>

<div class="form">
<?php echo CHtml::beginForm(); ?>
<table style="margin-left:10px;">
	<tr>
		<td><p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p></td>
	</tr>
	<tr>
		<td><?php echo CHtml::errorSummary($model); ?></td>
	</tr>
	<tr>
		<td>
			<?php echo CHtml::activeLabelEx($model,'username'); ?>
			<div class="input-prepend"><span class="add-on"><i class="icon icon-user"></i></span>
			<?php echo CHtml::activeTextField($model,'username',array('placeholder'=>'usuario@dominio.com')) ?>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo CHtml::activeLabelEx($model,'password'); ?>
			<div class="input-prepend"><span class="add-on"><i class="icon icon-eye-open"></i></span>
			<?php echo CHtml::activePasswordField($model,'password') ?>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<p class="hint">
			<?php echo CHtml::link(UserModule::t("Register"),Yii::app()->getModule('user')->registrationUrl); ?> | <?php echo CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl); ?>
			</p>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>
			<?php echo CHtml::activeLabelEx($model,'rememberMe'); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php $this->widget('bootstrap.widgets.TbButton', array(
			    'label'=>UserModule::t("Login"),
			    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			    'buttonType'=>'submit',
			    'size'=>'large', // null, 'large', 'small' or 'mini'
			)); ?>
		</td>
	</tr>
	<tr>
		<td style="padding-top:20px;">
			<legend style="font-size:1.3em;">Ó iniciar sesión con:</legend >
			<?php $this->widget('application.modules.hybridauth.widgets.renderProviders'); ?>
		</td>
	</tr>
</table>

<?php echo CHtml::endForm(); ?>
</div><!-- form -->

<?php
$form = new CForm(array(
    'elements'=>array(
        'username'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'password'=>array(
            'type'=>'password',
            'maxlength'=>32,
        ),
        'rememberMe'=>array(
            'type'=>'checkbox',
        )
    ),

    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Login',
        ),
    ),
), $model);
?>