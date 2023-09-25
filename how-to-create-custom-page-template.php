<?php 
   /*Template Name: Page Template name*/
   
   get_header();
   
   ?>

   <div class="gutenburg-parent">
       <?php
         // Start the loop.
         while ( have_posts() ) : the_post();

         // Include the page content template.
        //you can include your custom html too.
         the_content();

         // End of the loop.
         endwhile;
         ?>
            
   </div>

<?php get_footer(); ?>
