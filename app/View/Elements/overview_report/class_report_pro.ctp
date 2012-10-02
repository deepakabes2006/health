<div id="div-studentWiseReport" style="display:none;">
<script>
	
	var grid1RefreshVar=1;
	var grid2RefreshVar=1;
</script>
<table border="0" width="100%">
    <tr>
        <td align="left" ><font color="#6891BD" size="4" id="subMenuHeading">Performance Summary</font></td>
        <td align="right">
        <div class="ncertSubjects" style="width:360px;">
            <div class="inner">
            <center>
            <ul style="padding: 0pt;" class="subjectMenu">
                <li><a id="studentWiseReportGeneral" href="javascript:void(0);" onclick="doActiveInnerDiv('studentWiseReportGeneral','Performance Summary');if(gridRefreshVar){grid.getView().refresh();gridRefreshVar=0;}" class="lev1 selected"><b>General</b></a></li>                
                <li><a id="studentWiseReportQuestion" href="javascript:void(0);" onclick="doActiveInnerDiv('studentWiseReportQuestion','Student Response');if(grid1RefreshVar){grid1.getView().refresh();grid1RefreshVar=0;}" class="lev1"><b>By Question</b></a></li>
				<li><a id="studentWiseReportOutcome" href="javascript:void(0);" onclick="doActiveInnerDiv('studentWiseReportOutcome','Student Performance');if(grid2RefreshVar){grid2.getView().refresh();grid2RefreshVar=0;}" class="lev1"><b>By Outcome</b></a></li>
            </ul>
            </center>
            </div>
        </div>
        </td>
    </tr>
</table>
<hr color="#BFDEFF" width="100%">
<div style="height:20px;"></div>
<!--Student performance statistics-->
<div id="div-studentWiseReportGeneral" style="display:block;">
<script type="text/javascript">
	var grid='';
Ext.onReady(function(){	
	var myData = [
		<?php 
		$tmpArr =array();
		$count = 0;
		if(isset($classSummaryResult) && $classSummaryResult){
		$count = count($classSummaryResult);
		foreach($classSummaryResult as $key=>$value) {
		
		$name= ucwords($value['fName'])." ".ucwords($value['lName'])." (".$value['rollNumber'].")";
		if($value['percentageScore']>=75){ 
			$image = $this->Html->image('text_tick.gif'); 
		}else{ 
			$image = $this->Html->image('text_cross.gif'); 
		}
		if($value['percentageScore']>=0){
			$percentageScore = number_format($value['percentageScore'],0);
		}else{
			$percentageScore = 0;
		}
		 $tmpArr[]=<<<STR
		["{$name}",'{$image}',"{$value['score']}","{$percentageScore}","{$value['correctAnswer']}","{$value['noOfIncorrectQ']}","{$value['noOfSkippedQ']}","{$value['rank']}","{$this->Util->getGrade($value['percentageScore'])}"]
STR;
		}
		echo implode(",",$tmpArr);
		}
		?>
	];
	/**
     * Custom function used for column renderer
     * @param {Object} val
     */
    function pctChange(val){
		
        if(val >= 75){
            return '<span style="color:green;">' + val + '%</span>';
        }else {
            return '<span style="color:red;">' + val + '%</span>';
        }

    }

	var myHeaders = [
	{header: 'Students', width: 170, sortable: true,locked: true, dataIndex: 'student', id:'student'},
	{header: 'Proficiency', width: 80, sortable: true, dataIndex: 'proficiency', id:'proficiency'},
	{header: 'Marks', width: 80, sortable: true, dataIndex: 'marks', id:'marks'},
	{header: 'Percentage',renderer: pctChange, width: 100, sortable: true, dataIndex: 'percentage', id:'percentage'},
	{header: 'Satisfactory', width: 100, sortable: true, dataIndex: 'satisfactory', id:'satisfactory'},
	{header: 'Not-Satisfactory', width: 120, sortable: true, dataIndex: 'not_satisfactory', id:'not_satisfactory'},
	{header: 'Skipped', width: 80, sortable: true, dataIndex: 'skipped', id:'skipped'},
	{header: 'Rank', width: 80, sortable: true, dataIndex: 'rank', id:'rank'},
	{header: 'Grade', width: 70, sortable: true, dataIndex: 'grade', id:'grade'}
	];

 var store = new Ext.data.ArrayStore({
        fields: [
           {name: 'student'},
		   {name: 'proficiency'},
		   {name: 'marks',type: 'float'},
		   {name: 'percentage',type: 'pctChange'},
		   {name: 'satisfactory',type: 'int'},
		   {name: 'not_satisfactory',type: 'int'},
		   {name: 'skipped',type: 'int'},
		   {name: 'rank',type: 'int'},
		   {name: 'grade'}
        ],
        data: myData
 });

 grid = new Ext.grid.GridPanel({
        store: store,
		colModel: new Ext.ux.grid.LockingColumnModel(myHeaders),
        stripeRows: true,
        height: 350,
        width: 885,
        title: 'Performance Summary',
		view: new Ext.ux.grid.LockingGridView()
        
    });
 grid.render('performance-summary');
grid.getView().refresh();
 });
