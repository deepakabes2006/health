<?php
if($this->request->params['pass'] && count($this->request->params['pass'])) 
	$seoSubject=$this->request->params['pass'][0];
else
	$seoSubject='Math';
?>
<script>
function changeGradeTextbookURL(flag){
	var params= $('guestGradeId').value;
	if(flag)
		params = params + "/"+$('guestTextbookId').value;
	
	$('frmCurrGrade').action="/study-online/study-planner/"+params;
	$('frmCurrGrade').submit();
}
</script>
<form method="post" action="" id="frmCurrGrade" style="padding:0px;margin:0px;">
<table border="0" cellpadding="0" cellspacing="0"><tr>
<?php
$controller = $action = '';
if(isset($this->request->params['controller']))
	$controller = $this->request->params['controller'];
if(isset($this->request->params['action'])) 
	$action = $this->request->params['action'];

$hideGrades=array();
if($controller =='study_online' && ($action=='chapters' || $action=='solutions'))
		$hideGrades = array(5);
elseif($controller =='intelligent_learning_systems')
		$hideGrades = array(5,11,12);
	echo '<td>';
    $currGradeList = $currGradeList['currGradeList'];
	echo '<select id="guestGradeId"  name="data[GuestGrade][id]" onchange="changeGradeTextbookURL(0);">';
	foreach ($currGradeList as $key=>$val) {
		
		foreach ($val as $k=>$v) {
				$currGrade = explode('_',$k);
				if($currGrade[0] == $defaultCGT['defaultCurriculumId'] && !in_array($currGrade[1],$hideGrades)){
					echo '<option value="'.$currGrade[2].'/'.$this->Util->mnEncrypt($currGrade[1]).'" '.(isset($defaultCGT['defaultGradeId']) && $defaultCGT['defaultGradeId'] == $currGrade[1] ? " selected=selected" : "").'>Class '.$v.'</option>';
				}
		}
	}
	echo '</select></td>';

echo '<td width="30px"></td><td>';
	$subjectsArr=$subjectsMenu[$selectedSubjectId];
	$textbooksArr=$subjectsArr['textbooks'];

	$subjectTitle=$subjectsArr['title'];
	$defaultGradeId=$this->Util->mnEncrypt($defaultCGT['defaultGradeId']);

	 echo '<select id = "guestTextbookId" name="data[GuestTextbook][id]" onchange= "changeGradeTextbookURL(1);">';
	 foreach ($textbooksArr as $key=>$val) {
	 echo '<option value="'.$this->Util->mnEncrypt($key).'" '.(isset($defaultCGT['defaultTextbookId']) && $defaultCGT['defaultTextbookId'] == $key ? " selected=selected" : "").'>'.$val.'</option>';
	 }
	 echo '</td>';
?>
</tr></table>
</form>