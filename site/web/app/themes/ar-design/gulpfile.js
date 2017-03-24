var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var browserSync = require('browser-sync');
var useref = require('gulp-useref');
var uglify = require('gulp-uglify');
var gulpIf = require('gulp-if');
var cssnano = require('gulp-cssnano');
var imagemin = require('gulp-imagemin');
var cache = require('gulp-cache');
var del = require('del');
var runSequence = require('run-sequence');


// Development Tasks 
// -----------------

// Start browserSync server
gulp.task('browserSync', function() {
  browserSync({
	proxy: {
	    target: "http://ar-wordpress.dev:8888/",
	}
  })
})

gulp.task('sass', function() {
  return gulp.src('library/scss/**/*.scss') // Gets all files ending with .scss in app/scss and children dirs
    .pipe(sass()) // Passes it through a gulp-sass
    .pipe(gulp.dest('library/dist/css')) // Outputs it in the css folder
    .pipe(browserSync.reload({ // Reloading with Browser Sync
      stream: true
    }));
})

// Watchers
gulp.task('watch', function() {
  gulp.watch('library/scss/**/*.scss', ['sass']);
  gulp.watch('*.html', browserSync.reload);
  gulp.watch('**/*.php', browserSync.reload);
  gulp.watch('**/*.svg', browserSync.reload);
  gulp.watch('js/**/*.js', browserSync.reload);
});


// Optimization Tasks 
// ------------------

// Optimizing CSS and JavaScript 
gulp.task('optjs', function() {
  return gulp.src('js/main.js')
    .pipe(useref())
    .pipe(uglify())
    .pipe(gulp.dest('library/dist/js'));
});

gulp.task('mincss', function() {
  return gulp.src('library/css/*')
    .pipe(useref())
    .pipe(sourcemaps.init())
    .pipe(gulpIf('*.css', cssnano()))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('library/dist/css'));
});

// Optimizing Images 
gulp.task('images', function() {
  return gulp.src('images/**/*.+(png|jpg|jpeg|gif|svg|JPG)')
    // Caching images that ran through imagemin
    .pipe(cache(imagemin({
      interlaced: true,
    })))
    .pipe(gulp.dest('library/dist/images'))
});

// Copying fonts 
gulp.task('fonts', function() {
  return gulp.src('library/fonts/**/*')
    .pipe(gulp.dest('library/dist/fonts'))
});

// Cleaning 
gulp.task('clean', function() {
  return del.sync('library/dist').then(function(cb) {
    return cache.clearAll(cb);
  });
});

gulp.task('clean:dist', function() {
  return del.sync(['library/dist/**/*', '!library/dist/images', '!library/dist/images/**/*']);
});

// Build Sequences
// ---------------

gulp.task('default', function(callback) {
  runSequence(['sass', 'browserSync'], 'watch',
    callback
  )
});

gulp.task('build', function(callback) {
  runSequence(
    'clean:dist',
    'sass',
    ['optjs','mincss', 'images', 'fonts'],
    callback
  )
});