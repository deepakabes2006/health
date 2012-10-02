<script>
	function number_format(number, decimals, dec_point, thousands_sep) {
    var n = !isFinite(+number) ? 0 : +number, 
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}
</script>
<div style="height:25px;"> </div>
<?php 

if ($this->Session->check('Message.flash')) {
echo $this->Session->flash();
} ?>
<div class="profile textGray3">
	<table width="100%" class="section" cellpadding="3" cellspacing="2" border="0">
		<tr><td colspan="2" class="title"><b>Basic Details</b></td></tr>
		<tr>
			<td align="left" class="field">Grade</td>
			<td align="left" >
				<?php echo $testPaperGrade; ?>
			</td>
		</tr>
		<tr>
			<td align="left" class="field">Subject</td>
			<td align="left" >
				<?php echo $testPaperSubject; ?>
			</td>
		</tr>
		<tr>
			<td align="left" class="field">Test Name</td>
			<td align="left" >
				<?php echo $testPaperDetail['name']; ?>
			</td>
		</tr>
		<tr>
			<td align="left" class="field">Test Date</td>
			<td align="left" >
				<?php echo $this->Time->format('d M Y',$testPaperDetail['startDate']); ?>
			</td>
		</tr>
		<tr>
			<td align="left" class="field">Total Duration</td>
			<td align="left">
				<?php echo $testPaperDetail['duration']; ?> Minutes				
			</td>
		</tr>
		<tr><td colspan="2" class="title"><br><br>Selected Questions</td></tr>
	</table>
</div>			
<table cellpadding="1" cellspacing="1" border="0">
	<tr><td><b>Total Questions:</b></td><td class="totalQuestion">0</td><td style="padding-left:30px"><b>Total Marks:</b></td><td class="totalMarks"><?php  echo $testPaperDetail['maxMarks']; ?></td></tr>
</table>
<form method="post" onsubmit="return checkMarksValue('form1');" name="form1">
<table width="100%" cellpadding="3" cellspacing="3" border="0" >
<tr><td colspan="3"><p><b><u>Test Paper Instructions</u></b></p> </br>
<?php $instruction = $testPaperDetail['instruction']; ?>
	<table cellpadding="3" cellspacing="3" border="0"><tr><td width="95%"><div id="labelInstruction" style="display:<?php echo ($instruction==''? 'none':'block' );?>"><?php echo nl2br($instruction); ?></div>
			<textarea id="textInstruction" cols="95" rows="3" style="display:<?php echo ($instruction!=''? 'none':'block' );?>"><?php echo $instruction; ?></textarea></td>
			<td valign="bottom">
			<input type="button" id="btnInstruction" value="<?php echo ($instruction==''? 'Save':'Edit' );?>" onclick="saveTestPaperInstruction(this);"></td>
			<td style="width:70px" valign="bottom"><input id="cancelInstruction" type="button" value="Cancel" onclick="cancelTestPaperInstruction();"  style="display:none">
			</td></tr>
			</table>
