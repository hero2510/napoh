<?php 
  $max_page = $wp_query->max_num_pages;
  $page = $wp_query->get('paged');
  
  if (!$page && $max_page >= 1) {
  	$current_page = 1;
  }
  else {
  	$current_page = $page;
  }
  
  //var_dump(array('$current_page'=>$current_page, '$wp_query' => $wp_query ));
  
?> 
<div class="bpost_nav"> 
<?php 
  echo paginate_links(array(
  		"base" => add_query_arg("page", "%#%"),
  		"format" => '',
  		"type" => "list",
  		"total" => $max_page,
  		"current" => $current_page,
  		"show_all" => false,
  		"end_size" => 1,
  		"mid_size" => 1,
  		"prev_next" => true,
  		"next_text" => __('Next', 'tecno'),
  		"prev_text" => __('Prev', 'tecno'),
  	));
?>
</div>  	
<?php  wp_reset_query(); ?>