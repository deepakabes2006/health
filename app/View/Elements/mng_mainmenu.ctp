<?php
        echo $this->Html->css('protfish');
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
                    <!--	<li><a class="sub" href="#">Teachers</a>&nbsp;&nbsp;
			<ul>
			<?php if($roleId == '1' || $roleId == '2') { ?>
				<?php 
					$linkName="Add Teacher";
				?>
				<li class="last"><?php echo $this->Html->link($linkName,'/mng/registration'); ?></li>
				<?php 
					$linkName="Add Teachers(xls)";
				?>
				<li class="last"><?php echo $this->Html->link($linkName,'/mng/registration-xls'); ?></li>
				<?php 
					$linkName="Teachers List";
				?>
				<li class="last"><?php echo $this->Html->link($linkName,'/mng/school-user-list'); ?></li>
				<?php 
					$linkName="Teachers Login Info";
				?>
				<li class="last"><?php echo $this->Html->link($linkName,'/mng/school-user-info'); ?></li>
			<?php } ?>
			</ul>
			</li>
                    -->
			<li><a class="sub" href="#">Students</a>&nbsp;&nbsp;
			<ul>			
                            <li class="last"><?php echo $this->Html->link('Add Students','/mng/add-school-students'); ?></li>
                            <!-- <li class="last"><?php echo $this->Html->link('Add Students(xls)','/mng/add_school_students_excel'); ?></li> -->
                            <li class="last"><?php echo $this->Html->link('Students List','/mng/students-list'); ?></li>						
                            <li class="last"><?php echo $this->Html->link('Students Login Info','/mng/students-login-info'); ?></li>			
                        </ul>
			</li>
			<li><a class="sub" href="#">Misc</a>&nbsp;&nbsp;
			<ul>						
                            <li class="last"><?php echo $this->Html->link(' Manage Class Sections','/mng/manage-section'); ?></li>  
                            <li class="last"><?php echo $this->Html->link('Manage Percentage','/mng/manage_percentage'); ?></li>			
			</ul>
			</li>
		</ul>
	</div>
</div>

