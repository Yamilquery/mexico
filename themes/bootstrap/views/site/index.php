<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<?php
$ha = Yii::app()->getModule('hybridauth')->getHybridAuth();
$facebook = $ha->getAdapter('facebook');
//$facebook->setUserStatus('El mirri!');
echo $facebook->getUserProfile()->displayName;
?>
<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array('Library'=>'#', 'Data'),
)); ?>