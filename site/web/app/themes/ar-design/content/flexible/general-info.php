	<div class="row">
		<div class="col-xs-12 general-info-box">
				<?php  if ( get_field('address','options') ) {
						$address = get_field('address','options');
						$address2 = get_field('address2','options');
				?>
				<div class="row ">
					<div class="col-xs-3 the-label ">
						Address
					</div>
					<div class="col-xs-9 the-detail ">
						<?php echo $address.', '.$address2; ?>
					</div>
				</div> <!-- END ROW -->
				<?php } ?> <!-- END ADDRESS -->
				
				<?php
				if( have_rows('hours_of_operation','options') ): 
				?>
				<div class="hours row ">
					<div class="col-xs-3  the-label ">
						Hours
					</div>
					<div class="col-xs-9 the-detail ">
					<?php
						while( have_rows('hours_of_operation','options') ): the_row();
							$days = get_sub_field('days','options');
							$hours = get_sub_field('hours','options');
					?>
					
						<div>
						<span class="sub-label"><?php echo $days; ?>:</span>
						<?php echo $hours ?>
						</div>
					
					<?php endwhile; ?>
					</div>
				</div> <!-- END HOURS ROW -->
				
				<?php endif; ?> <!-- END IF HOURS  -->
				
				
				<?php
				if( have_rows('telephones','options') ): 
				?>
				<div class="numbers row ">
					<?php
						while( have_rows('telephones','options') ): the_row();
							$phone = get_sub_field('number','options');
							$description = get_sub_field('description','options');
					?>
					<div class="col-xs-3   the-label">
						Telephone
					</div>
					<div class="col-xs-9  the-detail">
						<?php if ($description) echo '<span class="sub-label">'.$description.':</span>';?>
						<?php echo $phone ?>
					</div>
					<?php endwhile; ?>
				</div> <!-- END NUMBERS ROW -->
				
				<?php endif; ?> <!-- END IF NUMBERS  -->
				
				<?php
				if( have_rows('emails','options') ): 
				?>
				<div class="emails row ">
					<?php
						while( have_rows('emails','options') ): the_row();
							$email = get_sub_field('email','options');
							$description = get_sub_field('description','options');
					?>
					<div class="col-xs-3   the-label">
						Email
					</div>
					<div class="col-xs-9  the-detail">
						<?php if ($description) echo '<span class="sub-label">'.$description.':</span>';?>
						<?php echo $email ?>
					</div>
					<?php endwhile; ?>
				</div> <!-- END EMAILS ROW -->
				
				<?php endif; ?> <!-- END IF EMAILS  -->
		
		</div> <!-- END COL -->
	</div> <!-- END ROW -->
