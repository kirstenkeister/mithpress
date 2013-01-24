<?php
/**
 * The template for displaying content in the single.php template
 *
**/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-meta span-5 append-1">

        <div class="author-avatar">
            <?php $author_email = get_the_author_meta('user_email'); ?>
            <?php echo get_avatar( $author_email, 55, get_bloginfo('template_url').'/images/no-avatar.png' ); ?>
        </div>
        
        <div class="meta-line post-author"><a href="<?php bloginfo('url'); ?>/people/person/<?php the_author_meta( 'user_nicename'); ?>"><?php the_author(); ?></a></div>

        <div class="meta-line post-date"><?php the_time('F j, Y') ?></div>

        <div class="meta-line post-categories"><?php the_category(' <span>, </span> '); ?></div>
		
		<?php edit_post_link( __( 'Edit', 'mithpress' ), '<div class="meta-line post-edit">', '</div>' ); ?>
                
        <div class="meta-line post-comments"><?php comments_popup_link(__('No Comments'), __('1 Comment'), __('% Comments'), '', __('')); ?></div>
        
    </div>
    <!-- /entry-meta -->
	
    <div class="post-wrap">
	
        <header class="entry-header">

            <h1 class="entry-title append-bottom"><?php the_title(); ?></h1>

        </header>
        <!-- /entry-header -->

        <div class="entry-content">
    
            <?php the_content(); ?>
    
        </div>
        <!-- /entry-content -->
    
    	<?php get_template_part('sharing', 'post'); ?>
    
    </div>
    <!-- /post-wrap -->
    
    <br clear="all" />

</article><!-- /post-<?php the_ID(); ?> -->