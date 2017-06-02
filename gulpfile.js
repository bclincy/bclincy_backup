/**
 * Created by bclincy on 5/31/17.
 */
const gulp = require('gulp');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var concat = require('gulp-concat');
var gulpif = require('gulp-if');
var minify = require('gulp-clean-css');
var plumber = require('gulp-plumber');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var util = require('gulp-util');

var config = {
    assetsDir: 'src/AppBundle/Resources/assets',
    bowerDir: 'vendor/bower_components',
    production: !!util.env.production,
    sourceMaps: !util.env.production,
    webDir: 'web'
};

var app = {};

app.addStyle = function (path, filename) {
    gulp.src(path)
        .pipe(plumber())
        .pipe(gulpif(config.sourceMaps, sourcemaps.init()))
        .pipe(sass())
        .pipe(gulpif(config.production, minify()))
        .pipe(autoprefixer())
        .pipe(concat(filename))
        .pipe(gulpif(config.sourceMaps, sourcemaps.write('.')))
        .pipe(gulp.dest('web/css/'))
};

app.addscripts = function (path, filename) {
    return gulp.src(path)
        .pipe(plumber())
        .pipe(gulpif(config.sourceMaps, sourcemaps.init()))
        .pipe(concat(filename))
        .pipe(gulpif(config.production, uglify()))
        .pipe(gulpif(config.sourceMaps, sourcemaps.write('.')))
        .pipe(gulp.dest('web/js'));
}

app.copy = function(srcFiles, outputDir){
    console.log(srcFiles);
    gulp.src(srcFiles)
    .pipe(gulp.dest(outputDir));
}
//Style
gulp.task('styles', function(){
    app.addStyle([
        config.assetsDir + '/sass/app.scss',
        config.bowerDir+'/font-awesome/css/font-awesome.css'
    ], 'default.css');
    app.addStyle([
        config.assetsDir + '/sass/carousel.scss'
    ], 'carousel.css')
})
//font
gulp.task('fonts', function (){
    app.copy(config.bowerDir+'/font-awesome/fonts/**/', config.webDir+'/fonts/');
    app.copy(config.bowerDir+'/bootstrap-sass/assets/fonts/bootstrap/**/', config.webDir+'/fonts/bootstrap');
})

// Clean
gulp.task('clean', function () {
    return gulp.src(['web/css', 'web/scripts'], { read: false }).pipe($.clean());
});

//Script
gulp.task('scripts', function(){
    app.addscripts([
        config.bowerDir+'/jquery/dist/jquery.js',
        config.assetsDir+'/js/**/*.js'
    ], 'main.js');
});
//default
gulp.task('default',['styles', 'scripts'], function(){
    console.log('hello world');
})

//Watch
gulp.task('watch', function() {
    console.log('starting watch!');
    gulp.watch(config.assetsDir+'/sass/**/*.scss', ['styles']);
    gulp.watch(config.assetsDir+'/js/**/*.js', ['scripts']);
});
