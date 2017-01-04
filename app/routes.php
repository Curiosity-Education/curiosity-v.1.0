<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('registry', function(){
	return View::make('parent.registry');
});

Route::get('registry-firstchild', function(){
	return View::make('parent.registry_firstchild');
});

Route::get('my-account', function(){
	return View::make('child.configuration_account');
});

Route::get('profile-child', function(){
	return View::make('child.profile');
});

Route::get('library-pdfs', function(){
	return View::make('parent.library_pdfs');
});

Route::get('library-videos', function(){
	return View::make('child.library_videos');
});

Route::get('parent-profile', function(){
    return View::make('parent.profile');
});


Route::get('/', function()
{
	return View::make('child.init');
});

Route::get('menu-studio',function(){
	return View::make('child.menu-studio');
});

Route::get("child-registration",function(){
    return View::make("parent.child_registration");
});

Route::get('padre-inicio', function(){
	return View::make('parent.home');
});

Route::get('menu-estudio', function(){
	return View::make('child.studyMenu');
});

Route::get('tienda', function(){
    return View::make('child.curiosity-store');
});

Route::get('juego', function(){
    return View::make('child.game-start');
});

Route::get('administer', function(){
    return View::make('administer.admin-levels');
});

Route::get('1', 'activitiesVideosController@save');

Route::get('view-{viewName}-{controller?}-{method?}', 'viewsController@getView');

/*
*   Register for users
*/
/*
Route::group(array('prefix' => 'register'),function(){
		Route::match(array('GET', 'POST'), '/', 'padreController@viewPage');
		Route::post('remote-email','padreController@remoteEmail');
    Route::get('confirm/{token}','padreController@confirmar');

    Route::group(array('prefix' => ''), function(){
			Route::match(array('GET', 'POST'), '/', 'suscripcionController@viewPage');
			Route::match(array('GET', 'POST'),'suscription','suscripcionController@suscripcion');
	    Route::match(array('GET','POST'),'parent','padreController@addPadre');
		});
});

// Facebook user
Route::group(array('before' => 'unauth'), function(){
	Route::group(array('prefix' => 'login'), function(){
		Route::match(array('GET', 'POST'), '/', 'loginController@verPagina');
    Route::match(array('GET', 'POST'),'forgot-my-password/{token?}', 'loginController@recuperarCont');
    Route::match(array('GET', 'POST'),'fb', 'loginController@loginFB');
    Route::post('check-user', 'loginController@verificarUsuario');
	});
});

// Route::get('/getCiudades','ciudadController@getCiudades');
Route::post('/remote-username','userController@remoteUsername');
// Route::post('/sendMensaje','padreController@sendMensaje');
Route::group(array('before' => 'auth'), function(){
        Route::match(['POST','GET'],'/pay-suscription/{user_id?}/{cupon?}','userController@pay_card_suscription');
        /* Rutas para obtencion de datos de direccion por AJAX*/
        //Route::post('/getByEstados-{pais}', 'direccionController@getEstados');
        //Route::post('/getByCiudades', 'direccionController@getCiudades');
        /*Rutas para subir y ver juego*/
        //Route::post('/actividad/setdata','actividadController@setDataActivity');
        //Route::match(array('GET','POST'),'/asignar/juego/{idActividad}', 'actividadController@subirJuego');
        //Route::group(array('before' => 'only_session'), function(){
        //Route::post('/buscarTema', 'temaController@temasFound');

        // padres
