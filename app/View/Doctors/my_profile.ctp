<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Add Patient</title>

<!--<link rel="stylesheet" type="text/css" media="screen" href="/css/validate/screen.css" />-->
<link rel="stylesheet" type="text/css" media="screen" href="/css/chosen/chosen.css" />

<script src="/js/jquery-1.8.0.min.js" type="text/javascript"></script>    
<script src="/js/chosen/chosen.jquery.js" type="text/javascript"></script>
<script src="/js/jquery.jeditable.js" type="text/javascript"></script>
<!--<script src="/js/calender/jquery.metadata.js" type="text/javascript"></script>        -->
<!--<script src="/js/calender/jquery.form.js" type="text/javascript"></script>-->     
<script src="/js/calender/jquery.validate.js" type="text/javascript"></script>
<!--<script type="text/javascript" src="/js/jquery.timers.js"></script>-->
<!--<script type="text/javascript" src="/js/mbTooltip.js"></script>
<link rel="stylesheet" type="text/css" href="/css/mbTooltip.css" title="style1"  media="screen">
-->
<script>
function makeEditable(){
	$('.edit_name').editable('/doctors/update_profile', {
         indicator : 'Saving...',
         tooltip   : 'Enter Name',
		 onblur : 'submit',
		 id   : 'field_name',
         name : 'value',
     style   : 'display: inline',
		 onsubmit: function(settings, td) {
				var input = $(td).find('input');
				$(this).validate({
					rules: {
						'value': {
							required: true
						}
					},
					messages: {'value': {required: 'Enter the Name'}}
				});
				return ($(this).valid());
			}
     });
     $('.edit').editable('/doctors/update_profile', {
         indicator : 'Saving...',
         tooltip   : 'Click to edit...',
		 onblur : 'submit',
		 id   : 'field_name',
         name : 'value',
     style   : 'display: inline'/*,
		 onsubmit: function(settings, td) {
				var input = $(td).find('input');
				console.log(input);
				$(this).validate({
					rules: {
						'field_name': {
							required: true
						}
					},
					messages: {'field_name': {required: 'Only numbers are allowed'}}
				});
				return ($(this).valid());
			}*/
     });
	 $('.edit_area').editable('/doctors/update_profile', {
         indicator : 'Saving...',
		 type     : 'textarea',
         tooltip   : 'Click to edit...',
		 onblur : 'submit',
		 id   : 'field_name',
         name : 'value',
     style   : 'display: inline'
     });
	 $('.edit_contact_type').editable('/doctors/update_contact', {
         indicator : 'Saving...',
         tooltip   : 'Contact Type',
		 placeholder : 'Contact Type',
		 onblur : 'submit',
		 id   : 'field_name',
         name : 'value',
     style   : 'display: inline'/*,
		 onsubmit: function(settings, td) {
				var input = $(td).find('input');
				console.log(input);
				$(this).validate({
					rules: {
						'field_name': {
							required: true
						}
					},
					messages: {'field_name': {required: 'Only numbers are allowed'}}
				});
				return ($(this).valid());
			}*/
     });
	 $('.edit_mobile').editable('/doctors/update_contact', {
         indicator : 'Saving...',
         tooltip   : 'Mobile',
		 placeholder : 'Mobile',
		 onblur : 'submit',
		 id   : 'field_name',
         name : 'value',
     style   : 'display: inline'/*,
		 onsubmit: function(settings, td) {
				var input = $(td).find('input');
				console.log(input);
				$(this).validate({
					rules: {
						'field_name': {
							required: true
						}
					},
					messages: {'field_name': {required: 'Only numbers are allowed'}}
				});
				return ($(this).valid());
			}*/
     });
	 $('.edit_email').editable('/doctors/update_contact', {
         indicator : 'Saving...',
         tooltip   : 'Email',
		 placeholder : 'Email',
		 onblur : 'submit',
		 id   : 'field_name',
         name : 'value',
     style   : 'display: inline',
	 
		 onsubmit: function(settings, td) {
				var input = $(td).find('input');
				console.log(input);
				$(this).validate({
					rules: {
						'value': {
							email: true
						}
					},
					messages: {'value': {email: 'Enter valid email'}}
				});
				return ($(this).valid());
			}
     });
}
$(document).ready(function() {
		makeEditable();
 });
