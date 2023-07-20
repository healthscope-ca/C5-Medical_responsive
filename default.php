<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); 
?>
<script type="text/javascript"> // Reload page when mobile device changes orientation
    window.onorientationchange = function() { 
        var orientation = window.orientation; 
            switch(orientation) { 
                case 0: window.location.reload(); 
                break; 
                case 90: window.location.reload(); 
                break; 
                case -90: window.location.reload(); 
                break; } 
    };
</script>
<?php
	// added for map link code further down
	defined("HealthscopeAssistURL") or define("HealthscopeAssistURL", "http://healthscopeassist.com.au/siteLocator.asp?");
?>
<script type="text/javascript">

	function ratioCoords (coords, ratio) {
		coord_arr = coords.split(",");

		for(i=0; i < coord_arr.length; i++) {
			coord_arr[i] = Math.round(ratio * coord_arr[i]);
		}

		return coord_arr.join(',');
	}
	
	function doMouseover(key)
	{
		$(key).css({opacity: 0.0});
	}
	
	function doMouseout(key)
	{
		$(key).css({opacity: 1.0});
	}
	// this event only fires after all content including our images are loaded.
	$(window).on('load', function(){
		//  Now we can use any single image to capture a copy of the image-map coordinates
		//  and to recalculate them if the window, and hence image, resizes.
		var img = $("#img-qld");
		img.data('width', img.attr('width')).data('height', img.attr('height'));
		$(img.attr('usemap')+" area").each(function(){
			$(this).data('coords', $(this).attr('coords'));
		});

		$(window).on('resize', function(){
			var img = $("#img-qld");
			var ratio = img.width()/img.data('width');

			$(img.attr('usemap')+" area").each(function(){
				//console.log('1: '+$(this).attr('coords'));
				$(this).attr('coords', ratioCoords($(this).data('coords'), ratio));
			});
		});			
		img.css('width', '100%').css('height','auto');
		$('#spinner').hide();
		$('.map-image-wrapper').show(); // map is complete
		$(window).trigger('resize');    // trigger a calculation to account for initial image resize
	});
</script>

<style type="text/css">
	#spinner
	{
		width:290px;
		height:auto;
		overflow:hidden;
		position: relative;
		border: 0px solid red;	
		text-align: center;	
		padding: 20px;
	}
	#spinner span
	{
		margin-left: 20px;
	}
	.map-image-wrapper
	{
		width:290px;
		height:auto;
		overflow:auto;
		position: relative;
		border: 0px solid red;
		display: none;
	}
	.map-image-wrapper  img
	{
		width:290px;
		height:auto;
		position: absolute;
		display:block;
		top:0;
		left:0;
	}
	.map-image-wrapper img:first-child 
	{
		position: static;
	}		
</style>
<main>
	<div class="row">
		<?php
			$a = new Area('Rolling Images');
			$a->display($c);
		?>
	</div>
	<div class="row">
		<div class="col-md-12">
		<!--div class="col-md-9 col-md-offset-1-5"-->
			<?php
			$a = new Area('Main');
			$a->display($c);
			?>
		</div>
	</div>
	<!--
	<div class="row our-services block-header">
		<div class="col-md-12">
			<h1>Our Services</h1>
		</div>
	</div>
    <div class="row our-services">
        <?php
        $a = new GlobalArea('Services');
        $a->display();
        ?>
    </div>-->
</main>
<?php  $this->inc('elements/footer.php'); ?>
