module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        less: {
            build: {
                src: 'src/styles/theme-v1.less',
                dest: 'src/styles/theme-v1.css'
            }
        },
        cssmin: {
            build: {
                src: ['src/styles/normalize.css', 'src/styles/theme-v1.css'],
                dest: 'webroot/css/theme-v1.min.css'
            }
        },
        watcher: {
            scripts: {
                files: ['src/styles/*.less'],
                tasks: ['default'],
                options: {
                    spawn: false,
                },
            },
        },
    });

    // Load the plugins
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-watcher');

    // Default task(s).
    grunt.registerTask('default', ['less', 'cssmin']);
}