</script>

</head>
<body>

<div id="main">
name 
<div class="edit_name" id="name"><?php echo $user['userInfo']['name'];?> </div>
<br>
Education &  Training 
<div class="edit_area" id="education"><?php echo $user['userInfo']['education'];?></div>
<br>
Certifications & Awards 
<div class="edit_area" id="awards"><?php echo $user['userInfo']['awards'];?></div>
<br>
	Specialization:
 <select id="specialization" name="specialization[]" data-placeholder="Choose a Country..." class="chzn-select" multiple style="width:350px;" tabindex="4" onchange="savespecialization();">
          <option value=""></option> 
          <option value="United States">United States</option> 
          <option value="United Kingdom">United Kingdom</option> 
          <option value="Afghanistan">Afghanistan</option> 
          <option value="Albania">Albania</option> 
          <option value="Algeria">Algeria</option> 
          <option value="American Samoa">American Samoa</option> 
          <option value="Andorra">Andorra</option> 
          <option value="Angola">Angola</option> 
          <option value="Anguilla">Anguilla</option> 
 </select>

<br><br><br>
 Contact:
 
<br>
<div id="contactBox">
<?php foreach($contacts as $val){ ?>
<div id="contact<?php echo $val['DoctorContact']['id'];?>">
<span class="edit_contact_type" id="contact_type-<?php echo $val['DoctorContact']['id'];?>"><?php echo $val['DoctorContact']['contact_type'];?></span>&nbsp;&nbsp;&nbsp;
<span class="edit_mobile" id="mobile-<?php echo $val['DoctorContact']['id'];?>"><?php echo $val['DoctorContact']['mobile'];?></span>&nbsp;&nbsp;&nbsp;
<span class="edit_email" id="email-<?php echo $val['DoctorContact']['id'];?>"><?php echo $val['DoctorContact']['email'];?></span>&nbsp;&nbsp;&nbsp;

<a href="javascript:void(0);" onclick="delete_contact(<?php echo $val['DoctorContact']['id'];?>)">delete</a>
</div>
<br>
<?php } ?>
</div>
<br>
<br>
<a href="javascript:void(0);" onclick="add_contact()">Add Contact</a>

<br><br>
<br>

Location & Timings:
<table width="100%">
<?php
foreach($address as $val){
	$flag=1;
	foreach($val['DoctorTiming'] as $val1){
?>
	<tr><td>
	<?php 
		echo $this->Util->daysNameList($val1['days']);
	?>
	</td><td><?php echo $val1['time_form']; ?>-<?php echo $val1['time_to']; ?></td><td><?php echo $val1['details']; ?></td>
	<?php if($flag){ ?>
	<td rowspan="<?php echo count($val['DoctorTiming']); ?>" valign="center"><?php echo $val['DoctorAddress']['address']; ?> <?php echo $val['DoctorAddress']['city']; ?> <?php echo $val['DoctorAddress']['pin']; ?></td>
	<?php } ?>
	</tr>
<?php
	$flag=0;
	}
}
?>
</table>
<br>
<?php  echo $this->Html->link('Change','manage_timings');?>
</div>
<script type="text/javascript"> 
function add_contact(){
	$.ajax({
	  url: '/doctors/add_contact/',
	  success: function(data) {
			$("#contactBox").append("<div id='contact"+data+"'></div>");
			var text ='<span class="edit_contact_type" id="contact_type-'+data+'"></span>&nbsp;&nbsp;&nbsp;';
			text +='<span class="edit_mobile" id="mobile-'+data+'"></span>&nbsp;&nbsp;&nbsp;';
			text +='<span class="edit_email" id="email-'+data+'"></span>&nbsp;&nbsp;&nbsp;';
			text +='<a href="javascript:void(0);" onclick="delete_contact('+data+')">delete</a>';
			$("#contact"+data).html(text);
			makeEditable();
	  }
	});	
}
function delete_contact(id){
	$("#contact"+id).remove();
	$.ajax({
	  url: '/doctors/delete_contact/'+id,
	  success: function(data) {
	  }
	});
}

$(".chzn-select").chosen(); 
$(".chzn-select-deselect").chosen({allow_single_deselect:true}); 
</script>
</body>
</html>
