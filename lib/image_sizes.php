<?php

/**
 * Add image sizes
 * Images should take the name of the dimensions.
 * For instance, images that are cropped to 400px by 400px should be named 400x400
 * add_image_size( '400x400', 400, 480, true );
 */

// Images that are part of the theme should all be named
// All images should be defined with two sizes, the normal size
// and a retina size suffixed with 2x that is double the resolution.
add_image_size('header-logo', 300, 300, false);
add_image_size('header-logo2x', 300*2, 300*2, false);

add_image_size('footer-logo', 200, 200, false);
add_image_size('footer-logo2x', 200*2, 200*2, false);

add_image_size('listing-item', 265, 265, true);
add_image_size('listing-item2x', 265*2, 265*2, true);

add_image_size('related-item', 265, 265, false);
add_image_size('related-item2x', 265*2, 265*2, false);

//Extra one-off sizes should use the size as the name: ex. 300x255


/*
 * Template Samples:

 * Including a featured image/post thumbnail using srcset
 * to display normal and retina image.

 <img class="relationship-image"
   src="{{ item.thumbnail | resize('related-item') }}"
   srcset="{{ item.thumbnail | resize('related-item')   | retina(1) }} 1x,
           {{ item.thumbnail | resize('related-item2x') | retina(2) }} 2x"
   alt="{{ item.alt }}" />

 * Using ACF image field
 * @TODO Find a better way!
 */
/*
 * <img class="relationship-image"
         src="{{ TimberImage(post.get_field('image')) | resize('related-item') }}"
         srcset="{{ TimberImage(post.get_field('image')) | resize('related-item')   | retina(1) }} 1x,
           {{ TimberImage(post.get_field('image')) | resize('related-item2x') | retina(2) }} 2x"
         alt="{{ post.image.alt }}" />
 */