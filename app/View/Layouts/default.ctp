<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title_for_layout; ?></title>
<?php
        $str = $this->Html->css('style');
        echo str_replace('style.css', 'style.css?version=' . HO_CSS_VERSION, $str);
        ?>
		<?php
            echo $this->Html->script('jquery-1.8.0.min.js');
            //$mainJs = $this->Html->script('main.js');
            //echo str_replace('main.js', 'main.js?version=' . HO_JS_VERSION, $mainJs);
        ?>
<style>
ul.left-menu{list-style:none; padding:0px; margin:50px 10px 10px 20px}
ul.left-menu li {margin:5px 0px; border-bottom:1px dashed #fad5ff; padding:2px 0px 6px 0px; }
ul.left-menu li a { font-size:13px;  color:#fff}

</style>
</head>
<body>

  <div class="headerContentRegion">
   
    <div id="headerRegion" class="" style="opacity: 1;">
      <div class="header"> 
      	<img class="logo" src="/img/health-logo.png" width="144" height="27">
	  	<div class="navigation">
	  		<ul>
	  			<li><a href="#"><span>Dashboard</span></a></li>
                <li><a class="selected" href="#"><span>Patients</span></a></li>
				<li><a href="#"><span>Appointments</span></a></li>
				<li><a href="#"><span>Questions</span></a></li>
	  		</ul>
	 	 </div>
        
      </div>
    </div>
    
    
  </div>
	 <?php echo $content_for_layout; ?>
</body>
</html>
<!--
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title><?php echo $title_for_layout; ?></title>
        <link rel="icon" href="<?php echo $this->request->webroot . 'meritnation.ico'; ?>" type="image/x-icon" />
        <link rel="shortcut icon" href="<?php echo $this->request->webroot . 'meritnation.ico'; ?>" type="image/x-icon" />
        <?php
        $str = $this->Html->css('style');
        echo str_replace('style.css', 'style.css?version=' . MN_CSS_VERSION, $str);
        ?>
         <?php
        $str = $this->Html->css('style');
        echo $this->Html->css('protfish');
        echo str_replace('style.css', 'style.css?version=' . MN_CSS_VERSION, $str);
        ?>
        <?php
        
            echo $this->Html->script('jquery-1.8.0.min.js');
            $mainJs = $this->Html->script('main.js');
            echo str_replace('main.js', 'main.js?version=' . MN_JS_VERSION, $mainJs);
            
        
        ?>
    </head>
    <body>
        <center>
            <div class="mainDiv">
                <div class="logoRow"><?php echo $this->Element('header'); ?></div>
                <div class="main">
                    <div class="inner">
                        <div class="contentAll">
                            <div class="contentMain">
                                <?php echo $content_for_layout; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </body>
</html>-->