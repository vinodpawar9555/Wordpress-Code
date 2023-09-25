function breadcrumbs() {

   // Code
   if(!is_home()) {
      echo '<nav class="breadcrumb p14 font-bold">';
      echo '<a href="'.home_url('/').'">Home</a><span class="divider">></span>';
      if (is_category() || is_single()) {
         the_category(' <span class="divider">></span> ');
         if (is_single()) {
            echo ' <span class="divider">></span> 
            <span class="FC-orange-dark2">'.get_the_title().'</span>';
         }
      } elseif (is_page()) {
         echo the_title();
      }
      echo '</nav>';
   }
}
add_shortcode( 'breadcrumbs', 'breadcrumbs' );
