const { src, dest, watch, series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('gulp-autoprefixer').default;
const cleanCSS = require('gulp-clean-css');

function styles() {
  return src('scss/common.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(cleanCSS())
    .pipe(dest('assets/css'));
}

function watchFiles() {
  watch('scss/**/*.scss', styles);
}

exports.default = series(styles, watchFiles);
