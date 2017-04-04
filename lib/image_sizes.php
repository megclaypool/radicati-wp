<?php

/**
 * Add image sizes
 * Images should take the name of the dimensions.
 * For instance, images that are cropped to 400px by 400px should be named 400x400
 * add_image_size( '400x400', 400, 480, true );
 */

add_image_size( '700x660', 700, 660, true );

add_image_size('hero', 1441*1.5, 771*1.5, true);
add_image_size('block_1', 475*1.5, 449*1.5, true);
add_image_size('block_2', 958*1.5, 449*1.5, true);
add_image_size('block_3', 1441*1.5, 449*1.5, true);
add_image_size('listing-page', 265*1.5, 265*1.5, true);


add_image_size('header-logo', 300, 300, false);
add_image_size('footer-logo', 200, 200, false);