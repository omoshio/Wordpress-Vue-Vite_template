const { src, dest, watch } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('gulp-autoprefixer').default;  // ← ここを変更
const cleanCSS = require('gulp-clean-css');

function styles() {
  return src('scss/common.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(cleanCSS())
    .pipe(dest('css'));
}

exports.default = () => {
  watch('scss/**/*.scss', styles);
};
