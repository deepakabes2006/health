<div id="div-questionAnswer" style="display:none;">
<div class="alignL"><font color="#6891BD" size="4">Paper Solution</font></div>
<hr color="#BFDEFF" width="100%">
<div style="height:20px;"></div>

<table width="100%"  cellpadding="1" cellspacing="0" border="0" class="style1" style="border:1px solid #E7E7E4">
<?php 
$qidFlow='';
if(isset($questions) && $questions){

	$sectionId ='';
	$preFlow=0;
	$qcount=0;
	foreach($questions as $key=>$value){ 
	    $opt1= $opt2= $opt3= $opt4= '';
		$correctOption = 'opt'.$value['QuestionBank']['correctOption'];
		$$correctOption='bold';
		$testPaperId = $value['PaperQuestion']['testPaperId'];
		$flow=$value['PaperQuestion']['flow'];
		$qPart=$value['PaperQuestion']['qPart'];
		$qGroup=$value['PaperQuestion']['qGroup'];
		$qType=($value['PaperQuestion']['qType']>2 ? $value['PaperQuestion']['qType'] -1 : $value['PaperQuestion']['qType']); // 2 and 3 consider as sort answer
		$id = $value['PaperQuestion']['id'];
		$parentId=$value['PaperQuestion']['parentId'];
		$qidFlow = $this->Util->mnEncrypt($testPaperId . '*'.$value['PaperQuestion']['id'] . '*'. $flow . '*'. $qType);
		
		if($preFlow!= $flow){
			$preFlow= $flow;
				$qcount++;
		}
		if($key==0 || $sectionId != $value['PaperSection']['id']){
			$sectionId=$value['PaperSection']['id'];
			$instruction=$value['PaperSection']['instruction'];
?>
	   <tr ><td  align="center">
			<br />
			<b><?php if($value['PaperSection']['section']){ echo strtoupper($sectionArr[$value['PaperSection']['section']]);} ?></b> <br />
			
		</td></tr>	
		<?php if($instruction){?>
		<tr>
			<td  align="left">				
				<div id="labelSectionId<?php echo $sectionId; ?>" style="text-align:justify;padding-right: 40px;padding-left:50px"><i><?php echo nl2br($instruction); ?></i></div>
				<br />
			</td>
		</tr>
		<?php } ?>
<?php
		}
		if($key > 0) { 
			$prevqGroup = $questions[$key-1]['PaperQuestion']['qGroup'];
			if(!is_null($qGroup) && ($qGroup != $prevqGroup) && ($qGroup > 1) && ($qGroup-$prevqGroup == 1)) {
				echo '<tr style="background-color:'.$cssColor.'"><td class="alignC" ><b>OR</b></td></tr>';
			}
		}
		$cssColor=($flow%2==0 ? '#ffffff' :'#ffffff');
	?>
		<tr style="background-color:<?php echo $cssColor;?>" id= "trQuestionNo<?php echo $flow;?>">
			<td  valign="top" style="width:95%;">
				<table style="width:100%;" cellpadding="0" cellspacing="0" border="0">
				<?php 
					if( (is_null($value['PaperQuestion']['qPart']) || $value['PaperQuestion']['qPart']==0 || $value['PaperQuestion']['qPart']==1 ) && isset($value['QuestionBank']['meta']) && trim($value['QuestionBank']['meta'])) {
				?>
				<tr>
					<td style="padding-right:15px;padding-top:10px;width:40px;" valign="top">
					<b><?php echo "Q".$qcount."." ; ?></b></td>
					<td valign="top"><?php echo $this->SpecialCharacter->replaceSpecialCharacter($value['QuestionBank']['meta']); ?></td>
					<td></td>
				</tr>
				<?php } ?>
				<tr>
				<td style="padding-right:15px;padding-top:10px;width:40px;" valign="top" >
				<b><?php 
					if((is_null($value['PaperQuestion']['qGroup']) || $value['PaperQuestion']['qGroup']==0 ||$value['PaperQuestion']['qGroup']==1) && (is_null($value['PaperQuestion']['qPart']) || $value['PaperQuestion']['qPart']==0 || $value['PaperQuestion']['qPart']==1 ) && !trim($value['QuestionBank']['meta'])) {
					echo "Q".$qcount."." ;
					}else{
						echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
					}
					echo ($value['PaperQuestion']['qPart'] ? '('.$value['PaperQuestion']['qPart'].')':'');
					?>
					</b>
				</td>
				<td id= "questionNo<?php echo $flow;?>" valign="top">

					<table style="width:100%;" cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td colspan="2" valign="top" align="justify">
								<?php echo $this->SpecialCharacter->replaceSpecialCharacter($value['QuestionBank']['question']);?>
							</td>
						</tr>
					<?php if($value['QuestionBank']['isMCQ']=='1'){?>
						<tr class="<?php echo $opt1;?>"><td class="vAlignT" style="width:5%;"><p>A.</p></td><td><?php echo $this->SpecialCharacter->replaceSpecialCharacter($value['QuestionBank']['option1']);?> </td></tr>
						<tr class="<?php echo $opt2;?>"><td class="vAlignT"><p>B.</p></td><td><?php echo $this->SpecialCharacter->replaceSpecialCharacter($value['QuestionBank']['option2']);?> </td></tr>
						<tr class="<?php echo $opt3;?>"><td class="vAlignT"><p>C.</p></td><td><?php echo $this->SpecialCharacter->replaceSpecialCharacter($value['QuestionBank']['option3']);?> </td></tr>
						<tr class="<?php echo $opt4;?>"><td class="vAlignT"><p>D.</p></td><td><?php echo $this->SpecialCharacter->replaceSpecialCharacter($value['QuestionBank']['option4']);?> </td></tr>
					<?php }?>
						<tr>
							<td colspan="2" valign="top" align="justify"  class="qSolution">
								<br><b>Answer:</b><br>
								<?php echo $this->SpecialCharacter->replaceSpecialCharacter($value['QuestionBank']['solution']);?>
							</td>
						</tr>
					</table>
				</td>
				<td style="vertical-align:top;text-align:right;padding-left:10px;padding-top:10px;"><?php echo $value['PaperQuestion']['marks']; ?></td>
				</tr></table>
			</td>
			
		</tr>
		<tr><td colspan="100%" height="10px"></td></tr>
	<?php } ?>
<?php } ?>
</table>

</div>