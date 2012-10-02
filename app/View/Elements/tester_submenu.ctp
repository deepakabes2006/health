<?php
	$controller = $action = '';
	if(isset($this->request->params['controller']))
		$controller = $this->request->params['controller'];

	if(isset($this->request->params['action'])) 
		$action = $this->request->params['action'];

	$submenuArray =array();
	$profileArr=array('update_profile','my_profile','change_password');
	if(in_array($action,$profileArr)){
		$submenuArray += array(
			'my_profile'=>array('default'=>array('View'=>'/testers/my-profile'), 'links'=> array('/testers/my-profile')),
			'update_profile'=>array('default'=>array('Edit'=>'/testers/update-profile'), 'links'=> array('/testers/update-profile','/testers/confirmupdateprofile','/testers/emailactivation')),
			'change_password'=>array('default'=>array('Change Password'=>'/testers/change-password'), 'links'=> array('/testers/change-password'))
			);
	}
	if($action=='assign_personality_feature' || $action=='assign_fat_feature' || $action=='viewPersonalityTestStatus' || $action=='dimensionResult' || $action=='aptitudeResult' || $action=='viewAptitudeTestStatus' || $action=='assign_chapter_to_student'){
		$submenuArray += array(
		'assign_personality_feature'=>array('default'=>array('Personality Zone'=>'/testers/assign-personality-feature'), 'links'=> array('/testers/assign-personality-feature','/testers/aptitudeResult','/testers/viewPersonalityTestStatus','/testers/dimensionResult','/testers/viewAptitudeTestStatus')),
		);
		if(isset($isAssignChapter) && $isAssignChapter){
			$submenuArray += array(
			'assign_chapter_to_student'=>array('default'=>array('Assign Chapters'=>'/testers/assign-chapter-to-student'), 'links'=> array('/testers/assign-chapter-to-student')),
			);
		}
	}
	
	if(count($submenuArray))
		echo '<div style="clear:both;"/><div><ul class="subMenu">';
		
	foreach($submenuArray as $key=>$value){
		$featureLabel = key($value['default']);
		$featureUrl = $value['default'][$featureLabel];
		if(in_array('/'.str_replace('_','-',$controller).'/'.str_replace('_','-',$action),$value['links'])){
                    $cssClass=array('class'=>'selected');
                }else{
                    $cssClass=array('class'=>'');
                }
		#echo '<li>'.$this->Html->link('<b>'.$featureLabel.'</b>',$featureUrl,$cssClass,null,false).'</li>';
                echo '<li>'. $this->Html->link($featureLabel,$featureUrl,array('class'=>$cssClass)) . '</li>';
                
	}
	if(count($submenuArray))
		echo '</ul><div>';

	
?>
