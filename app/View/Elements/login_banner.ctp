<script language="javascript">
    var json=<?php echo $currGradeList['json']; ?>;
    var selectGradeId = ''; 
    var selectCurrId = '';    
</script>
<?php if(isset($this->request->url)){ 
		$redirect = '/'.$this->request->url;
		if(preg_match('/study-online/',$redirect)) {
			$redirect = str_replace('study-online','study-online',$redirect);
		}
	}else{
		$redirect = '';
	}
if(isset($width))
    $tableWidth = 'width=".$width."';
else
    $tableWidth = 'width="*"';

?>
<div <?php if(!isset($width)) echo 'style="width:199px;"'; ?>>
<div class="signup_reasonsBox" style="margin-bottom:15px;">
<?php echo $this->Form->create(null,array('url'=>'/users/registration','name'=>'registration','id'=>'registration'));?>
<input name="data[User][gestLoginRegister]" value="<?php echo $redirect; ?>" type="hidden">
<div class="title"><span style="padding-left:10px">Register now!</span> <span style="color:#EA0E70">FREE</span></div>
<table <?php echo $tableWidth; ?> cellpadding="2" cellspacing="2" class="text11 textGray3" align="center" style="padding:5px 0px;">
	<tr>
		<td class="vAlignB">Username*</td>
		<td><?php echo $this->Form->input('User.username', array('size' => '15', 'maxlength'=>'20','label'=>false,'div'=>false)); ?></td>
	</tr>
	<tr>
		<td>Password*</td>
		<td><?php echo $this->Form->password('User.password', array('size' => '15','maxlength'=>'20','label'=>false)); ?></td>
	</tr>
	<tr>
		<td>Email*</td>
		<td><?php echo $this->Form->input('User.email', array('size' => '15','maxlength'=>'30','label'=>false)); ?></td>
	</tr>
    <tr>
        <td>Board *</td>  
        <td><select name="data[UserDetail][curriculumId]" id="jsonLoginbannerCurriculumId" onchange="setOptionVal(1,'jsonLoginbannerGradeId','jsonLoginbannerCurriculumId',json);" style="width:110px;"></select></td>
    </tr>
    <tr>
        <td>Class*</td>
        <td><select name="data[UserDetail][gradeId]" id="jsonLoginbannerGradeId" style="width:100px;"></select><script>setOptionVal(0,'jsonLoginbannerGradeId','jsonLoginbannerCurriculumId',json);</script></td>
    </tr>
	<tr>
		<td>Mobile*</td>
		<td><?php echo $this->Form->input('UserDetail.mobile', array('size' => '15','maxlength'=>'17','label'=>false)); ?></td>
	</tr>
	<tr>
		<td>You are a*</td>
		<td><?php echo $this->Form->select('UserDetail.userType',unserialize(MN_USER_TYPE),null,null,null,False); ?></td>
	</tr>
	<tr>
		<td colspan="2">You are viewing this site from*</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<?php echo $this->Form->select('UserDetail.hasInternet',unserialize(MN_SURFING_LOCATION),null,null,null,False); ?>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<?php echo $this->Form->submit('I agree',array('div'=>false));?> to 
			<?php echo $this->Html->link('terms &amp; conditions', '#', array('onclick'=>'window.open("/htmls/termsandcondition", "name", "height=430, width=630,screenX=200, screenY=100,scrollbars=yes,resizable=no,status=no,location=no"); return false;'),null,false);?>
			<?php echo $this->Form->hidden('termsCondition',array('value'=>1));?>
			<?php echo $this->Form->hidden('indexpage',array('value'=>1));?>
		</td>
	</tr>
</table>
</form>
</div>
</div>