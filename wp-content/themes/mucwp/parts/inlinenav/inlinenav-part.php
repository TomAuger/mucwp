<?php
	$alignmentClass = "";

	if($gridType == 'row') {
		$grid["medium"] = '12';
		$grid["large"] = '12';
		$rowClasses = 'small-3 medium-2';
	} else {
		$rowClasses = 'small-12';
	}

	if($index % 2 == 0) {
		$alignmentClass = "medium-order-2";
	}

?>

<div class="columns small-12 medium-<?php echo $grid["medium"] ?> large-<?php echo $grid["large"] ?> <?php echo 'alignment-' . $gridType; ?> ">

	<?php if($gridType == 'row') : ?>
		<hr>
	<?php endif; ?>

	<div class="row inline-item align-middle <?php echo $overlayClass; ?> " <?php echo $overlay; ?>>
			<?php if(in_array( 'image', $displayOptions )) : ?>
				<div class="inline-img <?php echo $rowClasses ?> columns <?php echo $alignmentClass; ?>">
					<img src="<?php echo $image ?>" />
				</div>
			<?php endif; ?>

			<div class="inline-text columns">
				<?php if(in_array( 'title', $displayOptions )) : ?>
					<h3><?php echo $title; ?></h3>
				<?php endif; ?>

				<?php if(in_array( 'excerpt', $displayOptions )) : ?>
					<p><?php echo $excerpt; ?></p>
				<?php endif; ?>

				<?php if(in_array( 'link-text', $displayOptions )) : ?>
					<div class="inline-link-text">
						<a href="<?php echo $link; ?>"><?php echo $link_text; ?></a>
					</div>
				<?php endif; ?>
			</div>

		</div>
</div>

