<?php
/*
 * Custom Shortcodes
 * Every shortcode defined here should have its own file in static/scss/widgets/_{shortcode}.scss
 */

function inline_quote($atts) {
    shortcode_atts(array(
        'quote' => 'Adversity is all around us, but the greatest adversity we face is our own doubts.',
        'byline' => 'Jason Neumark Mickela'
    ), $atts);
    return '<div class="quote-wrap inline-quote"><div class="quote">'. $atts['quote'] .'<span class="end-quote"></span></div><div class="quote-byline">-'. $atts['byline'] .'</div></div>';
}
add_shortcode('quote', 'inline_quote');


function inline_button($atts) {
    shortcode_atts(array(
        'link' => 'https://www.google.com',
        'color' => 'orange',
        'text' => 'Inline Button!'
    ), $atts);
    return '<a href="'. $atts['link'] .'" class="inline-btn btn btn-'. $atts['color'] .'">'. $atts['text'] . '</a>';
}
add_shortcode('button', 'inline_button');