</script>
<div id="performance-summary"></div>
</div>

<div id="div-studentWiseReportQuestion" style="display:none;">
<script type="text/javascript">
	var grid1='';
Ext.onReady(function(){

 var myData1 = [
<?php
	$tmpArr=array();
	$count = count($QwiseStudentQuestionResponse);
foreach($QwiseStudentQuestionResponse as $key=>$question) {
	$studentRow = '[';
	$studentName = $question['name'];
	$studentRow .= '"'.$studentName.'"';
	foreach($question['qResponse'] as $qnumber=>$qValue) {
		$correct = $qValue['correct'];
		$skipped = $qValue['skipped'];
		if($skipped == "") {
			$image ="&nbsp;";
		}elseif($skipped == 1) {			
			$image = $this->Html->image('text_skip.gif',array('border'=>'0',"style"=>"margin-top:1px"));
		}elseif($correct == 1) {
			$image = $this->Html->image('text_tick.gif',array('border'=>'0',"style"=>"margin-top:1px"));
		}else {
			$image = $this->Html->image('text_cross.gif',array('border'=>'0',"style"=>"margin-top:1px"));
		}
		$studentRow .= ",'".$image."'";
	}
	$tmpArr[]=$studentRow. ']';
}
	echo implode(",",$tmpArr);
?>	
];
var myHeaders1 = [{header: 'Students', width: 170, sortable: true, dataIndex: 'student', locked: true, id:'student'}<?php 
$colCount=0;
$qRow='';
$wRow='';
foreach($QwiseStudentQuestionResponse as $key=>$question) {
	$colCount = count($question['qResponse']);
	foreach($question['qResponse'] as $qnumber=>$qValue) {
		$qRow .= ",{header:'".$qnumber."',width: 50,  sortable: true, dataIndex: '".$qnumber."'}";
		$wRow .= ",{name: '".$qnumber."'}";
	}
	break;
} 
echo $qRow;
?>];
 var store1 = new Ext.data.ArrayStore({
        fields: [
           {name: 'student'}<?php echo $wRow ; ?>
        ],
        data: myData1
 });
 
 grid1 = new Ext.grid.GridPanel({
        store: store1,
        colModel: new Ext.ux.grid.LockingColumnModel(myHeaders1),
        stripeRows: true,
        height: 350,
        width: 885,
        title: 'Student Response',
        view: new Ext.ux.grid.LockingGridView()
    });
 grid1.render('student-response');
grid1.getView().refresh();
 });

</script>
<div id="student-response"></div>

