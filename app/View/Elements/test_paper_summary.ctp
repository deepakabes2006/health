<table class="style1" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr class="head1">
		<td width="5%">Q.No.</td>
		<td width="40%">Questions</td>
		<td width="20%">Chapter</td>
		<td width="20%">Lesson</td>
		<td width="5%">Marks</td>
		<td width="10%">Change Seq.</td>
	</tr>
	<?php    
	$totalMarks = 0; 
	$sectionId='';
	$tmpArr =array();
	foreach($questions as $key=>$value) {
		$tmpArr[$value['PaperSection']['id']]['QuestionDetails'][$value['PaperQuestion']['flow']][]=$value;
		$tmpArr[$value['PaperSection']['id']]['section']=$value['PaperSection']['section'];
	}
	$qcount = 0;
	$preFlow=0;
	
	foreach($tmpArr as $sectionId=>$flowDetail){
		if($flowDetail['section']){
			echo '<tr class="summary"><td colspan="6" style="background:#ffffff;" class="title3"><b>'.$sectionArr[$flowDetail['section']].'</b></td></tr>';
		}
		$noOfFlow = count($flowDetail['QuestionDetails']);
		$lqcount = 0;
		foreach($flowDetail['QuestionDetails'] as $flow=>$questions){
				
			foreach($questions as $key=>$value) { 
				$paperQuestionId = $value['PaperQuestion']['id'];
				$parentId=$value['PaperQuestion']['parentId'];
				$question = substr(strip_tags($value['QuestionBank']['question']),0,50);
				$chapterName = substr($value['Chapter']['name'],0,20);
				$lesson = substr($value[0]['lessonName'],0,20);
				$marks = $value['PaperQuestion']['marks'];
				$totalMarks +=$marks;
				if($preFlow!= $value['PaperQuestion']['flow']){
					$qcount++;
					$lqcount++;
				}
				$cssClass=(($qcount)%2==0 ? '' :'alternate3');
				if($paperQuestionId==$parentId && $value['PaperQuestion']['qGroup']>1 && ($value['PaperQuestion']['qPart']==1 || $value['PaperQuestion']['qPart']==0)){
				echo '<tr class="summary alignC" ><td colspan="6" style="background:#ffcc55;"><b>OR</b></td></tr>';
				}

$str = (preg_replace("/[\n\r]/"," ",$this->SpecialCharacter->replaceSpecialCharacter($value['QuestionBank']['question'])));

?>
	<?php 
		if( (is_null($value['PaperQuestion']['qPart']) || $value['PaperQuestion']['qPart']==0 || $value['PaperQuestion']['qPart']==1 ) && isset($value['QuestionBank']['meta']) && trim($value['QuestionBank']['meta'])) {
	?>
	<tr class="<?php echo $cssClass; ?>">
		<td >
			<?php echo "Q".$qcount."." ; ?>
		</td>
		
		<td colspan="4" onmouseout="UnTip()" 
		 onmouseover="TagToTip('Q<?php echo $qcount."_"; ?>',WIDTH, 600, TITLE, 'Meta Title', STICKY, 1, CLOSEBTN, true, CLICKCLOSE, true)">
 	<?php  echo $this->Text->truncate(strip_tags($value['QuestionBank']['meta']),100); ?>
	<span id="Q<?php echo $qcount."_"; ?>" style="display:none;"><?php echo addslashes(preg_replace("/[\n\r]/"," ",$this->SpecialCharacter->replaceSpecialCharacter($value['QuestionBank']['meta']))); ?> </span>
 </td>
		<td class="alignC">
		<?php
		if($preFlow!= $value['PaperQuestion']['flow'] && $noOfFlow>1){
			if($lqcount==1){
				$sectionId=$value['PaperSection']['id'];
				echo '<a href="javascript:void(0);" onclick="swapQuestion('.$flow.',0,\''.$value['PaperQuestion']['testPaperSectionId'].'\')">'.$this->Html->image('down.gif',array('border'=>'0','align'=>'bottom','alt'=>'Down')).'</a>';

			}elseif($lqcount==$noOfFlow){
				echo '<a href="javascript:void(0);" onclick="swapQuestion('.$flow.',1,\''.$value['PaperQuestion']['testPaperSectionId'].'\')">'.$this->Html->image('up.gif',array('border'=>'0','align'=>'bottom','alt'=>'Up')).'</a>';
			}else{
				
				echo '<a href="javascript:void(0);" onclick="swapQuestion('.$flow.',1,\''.$value['PaperQuestion']['testPaperSectionId'].'\')">'.$this->Html->image('up.gif',array('border'=>'0','align'=>'bottom','alt'=>'Up')).'</a>';
				echo '&nbsp;<a href="javascript:void(0);" onclick="swapQuestion('.$flow.',0,\''.$value['PaperQuestion']['testPaperSectionId'].'\')">'.$this->Html->image('down.gif',array('border'=>'0','align'=>'bottom','alt'=>'Down')).'</a>';
			}
		}
		$preFlow=$value['PaperQuestion']['flow'];
		?>
		<span id="span<?php echo $flow;?>"></span>
		</td>
	</tr>
	<?php } ?>
	<tr class="<?php echo $cssClass; ?>">
		
		<td >
			<?php 
				if((is_null($value['PaperQuestion']['qGroup']) || $value['PaperQuestion']['qGroup']==0 ||$value['PaperQuestion']['qGroup']==1) && (is_null($value['PaperQuestion']['qPart']) || $value['PaperQuestion']['qPart']==0 || $value['PaperQuestion']['qPart']==1 ) && !trim($value['QuestionBank']['meta'])) {
					echo "Q".$qcount."." ;
				}else{
					echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				}
				echo ($value['PaperQuestion']['qPart'] ? '&nbsp;('.$value['PaperQuestion']['qPart'].')':'');
			?>&nbsp;
		</td>
		<td onmouseout="UnTip()" 
 onmouseover="TagToTip('Q<?php echo $qcount."_".$value['PaperQuestion']['qPart']; ?>',WIDTH, 600, TITLE, 'Question', STICKY, 1, CLOSEBTN, true, CLICKCLOSE, true)">
 	<span id="Q<?php echo $qcount."_".$value['PaperQuestion']['qPart']; ?>" style="display:none;"><?php echo $str; ?> </span>
	<?php echo $this->SpecialCharacter->replaceSpecialCharacter($question); ?></td>
		<td onmouseout="UnTip()" 
 onmouseover="TagToTip('Q<?php echo $qcount."_".$value['PaperQuestion']['qPart']."_chapter"; ?>',WIDTH, 200, TITLE, 'Chapter Name', STICKY, 1, CLOSEBTN, true, CLICKCLOSE, true)">
 	<span id="Q<?php echo $qcount."_".$value['PaperQuestion']['qPart']."_chapter"; ?>" style="display:none;">
 		<?php echo addslashes($this->SpecialCharacter->replaceSpecialCharacter($value['Chapter']['name'])); ?>
	</span>	
 	<?php echo $chapterName; ?></td>
	
		<td onmouseout="UnTip()" 
 onmouseover="TagToTip('Q<?php echo $qcount."_".$value['PaperQuestion']['qPart']."_outcome"; ?>', WIDTH, 200, TITLE, 'Outcome Name', STICKY, 1, CLOSEBTN, true, CLICKCLOSE, true)">
 	<span id="Q<?php echo $qcount."_".$value['PaperQuestion']['qPart']."_outcome"; ?>" style="display:none;">
 		<?php echo addslashes($this->SpecialCharacter->replaceSpecialCharacter($value[0]['lessonName'])); ?>
	</span>
 	<?php echo $lesson; ?></td>
		<td><?php echo $marks; ?></td>
		<td class="alignC">
		<?php
		if($preFlow!= $value['PaperQuestion']['flow'] && $noOfFlow>1 && !trim($value['QuestionBank']['meta'])){
			if($lqcount==1){
				$sectionId=$value['PaperSection']['id'];
				echo '<a href="javascript:void(0);" onclick="swapQuestion('.$flow.',0,\''.$value['PaperQuestion']['testPaperSectionId'].'\')">'.$this->Html->image('down.gif',array('border'=>'0','align'=>'bottom','alt'=>'Down')).'</a>';

			}elseif($lqcount==$noOfFlow){
				echo '<a href="javascript:void(0);" onclick="swapQuestion('.$flow.',1,\''.$value['PaperQuestion']['testPaperSectionId'].'\')">'.$this->Html->image('up.gif',array('border'=>'0','align'=>'bottom','alt'=>'Up')).'</a>';
			}else{
				
				echo '<a href="javascript:void(0);" onclick="swapQuestion('.$flow.',1,\''.$value['PaperQuestion']['testPaperSectionId'].'\')">'.$this->Html->image('up.gif',array('border'=>'0','align'=>'bottom','alt'=>'Up')).'</a>';
				echo '&nbsp;<a href="javascript:void(0);" onclick="swapQuestion('.$flow.',0,\''.$value['PaperQuestion']['testPaperSectionId'].'\')">'.$this->Html->image('down.gif',array('border'=>'0','align'=>'bottom','alt'=>'Down')).'</a>';
			}
		}
		$preFlow=$value['PaperQuestion']['flow'];
		?>
		<span id="span<?php echo $flow;?>"></span>
		</td>
	</tr>
<?php
		}
	}
}
?>
</table>
<div style="height:25px;"></div>

<div style="padding: 8px;text-align: right; background-color: rgb(205, 205, 205);">
<input type="button" value="Go to the next step" onclick="window.location.href='/teachers/view_test_paper/<?php echo $testPaperId ; ?>';" />
</div>