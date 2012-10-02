<?php
if ($this->Session->check('Message.flash')) {
    echo $this->Session->flash();
 } ?>
<div class="mainpage">
	<div class="left-container"><br><br>
		<input class="search" type="text" name="searchbox" id="searchbox" oldvalue="" onkeyUp="getPatientsList()">
		<br>
		<a class="find-p" href="#">Find a patient</a>
		<a class="add-p" href="#">Add a patient</a>
	</div>
	<div class="right-container"><br><br> 
		<div class="sorting-option"><b>Sort :</b> 
		<?php foreach($sortByArr as $key=>$val){ ?>
			<a href="javascript:void(0);" onclick="setSortBy(<?php echo $key;?>)"><?php echo $val['dName'];?></a> 
		<?php } ?>
		 <?php foreach($sortTypeArr as $key=>$val){ ?>
			<a href="javascript:void(0);" onclick="setSortType(<?php echo $key;?>)"><?php echo $val['dName'];?></a>
		<?php } ?>
		<div id="posts-container">
			<?php
				foreach ($patients as $patient) :
						//pr();
			?>
				<div class="patient-box">
					<img src="/img/picture.jpg">
					<div class="detail">
						<h3><?php echo $patient['pp']['name'] ?></h3>
						<?php echo $patient['pp']['email_primary'] ?><br>
						<?php echo $patient['0']['noOfAppointments'] ?> Appointments
					</div>
					<div class="clear"></div>
					<?php if($patient['0']['lastAppointments']){ ?>
					<span class="dark-grey">Last Visit: <?php echo $this->Util->timeAgo($patient['0']['lastAppointments']); ?> with Dr. Chawla</span>
					<?php } ?>
				</div>
			<?php
				endforeach;
			?>
			<?php
				echo "<div class='paging'>";
				echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled')); 
				echo $this->Paginator->numbers(); 
				echo $this->Paginator->next(__('next', true).' >>', array('id'=>'next'), null, array('class' => 'disabled')); 
				echo "</div>";
			?>

		</div>

	</div>
</div>

<script>
	var sortType =1;
	var sortBy =1;
	function setSortType(val){
		sortType = val;
		getPatientsList(0);
	}
	function setSortBy(val){
		sortBy = val;
		getPatientsList(0);
	}
	
	function getPatientsList(flag=1){
			var searchboxval = $('#searchbox').val();
			var oldvalue = $('#searchbox').attr('oldvalue');
			if(flag && (searchboxval==oldvalue || searchboxval.length<3)) return;
			$('#searchbox').attr('oldvalue',searchboxval);
			$(".paging").remove(); // remove the old pagination links because new ones will be loaded via ajax
           	$("#posts-container").load('/doctors/patients_list',  {searchword: searchboxval,sortBy:sortBy,sortType:sortType},function(response, status, xhr) {
				if (status == "error") {
				  var msg = "Sorry but there was an error: ";
				  alert(msg + xhr.status + " " + xhr.statusText);
				}
				else {
					$(this).attr("class","loaded"); //change the class name so it will not be confused with the next batch
					$(".paging").hide(); //hide the new paging links
					$(this).fadeIn();

				}
			});
	}

	$(".paging").hide();  //hide the paging for users with javascript enabled
	$(window).scroll(function(){
		var position = ($(document).height() - $(window).height());
        if  ($(window).scrollTop() == position){  //If scrollbar is at the bottom
			var classname='div'+Math.floor(Math.random()*99999999999).toString();
			$("#posts-container").append("<div class='"+classname+"'></div>"); //append a container to hold ajax content
			var url = $("a#next").attr("href"); //extract the URL from the "next" link
			$(".paging").remove(); // remove the old pagination links because new ones will be loaded via ajax
           	$("div."+classname).load(url,  {searchword: $('#searchbox').val(),sortBy:sortBy,sortType:sortType},function(response, status, xhr) {
				if (status == "error") {
				  var msg = "Sorry but there was an error: ";
				  alert(msg + xhr.status + " " + xhr.statusText);
				}
				else {
					$(this).attr("class","loaded"); //change the class name so it will not be confused with the next batch
					$(".paging").hide(); //hide the new paging links
					$(this).fadeIn();

				}
			});
        }
	});

</script>