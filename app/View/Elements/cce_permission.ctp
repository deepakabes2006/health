<table width="100%" align="left" border="0" cellspacing="0" cellpadding="0" class="style1" >
<?php 
//pr($teacherList);
//pr($teacherId);
foreach($gradeList as $gradeId=>$value) {
//pr($teacherList[$gradeId]);
/*if($teacherId && in_array($teacherId,$teacherList[$gradeId])){
	echo "1";
}else{
	echo "0";
}*/
?>
	 <tr class="head">
		<td align="left" class="field" valign="top">
			<div class="checkbox">
				<input  class="SectionGradeId" <?php if($teacherId && in_array($teacherId,$teacherList[$gradeId])){ echo "disabled ";} if(isset($permissionList[$gradeId]) || ($teacherId && in_array($teacherId,$teacherList[$gradeId]))){echo "checked";} ?> type="checkbox" onclick="showSection(this,'<?php echo $gradeId;?>');"/>
				<span><label for="SectionCompleted<?php echo $gradeId; ?>"><?php echo 'Grade-'.$value;?></label>
			</div>
		</td>
	</tr>
	<tr>
	<td class="checkbox <?php echo $gradeId;?>" style="display:<?php if(isset($permissionList[$gradeId]) || ($teacherId && in_array($teacherId,$teacherList[$gradeId]))){echo "";}else{echo "none";} ?>;">
		<table border="0" cellspacing="0" cellpadding="0" width="100%">
		<tr style="height:2px" ">
			<td align="left" class="field" id="sectionList" valign="top">
				<?php 
				if(isset($sectionList[$gradeId]) && $sectionList[$gradeId]) {
					    foreach($sectionList[$gradeId] as $sectionId=>$value) {
						?>
						<div class="checkbox <?php echo $gradeId;?>" style="width:100%;display:<?php if(isset($permissionList[$gradeId]) || ($teacherId && in_array($teacherId,$teacherList[$gradeId]))){echo "";}else{ echo "none";} ?>;background:#424242;color:white;font-weight:bold;">
						<input <?php if($teacherId && $teacherList[$gradeId][$sectionId]==$teacherId){ echo "disabled ";} if(isset($permissionList[$gradeId][$sectionId])|| ($teacherId && $teacherList[$gradeId][$sectionId]==$teacherId)){echo "checked";} ?> class="chapterBox"  type="checkbox" onclick="showSubject(this,'<?php echo $gradeId; ?>','<?php echo $sectionId; ?>');" />
						
						&nbsp;&nbsp;<label ><?php echo 'Section-'.$gradeList[$gradeId];?>-<?php echo $value; ?></label>
						</div>
							<table border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td align="left" class="field" colspan="2" id="subjectList">
										<?php 
										if(isset($subjectList[$gradeId][$sectionId]) && $subjectList[$gradeId][$sectionId]){?>
											<?php 
												foreach($subjectList[$gradeId][$sectionId] as $subjectId=>$value){
											 ?>
											<span class="<?php echo $gradeId." ".$sectionId;?>" style="display:<?php if(isset($permissionList[$gradeId][$sectionId]) || ($teacherId && $teacherList[$gradeId][$sectionId]==$teacherId)){echo "";}else{ echo "none";} ?>;width:150px">
												<input <?php if($teacherId && $teacherList[$gradeId][$sectionId]==$teacherId){echo " disabled ";} if(isset($permissionList[$gradeId][$sectionId][$subjectId]) || ($teacherId && $teacherList[$gradeId][$sectionId]==$teacherId)){echo "checked";} ?> class="chapterBox"  type="checkbox"  id="subjectId" name="data[CceTeacherPermission][subjectIds][]" 
												value="<?php echo $gradeId."~~".$sectionId."~~".$subjectId; ?>"/>
												<label ><?php echo $value;?></label>
											</span>
										<?php }} ?>
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
		<td align="center" class="field" id="subjectList"><input type="submit" name="submit"  value="save data"></td>
	</tr>
</table>