<br>&nbsp;</td>
</tr>
<?php 
$qidFlow='';
$qcount=0;
if(isset($questions) && $questions){

	$sectionId ='';
	$preFlow=0;
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
		$trclassName="tr_".$flow."_".$qGroup;
		if($preFlow!= $flow){
			$preFlow= $flow;
				$qcount++;
		}
		$isNewSection=false;
		if($key==0 || $sectionId != $value['PaperSection']['id']){
			$isNewSection=true;
			$sectionId=$value['PaperSection']['id'];
			$instruction=$value['PaperSection']['instruction'];
?>
	<?php if($value['PaperSection']['section']){ ?>
	   <tr style="background-color:#EBF0F6;"><td colspan="3">
			<b><?php if($value['PaperSection']['section']){ echo $sectionArr[$value['PaperSection']['section']];/*"Section ".$value['PaperSection']['section'];*/ } ?></b> <br />
			<table><tr><td width="95%"><div id="labelSectionId<?php echo $sectionId; ?>" style="display:<?php echo ($instruction==''? 'none':'block' );?>"><?php echo nl2br($instruction); ?></div>
			<textarea id="textSectionId<?php echo $sectionId; ?>" cols="95" rows="3" style="display:<?php echo ($instruction!=''? 'none':'block' );?>"><?php echo $instruction; ?></textarea>
			</td><td>
			<input type="button" id="btnSectionId<?php echo $sectionId; ?>" value="<?php echo ($instruction==''? 'Save':'Edit' );?>" onclick="saveSectionInstruction(this,<?php echo $sectionId; ?>);"></td><td style="width:70px"><input id="cancelSectionId<?php echo $sectionId; ?>" type="button" value="Cancel" onclick="cancelInstruction(<?php echo $sectionId; ?>);"  style="display:none"></td></tr></table>
	   </td></tr>
	   <?php } ?>
<?php	   
		}
		$isOptionalQ=false;
		if($key > 0) { 
			$prevqGroup = $questions[$key-1]['PaperQuestion']['qGroup'];
			if(!is_null($qGroup) && ($qGroup != $prevqGroup) && ($qGroup > 1) && ($qGroup-$prevqGroup == 1)) {
				$isOptionalQ=true;
				echo '<tr class="'.$trclassName.'" style="background-color:'.$cssColor.'"><td class="alignC" colspan="2"><b>OR</b></td><td class="vAlignT" style="width:275px;color:#fff">&nbsp;</td></tr>';
				echo '<tr class="'.$trclassName.'" ><td colspan="3" ><hr class="question"></td></tr>';
			}
		}
		?>
		<script>
			if($("marks<?php echo $trclassName;?>"))
			{
				$("marks<?php echo $trclassName;?>").innerHTML=number_format(parseFloat($("marks<?php echo $trclassName;?>").innerHTML)+parseFloat(<?php echo $value['PaperQuestion']['marks'];?>),2);
			}
		</script>
		<?php
		$cssColor='#ffffff';
		//$cssColor=($flow%2==0 ? '#e8e7e7' :'#ffffff');
	?>
	<?php if((is_null($value['PaperQuestion']['qGroup']) || $value['PaperQuestion']['qGroup']==0 ||$value['PaperQuestion']['qGroup']==1) && (is_null($qPart) || $qPart==0 || $qPart==1 ) && !($isNewSection)) { ?>
		<tr class="<?php echo $trclassName;?>"><td colspan="3"><hr class="question"></td></tr>
		<?php } ?>
		<tr class="<?php echo $trclassName;?>" style="background-color:<?php echo $cssColor;?>" id= "trQuestionNo<?php echo $flow;?>">
			<td style="" valign="top">
				<table width="100%" cellpadding="1" cellspacing="1" border="0">
					<?php 
					if( (is_null($qPart) || $qPart==0 || $qPart==1 ) && isset($value['QuestionBank']['meta']) && trim($value['QuestionBank']['meta'])) {
					?>
					<TR>
						<TD class="vAlignT" style="padding-top:15px;padding-right:5px;width:50px;">
							<?php echo "Q".$qcount.". <a name=Q".$qcount."></a>" ; ?>
						</TD>
						<TD class="vAlignT">
							<?php echo $this->SpecialCharacter->replaceSpecialCharacter($value['QuestionBank']['meta']); ?>
						</TD>
					</TR>
					<?php
						}
						?>
					<tr>
						<td class="vAlignT" style="padding-top:15px;padding-right:5px;width:50px;" >
							<?php 
							if((is_null($value['PaperQuestion']['qGroup']) || $value['PaperQuestion']['qGroup']==0 ||$value['PaperQuestion']['qGroup']==1) && (is_null($qPart) || $qPart==0 || $qPart==1 ) && !trim($value['QuestionBank']['meta'])) {
								echo "Q".$qcount.".<a name=Q".$qcount."></a>";
							}else{
								echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
							}
							echo ($qPart ? '('.$qPart.')':'');
							?>&nbsp;
						</td>
						<td id= "questionNo<?php echo $flow;?>" valign="top">
							<table width="100%" cellpadding="1" cellspacing="1" border="0">
								<tr><td colspan="2" class="vAlignT alignL"><?php echo $this->SpecialCharacter->replaceSpecialCharacter($value['QuestionBank']['question']);?></td></tr>
								<?php if($value['QuestionBank']['isMCQ']=='1'){?>
								<tr class="<?php echo $opt1;?>"><td class="vAlignT alignL" style="width:5%;"><p>A.</p></td><td class="vAlignT alignL"><?php echo $this->SpecialCharacter->replaceSpecialCharacter($value['QuestionBank']['option1']);?> </td></tr>
								<tr class="<?php echo $opt2;?>"><td class="vAlignT alignL"><p>B.</p></td><td class="vAlignT alignL"><?php echo $this->SpecialCharacter->replaceSpecialCharacter($value['QuestionBank']['option2']);?> </td></tr>
								<tr class="<?php echo $opt3;?>"><td class="vAlignT alignL"><p>C.</p></td><td class="vAlignT alignL"><?php echo $this->SpecialCharacter->replaceSpecialCharacter($value['QuestionBank']['option3']);?> </td></tr>
								<tr class="<?php echo $opt4;?>"><td class="vAlignT alignL"><p>D.</p></td><td class="vAlignT alignL"><?php echo $this->SpecialCharacter->replaceSpecialCharacter($value['QuestionBank']['option4']);?> </td></tr>
								<?php }?>
								<tr>
									<td colspan="2" valign="top" align="left" >
										<a id="link<?php echo $trclassName."_".$qPart?>" href="javascript:void(0);" onclick="showhideSolution('TD<?php echo $trclassName."_".$qPart?>','link<?php echo $trclassName."_".$qPart?>')">Show Answer</a>
									</td>
								</tr>
								<script>
									
								</script>
								<tr>
									<td id="TD<?php echo $trclassName."_".$qPart?>" colspan="2" valign="top" align="justify" style="display:none;" >
										<?php echo $this->SpecialCharacter->replaceSpecialCharacter($value['QuestionBank']['solution']);?>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
			<td valign="top" style="padding-top:15px;">
			<input size="5" maxlength="4" type="text" class="qpartMarks<?php echo $trclassName;?>" name="data[question][marks][<?php echo $value['PaperQuestion']['id']."_".$value['PaperQuestion']['qGroup']."_".$value['PaperQuestion']['flow'];?>]" value="<?php echo $value['PaperQuestion']['marks']; ?>" onblur="checkMarks(this,'<?php echo $trclassName;?>')">
			</td>
			<?php if($parentId==$id){ ?>
			<td class="vAlignT" style="width:275px;background-color: #FFFFFF;">
				<table bgcolor="#00A4FF" style="color:#ffffff" cellspacing="2" width="100%">
					<tr><td valign="top">Used:</td><td><?php echo $value[0]['count']; ?></td></tr>
					<tr><td valign="top">Chapter:</td><td id="chapterNameId<?php echo $flow;?>"><?php echo $value['Chapter']['name'];?></td></tr>
					<tr><td valign="top">Lesson:</td><td><?php echo $value[0]['lessonName']; ?></td></tr>
					<tr><td>Marks:</td><td class="marks_question_flow_<?php echo $value['PaperQuestion']['flow'];?>" id="marks<?php echo $trclassName;?>"><?php echo $value['PaperQuestion']['marks']; ?></td></tr>
					<!--<tr><td colspan="2">Difficulty Level: <?php echo $value['QuestionBank']['lod']; ?></td></tr>-->
					<tr><td colspan="2" height="30"></td></tr>
					<tr>
						<td colspan="2" class="alignC">
							<?php if($isOptionalQ){ ?> 
							<input type="button" value="Delete" onclick="deleteQuestion('<?php echo $qidFlow ?>','<?php echo $trclassName;?>');">
							<?php } ?>
							<input class="thickbox"  type="button" value="Replace" title="Replace Question" onclick="window.location.href='#Q<?php echo $qcount;?>';"
							alt="/teachers/replaceQuestion/<?php echo $qidFlow ?>/<?php echo time(); ?>?KeepThis=true&amp;TB_iframe=true&amp;height=600&amp;width=1000"
							>							
							
							<input class="thickbox"  type="button" value="Add Optional Q" title="Add Optional Q" onclick="window.location.href='#Q<?php echo $qcount;?>';"
							alt="/teachers/addQuestion/<?php echo $qidFlow ?>/<?php echo time(); ?>?KeepThis=true&amp;TB_iframe=true&amp;height=600&amp;width=1000" >
						</td>
						
						
					</tr>
				</table>
			<?php }else{ ?>
			<td class="vAlignT" style="width:275px;">
			<?php } ?>
			</td>
		</tr>
		
	<?php } ?>
