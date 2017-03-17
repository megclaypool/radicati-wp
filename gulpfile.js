var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    notify = require('gulp-notify'),
    bower = require('gulp-bower');

var config = {
    bowerDir: "./bower_components",
    sassPath: "./static/scss",
    staticPath: "./static"
}

gulp.task('bower', function() {
    return bower()
        .pipe(gulp.dest(config.bowerDir));
});

gulp.task('font-awesome', function() {
    return gulp.src(config.bowerDir + "/font-awesome/fonts/**.*")
        .pipe(gulp.dest(config.staticPath + "/fonts"));
});

gulp.task('css', function() {
    return sass(config.sassPath + "/hip-styles.scss", {
            style: 'compressed',
            loadPath: [
                config.bowerDir + "/bootstrap-sass/assets/stylesheets",
                config.bowerDir + "/font-awesome/scss",
            ]
        }).on("error", notify.onError(function(error) {
            return "Error: " + error.message;
        }))
        .pipe(gulp.dest(config.staticPath + "/css"));
});

gulp.task('watch', function() {
    gulp.watch(config.sassPath + "**/*.scss", ['css']);
});

gulp.task('default', ['bower', 'font-awesome', 'css']);