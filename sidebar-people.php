<?php 
global $people_mb;
$people_mb->the_meta();
?>

<div id="sidebar" class="people widget-area span-5 prepend-1 append-bottom last" role="complementary">
	<?php if ( ! dynamic_sidebar( 'people-sidebar' ) ) : ?>
	<?php endif; // end sidebar widget area ?>
		<?php
        $postslug = $post->post_name;
        $args=array(
           'posts_per_page' => 5,
           'author_name' => $postslug,
        );
		$the_query = new WP_Query( $args ); ?>
                  
	<?php if ( $the_query->have_posts() ) : ?>

    <div id="recentposts_mithblog" class="widget widget_recentposts_thumbnail"> 
        
        <h3>MITH Blog Posts</h3>
        
        <aside id="" class="widget-body clear">
            
            <ul id="mith-blog-feed">  
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    
                <li>
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="rpost clear">
                    <span class="rpost-title"><?php the_title(); ?></span>
                    <span class="rpost-date"><?php the_time(__('M j, Y')) ?></span></a>
                </li>
            
			<?php endwhile; 
            wp_reset_query(); ?>
             
            </ul>
        </aside>
    </div>
    <!-- /recentposts_mithblog -->
	<?php endif; ?>


<?php $twit = $people_mb->get_the_value('twitter');
if ( $twit != '') { ?>
<div id="recent_tweets" class="widget widget_recent_tweets">
    <h3><!--<a href="http://www.twitter.com/#!/<?php echo $twit ?>" rel="nofollow" target="_blank" class="follow">&nbsp;</a>-->Recent Tweets</h3>
    <aside class="widget-body clear">
    
    <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/search?q=mithdd+OR+mithleaks+OR+digdialog+OR+UMD_MITH+from%3A<?php echo $twit ?>" data-widget-id="341965325891411968" data-chrome="transparent" data-link-color="#2e7cc6">Tweets by @<?php echo $twit ?></a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </aside>
    
	<a href="https://twitter.com/<?php echo $twit ?>" class="twitter-follow-button" data-show-count="false" data-dnt="true">Follow @<?php echo $twit ?></a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</div>
<!-- /recent_tweets -->

<?php } ?>

</div>
<!-- /sidebar -->