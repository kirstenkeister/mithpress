<?php global $wp_query;
	query_posts( array(
		'post_type' => 'people',
		'posts_per_page' => '-1',
		'meta_key' => $people_mb->get_the_name('lname'),
		'orderby' => 'meta_value_num',
		'order' => 'ASC',
		'tax_query' => array(
		'relation' => 'AND',
			array(
				'taxonomy' => 'staffgroup',
				'field' => 'slug',
				'terms' => array( 'people-resident-fellows')
			),
			array(
				'taxonomy' => 'staffgroup',
				'field' => 'slug',
				'terms' => array( 'people-past' ),
				'operator' => 'NOT IN'
			)
		)
	) );
?>				  
				  
	<?php 
    $i = 0; // set up a counter
    if ( have_posts() ) : ?>

	<header class="page-header">
		<h1 class="page-title append-bottom prepend-top">Resident Fellows</h1>
	</header>

    <div class="article-row clearfix">

	<?php while ( have_posts() ) : the_post(); 
	  global $people_mb; 
	  $people_mb->the_meta(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<div class="entry-content">

			<div id="person" class="append-bottom prepend-top">                        	

			<a href="<?php the_permalink(); ?>" rel="alternate" title="Permanent Link to <?php the_title_attribute(); ?>">

				<?php the_post_thumbnail( 'mini-thumbnail' ); ?>
	
    			<div class="person-info">
					<span class="info-name"><?php the_title(); ?></span>                            
					<span class="info-title"><?php $people_mb->the_value('stafftitle'); ?></span>
				</div>
                
			</a>

			</div><!-- /person-->
            
		</div><!-- /entry-content -->
	
	</article>

	<?php 
        $i++; // increment the counter
        if( $i % 3 != 0) { 
            echo '';
        } else { ?>
            </div><div class="article-row clearfix">
        <?php // we've reached the end of a row; close & start new 
		} 
	?>

	<?php endwhile; ?>
    </div><!--/rows -->
    
<?php endif; ?>