/*        Route::group(array('before' => 'gestion_data_padre'), function(){
					Route::group(array('before' => 'my-son'), function(){
						Route::match(array('GET', 'POST'), '/', 'padreController@viewPage');
						Route::get('scores', 'padreController@getPuntajes');
	                    Route::get('alerts', 'padreController@getAlertasNow');
						Route::get('getsons','padreController@gethijos');
						Route::post('get-use-platform','padreController@getUsoPlataforma');
						Route::post('cut-sons','padreController@getCountHijos');
                        Route::post('get-follow-up','padreController@seguimientoHijo');
	                    Route::post('tour-first','padreController@tourFirst');
					});
					Route::group(array('prefix' => 'sons'), function(){
						Route::match(array('GET', 'POST'), '/', 'hijoController@viewPage');
						Route::get('my', 'hijoController@info');
	                    Route::post('breakdown/{idHijo}','hijoController@desgloceJuegos');
	                    Route::post('getMeta/{idHijo}','hijoController@getMeta');
	                    Route::post('reg','hijoController@addHijo');
					});


        });


        // salir (cerrar sesion)
        Route::get('/logout', 'loginController@salir');
        // Acceder a juego
        Route::post("/actividad-save-cali","actividadController@saveCalificationActivity");
        Route::post("/actividad-get-cali","actividadController@getCalificacionActivity");
        Route::get('block', 'bloqueController@verPagina');
        Route::get('profile', 'userController@verPagina');

        Route::group(array('prefix' => 'profile'),function(){
            Route::post('update','perfilController@update');
            Route::group(array('prefix' => 'user'),function(){
                Route::post('update','perfilController@updateUser');
            });
            Route::post('checkPassword','perfilController@checkPassword');
        });

				Route::group(array('prefix' => 'remote-username'), function(){
					Route::match(array('GET', 'POST'), '/', 'userController@viewPage');
					Route::post('update','userController@remoteUsernameUpdate');
	      	        Route::post('son','userController@remoteUsernameHijo');
	                Route::post('admin','userController@remoteUsernameAdmin');

					Route::group(array('prefix' => 'remote-password'), function(){
						Route::post('update','userController@remotePasswordUpdate');
					});
				});

			// 	Route::group(array('prefix' => ''), function(){
			// 		Route::match(array('GET', 'POST'), '/', 'perfilController@viewPage');
	      //   Route::post('regAdmin','userController@saveAdmin');
			// 		Route::group(array('prefix' => 'photo'), function(){
			// 			Route::post('foto','perfilController@cutImage');
			// 		});
			// 	});

        // Realizar Actividades
        Route::group(array('before' => 'realizar_actividades'),function(){
            Route::group(array('prefix' => 'skin'), function(){
				Route::match(array('GET', 'POST'),'/', 'tiendaController@viewPage');
                Route::get('tienda', 'tiendaController@viewPage');
				Route::post('change', 'tiendaController@cambiarSkin');
		        Route::post('buy', 'tiendaController@comprarSkin');
		        Route::post('change', 'tiendaController@cambiarAvatar');
            });
            Route::group(array('prefix' => 'content'), function(){
                Route::match(array('GET', 'POST'), '/', 'contenidoController@viewPage');
                Route::get('home', 'contenidoController@getInicio');
                Route::post('get-videos', 'contenidoController@getAllVideos');
            });
            Route::group(array('prefix' => 'son'), function(){
                Route::match(array('GET', 'POST'), '/', 'hijoController@viewPage');
                Route::post('assign/avatar', 'hijoController@asignAvatar');
                Route::post('goal/change', 'hijoController@changeMeta');
            });
            Route::group(array('prefix' => 'game'),function(){
                Route::get('{idActividad}/{nombre}','actividadController@getViewJuego');
				Route::get('{id}', 'actividadController@verPaginaInWeb');
                Route::post('has','actividadController@hasGame');

            });
            Route::group(array('prefix' => 'level'), function(){
                Route::match(array('GET', 'POST'), '/', 'nivelController@verPaginaInWeb');
            });
            Route::group(array('prefix' => ''), function(){
				Route::match(array('GET', 'POST'), '/', 'inteligenciaController@viewPage');
				// 			Route::get('intelligence-{idNivel}', 'inteligenciaController@verPaginaInWeb');
				// 		});
				// 		Route::group(array('prefix' => ''), function(){
				// 			Route::match(array('GET', 'POST'), '/', 'bloqueController@viewPage');
				// 			Route::get('block-{id}', 'bloqueController@verPaginaInWeb');
				// 		});
				// 		Route::group(array('prefix' => ''), function(){
				// 			Route::match(array('GET', 'POST'), '/', 'temaController@View');
				// 			Route::get('topic-{id}', 'temaController@verPaginaInWeb');
				// 		});
				// 		Route::group(array('prefix' => ''), function(){
				// 			Route::match(array('GET', 'POST'), '/', 'secuenciaController@viewPage');
				// 			Route::post('getSpriteselected-{nameType}', 'secuenciaController@getSelectedSprite');
				// 		});
            });

		// NOVEDADES

		Route::group(array('before' => 'gestionar_novedades'),function(){
			Route::group(array('prefix' => 'news'), function(){
				Route::match(array('GET', 'POST'), '/', 'novedadesController@viewPage');
				// Validaciones remotas
				Route::match(array('GET', 'POST'),'tituloRemoto-papa', 'novedadesController@tituloNov_papa');
				Route::match(array('GET', 'POST'),'tituloRemoto-hijo', 'novedadesController@tituloNov_hijo');
	            Route::match(array('GET', 'POST'),'linkRemoto-hijo', 'novedadesController@linkNov_hijo');
				// Gestión Novedades
				Route::match(array('GET', 'POST'),'viewNews', 'novedadesController@getViewNovedad');
				Route::match(array('GET', 'POST'),'add-dad', 'novedadesController@add_papaNovedad');
				Route::match(array('GET', 'POST'),'edit-dad/{id}', 'novedadesController@edit_papaNovedad');
				Route::match(array('GET', 'POST'),'delete-dad/{id}', 'novedadesController@delete_papaNovedad');
				Route::match(array('GET', 'POST'),'add-son', 'novedadesController@add_hijoNovedad');
				Route::match(array('GET', 'POST'),'edit-son/{id}', 'novedadesController@edit_hijoNovedad');
				Route::match(array('GET', 'POST'),'delete-son/{id}', 'novedadesController@delete_hijoNovedad');

			});

		});


        Route::group(array('before' => 'gestionar_niveles'),function(){
            // Niveles
            Route::group(array('prefix' =>  'level-admin'),function(){
                Route::match(array('GET', 'POST'), '/', 'nivelController@verPagina');
                Route::post('update', 'nivelController@update');
                Route::post('delete', 'nivelController@remove');

                Route::group(array('prefix' =>  'photo'),function(){
                  Route::post('update', 'nivelController@changeImage');
                });
            });
        });

        Route::group(array('before' => 'gestionar_inteligencias'),function(){
            // Intelligence
            Route::group(array('prefix' =>  'intelligence-admin'),function(){
                Route::match(array('GET', 'POST'), '{nivel}', 'inteligenciaController@verPagina');
                Route::post('update', 'inteligenciaController@update');
                Route::post('delete', 'inteligenciaController@remove');

                Route::group(array('prefix' =>  'photo'),function(){
                   Route::post('update', 'inteligenciaController@changeImage');
                });
            });
        });
        Route::group(array('before' => 'gestionar_bloques'),function(){
            // Block
            Route::group(array('prefix' =>  'block-admin'),function(){
                Route::match(array('GET', 'POST'), '/{id}{nivelID}', 'bloqueController@verPagina');
                Route::post('update', 'bloqueController@update');
                Route::post('delete', 'bloqueController@remove');

                Route::group(array('prefix' =>  'photo'),function(){
                   Route::post('/update', 'bloqueController@changeImage');
                });
            });
        });
        Route::group(array('before' => 'gestionar_temas'),function(){
            // Temas
            Route::group(array('prefix' =>  'topic-admin'),function(){
                Route::match(array('GET', 'POST'), '{id}{inteligencia}{nivel}', 'temaController@verPagina');
                Route::post('update', 'temaController@update');
                Route::post('delete', 'temaController@remove');
                Route::group(array('prefix' =>  'photo'),function(){
                   Route::post('update', 'temaController@changeImage');
                });
            });
        });

        Route::group(array('before' => 'gestionar_actividades'),function(){
            // Activities
            Route::group(array('prefix' =>  'activity-admin'),function(){
                Route::match(array('GET', 'POST'), '{id}{bloque}{inteligencia}{nivel}', 'actividadController@verPagina');
                Route::post('update', 'actividadController@update');
                Route::post('delete', 'actividadController@remove');
                Route::group(array('prefix' =>  'photo'),function(){
                   Route::post('update', 'actividadController@changeImage');
                });

                Route::group(array('prefix' =>  'game'),function(){
                    Route::post('update','actividadController@moveGame');
                    Route::post('delete','actividadController@disabledGame');
                });

            });

        });
        // Schools
        Route::group(array('before' => 'gestionar_escuelas'), function(){
            Route::group(array('prefix' =>  'school'),function(){
                Route::match(array('GET', 'POST'), '/', 'escuelaController@verPagina');
                Route::post('update', 'escuelaController@update');
                Route::post('delete', 'escuelaController@remove');
            });
        });*/
        /*Route::group(array('before' => 'gestionar_ventas'), function(){
            Route::group(array('prefix' =>  'salesperson'),function(){
                /*** SE COLOCAN LOS VENDEDORES EN ESTE APARTADO MIENTRAS SE REESTRUCTURAN LOS PERMISOS Y ROLES**/
                /*Route::get('/', 'vendedorController@verPagina');
                Route::post('save', 'vendedorController@guardar');
                Route::post('update', 'vendedorController@actualizar');
                Route::post('delete', 'vendedorController@eliminar');
                Route::post('get', 'vendedorController@obtenerActivos');

                Route::group(array('prefix' =>  'photo'),function(){
                   Route::post('update', 'vendedorController@guardarFoto');
                });
            });
        });

        Route::group(array('prefix' =>  'teacher'),function(){
            // teachers
            Route::match(array('GET', 'POST'), '/', 'profesorController@verPagina');
            Route::post('/update', 'profesorController@update');
            Route::post('/delete', 'profesorController@remove');
            Route::post('/get', 'profesorController@getProfeInfo');
        });


        Route::group(array('prefix' =>  'statistic'),function(){
            // Statistics
            Route::post('score', 'actividadController@grafPuntajes');
            Route::post('banner', 'actividadController@getEstandarte');
            Route::post('son', 'actividadController@getEstadisticasHijo');
        });
        // Obtener Inteligencias
        Route::get('/edu-{idGrade}-inteligencia', 'contenidoController@getInteligencias');

        // Filter for Avatar management
        Route::group(array('before' => 'gestionar_avatar'), function(){
          // Administrar Avatar
            Route::group(array('prefix' => 'avatar'),function(){
                Route::get('/', 'avatarController@gestionar');
                Route::post('save', 'avatarController@registrarAvatar');
                Route::post('delete', 'avatarController@eliminarAvatar');
                Route::post('update', 'avatarController@actualizarAvatar');

                Route::group(array('prefix' => 'style'),function(){
                    // Administrar estilos
                    Route::post('get', 'avatarestilosController@getById');
                    Route::post('save', 'avatarestilosController@registrarEstilo');
                    Route::post('delete', 'avatarestilosController@eliminarEstilo');
                    Route::post('update', 'avatarestilosController@actualizarEstilo');
                });

                Route::group(array('prefix' => 'secuence'),function(){
                    // Secuencias
                    Route::post('get', 'secuenciaController@getById');
                    Route::post('register', 'secuenciaController@guardar');
                    Route::post('update', 'secuenciaController@actualizar');
                    Route::post('delete', 'secuenciaController@eliminar');
                });

                Route::group(array('prefix' => 'secuences-type'),function(){
                    // Secuencias
                    Route::post('get', 'secuenciaController@getTiposSecuencia');
                });

            });
        });


        /*
        *  Monitoreo de Navegadores

        Route::group(array('prefix' => 'browser'),function(){
            Route::match(array('GET','POST'),'get/{limit?}','sesionInfoController@getBrowsers')
                ->where('limit','[0-9]+');
        });


    });

    Route::group(array('before' => 'gestionar_actividades'), function(){
        Route::get('/videoInicio', 'contenidoController@adminVideos');
        Route::post('/getAllVideosAdmin', 'contenidoController@myVideos');
        Route::post("/reindexarVideos",'contenidoController@reindexar');
    });


//});
//
// /*
// *   The routes will be updated for put
// *   it with the classes's functions current
// *   and to add the prefix
//
//
//
// // ---./ Webhooks para saber quien ha pagado y quien no
// Route::post('/webhook/check-suscription','userController@webhook_check_pay');
// Route::get('/', 'principalController@verPagina');
// Route::get('/nosotros', 'principalController@verNosotros');
// Route::get('/proximamente',function(){
//     return View::make('aviso_beta');
// });
// Route::get('/missedSession','sesionInfoController@missedSession');
// Route::post('/last-session','sesionInfoController@getLastSession');
// Route::get('/terminos-y-condiciones',function(){
//     return View::make('terminos');
// });
// Route::get('/aviso-privacidad',function(){
//     return View::make('aviso-privacidad');
// });
//
// Route::get('/nuestro-equipo',function(){
// 	return View::make('nuestro-equipo');
// });
// Route::get('/mentores',function(){
// 	return View::make('mentores');
// });
// Route::get('/preguntas-frecuentes',function(){
// 	return View::make('preguntas-frecuentes');
// });
//
// Route::get('/registro-exitoso',function(){
//     return View::make('registro_exitoso');
// });
//
//
// /*
// *   Register for users
// */
// Route::group(array('prefix' => 'register'),function(){
// 	Route::group(array('before' => ''), function(){
// 		Route::match(array('GET', 'POST'), '/', 'padreController@viewPage');
// 		Route::post('remote-email','padreController@remoteEmail');
//     Route::get('confirm/{token}','padreController@confirmar');
// 	});
//     Route::group(array('before' => ''), function(){
// 			Route::match(array('GET', 'POST'), '/', 'suscripcionController@viewPage');
// 			Route::match(array('GET','POST'),'suscription','suscripcionController@suscripcion');
