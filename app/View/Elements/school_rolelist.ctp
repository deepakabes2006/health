<?php 
//echo "eeee <pre>";print_r($roleslist); echo"</pre>";
?>
<table cellpadding="0" cellspacing="1" border="0" width="100%" class="style1">
			<tr class="head">
				<td class="alignC" >#</td>
				<td>Roles</td>
				<td>Action</td>
			</tr>
			<?php 
				if(count($roleslist) < 1) { ?>
				<tr class="">
				<td class=" alignC"></td>
				<td class="textGray">Not Present</td>
				<td class="textGray">null</td>
				</tr>

				<?php }else {
				foreach($roleslist as $key=>$value) { 
				$roleid=$value['SchoolRole']['id'];
				if(($key%2) != 0) {
					$trclass = 'alternate';
				}else {
					$trclass = '';
				}
			?>
			<tr class="<?php echo $trclass; ?>">			
				<td class=" alignC"><?php echo $key+1; ?></td>
				<td class=""><div id="rolename_<?php echo $roleid?>"><?php echo $value['SchoolRole']['name']; ?></div>
				<div style="display:none;width:400px;padding-left:10px;padding-right:10px;" id="editrole_<?php echo $roleid?>">
			<?php
			//echo $this->Ajax->form('updaterole','post',array('update'=>'updaterole','url'=>'/admins/update_school_role','autocomplete'=>'off','after'=>'swapname('.$roleid.');$(\'editrole_'.$roleid.'\').hide();$(\'role_mssg\').show();Effect.Fade(\'role_mssg\',{duration:3});Effect.Appear(\'rolename_'.$roleid.'\',{duration:1}) ')); 
			echo $this->Ajax->form('updaterole','post',array('update'=>'updaterole','async'=>false,'url'=>'/admins/update_school_role','autocomplete'=>'off','after'=>'swapname('.$roleid.');$(\'#editrole_'.$roleid.'\').hide();$(\'#role_mssg\').show();')); ?>
                        <input type="hidden" value="<?php echo $roleid?>" name="data[SchoolRole][id]">
			Role Name:
			<input type="text" size="20" width="20" value="<?php echo $value['SchoolRole']['name']; ?>" id="roletext_<?php echo $value['SchoolRole']['id']; ?>" name="data[SchoolRole][name]">
			<?php echo $this->Form->submit('Update'); ?>&nbsp;&nbsp;
			<a href="#" onclick="$('#editrole_<?php echo $roleid?>').hide();$('#rolename_<?php echo $roleid?>').show();"> cancel </a>			
			</form>
</div></td>
				<td class="" width="20%"><?php echo $this->Html->link('edit','#',array('onclick'=>'$(\'#editrole_'.$roleid.'\').show();$(\'#rolename_'.$roleid.'\').hide();')); ?> &nbsp;&nbsp;&nbsp;<?php echo $this->Html->link('delete','#',array('onclick'=>' deleteschoolrole('.$roleid.')')); ?></td>			
			</tr>			
			<?php } ?>

		<?php } ?>
</table>