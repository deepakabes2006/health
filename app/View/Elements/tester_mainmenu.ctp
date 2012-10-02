<?php
	$controller = $action ='';
	$selectedClass = array('class'=>'current');
	if(isset($this->request->params['controller']))
		$controller = $this->request->params['controller'];
	if(isset($this->request->params['action'])) {
		$action = $this->request->params['action'];
	} 
	$profileClass = $paperReportclass = $addPaperclass =null;
	
	$taskArr=array('tasks','view_task','task_status_detail','upload_task_video','view_task_video');
	
	$reportArr=array('task_report','payment_report');
	
	$myprofileArr=array('my_profile','update_profile','change_password','confirmpasswordchange','confirmupdateprofile');
	if(in_array($action,$taskArr))
		$addPaperclass = $selectedClass;	
	elseif(in_array($action,$reportArr))
		$paperReportclass = $selectedClass;
	elseif(in_array($action,$myprofileArr))
		$profileClass = $selectedClass;
	$menuDividerImg="divider.jpg";
?>

<div class="mainnav">
	<?php  
	if($this->Session->check('Tester')){ ?><ul>
	
	<li><?php  echo $this->Html->link('My task','/testers/tasks',$addPaperclass,null,false);?></li>
	<li><?php echo $this->Html->image($menuDividerImg);?></li>
	
	<li><?php  echo $this->Html->link('My Reports','/testers/test-papers',$paperReportclass,null,false);?></li>
	<li><?php echo $this->Html->image($menuDividerImg);?></li>
	
	<li><?php  echo $this->Html->link('My Profile','/testers/my-profile',$profileClass,null,false);?></li>

</ul>
	<?php } ?>
</div>