<?php } ?>
</table>
<table cellpadding="1" cellspacing="1" border="0">
	<tr><td><b>Total Questions:</b></td><td class="totalQuestion">loading...</td><td style="padding-left:30px"><b>Total Marks:</b></td>
	<td class="totalMarks"><?php echo $testPaperDetail['maxMarks']; ?></td></tr>
</table>
<div style="height:25px;"></div>
<div class="alignL" style="margin-bottom:8px;;padding: 8px; background-color: #c0c0c0;">
	<table cellpadding="0" cellspacing="0" width="100%" border="0">
	<tr>
		
		<td class="alignR">
			<?php if(TESTPRO){ ?>
				<input name="data[question][freeze]" type="submit" value="Freeze Test and go to the next step">
			<?php } ?>
			&nbsp;&nbsp;&nbsp;<input name="data[question][gotonextstep]" type="submit" value="Save and go to the next step">
		</td>
	</tr>
	</table>
</div>
</form>
<script>
var testMarks = parseFloat(<?php echo (int)$testPaperDetail['maxMarks']; ?>);
function showhideSolution(divId,LinkId){

if ( $("#"+divId+":visible").length === 0){

	//if($(divId).style.display=="none"){
		$("#"+LinkId).html=("Hide Answer");
		$("#"+divId).show();			
	}else{
		$("#"+LinkId).html("Show Answer");
		$("#"+divId).hide();			
	}
}
function totalMarks(){
	$('.totalQuestion').each(function(val,ele){
		$(ele).html(<?php echo $qcount; ?>);
	});
}
totalMarks();

