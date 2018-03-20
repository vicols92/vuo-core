<?php get_header(); ?>

<?php if ( have_rows( 'sections' ) ) : $i = 0; ?>
	<?php while ( have_rows('sections' ) ) : the_row(); $i++; ?>
		<?php if(!@include( locate_template( 'template-parts/' . get_row_layout() . '.php' ) )) ; ?>
	<?php endwhile; ?>
<?php endif; ?>
<progress id="progressbar2" value="0" max="100"></progress>

<?php require_once dirname( __FILE__ ) . '/template-parts/testing/sortByDate.php' ?>

<?php get_footer(); ?>
