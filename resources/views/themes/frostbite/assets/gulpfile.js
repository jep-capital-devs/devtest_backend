const { src, dest, watch } = require('gulp');
const sass          = require('gulp-sass');
const autoprefixer  = require('gulp-autoprefixer');
const minifyCSS     = require('gulp-csso');
const babel         = require('gulp-babel');
const uglify        = require('gulp-uglify');
const concat        = require('gulp-concat');
const eslint        = require('gulp-eslint');
const notify        = require("gulp-notify");

function css(isProd) {
    let isSuccess = true;
    return src('./sass/**/*.scss', { sourcemaps: isProd ? false : true })
        .pipe(sass({}).on('error', function(err) {
          isSuccess = false;
          sass.logError;
          this.emit('end');
          notify().write(err);
        }))
        .pipe(autoprefixer())
        .pipe(minifyCSS())
        .pipe(dest('../../../../../public/themes/frostbite/dist/css'), { sourcemaps: true })
        .pipe(isSuccess ? notify("CSS Compiled"):false);
}

function lintjs(isProd) {
    let isSuccess = true;
    return src('./js/**/*.js')
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(eslint())
        .pipe(eslint.format())
        .on("error",notify.onError('Error!!!'))
        .pipe(eslint.results(result => {
          if (result.errorCount > 0) isSuccess = false;
          compilejs(isSuccess, isProd);
        }));
}

function compilejs(isSuccess, isProd) {
  if (isSuccess) {
    return src('./js/**/*.js', { sourcemaps: isProd ? false : true })
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(uglify())
        .pipe(dest('../../../../../public/themes/frostbite/dist/js', { sourcemaps: true }))
        .pipe(notify("JS Compiled"));
  } else {
    return src('./js/**/*.js').pipe(notify("JS Errors Found"));
  }
}

function watchFiles() {
    css();
    lintjs();
    watch('./sass/**/*.scss', css);
    watch('./js/**/*.js', lintjs);
}

function production() {
  css(true);
  return lintjs(true);
}

exports.css        = css;
exports.lintjs     = lintjs;
exports.compilejs  = compilejs;
exports.production = production;
exports.default    = watchFiles;
