			<?php
			if(isset($textbookid))
				 echo $this->Form->select('TextBook.id', $textbooks, $textbookid,array('') ,null,False);
			else	
				 echo $this->Form->select('TextBook.id', $textbooks, 0, array(''),null,False); ?> &nbsp;