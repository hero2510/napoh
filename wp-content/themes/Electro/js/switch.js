jQuery("#switch .color a").click(function() {
  jQuery("#theme").attr({
    href : "assets/stylesheets/themes/" + jQuery(this).attr("id") + ".css"
  });
  jQuery(".color .current").removeClass("current");
  jQuery(this).toggleClass("current");
});
jQuery("#show").css({
  "margin-left" : "-200px"
});
jQuery("#hide, #show").click(function() {
  if (jQuery("#switch").is(":visible")) {
    jQuery("#switch").animate({
      "margin-left" : "-200px"
    }, 1000, function() {
      jQuery(this).hide();
    });
    jQuery("#show").animate({
      "margin-left" : "0px"
    }, 1000).show();
  } else {
    jQuery("#show").animate({
      "margin-left" : "-200px"
    }, 1000, function() {
      jQuery(this).hide();
    });
    jQuery("#switch").show().animate({
      "margin-left" : "0"
    }, 1000);
  }
});
