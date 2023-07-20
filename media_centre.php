<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); ?>
<script type="text/javascript"> // Reload page when mobile device changes orientation
    window.onorientationchange = function() { 
        var orientation = window.orientation; 
            switch(orientation) { 
                case 0: window.location.reload(); 
                break; 
                case 90: window.location.reload(); 
                break; 
                case -90: window.location.reload(); 
                break; 
			} 
    };
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<style type="text/css">
.media-centre-content h1
{
}
.media-centre-content
{
	
}

.row.top-row
{
	margin-top: 10px;
}
</style>
	<div class="row top-row">
		<div class="col-md-9">
			<div class="row" >
				<div class="col-md-12">
					<div class="media-centre-content">
<?php
			$a = new Area('Main');
			$a->display($c);
?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
<?php
			$a = new Area('Sidebar');
			$a->display($c);
?>
		</div>
	</div>
	
<?php  $this->inc('elements/footer.php'); ?>
