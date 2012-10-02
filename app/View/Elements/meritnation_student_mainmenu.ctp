<?php
	$controller = $action ='';
	$selectedClass = array('class'=>'current');
	if(isset($this->request->params['controller']))
		$controller = $this->request->params['controller'];
	if(isset($this->request->params['action'])) {
		$action = $this->request->params['action'];
	}
	$myprofileclass = $mytestclass = $loginclass = $personalityClass = $summary_reportclass=null;
	$profileArr=array('my_profile','update_profile','change_password','confirmpasswordchange','confirmupdateprofile','emailactivation');
	$myTestArr=array('my_tests','test_report');
	$personalityArr=array('testList','studentList','studentReport');
	if($controller=='personality_zone')
		$personalityClass = $selectedClass;
	elseif(in_array($action,$myTestArr))
		$mytestclass = $selectedClass;
	elseif(in_array($action,$profileArr))
		$myprofileclass = $selectedClass;
	elseif($action=='login')
		$loginclass = $selectedClass;
	elseif($action=='summary_report')
		$summary_reportclass = $selectedClass;
	if(TESTPRO) {
		$menuDividerImg="yellow-divider.jpg";
	}else{
		$menuDividerImg="divider.jpg";
	}
?>
<?php if($this->Session->check('Student')){ ?>
<div class="mainnav">
<ul>
	
	<li><?php  echo $this->Html->link('My Test','/students1/my-tests',$mytestclass,null,false);?></li>
	<li><?php echo $this->Html->image($menuDividerImg);?></li>
	
	<li><?php  echo $this->Html->link('Summary Reports','/students1/summary-report',$summary_reportclass,null,false);?></li>
	<li><?php //echo $this->Html->image($menuDividerImg);?></li>
	<li><?php  //echo $this->Html->link('My Profile','/students/my-profile',$myprofileclass,null,false);?></li>
	<li><?php //echo $this->Html->image($menuDividerImg);?></li>
	
</ul>
</div>
<?php } ?>