<?php
	$controller = $action = '';
	if(isset($this->request->params['controller']))
		$controller = $this->request->params['controller'];
	if(isset($this->request->params['action'])) 
		$action = $this->request->params['action'];
	$submenuArray =array();
		if($controller=='personality_zone'){
		$submenuArray += array(
		'personality'=>array('default'=>array('Personality Tests'=>'/personality-zone/personality'), 'links'=> array('/personality-zone/personality')),
		'aptitude'=>array('default'=>array('Aptitude Tests'=>'/personality-zone/aptitude'), 'links'=> array('/personality-zone/aptitude')),
		'interest'=>array('default'=>array('Interest Tests'=>'/personality-zone/interest'), 'links'=> array('/personality-zone/interest','/personality-zone/interestResult','/personality-zone/streamRecomendation')),
		'articles'=>array('default'=>array('Skill Builder'=>'/personality-zone/articles'), 'links'=> array('/personality-zone/articles'))
		);
	}
	if(count($submenuArray))
		echo '<div style="clear:both;"/><div><ul class="subMenu">';

	foreach($submenuArray as $key=>$value){
		$featureLabel = key($value['default']);
		$featureUrl = $value['default'][$featureLabel];
		if(in_array('/'.str_replace('_','-',$controller).'/'.str_replace('_','-',$action),$value['links']))
			$cssClass=array('class'=>'selected','escape'=>false);
		else
			$cssClass=array('class'=>'','escape'=>false);
			echo '<li>'.$this->Html->link('<b>'.$featureLabel.'</b>',$featureUrl,$cssClass).'</li>';
	}
	if(count($submenuArray))
		echo '</ul></div>';

	
	$subProfileMenuArray =array();
	if($controller=='students'){ 
		if($action=='change_password' || $action=='update_profile' || $action=='my_profile' || $action=='change_username' ){
			$subProfileMenuArray += array(
			'my_profile'=>array('default'=>array('View'=>'/students/my-profile'), 'links'=> array('/students/my-profile')),
			'update_profile'=>array('default'=>array('Edit'=>'/students/update-profile'), 'links'=> array('/students/update-profile','/students/confirmupdateprofile','/students/emailactivation'))
			
			);
			if($this->Session->read('Student.partner') ){
				if($this->Session->read('Student.partner.isChangePassword')=='1'){
					$subProfileMenuArray += array('change_password' =>array('default'=>array('Change Password'=>'/students/change-password'), 'links'=> array('/students/change-password','/students/confirmpasswordchange')));
				}
			}else{
				$subProfileMenuArray += array('change_password' =>array('default'=>array('Change Password'=>'/students/change-password'), 'links'=> array('/students/change-password','/students/confirmpasswordchange')));
			}
			if($this->Session->read('Student.partner') ){
				if($this->Session->read('Student.partner.isChangeUsername')=='1')
				if($this->Session->read('Student.isUpdatedUsername')==0){
					$subProfileMenuArray += array(
					'change-username'=>array('default'=>array('Change Username'=>'/students/change-username'), 'links'=> array('/students/change-username'))
					);
				}
			}else{
				if($this->Session->read('Student.isUpdatedUsername')==0){
					$subProfileMenuArray += array(
					'change-username'=>array('default'=>array('Change Username'=>'/students/change-username'), 'links'=> array('/students/change-username'))
					);
				}
			}
		}
		if($action == 'my_tests' || $action == 'test_report'){
			$subProfileMenuArray += array(
			'my_test'=>array('default'=>array('My Test'=>'/students/my-tests'),'links'=> array('/students/my-tests','/students/test-report'))
			);
		}
		if($action == 'summary_report'){
			$subProfileMenuArray += array(
			'my_test'=>array('default'=>array('Summary Report'=>'/students/summary-report'),'links'=> array('/students/summary-report'))
			);
		}
	if(count($subProfileMenuArray))
		echo '<div style="clear:both;"/><div><ul class="subMenu">';

	foreach($subProfileMenuArray as $key=>$value){
		$featureLabel = key($value['default']);
		$featureUrl = $value['default'][$featureLabel];
		if(in_array('/'.$controller.'/'.str_replace('_','-',$action),$value['links']))
			$cssClass=array('class'=>'selected','escape'=>false);
		else
			$cssClass=array('class'=>'','escape'=>false);
			echo '<li>'.$this->Html->link('<b>'.$featureLabel.'</b>',$featureUrl,$cssClass).'</li>';
			
	}
	
	if(count($subProfileMenuArray))
		echo '</ul></div>';
	}
	
?>
