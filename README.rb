[From zero to hero, getting your local ready for action]

In order to minify your javascript and compile your SASS there are libraries you're going to have to install. Running these commands should do the trick as long as you have npm installed already.

npm install gulp gulp-ruby-sass gulp-notify gulp-bower gulp-minify gulp-concat gulp-rename

After all the node modules are installed you should be able to minify your JS with: gulp js
You should be able to compile SASS with: gulp css

In order to be found your javascripts must be in the static/js/base directory, and your SASS must be in static/scss. You can edit the gulpfile to configure that.
