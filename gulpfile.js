const gulp = require("gulp");
const gulpSass = require("gulp-sass");
const autoprefixer = require("gulp-autoprefixer");
const browserSync = require("browser-sync").create();

function compileSass() {
  return gulp
    .src("src/sass/test-admin.scss")
    .pipe(gulpSass())
    .pipe(autoprefixer())
    .pipe(browserSync.stream())
    .pipe(gulp.dest("public/css"));
}

function browserSyncStart(cb) {
  browserSync.init(
    {
      proxy: "lms.test",
    },
    cb
  );
}

function browserSyncReload(cb) {
  browserSync.reload();
  cb();
}

function watch() {
  gulp.watch("src/sass/**/*.scss", compileSass);
  gulp.watch("**/*.php", browserSyncReload);
}

const start = gulp.series(browserSyncStart, watch);

exports.compileSass = compileSass;
exports.browserSyncStart = browserSyncStart;
exports.browserSyncReload = browserSyncReload;
exports.start = start;
