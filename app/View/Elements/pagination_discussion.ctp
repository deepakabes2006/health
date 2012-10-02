<?php /*
    $leftArrow = '&laquo;';//$this->Html->image("blue_arrow2_prev.gif", Array('height'=>7,'width'=>20,'border'=>0));
    $rightArrow = '&raquo;';//$this->Html->image("blue_arrow1.gif", Array('height'=>7,'width'=>20,'border'=>0));

    $prev = $this->Paginator->prev($leftArrow,array('escape'=>false));
    $prev = $prev?$prev:$leftArrow;
    $next = $this->Paginator->next($rightArrow,array('escape'=>false));
    $next = $next?$next:$rightArrow;

    $pages = $this->Paginator->numbers(array('separator'=>" | "));

if($pages)
echo $prev." ".$pages." ".$next;
*/
?>
<div id='pagination'>
<?php
    $leftArrow = '<span class="AtStart">&lt; Prev</span>';  //$this->Html->image("blue_arrow2_prev.gif", Array('height'=>7,'width'=>20,'border'=>0));
    $rightArrow = '<span class="AtStart">Next &gt;</span>'; // $this->Html->image("blue_arrow1.gif", Array('height'=>7,'width'=>20,'border'=>0));
	//$this->Paginator->options(array('title' => 'tutorsearched'));
    $prev = $this->Paginator->prev('&lt; Prev',array('escape'=>false,'class'=>'Prev'));	
    $prev = $prev?$prev:$leftArrow;
    $next = $this->Paginator->next('Next &gt;',array('escape'=>false,'class'=>'Next'));
    $next = $next?$next:$rightArrow;

    $pages = $this->Paginator->numbers(array('separator'=>" "));
	if($pages){ 

		//$counterVar= $this->Paginator->counter(array('format' => 'Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%'));
		
		$count1= $this->Paginator->counter(array('format' => '%page%'));
		$count2= $this->Paginator->counter(array('format' => '%current%','class'=>'this-page'));

		if($count1>1){
			$page = (($count1-1) *$count2)+1;
			$current = ($count1 *$count2);
			$counterVar= $this->Paginator->counter(array('format' => $page.' - '.$current.' of %count%'));
		}else{
			$counterVar= $this->Paginator->counter(array('format' => '%page% - %current% of %count%'));
		}
?>

<div style="margin-top:10px;">
<div style="float:right" class="Paginator"><?php echo $prev." ".$pages." ".$next; ?></div>		
</div>
<?php } ?>
</div>