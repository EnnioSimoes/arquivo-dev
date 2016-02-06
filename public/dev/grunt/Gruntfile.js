module.exports = function(grunt) {
	 'use strict';
	 var configTasks = {
		// Carregando os pacotes
		pkg: grunt.file.readJSON( 'package.json' ),

		// Diretorios
		dir:{
			dev:{
				css:'../assets/css',
				js:'../assets/js',
				sass:'../assets/sass'
			},
			dist:{
				css:'../../assets/css',
				js:'../../assets/js',
				sass:'../../assets/sass'
			}
		},

		// SASS
		sass: {

			// Compila .css minificado
			dist:{
				options:{
				style: 'compressed',
	  			sourcemap: 'none',
	  			noCache: true
				},
				files:{
					'<%= dir.dist.css %>/style.min.css': '<%= dir.dev.sass %>/style.scss'
				}
			},

			// Compila .css para leitura
			dev:{
				options:{
					style: 'extended',
					sourcemap: 'none',
					noCache: true
				},
				files:{
					'<%= dir.dev.css %>/style.css': '<%= dir.dev.sass %>/style.scss'
				}
			}
		},

	    autoprefixer: {
	      file: {
	        src: ['<%= dir.dev.css %>/style.css', '<%= dir.dist.css %>/style.css']
	      },
	    },

		// Javascript
		uglify:{
	      my_targets:{
	      
	        files:{
	          '<%= dir.dist.js %>/scripts.min.js':
	          [
	          '<%= dir.dev.js %>/_menu.js', '<%= dir.dev.js %>/_box-conteudo.js'
	          ],
	        }
	      }
	    },

	    // Observar alterações
		watch:{
			sass:{
				files:[
	        '<%= dir.dev.sass %>/configuracoes/*.scss',
	        '<%= dir.dev.sass %>/ferramentas/*.scss',
	        '<%= dir.dev.sass %>/estilos-genericos/*.scss',
	        '<%= dir.dev.sass %>/estilos-basicos/*.scss',
	        '<%= dir.dev.sass %>/objetos/*.scss',
	        '<%= dir.dev.sass %>/componentes/*.scss',
	        '<%= dir.dev.sass %>/style.scss'
				],
			tasks:['sass', 'autoprefixer']
			},
			js:{
				files:'<%= dir.dev.js %>/*.js',
				tasks:['uglify']
			}
		}
	 }

		grunt.initConfig(configTasks);

	  // Carrega os pacotes para realizar tarefas
	  grunt.loadNpmTasks('grunt-contrib-sass');
	  grunt.loadNpmTasks('grunt-autoprefixer');
	  grunt.loadNpmTasks('grunt-contrib-uglify');
	  grunt.loadNpmTasks('grunt-contrib-watch');

	  grunt.registerTask('default', ['sass', 'autoprefixer', 'uglify', 'watch']);
}
