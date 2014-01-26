<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
	'type'=>'null',
	'collapse'=>false,
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>Yii::app()->user->isGuest),
				array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Register"), 'visible'=>Yii::app()->user->isGuest),
				array('url'=>Yii::app()->baseUrl.'/site/index', 'label'=>'Inicio', 'visible'=>!Yii::app()->user->isGuest),
				array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Profile"), 'visible'=>!Yii::app()->user->isGuest),
				array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),
            ),
        ),
    ),
)); ?>

<div class="container" id="page">

	<table>
		<tr>
			<td width="220px" style="vertical-align:top;">
				<?php 
				 $items = array(
				  array(
				    'name' => Yii::app()->getModule('user')->t("Login"),
				    'link' => Yii::app()->getModule('user')->loginUrl,
				    'icon' => 'text-width',
				    'active' => 'dashboard', 
				    'sub' => array(
				      array(
				        'name' => 'Gmail',
				        'link' => 'http://gmail.com',
				      ),
				      array(
				        'name' => 'Gmap',
				        'link' => 'http://maps.google.com/',
				      )
				    )
				  ),
				  array(
				    'name' => Yii::app()->getModule('user')->t("Register"),
				    'link' => Yii::app()->getModule('user')->registrationUrl,
				    'icon' => 'text-width',
				    'active' => 'dashboard', 
				    'sub' => array(
				      array(
				        'name' => 'Gmail',
				        'link' => 'http://gmail.com',
				      ),
				      array(
				        'name' => 'Gmap',
				        'link' => 'http://maps.google.com/',
				      )
				    )
				  ),
				);

				$this->widget('ext.menu.EMenu', array('items' => $items)); 
				?>
			</td>
			<td>
				<?php if(isset($this->breadcrumbs)):?>
				<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
					'links'=>$this->breadcrumbs,
				)); ?><!-- breadcrumbs -->
			<?php endif?>

			<?php echo $content; ?>

			<div class="clear"></div>

			<div id="footer">
				Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
				All Rights Reserved.<br/>
				<?php echo Yii::powered(); ?>
			</div><!-- footer -->
			</td>
		</tr>
	</table>

</div><!-- page -->

</body>
</html>
