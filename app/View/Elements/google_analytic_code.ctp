<?php	if(GOOGLE_ANALYTIC_CODE) {
			if(!isset($this->google_analytic_code_included)) {
?>
<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
	try {
		var pageTracker = _gat._getTracker("UA-6131270-3");
		pageTracker._trackPageview();
	}
	catch(err) {}
</script>
<?php			$this->google_analytic_code_included = 1;
			}
		}
?>