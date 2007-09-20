=== FW SubPageInADiv (SPIAD) ===
Contributors: fairweb
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=web%40fairweb%2efr&item_name=Donate%20for%20Wordpress%20fw%2dSpiad%20plugin&item_number=WP%2dfw%2dspiad&buyer_credit_promo_code=&buyer_credit_product_category=&buyer_credit_shipping_method=&buyer_credit_user_address_change=&no_shipping=0&no_note=1&tax=0&currency_code=EUR&lc=FR&bn=PP%2dDonationsBF&charset=UTF%2d8
Tags: post, sidebar
Requires at least: 2.x
Tested up to: 2.3
Stable tag: 1.0

Displays the content of a subpage in a div element when visiting the parent pages.

== Description ==

Displays the content of a subpage named "spiad" in a div element for specific pages. For example, you may have a special area in your sidebar with a default content. If you want to display something else in this area for specific pages, just create a subpage called spiad and its content will be displayed in the div area instead of default one.


== Installation ==
1. Edit the /wp-content/plugins/fw-spiad/themes/fw-spiad-default.php page in your html editor and customize default content
1. Edit the /wp-content/plugins/fw-spiad/themes/fw-spiad.css page in your html editor and customize css styles
1. Upload the `fw-spiad` folder into the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php get_fw_spiad ($pageid, $display_title); ?>` in your theme where you want the content to be displayed. $pageid is the parent page of you `spiad` page ($post->ID id a good idea), $display_title default to 0 (no title). If you want to display a title, just enter the string.