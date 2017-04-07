<?php

/**
 * Add image sizes
 * Images should take the name of the dimensions.
 * For instance, images that are cropped to 400px by 400px should be named 400x400
 * add_image_size( '400x400', 400, 480, true );
 */

// Images that are part of the theme should all be named
add_image_size('header-logo', 300, 300, false);
add_image_size('footer-logo', 200, 200, false);
add_image_size('listing-item', 265*1.5, 265*1.5, true);
add_image_size('related-item', 265*1.5, 265*1.5, false);

//Extra one-off sizes should use the size as the name: ex. 300x255