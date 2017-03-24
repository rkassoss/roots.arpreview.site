<?php
// Author Vars
$author_id = get_the_author_meta('ID'); 
$fname = get_the_author_meta('first_name');
$lname = get_the_author_meta('last_name');
$full_name = '';
if( empty($fname)){
    $full_name = $lname;
} elseif( empty( $lname )){
    $full_name = $fname;
} else {
    //both first name and last name are present
    $full_name = "{$fname} {$lname}";
}

$author_pic = get_field('author_profile_pic', 'user_'.$author_id);
$author_thumb = $author_pic['sizes']['thumbnail'];

?>
<div class="author-card">
	<div class="media">
		<?php if ( $author_pic ) { ?>
		<div class="media-left">
			<a href="<?php echo get_author_posts_url( $author_id, get_the_author_meta( 'user_nicename' ) ); ?>"><img src="<?php echo $author_thumb; ?>" alt="<?php echo 'Profile Picture of '.$full_name; ?>" class="img-responsive" /></a>
			<div class="author-social-links">
<?php 
if ( get_the_author_meta( 'facebook') ) {
?>
<a class="author-website" href="<?php echo get_the_author_meta( 'facebook'); ?>">
<i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
<?php } 
if ( get_the_author_meta( 'twitter') ) {
?>
<a class="author-website" href="<?php echo get_the_author_meta( 'twitter'); ?>"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
<?php }
if ( get_the_author_meta( 'googleplus') ) { ?>
<a class="author-website" href="<?php echo get_the_author_meta( 'googleplus'); ?>"><i class="fa fa-google-plus-square fa-2x" aria-hidden="true"></i></a>							
<?php } ?>
			</div> <!-- END AUTHOR SOCIAL LINKS -->
		</div> <!-- END MEDIA LEFT -->
		<?php } ?>
		<div class="media-body">
			<h3 class="media-heading"><a class="author-user" href="<?php echo get_author_posts_url( $author_id, get_the_author_meta( 'user_nicename' ) ); ?>">
			<?php 
				if ($full_name) {
					echo $full_name;
				} else {
					the_author(); 
				}
			?>
			</a></h3>
		<?php if ( get_field('author_title', 'user_'. $author_id )) {
			echo '<h5>'.get_field('author_title', 'user_'. $author_id ).'</h5>';
			} ?>
			
			<div class="author-links">
<?php if( get_the_author_meta( 'user_url') ) { ?>
<a class="author-website" href="<?php echo get_the_author_meta( 'user_url'); ?>"><?php echo get_the_author_meta( 'user_url'); ?> <i class="fa fa-globe" aria-hidden="true"></i></a>
<?php		
}
if ( get_the_author_meta( 'user_email' ) ) {
?>
<a class="author-email" href="<?php echo get_the_author_meta( 'user_email' ); ?>"><?php echo get_the_author_meta( 'user_email' ); ?> <i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

<?php } ?>
		</div> <!-- END AUTHOR LINKS -->
			
			
			<div class="author-desc">
			<?php echo nl2br(get_the_author_meta('description')); ?>
			</div>
		</div>
	</div> <!-- END MEDIA -->
	
</div> <!-- END AUTHOR CARD -->