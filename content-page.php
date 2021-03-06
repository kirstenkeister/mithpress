<?php
/**
 * The template used for displaying page content in page.php
**/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	echo '<div class="entry-image">';
        the_post_thumbnail();
	echo '</div>';
	} ?>

	<header class="entry-header">
		<h1 class="entry-title append-bottom"><?php the_title(); ?></h1>
	</header>
    <!-- /entry-header-->
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
    <!-- /entry-content -->
    
    <br clear="all" />
	<?php edit_post_link( __( 'Edit', 'mithpress' ), '<div class="edit-link">', '</div>' ); ?>

</article>
<!-- /post-<?php the_ID(); ?> -->