<?php 
/**
 * The template for displaying content in the single-people.php templates
 *
**/
?>

<?php 

global $people_mb;
$people_mb->the_meta();
$email = $people_mb->get_the_value('email');
$twit = $people_mb->get_the_value('twitter');
$phone = $people_mb->get_the_value('phone');
$website = $people_mb->get_the_value('website');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

        <div id="personal-info" class="append-bottom clear">
        
			<?php the_post_thumbnail( 'med-thumbnail' ); ?>
        
        	<h1 class="entry-title"><?php the_title(); ?></h1>
            
            <h2 class="info-title"><?php $people_mb->the_value('stafftitle'); ?></h2>
            
			<?php if ( $email != '') { ?>
            <span class="info-email"><a href="mailto:<?php echo $email; ?>" rel="nofollow"><?php echo $email; ?></a></span>
            
			<?php } if ( $twit != '') { ?>
            <span class="info-twitter"><a href="http://www.twitter.com/#!/<?php echo $twit ?>" rel="nofollow" target="_blank">@<?php echo $twit ?></a></span>	
            
			<?php } if ( $phone != '') { ?>
            <span class="info-phone"><?php echo $phone ?></span>
            
			<?php } if ( $website != '') { ?>
            <span class="info-website"><a href="http://<?php echo $website ?>" rel="nofollow" target="_blank">my website</a></span>
            <?php } ?>

        </div>
        <!-- /personal-info -->
        
        <div id="bio">
        
            <?php the_content(); ?>
        
        </div>
        <!-- /bio -->
    
	<?php 
	
	global $peoplelinks_mb;
	$peoplelinks_mb->the_meta();
    $i = 0;
	
	while($peoplelinks_mb->have_fields('links')) { 
	
		if ( $i == 0 ) { ?>
        
        <div id="info-links" class="column left prepend-top">
        
        <h2 class="column-title">Links</h2>
        
            <ul>
    
		<?php } // endif; loop a set of field groups
            
			$url = $peoplelinks_mb->get_the_value('url');
			$title = $peoplelinks_mb->get_the_value('title');
			echo '<li><a href="' . $url . '" target="_blank" rel="nofollow">';
			echo $title . '</a></li>';

			$i++;
            
	} // End while loop
	
    	if ( $i > 0 ) { ?>
        
            </ul>
            
        </div>
        <!-- /info-links --> 
        
		<?php } ?>
    	
        
	<?php 

	$people_mb->the_meta();
	$blogrss = $people_mb->get_the_value('blogrss');
		
	if ( $blogrss != '') { ?>
        
        <div id="personal-blog-feed" class="column right prepend-top">
        
            <h2 class="column-title"><?php _e('Personal Blog Posts'); ?></h2>
            
			<?php // Get RSS Feed(s)
            
			include_once(ABSPATH . WPINC . '/feed.php');
            
            // Get a SimplePie feed object from the specified feed source.
			$blogrss = $people_mb->get_the_value('blogrss');
            $rss = fetch_feed( $blogrss );
            
			if (!is_wp_error( $rss ) ) : // Checks that the object is created correctly 
            
				// Figure out how many total items there are, but limit it to 5. 
                $maxitems = $rss->get_item_quantity(5); 
            
                // Build an array of all the items, starting with element 0 (first element).
                $rss_items = $rss->get_items(0, $maxitems); 
            
			endif;
            
			?>
            
            <ul id="blog-feed">
                <?php if ($maxitems == 0) echo '<li>No recent posts.</li>';
                else
				// Loop through each feed item and display each item as a hyperlink.
                
				foreach ( $rss_items as $item ) : ?>
                
                <li>
                	<a href="<?php echo esc_url( $item->get_permalink() ); ?>" title="Permanent Link to <?php echo esc_html( $item->get_title() ); ?>" class="rpost clear" target="_blank">
                        <span class="rpost-title"><?php echo esc_html( $item->get_title() ); ?></span>
                        <span class="rpost-date"><?php echo $item->get_date('M j, Y'); ?></span>
					</a>
                </li>
                
				<?php endforeach; ?>
            
            </ul>
            
            <div id="blog-more">
        
            	<?php $blogcat = $people_mb->get_the_value('blogcat'); ?>
        
                <a href="<?php echo $blogcat ?>" target="_blank" class="readmore">More Posts</a>
                <a href="<?php echo $blogrss ?>" target="_blank" class="rss">Subscribe</a>
            
            </div>
        
        </div>
        <!-- /blog-feed --> 
        
		<?php } ?>
        
	</div>
    <!-- /entry-content -->
    
    <br clear="all" />
	
	<?php edit_post_link( __( 'Edit', 'mithpress' ), '<div class="edit-link">', '</div>' ); ?>

</article>
<!-- /post-<?php the_ID(); ?> -->