<table width="100%" cellpadding="" cellspacing="0" class="text11 textGray3" style="">
	<?php $j=0;
	if(isset($recentActivity) && !empty($recentActivity)){
		foreach($recentActivity as $key=>$value){ 
	?>
			<?php
			if($key == 'ncert' && isset($value['username']) && !empty($value['username'])){
			?>
			<tr>
				<td>
					<?php
					$index = mt_rand(0,(count($value['username'])-1));
					$userName = $value['username'][$index];
					
					echo '<span style="margin-left:5px;"><u><b>'.ucwords($userName).'</b></u>&nbsp;viewed NCERT Solutions.</span><br>';?>
				</td>
			</tr>
			<tr>
				<td align="right">
					<div style="float:right; color:#ababab" class="text11">
						<?php
							if(isset($value['modified'][$index])) { 
								echo $this->Time->timeAgoInWords($value['modified'][$index]);
							} 
						?> 
					</div>
				</td>
			</tr>
			<?php
				unset($userName);unset($index);
			}
			?>
			<?php
			if($key=='studyMaterial' && isset($value['username']) && !empty($value['username'])){
			?>
			<tr>
				<td>
					<?php
					$index = mt_rand(0,(count($value['username'])-1));
					$userName = $value['username'][$index];

					echo '<span style="margin-left:5px;"><u><b>'.ucwords($userName).'</b></u>&nbsp;viewed Study Material.</span><br>';?>
				</td>
			</tr>
			<tr>
				<td align="right">
					<div style="float:right; color:#ababab" class="text11">
						<?php
							if(isset($value['modified'][$index])) { 
								echo $this->Time->timeAgoInWords($value['modified'][$index]);
							} 
						?> 
					</div>
				</td>
			</tr>
			<?php
				unset($userName);unset($index);
			}
			?>
			<?php
			if($key=='test' && isset($value['username']) && !empty($value['username'])){
			?>
			<tr>
				<td>
					<?php
					$index = mt_rand(0,(count($value['username'])-1));
					$userName = $value['username'][$index];

					echo '<span style="margin-left:5px;"><u><b>'.ucwords($userName).'</b></u>&nbsp;has taken Test.</span><br>';?>
				</td>
			</tr>
			<tr>
				<td align="right">
					<div style="float:right; color:#ababab" class="text11">
						<?php
							if(isset($value['modified'][$index])) { 
								echo $this->Time->timeAgoInWords($value['modified'][$index]);
							} 
						?> 
					</div>
				</td>
			</tr>
			<?php
				unset($userName);unset($index);
			}
			?>
			<?php
			if($key=='revisionNotes' && isset($value['username']) && !empty($value['username'])){
			?>
			<tr>
				<td>
					<?php
					$index = mt_rand(0,(count($value['username'])-1));
					$userName = $value['username'][$index];
					
					echo '<span style="margin-left:5px;"><u><b>'.ucwords($userName).'</b></u>&nbsp;viewed School Notes.</span><br>';?>
				</td>
			</tr>
			<tr>
				<td align="right">
					<div style="float:right; color:#ababab" class="text11">
						<?php
							if(isset($value['modified'][$index])) { 
								echo $this->Time->timeAgoInWords($value['modified'][$index]);
							} 
						?> 
					</div>
				</td>
			</tr>
			<?php
				unset($userName);unset($index);
			}
			?>
			<?php
			if($key=='puzzles' && isset($value['username']) && !empty($value['username'])){
			?>
			<tr>
				<td>
					<?php
					$index = mt_rand(0,(count($value['username'])-1));
					$userName = $value['username'][$index];

					echo '<span style="margin-left:5px;"><u><b>'.ucwords($userName).'</b></u>&nbsp;viewed Puzzles.</span><br>';?>
				</td>
			</tr>
			<tr>
				<td align="right">
					<div style="float:right; color:#ababab" class="text11">
						<?php
							if(isset($value['modified'][$index])) { 
								echo $this->Time->timeAgoInWords($value['modified'][$index]);
							} 
						?> 
					</div>
				</td>
			</tr>
			<?php
				unset($userName);unset($index);
			}
			?>
	<?php
	}}
	?>
</table>