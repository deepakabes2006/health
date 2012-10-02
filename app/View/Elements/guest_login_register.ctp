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
?>
<div style="background-color:#05C2DF; padding:8px; margin-top:25px; color:white;" class="bold"><?php echo $text[0]; ?></div>
<div style="background-color:#afe3ff; padding:15px;">
	<table cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td valign="top" width="300">
                <div class="signup_reasonsBox" style="background-color:white;">
                    <form name="loginform" action="/users/login<?php echo $redirect; ?>" method="post">
                        <div class="title">
                            <span style="padding-left: 10px;">Login</span>
                        </div>
                        <table class="text12 textGray3" style="padding:8px 0;" width="" align="center" cellpadding="2" cellspacing="2">
                            <tbody>
                                <tr>
                                    <td class="vAlignB">Username*</td>
                                    <td><input name="data[User][username]" id="userid" maxlength="20" value="" type="text"></td>
                                </tr>
                                <tr>
                                    <td>Password*</td>
                                    <td><input name="data[User][password]" id="password" maxlength="20" value="" type="password"></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>
                                        <input name="Login" value="Login" type="submit">
                                    </td>
                               </tr>
                               <tr>
                                    <td>&nbsp;</td>
                                    <td align="right"><a href="/users/forgotpassword" style="font-size:11px;">Forgot password</a></td>
                               </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
			</td>
            <td valign="top" align="center">
                <br/><br/>
                &nbsp;&nbsp;<strong>-OR-</strong>&nbsp;&nbsp;
            </td>
			<td width="300">
				<div class="signup_reasonsBox" style="background-color:white;">
					 <?PHP echo $this->Form->create(null,array('url'=>'/users/registration','type'=>'post','name'=>'userregistration'));?>
						<div class="title">
							<span style="padding-left: 10px;">Register now!</span>
							<span style="color: rgb(234, 14, 112);">FREE</span>
						</div>
						<table class="text12 textGray3" style="padding:8px 0;" width="" align="center" cellpadding="2" cellspacing="2">
							<tbody>
								<tr>
									<td class="vAlignB">Username*</td>
									<td><input name="data[User][username]" size="20" maxlength="20" value="" id="UserUsername" type="text"></td>
								</tr>
								<tr>
									<td>Password*</td>
									<td><input name="data[User][password]" size="20" maxlength="20" value="" id="UserPassword" type="password"></td>
								</tr>
								<tr>
									<td>Email*</td>
									<td><input name="data[User][email]" size="20" maxlength="30" value="" id="UserEmail" type="text"></td>
								</tr>
								
                                <tr>
                                    <td>Board *</td>  
                                    <td><select name="data[UserDetail][curriculumId]" id="jsonCurriculumId" onchange="setOptionVal(1,'jsonGradeId','jsonCurriculumId',json);" style="width:125px;"></select></td>
                                </tr>
                                <tr>
									<td>Class*</td>
									<td><select name="data[UserDetail][gradeId]" id="jsonGradeId" style="width:100px;"></select><script>setOptionVal(0,'jsonGradeId','jsonCurriculumId',json);</script></td>
								</tr>
								<tr>
									<td>Mobile*</td>
									<td><input name="data[UserDetail][mobile]" size="20" maxlength="17" value="" id="UserDetailMobile" type="text"></td>
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
										<input name="data[User][gestLoginRegister]" id="password" maxlength="20" value="<?php echo $redirect; ?>" type="hidden">
										<input value="I agree" type="submit"> to 
										<a href="#" onclick='window.open("/htmls/termsandcondition","name","height=430,width=630,screenX=200,screenY=100,scrollbars=yes,resizable=no,status=no,location=no"); return false;'>terms and conditions</a> <input name="data[User][termsCondition]" value="1" id="UserTermsCondition" type="hidden"><input name="data[User][indexpage]" value="1" id="UserIndexpage" type="hidden">
									</td>
							   </tr>
							</tbody>
						</table>
					</form>
				</div>
			</td>
		</tr>
	</table>
</div>
