<div id="resultdiv">
<div style="width:760px;background:#07C3DE url(../img/chapter_blue.jpg) repeat-x scroll 0 0;border:1px solid #BCBCBC;padding:8px;color:#FFFFFF"><b>Search Results</b></div>
<?php
if(count($tutors)<=0){
	echo '<p>&nbsp;</p>';
	echo '<div class="alignC"><h4>Your query did not fetch any result </h4></div>';
	return;
}
?>
		<div id="LoadingDiv" style="display: none;">
			<?php echo $this->Html->image('/img/loader1.gif'); ?>
		</div>
<?php
foreach($tutors as $k=>$val){?>


<?php
//echo '<div style="float:right">'. $val['UserDetail']['mobile'] .'</div>';
	$encodedUserId=$this->Util->mnEncrypt($userName= $val['User']['id']);
	if(trim($val[0]['fullname'])!='')
		$userName= $val[0]['fullname'];
	else
		$userName= $val['User']['username'];
	
	$tutormobile=$val['UserDetail']['mobile'];
	if(isset($val['TutorDetail']['addressDetail']))
	{
		$tutorcity=explode("~$~",$val['TutorDetail']['addressDetail']);
	if(isset($tutorcity[1]))
		$located=$tutorcity[1];
	else
		$located=$tutorcity[0];		
	}
	
	$subject_summary=explode('-',$val['TutorDetail']['subjectDetail']);
	if(isset($subject_summary[2])){
		$subjects= " ".$subject_summary[2]." ";		
	}
	
	if(isset($subject_summary[1])){
		$classes=$subject_summary[1];
		/*
		$grade_summary=explode(',',$subject_summary[1]);
		if(count($grade_summary)>1)
		echo "Classes ".$grade_summary[0]."-".$grade_summary[2];
		else
		echo "Classe ".$grade_summary[0];*/
				
	}
	
	if($val['TutorDetail']['totalExperience']!='')
		$experience=', ' . $val['TutorDetail']['totalExperience'] .' years experience <br /> <br />';
	
	$description=$this->Text->truncate(strip_tags($val['TutorDetail']['description']),240);
?>
<div style="width:760px;padding;4px;padding-bottom:10px;margin-top:14px;background-color:#FFFFFF;border-bottom:1px SOLID #AAAAAA">
<div style="width:760px;padding:6px;"><?php echo $this->Html->link($userName,'/users/profile2/'.$userName.'/'.$encodedUserId); ?>
<div style="float:right;padding-right:10px"><?php echo $tutormobile; ?></div>
<BR/>
</div>

<div style="width:760px;float:left;padding-left:6px;height:30px;">
<?php echo $description; ?>	
</div>
<div style="width:760px;padding-left:6px"><b>
<?php 
echo $located;echo "  ";echo $subjects;echo $classes;
?>
</b>	
</div>

</div>
<?php } ?>
<div style="width:760px;margin-top:10px;pagination-top:10px">
	<?php
			$this->Paginator->options(array('update'=>'resultdiv','indicator' => 'LoadingDiv','url'=>''));
			echo $this->element('users/pagination'); ?>
</div>		
</div> 			