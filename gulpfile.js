'use strict';

const gulp        = require('gulp');
const fs          = require('fs');
const browserSync = require('browser-sync');
const reload      = browserSync.reload;
const merge       = require('merge-stream');
const spritesmith = require('gulp.spritesmith');
const $           = require('gulp-load-plugins')();


var THE_THEME = './'; // dossier de travail
var destination = './dist'; // dossier à livrer

function sassTask() {

  return gulp.src(THE_THEME + '/scss/global.scss')
    .pipe($.plumber())
    .pipe($.sourcemaps.init())
    .pipe($.sass({ errLogToConsole: true }).on('error', $.sass.logError))
    .pipe($.autoprefixer({ browsers: ['last 3 version', 'safari 5', 'ie >= 9'] }))
    .pipe($.cleanCss({ keepSpecialComments: 1}))
    .pipe($.plumber.stop())
    .pipe($.sourcemaps.write('.'))
    .pipe(gulp.dest(THE_THEME + '/css'))
    .pipe(reload({stream:true}));
}

function watchTask() {
  gulp.watch([THE_THEME + '/css/**/*.css']).on('change', reload);
  gulp.watch([THE_THEME + '/scss/**/*.scss'], ['sassTask']);
  gulp.watch([THE_THEME + '/js/**/*.js'], ['jsTask']);
  gulp.watch([THE_THEME + '/**/*.php']).on('change', reload);
}

function spriteTask() {
  let spriteData = gulp.src(THE_THEME + '/images/sprite/**/*')
    .pipe(spritesmith({
      imgName: 'sprite.png',
      cssName: '_sprite.scss'
    }));

  let imgStream = spriteData.img
    .pipe(gulp.dest(THE_THEME + '/css'));

  let cssStream = spriteData.css
    .pipe(gulp.dest(THE_THEME + '/scss/tools'));

  return merge(imgStream, cssStream);
}

function jsTask() {
  return gulp.src([
      THE_THEME + '/js/**/*.js',
      '!' + THE_THEME + '/js/vendors/**/*.js',
    ])
    .pipe($.jshint())
    .pipe($.jshint.reporter('default'));
}

function browserSyncTask() {
   browserSync.init({
        server: './'
    });
  watchTask();
}


/* EFFECTIVE TASK */
gulp.task('sassTask', sassTask);
gulp.task('sprite', spriteTask);
gulp.task('jsTask', jsTask);
gulp.task('watchTask', watchTask);
gulp.task('browserSyncTask', browserSyncTask);
gulp.task('serve', ['sprite', 'sassTask', 'browserSyncTask']);
gulp.task('default', ['serve']);

