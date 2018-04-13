<?php
get_header();
?>
this is the plugin single template 

<b>Page Title:</b><?php the_title(sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>'); ?><br>

<?php the_post_thumbnail(); ?><br>
<b>Page Content:</b><?php the_content(); ?><br>