module.exports = function (grunt) {

    grunt.initConfig({
        // jshint: {
        //     files: ['gruntfile.js', 'src/**/*.js', 'test/**/*.js'],
        //     options: {
        //         globals: {
        //             jQuery: true
        //         }
        //     }
        // },
        concat: {
            // js: {
            //     src:    ['scr/js/jquery.min.js', 'scr/js/jquery.wookmark.js', 'src/js/jquery.imagesloaded.js'],
            //     dest:   'js/main.js'
            // },
            css: {
                src:    ['src/css/main-pinball-style.css', 'src/css/pinball-style.css'],
                dest:   'css/style.css'
            }
        },
        cssmin: {
            target: {
                files: [{
                    expand: true,
                    cwd: 'css',
                    src: ['*.css', '!*.min.css'],
                    dest: 'css',
                    ext: '.min.css'
                }]
            }
        },
        watch: {
            files: {
                files: ['src/**/*.css', 'src/**/*.js'],
                tasks: ['concat', 'cssmin']
            },
        }
    });

    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.registerTask('default', ['concat', 'cssmin']);

};