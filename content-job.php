<?php
/**
 * The template for displaying content in the single-job.php template ONLY 
 *
**/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( ! has_post_thumbnail() ) { // show title if no image assigned ?>

	<header class="entry-header">
	
    	<h1 class="entry-title append-bottom"><?php the_title(); ?></h1>
	
    </header>
	
	<?php } ?>
    
	<div class="entry-content">

		<div class="job-desc">
        
        	<?php //if (get_field('expiration_date') ) : ?>
            <div class="job-expire"><?php the_field('expiration_date'); ?></div>
            <?php //endif; ?>
            
            <?php the_content(); ?>
            
        </div>
		<!-- /job-desc -->
        
    	<?php get_template_part('sharing', 'post'); ?>

	</div>
    <!-- /entry-content -->
    
    <br clear="all" />

	<?php edit_post_link( __( 'Edit', 'mithpress' ), '<div class="edit-link">', '</div>' ); ?>

</article>
<!-- /post-<?php the_ID(); ?> -->