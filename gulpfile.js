"use strict";

var gulp = require("gulp");
var sass = require("gulp-sass");
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

var paths = {
    js: "javascripts",
    css: "css"
};

//compile
function css() {
    return gulp.src("scss/*.scss")
        .pipe(sass().on("error", sass.logError))
        .pipe(gulp.dest("css"));
}

// Run:
// gulp scripts.
// Uglifies and concat all JS files into one
function js() {
    var scriptPaths = [paths.js + "/*.js"];
    return gulp.src(scriptPaths)
        .pipe(concat("theme.min.js"))
        .pipe(uglify())
        .pipe(gulp.dest(paths.js));
}

// Run:
// gulp watch
// Starts watcher. Watcher runs gulp sass task on changes
function watchFiles() {
    gulp.watch("scss/*.scss", css);
    gulp.watch([
        paths.js + "/*.js",
        "!" + paths.js + "/theme.js",
        "!" + paths.js + "/theme.min.js"
    ], js);
}

// Run:
// gulp
// Starts watcher (default task)
gulp.task("default", watchFiles);


