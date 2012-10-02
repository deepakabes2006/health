		<table cellpadding="0" cellspacing="1" border="0" width="100%" class="style1" id="actionstbl">
			<tr class="head">
				<td class="alignC" >#</td>
				<td>Action name</td>
				<td>Description</td>
				<td>Action</td>
			</tr>
			<?php 
				if(count($actionslist) < 1) { ?>
				<tr class="">
				<td class=" alignC"></td>
				<td class="textGray">Not Present</td>
				<td class="textGray">null</td>
				<td class="textGray"></td>
				</tr>
				<?php }else {
				foreach($actionslist as $key=>$value) { 
				$actionid=$value['SchoolAction']['id'];
				if(($key%2) != 0) {
					$trclass = 'alternate';
				}else {
					$trclass = '';
				}
			?>
			
			<tr class="<?php echo $trclass; ?>">			
				<td class=" alignC"><?php echo $key+1; ?></td>
				<td class=""><div id="actionname_<?php echo $actionid?>"><?php echo $value['SchoolAction']['name']; ?></div>
				<div style="display:none;width:400px;padding-left:10px;padding-right:10px;" id="editaction_<?php echo $actionid?>">
			<?php
			echo $this->Ajax->form('updateaction','post',array('update'=>'updateaction','url'=>'/admins/update_school_action','autocomplete'=>'off','after'=>'swapname('.$actionid.');$(\'#editaction_'.$actionid.'\').hide();$(\'#action_mssg\').show();')); ?>
			<input type="hidden" value="<?php echo $actionid?>" name="data[SchoolAction][id]">
			Action Name:
			<input type="text" size="20" width="20" value="<?php echo $value['SchoolAction']['name']; ?>" id="actiontext_<?php echo $value['SchoolAction']['id']; ?>" name="data[SchoolAction][name]">
			<?php echo $this->Form->submit('Update'); ?>&nbsp;&nbsp;
			<a href="#" onclick="$('#editaction_<?php echo $actionid?>').hide();$('#actionname_<?php echo $actionid?>').show();"> cancel </a>			
			</form>
			</div></td>
			<td width="36%"> <?php echo $value['SchoolAction']['description']; ?></td>
				<td class="" width="12%"><?php echo $this->Html->link('edit','#',array('onclick'=>'$(\'#editaction_'.$actionid.'\').show();$(\'#actionname_'.$actionid.'\').hide();')); ?> &nbsp;&nbsp;&nbsp;<?php echo $this->Html->link('delete','#',array('onclick'=>'delete_school_action('.$actionid.')')); ?></td>
				
			</tr>
						
			<?php } ?>
			
		<?php } ?>
		</table>