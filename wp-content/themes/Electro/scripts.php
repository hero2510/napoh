<?php $tecno_contact_address = of_get_option('tecno_contact_address', true); ?>        
<script type="text/javascript">
  jQuery('#googlemaps').gMap({
    maptype: 'ROADMAP',
    scrollwheel: false,
    zoom: 13,
    markers: [
      {
        address: '<?php echo $tecno_contact_address; ?>', // Your Adress Here
        html: '',
        popup: false,
      }
  
    ],
    
  });
</script>    
    
<script type="text/javascript">
  jQuery(document).ready(function() {
    // Start one page nav on .main_nav
    jQuery('.main_nav').onePageNav();
    
    // PrettyPhoto Gallery
    jQuery("a[class^='prettyPhoto']").prettyPhoto();
  });
  </script>
  
  <!-- FLEXSLIDER -->  
  <script type="text/javascript">
  jQuery(window).load(function() {
    jQuery('.flexslider').flexslider({
      animation: "slide"
    });
  });
</script>
      
<!-- ISOTOPE PORTFOLIO -->  
<script type="text/javascript">
  jQuery(document).ready(function() {
    // cache container
    var $container = jQuery('#portfolio_container');
    // initialize isotope
    $container.isotope({
    itemSelector : '.pfolio_item',
    });
    // filter items when filter link is clicked
    jQuery('#filters a').click(function(){
      var selector = jQuery(this).attr('data-filter');
      $container.isotope({ filter: selector });
      return false;
    });        
  });
</script>
      
<script type="text/javascript">
  jQuery(window).resize(function(){
    var $filters = jQuery("#filters")
    $filters.find('li a.selected').trigger('click');
  });
</script>
      
<script type="text/javascript">
  jQuery(document).ready(function() {
    jQuery('#filters li a').click(function() {
      jQuery('#filters li a').removeClass('selected');
      jQuery(this).addClass('selected');
    });
  });
</script>
      
<!-- PORTFOLIO HOVER IMAGES -->      
<script type="text/javascript">
  jQuery(document).ready(function () {
    jQuery('.picture a').hover(function () {
      jQuery(this).find('.image-overlay-zoom, .image-overlay-link').stop().fadeTo('fast', 1);
    },function () {
      jQuery(this).find('.image-overlay-zoom, .image-overlay-link').stop().fadeTo('fast', 0);
    });
  });
</script> 
