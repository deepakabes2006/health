<?php
	$viewsession = $this->Session->read('SchoolAdmin'); 
	if(isset($viewsession['roleId']))
		$roleId = $viewsession['roleId'];
	else
		$roleId = '';

	if(isset($viewsession['roleAction']))
		$actionarray = $viewsession['roleAction'];
	else
	 $actionarray = array();
	 $action = $this->request->params['action']; 

?>
<div style="padding:5px;background-color:#ababab;height:37px;">
	<div style="height:33px;">
		<ul id="menu-2" class="menu">
			<?php if($roleId == '1') { ?>
			<li><a class="sub" href="#">Administration</a>&nbsp;&nbsp;
			<ul>
			<li class="last"><?php echo $this->Html->link('Manage Roles','/admins/manage-school-roles'); ?></li>
			<li class="last"><?php echo $this->Html->link('Manage Actions','/admins/manage-school-actions'); ?></li>
			<li class="last"><?php echo $this->Html->link('Set Role Actions','/admins/manage_school-role-actions'); ?></li>
			<li class="last"><?php echo $this->Html->link('Manage Schools','/admins/manage_schools'); ?></li>
			<li class="last"><?php echo $this->Html->link('Manage Partner Grade Subject','/admins/assign_grade_subject_to_partner'); ?></li>
			<li class="last"><?php echo $this->Html->link('Manage Partners','/admins/manage_partners'); ?></li>
			</ul>
			</li>
			<?php } ?>
			<li><a class="sub" href="#">Teachers</a>&nbsp;&nbsp;
			<ul>
			<?php if($roleId == '1' || $roleId == '2') { ?>
				<?php 
					$linkName="Add Teacher";
				?>
				<li class="last"><?php echo $this->Html->link($linkName,'/admins/registration'); ?></li>
				<?php 
					$linkName="Add Teachers(xls)";
				?>
				<li class="last"><?php echo $this->Html->link($linkName,'/admins/registration-xls'); ?></li>
				<?php 
					$linkName="Teachers List";
				?>
				<li class="last"><?php echo $this->Html->link($linkName,'/admins/school-user-list'); ?></li>
				<?php 
					$linkName="Teachers Login Info";
				?>
				<li class="last"><?php echo $this->Html->link($linkName,'/admins/school-user-info'); ?></li>
			<?php } ?>
			</ul>
			</li>
			<li><a class="sub" href="#">Students</a>&nbsp;&nbsp;
			<ul>
			<?php if($roleId == '1') { ?>
			<li class="last"><?php echo $this->Html->link('Add Students','/admins/add-school-students'); ?></li>
			<?php } ?>
			<?php if($roleId == '1') { ?>
			<li class="last"><?php echo $this->Html->link('Add Students(xls)','/admins/add_school_students_excel'); ?></li>
			<?php } ?>
			<?php if($roleId == '1' || $roleId == '2') { ?>
			<li class="last"><?php echo $this->Html->link('Students List','/admins/students-list'); ?></li>
			<?php } ?>
			<?php if($roleId == '1' || $roleId == '2') { ?>
			<li class="last"><?php echo $this->Html->link('Students Login Info','/admins/students-login-info'); ?></li>
			<?php } ?>
			</ul>
			</li>
			<li><a class="sub" href="#">Misc</a>&nbsp;&nbsp;
			<ul>			
			<?php if($roleId == '1' || $roleId == '2') { ?>
			<li class="last"><?php echo $this->Html->link(' Manage Class Sections','/admins/manage-section'); ?></li>
			<?php } ?>
			<?php if($roleId == '1' || $roleId == '2') { ?>
			<!--<li class="last"><?php echo $this->Html->link('Assign Permission','/admins/create_grade_section'); ?></li>-->
			<?php } ?>			
			<?php if($roleId == '2') { ?>
			<li class="last"><?php echo $this->Html->link('Manage Subject','/admins/manage_subject'); ?></li>
			<?php } ?>
			<?php if($roleId == '2') { ?>
			<li class="last"><?php echo $this->Html->link('Manage Subarea','/admins/manage_cce_subarea'); ?></li>
			<?php } ?>
			<?php if($roleId == '2') { ?>
			<li class="last"><?php echo $this->Html->link('Manage Percentage','/admins/manage_percentage'); ?></li>
			<?php } ?>
			<?php if($roleId == '1' || $roleId == '2') { ?>
			<li class="last"><?php echo $this->Html->link('Test Papers','/admins/test-paper-list'); ?></li>
			<?php } ?>
			<?php if($roleId == '2') { ?>
			<li class="last"><?php echo $this->Html->link('Manage Logo','/admins/manage_logo'); ?></li>
			<?php } ?>
			</ul>
			</li>

			<li><?php echo $this->Html->link('Change Password','/admins/changepassword'); ?> &nbsp;&nbsp;</li>
			<li class="last active"><?php if($action=='login') echo $this->Html->link('Login','/admins/login'); else echo $this->Html->link('Logout','/admins/logout'); ?></li>
		</ul>
	</div>
</div>

