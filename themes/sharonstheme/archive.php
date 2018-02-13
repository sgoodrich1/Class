<?php
/**
 * The archive template file
 *http://wordpress/2018/01/
 * This is Sharon's Version  **/
 ?>
 <!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width">
</head>

<body>
 <main>
   <b>tag archive template</b><br>
 <b>Start WordPress Loop</b><br>
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
 <b>Post Title:</b><?php the_title(); ?><br>

<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<b>End WordPress Loop</b>
 </main>
</body>
</html>