function checkMarks(obj,qPartClass){
	var total=0;
	if(isNaN($(obj).val())){
		$(obj).val(0.0);
		alert("Please enter the numeric value");
		$(obj).focus();
	}
	$('.qpartMarks'+qPartClass).each(
	
		function(val1,ele){ 
			if(isNaN($(ele).val())){
				$(ele).val(0.0);
			}
			//alert(total+"=="+ele.value);
			total =  parseFloat($(ele).val()) + total;
			
		}
	);
	$('#marks'+qPartClass).html(number_format(total,2));
}

function checkMarksValue(obj){
	var temp;
	var status=false;
	var totalMarks=0;
	for (i = 0; i < document.form1.elements.length; i++) {
		if (document.form1.elements[i].type == "text") {
			if (isNaN(document.form1.elements[i].value)) {
				document.form1.elements[i].value = 0.0;
				document.form1.elements[i].focus();
				alert("Please enter the numeric value");
				return false;
			}
			if (!parseFloat(document.form1.elements[i].value)) {
				document.form1.elements[i].focus();
				alert("Please enter the marks");
				return false;
			}
			totalMarks +=parseFloat(document.form1.elements[i].value);
		}
	}
	for(var i=1;i<=parseInt('<?php echo $qcount; ?>');i++){
		temp=0;
		$(".marks_question_flow_"+i).each( 
			function(val,ele){
				if(!status)
				if (temp != 0 && temp != number_format(parseFloat(ele.innerHTML), 2)) {
					status = true;
					q=i;
				}
				else {
					temp = number_format(parseFloat(ele.innerHTML), 2)
				}

			}
		);
	}
	if(status){
		alert("Marks are not same in all optional questions #"+q);
		return false;
	}
	if(parseFloat(testMarks) > parseFloat(totalMarks)){		
		return  confirm("Total marks is less then assigned maximum marks.Do you want to go next step?");
	}else if(parseFloat(testMarks) < parseFloat(totalMarks)){
		return confirm("Total marks is greater then assigned maximum marks.Do you want to go next step?");
	}
	//alert(totalMarks); return false;
	return true;
}
</script>