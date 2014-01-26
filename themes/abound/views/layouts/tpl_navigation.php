<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
     
          <!-- Be sure to leave the brand out there if you want it shown -->
          <a class="brand" href="#">Bolsa de Trabajo <small>v1.0</small></a>
          
          <div class="nav-collapse">
			<?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'pull-right nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
                        array('label'=>'<span class="add-on"><i class="icon icon-home"></i></span> Inicio', 'url'=>array('/site/index'), 'visible'=>!Yii::app()->user->isGuest),
                        array('label'=>'<span class="add-on"><i class="icon icon-search"></i></span> Búsqueda avanzada', 'url'=>array('/site/busqueda'), 'visible'=>!Yii::app()->user->isGuest),
                        //array('label'=>'Candidatos', 'url'=>array('/site/page', 'view'=>'graphs')),
                        //array('label'=>'Empresas', 'url'=>array('/site/page', 'view'=>'forms')),
                        array('label'=>'Candidatos <span class="caret"></span>', 'visible'=>Yii::app()->user->isGuest, 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('label'=>'Registro <span class="badge badge-warning pull-right">¡Gratis!</span>', 'url'=>array('/user/registration')),
                            array('label'=>'Recuperar datos de cuenta', 'url'=>array('/user/recovery')),
                            array('label'=>'Búsqueda de empleo avanzada', 'url'=>array('/user/profile/edit')),
                        )),
                        array('label'=>'Empresas <span class="caret"></span>', 'visible'=>Yii::app()->user->isGuest, 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('label'=>'Registro <span class="badge badge-warning pull-right">¡Gratis!</span>', 'url'=>array('/user/registration')),
                        )),
                        array('label'=>'<span class="add-on"><i class="icon icon-question-sign"></i></span> Ayuda', 'visible'=>!Yii::app()->user->isGuest, 'url'=>array('/site/ayuda')),
                        /*array('label'=>'Gii generated', 'url'=>array('customer/index')),*/
                        array('label'=>'<span class="add-on"><i class="icon icon-user"></i></span> Mi cuenta <span class="caret"></span>', 'visible'=>!Yii::app()->user->isGuest, 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('label'=>'Mensajes <span class="badge badge-warning pull-right">12</span>', 'url'=>'#'),
							array('label'=>'Editar Perfil', 'url'=>array('/user/profile/edit')),
                            array('label'=>'Editar Curriculum', 'url'=>array('/user/profile/edit')),
                            array('label'=>'Cambiar Contraseña', 'url'=>array('/user/profile/changepassword')),
                            array('label'=>'<span class="add-on"><i class="icon icon-off"></i></span> Salir <span class="badge badge-info pull-right">'.Yii::app()->user->name.'</span>', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                        )),
                        array('label'=>'<span class="add-on"><i class="icon icon-user"></i></span> Acceso', 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest),
                    ),
                )); ?>
    	</div>
    </div>
	</div>
</div>

<div class="subnav navbar navbar-fixed-top">
    <div class="navbar-inner">
    	<div class="container">
        
        	<div class="style-switcher pull-left">
                <a href="javascript:chooseStyle('none', 60)" checked="checked"><span class="style" style="background-color:#0088CC;"></span></a>
                <a href="javascript:chooseStyle('style2', 60)"><span class="style" style="background-color:#7c5706;"></span></a>
                <a href="javascript:chooseStyle('style3', 60)"><span class="style" style="background-color:#468847;"></span></a>
                <a href="javascript:chooseStyle('style4', 60)"><span class="style" style="background-color:#4e4e4e;"></span></a>
                <a href="javascript:chooseStyle('style5', 60)"><span class="style" style="background-color:#d85515;"></span></a>
                <a href="javascript:chooseStyle('style6', 60)"><span class="style" style="background-color:#a00a69;"></span></a>
                <a href="javascript:chooseStyle('style7', 60)"><span class="style" style="background-color:#a30c22;"></span></a>
          	</div>
           <form class="navbar-search pull-right" action="">
           	 
           <input type="text" class="search-query span2" placeholder="Buscar ofertas">
           
           </form>
    	</div><!-- container -->
    </div><!-- navbar-inner -->
</div><!-- subnav -->