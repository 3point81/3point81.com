'use strict';

var gulp = require('gulp');
var plugins = require('gulp-load-plugins')();
var browserSync = require('browser-sync');
var reload = browserSync.reload;

gulp.task('styles', function () {
    return gulp.src('assets/scss/styles.scss')
        // .pipe(plugins.plumber())
        // .pipe(plugins.sourcemaps.init())
        .pipe(plugins.sass({}))
        .pipe(plugins.csso())
        .pipe(plugins.autoprefixer())
        // .pipe(plugins.sourcemaps.write('../maps'))
        .pipe(gulp.dest('assets/css'))
        .pipe(reload({stream: true}));
});
gulp.task('scripts', function () {
    return gulp.src('assets/js/scripts.js')
        // .pipe(plugins.uglify())
        .pipe(gulp.dest('assets/js/scripts.min.js'));
});

gulp.task('watch', function () {
    plugins.connectPhp.server({}, function () {
        browserSync({
            proxy: 'localhost:8000',
            open: false,
            notify: false
        });
    });

    gulp.watch([
        'assets/js/*',
        'content/**/*',
        'site/templates/*',
        'site/plugins/*',
        'site/snippets/*'
    ]).on('change', reload);

    gulp.watch('assets/scss/*', ['styles']);
    // gulp.watch('assets/js/*', ['scripts']);
});

gulp.task('default', ['styles', 'watch']);