const gulp = require('gulp');
const sass = require('gulp-sass');
const concat = require('gulp-concat');
const terser = require('gulp-terser');
const sourcemaps = require('gulp-sourcemaps');
const postcss = require('gulp-postcss');
const cssnano = require('cssnano');
const autoprefixer = require('autoprefixer');
const { src, series, parallel, dest, watch } = require('gulp');

const scss_path = 'assets/styles/scss/**/*.scss';
const css_path = 'assets/styles/*.css';
const js_path = 'assets/scripts/src/**/*.js';

function styles() {
    return src(scss_path)
        .pipe(sass().on('error', sass.logError))
        .pipe(dest('assets/styles'))
        .pipe(sourcemaps.init())
        .pipe(concat('main.css'))
        .pipe(postcss([autoprefixer(), cssnano()]))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('assets/styles'));
}

function scripts() {
  return src(js_path)
    .pipe(sourcemaps.init())
    .pipe(concat('main.js'))
    .pipe(terser())
    .pipe(sourcemaps.write('.'))
    .pipe(dest('assets/scripts'));
}

function watchTask() {
  watch([scss_path], { interval: 1000 }, parallel(styles));
  watch([js_path], { interval: 1000 }, parallel(scripts));
}

exports.styles = styles;
exports.scripts = scripts;
exports.default = series(
  parallel(styles, scripts),
  watchTask
);