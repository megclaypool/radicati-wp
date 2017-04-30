## Radicati - A Twig Theme for WordPress

This is still very much a work in progress, but is under active development. The end goal is a base theme that shares many of its templates with a similar Drupal 8 base theme, allowing you to subtheme either one and create styles that will work with either platform.

Right now this theme is meant to be used in place, but soon it will be change to be a parent theme and a starterkit example child theme will be supplied.

# Some gotchas at the moment

I started with a twig base theme and changed some of the paths that some templates extend from, not all templates have had their paths fixed. Also, not all templates have been converted to bootstrap.

# Requirements

You must have the Timber plugin enabled before enabling the theme.

# Setting up local development

In order to minify your javascript and compile your SASS there are libraries you're going to have to install. Running these commands should do the trick as long as you have npm installed already.

> npm install gulp gulp-ruby-sass gulp-notify gulp-bower gulp-minify gulp-concat gulp-rename

After all the node modules are installed you should be able to minify your JS with: 
> gulp js

You should be able to compile SASS with: 
> gulp css

And watch for changes with: 
> gulp watch

In order to be found your javascripts must be in the static/js/base directory, and your SASS must be in static/scss. You can edit the gulpfile to configure that. I'm not a pro at configuring gulp to minify Javascript and I feel like a better job can be done, if anyone wants to make a suggestion there, that would be awesome.

# After enabling the theme

There's a lot of settings baked into the theme that aren't automatically enabled by WordPress when the theme is enabled. Once you enable the theme make sure you go to the theme customize page and press the save button, all the starter content and settings will be set.
