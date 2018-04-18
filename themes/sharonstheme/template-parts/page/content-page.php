<b>Post Title:</b><?php the_title(sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>'); ?><br>
<b>Post Content:</b><?php the_content(); ?><br>
<?php the_post_thumbnail(); ?><br>