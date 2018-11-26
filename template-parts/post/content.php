<?php
/**
 * The template for displaying articles in the loop with full content
 *
 * @version 1.0
 * @package GT Concept
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="post-header entry-header">

		<?php gt_concept_post_thumbnail(); ?>

		<?php the_title( sprintf( '<h2 class="post-title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php gt_concept_entry_meta(); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php the_content( esc_html__( 'Continue reading', 'gt-concept' ) ); ?>

	</div><!-- .entry-content -->

</article>
