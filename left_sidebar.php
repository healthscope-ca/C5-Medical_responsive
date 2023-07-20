<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); ?>

<main>
	<div class="row">
			<?php
			$a = new Area('Full Width');
			$a->display($c);
			?>
	</div>
    <?php
    $a = new Area('Page Header');
    //$a->enableGridContainer();
    $a->display($c);
    ?>
	<div class="row main-contentssss">
		<div class="col-sm-4 col-md-3 col-md-offset-1">
			<?php
				$a = new Area('Sidebar');
			//	$a->setBlockWrapperStart('<div class="col-md-12 col-sm-4 margin-top-10">');
			//	$a->setBlockWrapperEnd('</div>');
				$a->display($c);
			?>
		</div>
		<div class="col-sm-8 margin-top-10 col-md-6 col-md-offset-1">
			<?php
				$a = new Area('Main');
				$a->setAreaGridMaximumColumns(12);
				$a->display($c);
			?>
		</div>
	</div>
</main>

<?php  $this->inc('elements/footer.php'); ?>