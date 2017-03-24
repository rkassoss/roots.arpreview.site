<?php
	$col = get_sub_field('columns');
	if ( $col == '2' ) $colClass = get_sub_field('column_layout');
?>

	<div class="row">
		<?php if ( $col == '4' ) { ?>
		<div class="col-sm-3">
			<?php echo get_sub_field('column_1'); ?>
		</div>
		<div class="col-sm-3">
			<?php echo get_sub_field('column_2'); ?>
		</div>
		<div class="col-sm-3">
			<?php echo get_sub_field('column_3'); ?>
		</div>
		<div class="col-sm-3">
			<?php echo get_sub_field('column_4'); ?>
		</div>
		<?php } else if ( $col == '3' ) { ?>
		<div class="col-sm-4">
			<?php echo get_sub_field('column_1'); ?>
		</div>
		<div class="col-sm-4">
			<?php echo get_sub_field('column_2'); ?>
		</div>
		<div class="col-sm-4">
			<?php echo get_sub_field('column_3'); ?>
		</div>
		<?php } else if ( $col == '2' ) { ?>
		<div class="col-sm-6 <?php if ( $colClass == 'bigLeft' ) { echo 'col-md-8'; } else if ( $colClass == 'bigRight' ) { echo 'col-md-4'; } ?>">
			<?php echo get_sub_field('column_1'); ?>
		</div>
		<div class="col-sm-6 <?php if ( $colClass == 'bigLeft' ) { echo 'col-md-4'; } else if ( $colClass == 'bigRight' ) { echo 'col-md-8'; } ?>">
			<?php echo get_sub_field('column_2'); ?>
		</div>
		<?php } else { ?>
		<div class="col-sm-12">
			<?php echo get_sub_field('column_1'); ?>
		</div>
		<?php } ?>
	</div>

