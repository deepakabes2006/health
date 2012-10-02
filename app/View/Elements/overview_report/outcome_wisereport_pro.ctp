<div id="div-outcomeWiseReport" style="display:none;">

<div class="alignL"><font color="#6891BD" size="4">Performance Analysis By Outcome</font></div>
<hr color="#BFDEFF" width="100%">
<div style="height:20px;"></div>
	<table width="100%" cellpadding="0" cellspacing="0" border="0" class="style1" style="border:1px solid #E7E7E4">
		<tr class="head">
			<td>Name</td>
			<td>Description</td>
			<td class="alignC">Achievement Level</td>
			<td>&nbsp;</td>
			<td style="padding:0;width:200px !important;background:black;border:1px;background:url(/img/dark_grey.jpg) repeat-x;" class="alignC">
				% Achievement Level >>
				<br>
				<?php
				$maxSloPercentMarks=100;
				$mean =ceil($maxSloPercentMarks/5);

				for($i=$mean;$i<=ceil($maxSloPercentMarks);$i=$i+$mean){
					echo "<div style='width:".((1/ceil($maxSloPercentMarks))*100*$mean)."%;text-align:right;float:left;'>".$i."</div>";
				}
				?>
			</td>
		</tr>
<?php
$chapterNo = 0;
foreach($sloChapterResult as $chapterId=>$chapterDetail){
	$chapterNo ++;
	$chapterPercent= (($chapterDetail['SumOfAchievmentPercent'] ) /$chapterDetail['NoOfSlo']);
	
?>

	<tr  style="background-color: #dddddd;">
		<td style="background-color: #dddddd;"><b>Chapter <?php echo $chapterNo;?></b></td>
		<td style="background-color: #dddddd;"><b><?php echo $chapterDetail['ChapterName'];?></b></td>
		<td class="alignC" style="background-color: #dddddd;"><strong><?php echo round($chapterPercent); ?>%</strong></td>
		<td class="alignC" style="background-color: #dddddd;">&nbsp;</td>
		<td style="padding:0;width:200px !important;background-color:#444444;">
		<div style="width:<?php if($chapterPercent<=2){echo "2";}else{ echo $chapterPercent;} ?>% !important;background-color:green;background:url(/img/green-img.jpg) repeat-x;">&nbsp;</div></td>
	</tr>
<?php
$qNo=0;
	foreach($chapterDetail['LessonDetail'] as $key=>$value){
		$qNo++;
	$trclass = ($key%2) == 0 ? '':'class="alternate"';
	
	if($value['statusFlag']){
		$statusFlag="text_tick.gif";
	}else{
		$statusFlag="text_cross.gif";
	}
	$bgcolor = ($qNo%2==0 ? '#333333' : '#5F5F5F');
?>		
	<tr <?php echo $trclass?>>
		<td width="11%">Outcome <?php echo $chapterNo.".".($key+1);?></td>
		<td><?php echo $value['title']; ?></td>
		<td class="alignC"><?php echo $value['achievmentPercent']; ?>%</td>
		<td width="7%">
			<a href="javascript:void(0);" id="LessonDivA<?php echo $chapterNo.($key+1);?>" onclick="showHideDiv('LessonDiv<?php echo $chapterNo.($key+1);?>','LessonDivA<?php echo $chapterNo.($key+1);?>');">Details</a>
		</td>
		<td style="padding:0px;width:200px !important;background-color:<?php echo $bgcolor;?>;">
		<div style="width:<?php if($value['achievmentPercent']<=2){echo "2";}else{ echo $value['achievmentPercent'];} ?>% !important;background-color:yellow;background:url(/img/yellow-img.jpg) repeat-x">&nbsp;</div></td>
	</tr>
	<tr  style="heigth:0px;">
		<td colspan="5" style="padding:0">
		<div style="display:none;" id="LessonDiv<?php echo $chapterNo.($key+1);?>">
			<table width="100%" cellpadding="0" cellspacing="0" border="0" style="border:1px solid #dddddd" class="style1">
				<tr>
					<td width="21%" align="left">Achievement Level :</td>
					<td  align="left"><?php echo $value['passingRatio']; ?></td>
				</tr>
				<tr>
					<td>Class Performance :</td>
					<td align="left"><?php echo $this->Html->image($statusFlag); ?></td>
				</tr>
				<tr>
					<td>Proficient Students :</td>
					<td align="left">
						<?php 
						if($value['proficient']){ 
							echo $value['proficient'];
						}else{
							echo "None";
						} ?>
					</td>
				</tr>
				<tr>
					<td>Average Students :</td>
					<td align="left">
						<?php 
						if($value['average']){ 
							echo $value['average'];
						}else{
							echo "None";
						} ?>
					</td>
				</tr>
				<tr>
					<td>Non-proficient Students :</td>
					<td align="left">
						<?php 
						if($value['havingProblem']){ 
							echo $value['havingProblem'];
						}else{
							echo "None";
						} ?>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="right">

						<?php if($value['isSlo']=='1'){
							if(file_exists('./img/lp_pdf/'.$value['sloCode'].'.pdf')) {
								echo $this->Html->link('View Study Material','/img/lp_pdf/'.$value['sloCode'].'.pdf', array('target'=>'_blank'));
							}
						}
						;?>
					</td>
				</tr>
			</table>
			</div>
		</td>			
	</tr>
		
<?php	
 }
 }?>
 </table>
</div>