<?php 
$post_type = $post->post_type;
$lista_categorias = '';
switch ($post_type) {
  case 'portfolio':
    $lista_categorias = get_the_term_list( $post->ID, 'portfolio_category', '', ',' );
    break;  
  default:
    $lista_categorias = get_the_category_list(',', '', $post->ID);
  break;
}
$lista_categorias = explode(',', $lista_categorias);
?>
<div class="bpost_content_meta">
  <ul>
    <?php if(!empty($lista_categorias)):?>
    <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/blog/meta_icons/category.png" alt="">
      <?php 
        $more_categories = count($lista_categorias) > 5 ? '...' : '';
        $total_categories = count($lista_categorias) < 5 ? count($lista_categorias) : 5;
        for($i = 0; $i<$total_categories; $i++){
        	echo $lista_categorias[$i];
        	if($i+1<$total_categories) echo ', ';
        }
        echo $more_categories; 
      ?>
    </li>
    <?php endif;?>
    <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/blog/meta_icons/user.png" alt=""><?php echo get_the_author_meta('first_name', $post->post_author).' '.get_the_author_meta('last_name', $post->post_author); ?></li>
    <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/blog/meta_icons/comments.png" alt=""><?php comments_number('No Comments', '1 Comment', '% Comments' );?></li>
    <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/blog/meta_icons/date.png" alt=""><?php echo ucwords(get_the_date('j F Y')); ?></li>
  </ul>
  <div class="clear"></div>
</div> <!-- end bpost_conent_meta -->