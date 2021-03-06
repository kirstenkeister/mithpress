<?php
/**
 * The template used for displaying left column content on the home page page-home.php
**/
?>
<?php
	$i++; // increment the counter
	if( $i % 2 != 0) { 
	$counter_class = 'odd'; // we're on an odd post
	} else {
	$counter_class = 'even'; }
?>


<article id="post-<?php the_ID(); ?>" <?php post_class($counter_class); ?>>

	<div class="entry-content">
        <div id="project-info" class="append-bottom prepend-top">
        <?php if ( has_post_thumbnail() ) { ?>
            <a href="<?php the_permalink(); ?>" class="hasimg"><?php the_post_thumbnail( 'horiz-thumbnail'); ?></a>
        <?php } else { ?>
            <a href="<?php the_permalink(); ?>" class="noimg"><?php the_title(); ?></a>
        <?php } ?>        
        </div>
	</div><!-- /entry-content -->

</article><!-- /post-<?php the_ID(); ?> -->
<!-- /left-column -->