<table width="100%" align="left" border="0" cellspacing="0" cellpadding="0" class="style1" >
<?php 

foreach($subjectList as $subjectId=>$value) {
?>
	 <tr class="head">
		<td align="left" class="field" valign="top">
			<div class="checkbox">
				<input  class="SectionGradeId" <?php  if(isset($permissionList[$subjectId])){echo "checked";} ?> type="checkbox" onclick="showSection(this,'subject<?php echo $subjectId;?>');"/>
				<label for="SectionCompleted<?php echo $subjectId; ?>"><?php echo $value;?></label>
			</div>
		</td>
	</tr>
	<tr>
	<td class="checkbox subject<?php echo $subjectId;?>" style="display:<?php if(isset($permissionList[$subjectId]) ){echo "";}else{echo "none";} ?>;">
		<table border="0" cellspacing="0" cellpadding="0" width="100%">
		<tr style="height:2px" ">
			<td align="left" class="field" id="sectionList" valign="top">
				<?php 
				if(isset($textbookList[$subjectId]) && $textbookList[$subjectId]) {
					    foreach($textbookList[$subjectId] as $textbookId=>$value) {
						?>
						<div class="checkbox subject<?php echo $subjectId;?>" style="width:100%;display:<?php if(isset($permissionList[$subjectId])){echo "";}else{ echo "none";} ?>;background:#424242;color:white;font-weight:bold;">
						<input <?php  if(isset($permissionList[$subjectId][$textbookId])){echo "checked";} ?> class="chapterBox"  type="checkbox" onclick="showSubject(this,'subject<?php echo $subjectId; ?>','textbook<?php echo $textbookId; ?>');" />
						
						&nbsp;&nbsp;<label ><?php echo $value; ?></label>
						</div>


							<table border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td align="left" class="field" colspan="2" id="subjectList">
										<?php 
										if(isset($chapterList[$subjectId][$textbookId]) && $chapterList[$subjectId][$textbookId]){?>
										<table>
											<?php 
												foreach($chapterList[$subjectId][$textbookId] as $chapterId=>$value){
											 ?>
											 <tr><td class="subject<?php echo $subjectId." textbook".$textbookId;?>" style="display:<?php if(isset($permissionList[$subjectId][$textbookId]) ){echo "";}else{ echo "none";} ?>;">
												<input <?php if(isset($permissionList[$subjectId][$textbookId][$chapterId]) ){echo "checked";} ?> class="chapterBox"  type="checkbox"  id="subjectId" name="data[UserAssignedChapter][subjectIds][]" 
												value="<?php echo $subjectId."~~".$textbookId."~~".$chapterId; ?>"/>
												<label ><?php echo $value;?></label>
											
											</td></tr>
										<?php } ?>
										</table>
										<?php	 } ?>
									</td>
								</tr>
							</table>

					 <?php 
				}}?>
			</td>
		</tr>
		</table>
	</td>
	</tr>
	<tr><td style="height:1px;"></td></tr>
	<?php }	?>
	<tr>
		<td align="center" class="field" id="subjectList"><input type="submit" name="submit"  value="Grant Access"></td>
	</tr>
</table>