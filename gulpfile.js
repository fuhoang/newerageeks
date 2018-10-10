var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('heya', function(){
	console.log('I live! Gulp is alive');
});

gulp.task('sass', function(){
	return gulp.src('app/scss/styles.scss')
		.pipe(sass())
		.pipe(gulp.dest('app/css'))
});