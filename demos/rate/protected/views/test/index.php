<?php
/* @var $this TestController */

$this->breadcrumbs=array(
	'Test',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php
$this->widget('zii.widgets.CMenu', array(
'items'=>array(
// Important: you need to specify url as 'controller/action',
// not just as 'controller' even if default acion is used.
array('label'=>'Home', 'url'=>array('site/index')),
// 'Products' menu item will be selected no matter which tag parameter value is since it's not specified.
array('label'=>'Products', 'url'=>array('product/index'), 'items'=>array(
array('label'=>'New Arrivals', 'url'=>array('product/new', 'tag'=>'new')),
array('label'=>'Most Popular', 'url'=>array('product/index', 'tag'=>'popular')),
)),
//array('label'=>'Login', 'url'=>array('site/login'), 'visible'=>Yii::app()->user->isGuest),
),
));


$this->widget('zii.widgets.jui.CJuiAccordion', array(
    'panels'=>array(
        'panel 1'=>'content for panel 1',
        'panel 2'=>'content for panel 2',
        'panel 3'=>'content for panel 2',
        'panel 4'=>'content for panel 2',
        // panel 3 contains the content rendered by a partial view
//        'panel 3'=>$this->renderPartial('_partial',null,true),
    ),
    // additional javascript options for the accordion plugin
    'options'=>array(
        'animated'=>'bounceslide',
    ),
));

$this->widget('zii.widgets.jui.CJuiSelectable', array(
    'items'=>array(
        'id1'=>'Item 1',
        'id2'=>'Item 2',
        'id3'=>'Item 3',
    ),
    // additional javascript options for the selectable plugin
    'options'=>array(
        'delay'=>'300',
    ),
));

$ajaxUrl = '#';
$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>array(
        'StaticTab 1'=>'Content for tab 1',
        'StaticTab 2'=>array('content'=>'Content for tab 2', 'id'=>'tab2'),
        // panel 3 contains the content rendered by a partial view
        'AjaxTab'=>array('ajax'=>$ajaxUrl),
    ),
    // additional javascript options for the tabs plugin
    'options'=>array(
        'collapsible'=>true,
    ),
));

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'mydialog',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Dialog box 1',
        'autoOpen'=>false,
    ),
));

    echo 'dialog content here';

$this->endWidget('zii.widgets.jui.CJuiDialog');

// the link that may open the dialog
echo CHtml::link('open dialog', '#', array(
    'onclick'=>'$("#mydialog").dialog("open"); return false;',
));