<?php get_header(); ?>

<div id="page-container">
		<div id="primary" class="width-limit">

			<?php get_sidebar('left'); ?>
			<!--end subnav / start single content-->
	
    		<div id="content" role="main" class="span-16 last">
			
			<?php if (function_exists('mithpress_breadcrumbs')) mithpress_breadcrumbs(); ?>
			
        	<div id="article">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'job' ); ?>

				<?php endwhile; // end of the loop. ?>
                            
            </div>
			
            <!-- start sidebar -->
			<?php get_sidebar('job'); ?>
			<!-- /sidebar -->			

		</div>
        <!-- /content -->
	</div>
<!--end #primary/post -->    
<div class="clear"></div>
</div>
<!-- /page / start footer -->

<?php get_footer(); ?>