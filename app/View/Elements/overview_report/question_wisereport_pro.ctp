
<div id="div-questionWiseReport" style="display:none;">
<div class="alignL"><font color="#6891BD" size="4">Performance Analysis By Question</font></div>
<hr color="#BFDEFF" width="100%">
<div style="height:20px;"></div>
<table width="100%"  cellpadding="1" cellspacing="0" border="0" class="style1" style="border:1px solid #E7E7E4">
	<tr class="head">
		<td class="alignC" colspan="3" style="background:#E7E7E4;"></td>
		<td class="alignC" colspan="2">Performance</td>
		<td class="alignC" colspan="3" style="background:#E7E7E4;"></td>
	</tr>
	<tr class="head">
		<td class="alignC">Question</td>
		<td class="alignC">Outcome</td>
		<td class="alignC">Marks</td>
		<td class="alignC">Satisfactory</td>
		<td class="alignC">Not-satisfactory</td>
		<td class="alignC">Skipped</td>
		<td class="alignC" colspan="2">Calculated Difficulty Level</td>
	</tr>
	<?php
	$preQuestionNo=0;
	$qGroup=0;

	if($questionWiseAnalysisArr){
		foreach($questionWiseAnalysisArr as $key=>$value){
			
			$trclass = ($key%2) == 0 ? '':'class="alternate"';
			$isOrQuestion=false;
			if($value['flow']==$preQuestionNo && $value['qGroup']>$qGroup){
				$isOrQuestion=true;
			}
			$Qstr = addslashes(preg_replace("/[\n\r]/"," ",($value['question'])))
			
	?>
	<tr <?php echo $trclass;?>>
		<td class="alignC" onmouseout="UnTip()" 
 onmouseover="TagToTip('Q<?php echo $value['flow']."_".$value['qPart']; ?>',WIDTH, 600, TITLE, 'Question (<?php echo addslashes($sloArr[$value['sloId']]['ChapterName']); ?>)', STICKY, 1, CLOSEBTN, true, CLICKCLOSE, true)">
 	<?php if($isOrQuestion){?> <span style="color:red;"><b>Or&nbsp;</b></span><?php } ?><b><?php echo $value['flow'];?><?php if(isset($value['qPart']) && $value['qPart']){echo ".".$value['qPart'];}?></b>
	<span id="Q<?php echo $value['flow']."_".$value['qPart']; ?>" style="display:none;"><?php echo stripslashes( preg_replace("/[\n\r]/"," ",$this->SpecialCharacter->replaceSpecialCharacter($Qstr))); ?> </span>
	</td>
		<td class="alignL" onmouseout="UnTip()" 
 onmouseover='Tip("<?php echo addslashes($sloArr[$value['sloId']]['LessonName']); ?>",WIDTH, 350, TITLE, "Outcome Name (<?php echo addslashes($sloArr[$value['sloId']]['ChapterName']); ?>)", STICKY, 1, CLOSEBTN, true, CLICKCLOSE, true)'>
 Outcome <?php echo $sloArr[$value['sloId']]['LessonNo']; ?></td>
		<td class="alignC"><?php echo $value['marks'];?></td>
		<td class="alignC"><?php echo $value['correct'];	?></td>
		<td class="alignC"><?php echo $value['incorrect']; ?></td>
		<td class="alignC">
			<?php 
				echo $value['skipped'];
				$pValue=0;
				if($value['totalQuestions']){
					$pValue = round(($value['totalQuestions']-$value['correct'])*100/$value['totalQuestions']);
				}
			?>
		</td>
		<td class="alignC" >
			<?php echo $pValue;?>%
		</td>
		<td class="alignL" width="100">
			<a href="javascript:void(0);" id="QuestionDivA<?php echo $key;?>" onclick="showHideDiv('QuestionDiv<?php echo $key;?>','QuestionDivA<?php echo $key;?>');">Details</a>
		</td>
	</tr>
	<tr>
		<td colspan="8" style="padding:0px;">
			<div style="display:none;" id="QuestionDiv<?php echo $key;?>">
			<table cellspacing="0" border="0" cellpadding="0" width="100%" style="border:1px solid #dddddd" class="style1">
				<tr>
					<td width="15%">Related Outcome   : </td>
					<td width="55%"> <?php echo $sloArr[$value['sloId']]['LessonName']; ?></td>
					<td width="30%" rowspan="<?php if($value['isMCQ']){?>4<?php }else{ ?>3<?php }?>" >
					<?php if(!$value['isMCQ']){?>	
						<table width="100%" cellspacing="0" border="0" cellpadding="0" >
							
							
							<tr>
								<td class="alignR" style="background:black;color:#ffffff">Not-satisfactory</td>
								<td rowspan="3" width="1px" style="background-color:#ffffff;padding:0;padding-right:1px;"></td>
								<td style="padding:0;width:100% !important;background-color:#333333;" title="<?php echo $value['incorrect'];?> out of <?php echo $value['totalQuestions'];?>">
								<div style="width:<?php if(round(($value['incorrect']*100)/$value['totalQuestions'])<=2){echo"2";}else{echo round(($value['incorrect']*100)/$value['totalQuestions']);} ?>% !important;background-color:yellow;background:url(/img/yellow-img.jpg) repeat-x;">&nbsp;</div></td>
							</tr>
							<tr>
								<td class="alignR" style="background:black;color:#ffffff">Satisfactory</td>
								<td style="padding:0;width:100% !important;background-color:#5F5F5F;" title="<?php echo $value['correct'];?> out of <?php echo $value['totalQuestions'];?>">
								<div style="width:<?php if(round(($value['correct']*100)/$value['totalQuestions'])<=2){echo "2";}else{ echo round(($value['correct']*100)/$value['totalQuestions']);} ?>% !important;background-color:yellow;background:url(/img/yellow-img.jpg) repeat-x;">&nbsp;</div></td>
							</tr>
							<tr>
								<td class="alignR" style="background:black;color:#ffffff">Skipped</td>
								
								<td style="padding:0;width:100% !important;background-color:#333333;" title="<?php echo $value['skipped'];?> out of <?php echo $value['totalQuestions'];?>">
								<div style="width:<?php if(round(($value['skipped']*100)/$value['totalQuestions'])<=2){ echo "2";}else{ echo round(($value['skipped']*100)/$value['totalQuestions']);} ?>% !important;background-color:yellow;background:url(/img/yellow-img.jpg) repeat-x;">&nbsp;</div></td>
							</tr>
							<tr><td colspan="3" style="padding:0;background:#ffffff;height:1px;"></td>
							
							</tr>
							<tr><td style="background:black;color:#ffffff"></td>
							<td width="1px" style="background-color:#ffffff;padding:0;padding-right:1px;"></td>
							<td  style="background:black;">
							<?php
							$mean =ceil($value['totalQuestions']/5);
							for($i=$mean;$i<=ceil($value['totalQuestions']);$i=$i+$mean){
								echo "<div style='color:#ffffff;width:".((1/ceil($value['totalQuestions']))*100*$mean)."%;text-align:right;float:left;'>".$i."</div>";
							}
							?>
							</td></tr>
						</table>
					<?php }else{ ?>
						<table width="100%" cellspacing="0" border="0" cellpadding="0" >

							<tr>
								<td class="alignR" style="background:black;color:#ffffff">A</td>
								<td rowspan="6" width="1px" style="background-color:#ffffff;padding:0;padding-right:1px;"></td>
								<td style="padding:0;width:100% !important;background-color:#5F5F5F;" title="<?php echo $value['option_a'];?> out of <?php echo $value['totalQuestions'];?>">
								<div style="width:<?php  if(round(($value['option_a']*100)/$value['totalQuestions'])<=2){echo "2";}else{ echo round(($value['option_a']*100)/$value['totalQuestions']);} ?>% !important;background-color:yellow;background:url(/img/yellow-img.jpg) repeat-x;">&nbsp;</div></td>
							</tr>
							<tr>
								<td class="alignR" style="background:black;color:#ffffff">B</td>
								<td style="padding:0;width:100% !important;background-color:#333333;" title="<?php echo $value['option_b'];?> out of <?php echo $value['totalQuestions'];?>">
								<div style="width:<?php  if(round(($value['option_b']*100)/$value['totalQuestions'])<=2){echo "2";}else{ echo round(($value['option_b']*100)/$value['totalQuestions']);} ?>% !important;background-color:yellow;background:url(/img/yellow-img.jpg) repeat-x;">&nbsp;</div></td>
							</tr>
							<tr>
								<td class="alignR" style="background:black;color:#ffffff">C</td>
								<td style="padding:0;width:100% !important;background-color:#5F5F5F;" title="<?php echo $value['option_c'];?> out of <?php echo $value['totalQuestions'];?>">
								<div style="width:<?php  if(round(($value['option_c']*100)/$value['totalQuestions'])<=2){echo "2";}else{ echo round(($value['option_c']*100)/$value['totalQuestions']);} ?>% !important;background-color:yellow;background:url(/img/yellow-img.jpg) repeat-x;">&nbsp;</div></td>
							</tr>
							<tr>
								<td class="alignR" style="background:black;color:#ffffff">D</td>
								<td style="padding:0;width:100% !important;background-color:#333333;" title="<?php echo $value['option_d'];?> out of <?php echo $value['totalQuestions'];?>">
								<div style="width:<?php  if(round(($value['option_d']*100)/$value['totalQuestions'])<=2){echo "2";}else{ echo round(($value['option_d']*100)/$value['totalQuestions']);} ?>% !important;background-color:yellow;background:url(/img/yellow-img.jpg) repeat-x;">&nbsp;</div></td>
							</tr>
							<tr>
								<td class="alignR" style="background:black;color:#ffffff">skipped</td>
								
								<td style="padding:0;width:100% !important;background-color:#5F5F5F;" title="<?php echo $value['skipped'];?> out of <?php echo $value['totalQuestions'];?>">
								<div style="width:<?php  if(round(($value['skipped']*100)/$value['totalQuestions'])<=2){echo "2";}else{ echo round(($value['skipped']*100)/$value['totalQuestions']);} ?>% !important;background-color:yellow;background:url(/img/yellow-img.jpg) repeat-x;">&nbsp;</div></td>
							</tr>
							<tr><td colspan="3" style="padding:0;background:#ffffff;height:1px;"></td>
							
							</tr>
							<tr><td style="background:black;color:#ffffff"></td>
							<td width="1px" style="background-color:#ffffff;padding:0;padding-right:1px;"></td>
							<td  style="background:black;">
							<?php
							$mean =ceil($value['totalQuestions']/5);
							for($i=$mean;$i<=ceil($value['totalQuestions']);$i=$i+$mean){
								echo "<div style='color:#ffffff;width:".((1/ceil($value['totalQuestions']))*100*$mean)."%;text-align:right;float:left;'>".$i."</div>";
							}
							?>
							&nbsp;</td></tr>
						</table>
					<?php } ?>
					</td>
				</tr>
				<tr>
					<td>Related Chapter     :  </td>
					<td><?php echo $sloArr[$value['sloId']]['ChapterName']; ?></td>
				</tr>
				<?php if($value['isMCQ']){?>
				<tr>
					<td>Correct Answer      :  </td>
					<td><?php if($value['correctOption']<=5 and $value['correctOption']>=1){ echo chr(64+$value['correctOption']);} ?></td>
				</tr>
				
				<?php
				}
				?>
				<tr>
					<td align="left"><a href="javascript:void(0);" id="QuestionViewA<?php echo $key;?>" onclick="showHideQuestion('QuestionViewDiv<?php echo $key;?>','QuestionViewA<?php echo $key;?>');">View Question</a></td>
					<td align="right"><!--<a href="javascript:void(0);" id="QuestionDivA<?php echo $key;?>" onclick="showHideDiv('QuestionDiv<?php echo $key;?>','QuestionDivA<?php echo $key;?>');">Hide Details</a>--></td>
				</tr>
				<tr><td colspan="3" style="padding:0px;height:0px;">
					<div id="QuestionViewDiv<?php echo $key;?>" style="display:none;padding:4px">
						<b>Question:</b><br>
						<?php echo $value['question'];?>
						
						<?php if($value['isMCQ'] && $value['Answer']){?>
						<b>Answer:</b><br>
						<?php echo $value['Answer'];?>
						<br>
						<?php
							}
						?>
					</div>
				</td></tr>
			</table>
			</div>
		</td>
	</tr>
	<?php	$preQuestionNo = $value['flow'];
			$qGroup = $value['qGroup'];
		}
	}
	?>
</table>
</div>