<table border="0" width="60%" class="style1" cellspacing="0">
	<tr>
		<td width="5%" class="alignC"><?php echo $this->Html->image('text_tick.gif',array('border'=>'0'));?></td>
		<td width="10%" class="alignL"><b>Correct</b></td>
		<td width="5%" class="alignC"><?php echo $this->Html->image('text_cross.gif',array('border'=>'0'));?></td>
		<td width="10%" class="alignL"><b>incorrect</b></td>
		<td width="5%" class="alignC"><?php echo $this->Html->image('text_skip.gif',array('border'=>'0'));?></td>
		<td width="10%" class="alignL"><b>Skipped</b></td>
	</tr>
</table>
</div>
<!--end Student performance statistics-->

<div id="div-studentWiseReportOutcome" style="display:none;">
<script type="text/javascript">
var grid2='';
Ext.onReady(function(){	
var myData2 = [
<?php 
$temp='';
$counter=0;

$tmpArr= array();
$tmpArrLocal= array();
foreach($outcomeResult as $value){
	$tmpArr[$value['userId']][$value['sloId']]=$value;
	$tmpArr[$value['userId']]['userName']=ucwords($value['fName'])." ".ucwords($value['lName'])." (".$value['rollNumber'].")";
}

foreach($tmpArr as $userId=>$outcomeDetails){

$studentRow = '[';
$studentRow .= '"'.$outcomeDetails['userName'].'"';
foreach($sloResult as $sloDetails){	
	$totalMarks=isset($outcomeDetails[$sloDetails['sloId']]['totalMarks'])?$outcomeDetails[$sloDetails['sloId']]['totalMarks']:1;
	$totalMarksObtain=isset($outcomeDetails[$sloDetails['sloId']]['totalMarksObtain'])?$outcomeDetails[$sloDetails['sloId']]['totalMarksObtain']:0;
	$percentMarks= round(($totalMarksObtain * 100) /$totalMarks);
	if($percentMarks<0){
		$percentMarks=0;
	}
	//$imgStr=($percentMarks >60 ? 'text_tick.gif' :'text_cross.gif');
	$studentRow .= ",'".$percentMarks."'";
}
$tmpArrLocal[]=$studentRow. ']';

}
echo implode(",",$tmpArrLocal);
 ?>

];
function showFlag(val){
	if(val ><?php echo (int)$outcomePassingPercentage; ?>){
        return  val + '%&nbsp;<?php echo $this->Html->image('text_tick.gif' ,array("height"=>"10" ));?>';
    }else {
        return  val + '%&nbsp;<?php echo $this->Html->image('text_cross.gif' ,array("height"=>"10" ));?>';
    }
}
var myHeaders2 = [{header: 'Students', width: 170, sortable: true, dataIndex: 'student', locked: true, id:'student'}<?php 
$colCount=count($sloResult);
$qRow='';
$wRow='';
foreach($sloResult as $key=>$value){
	$qRow .= ",{header:'Outcome".$sloArr[$value['sloId']]['LessonNo']."',width: 90, renderer: showFlag,  sortable: true, dataIndex: 'Outcome".$key."'}";
	$wRow .= ",{name: 'Outcome".$key."',type:'float'}";
} 
echo $qRow;
?>];
 var store2 = new Ext.data.ArrayStore({
        fields: [
           {name: 'student'}<?php echo $wRow ; ?>
        ],
        data: myData2
 });
 
grid2 = new Ext.grid.GridPanel({
        store: store2,
        colModel: new Ext.ux.grid.LockingColumnModel(myHeaders2),
        stripeRows: true,
        height: 350,
        width: 885,
        title: 'Student Performance',
        view: new Ext.ux.grid.LockingGridView()
    });
 grid2.render('student-performance');
grid2.getView().refresh();
 });
</script>
<div id="student-performance"></div>
<div style="height:40px;"></div>
Legend: <br />
<ul>
<?php foreach($sloResult as $key=>$value){
	echo '<li style="line-height:20px;font-size:12px;">Outcome '.$sloArr[$value['sloId']]['LessonNo'].' : '.$value['title']. '</li>';
} ?>
</ul>
</div>
</div>