<?php
	/*
	 * Default stub page for {@link get_template_part( "flex", "<part_name>" )} template calls.
	 *
	 * Essentially, this is only called if the <part_name> template has not yet been created
	 * (which in a production situation should never occur). It is used as a developer hint
	 * that they need to create the appropriate "flex-<part_name>.php" file to match the ACF Content Group
	 * that they just created.
	 *
	 * The message only displays when the user is logged in (ie: a Dev or Admin).
	 *
	 * Otherwise, the entire section is just ignored and skipped altogether.
	 */

?>
<?php if ( is_user_logged_in() ) : ?>
<h3>Missing Flex Content Template for <?php echo $layout_name; ?></h3>
<p>Please create a template called <code>flex-<?php echo $layout_name; ?>.php</code> in order to use this Flex Content Block.</p>
<?php endif; ?>


