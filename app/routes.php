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


Route::get('/padrino-landing','landingController@landingPadrino');
Route::get('/', 'landingController@landingpage');

Route::get("/helpme-db", "helperToDbController@addNewAccesorieToChildren");

Route::get('/padrino-email', function(){
	$dataSend = [
		"name" => "Equipo Curiosity",
		"client" => "Wilvardo Ramirez Colunga",
		"email" => "wilvardo@gmail.com",
		"subject" => "Padrino Curiosity",
		"child" => "Maria Guadalupe Becerra",
		"child_image" => '/packages/assets/media/images/padrino_curiosity/amor/aaaaa-bbbbb.jpg',
		"home" => "Test Email Home",
		"hobby" => "jugar futbol",
		"ser_grande" => "doctora",
		"home_image" => "/packages/assets/media/images/institutions/deleted.png"
	];
	return View::make('emails.padrinoCuriosity', $dataSend);
});

Route::get('/padrino', function(){
    $inst = ["homes" => Institute::where("tipo", "=", "Casa Hogar")
    ->where("active", "=", 1)
    ->get()];
    return View::make("administer.admin-godfather", $inst);
});

//Route::get('/selectavatar', 'avatarController@view');

Route::get('terminos', function(){
	return View::make('landing.terms_conditions');
});

Route::get('aviso-privacidad', function(){
	return View::make('landing.notice_privacy');
});

Route::get('adm-institution', function(){
	return View::make('administer.adm-institutions');
});

Route::get('equipo', function(){
	return View::make('landing.team');
});


/* Rutas para apadrinar -------------------------------------------------------------*/

Route::match(['GET','POST'],'casas-hogares','instituteMembershipsController@getHomes');

Route::group(array('prefix' => '/apadrinar'), function(){
	Route::post('get-children', 'instituteMembershipsController@getChildren');
});

/*-----------------------------------------------------------------------------------*/

Route::get('mentores', function(){
	return View::make('landing.mentors');
});

Route::get('registry', function(){
	return View::make('parent.registry');
});

Route::get('admin-avatar', function(){
	return View::make('administer.admin-avatar');
});

Route::get('registry-firstchild', function(){
	return View::make('parent.registry_firstchild');
});

Route::get('parent-register', function(){
    return View::make('parent.registry');
});
Route::group(array('prefix' => 'plans'),function(){
   Route::post('get','plansController@get');
});

// // ---./ Webhooks para saber quien ha pagado y quien no
Route::match(['GET','POST'],'/webhook/check-suscription','userSuscriptionController@webhook_check_pay');

// Routes profile child
Route::group(array('prefix' => '/profile-child'), function(){
	Route::get('get-graph', 'childrenController@graphDailyGoal');
	Route::get('get-cards', 'childrenController@cardsScore');
});

// Routes selection avatar first time
Route::group(array('prefix' => 'select-avatar'), function(){
	Route::post('get-avatar','avatarController@avatarAnimated');
	Route::post('get-style','avatarController@avatarStyles');
	Route::post('save','avatarController@selectedAvatar');
});

/*
* -----------------------------------------------------------------------------
* Routes to access the views when need a log In
* -----------------------------------------------------------------------------
*/
Route::group(array('before' => 'auth'), function(){
	Route::get('view-{viewName}', 'viewsController@getViewWithOutData');

	Route::get('view-{controller}/{method}/view-{viewName}/', 'viewsController@getViewWithData')
    ->where(
        array(
            'controller' => "^[a-zA-Z]*$",
            'method'     => "^[a-zA-Z]*$"
        )
    );
});

/*
* -----------------------------------------------------------------------------
* Routes to manage the access to the acount.
* -----------------------------------------------------------------------------
*/
Route::post('logIn', 'loginController@logIn');
Route::get('logout', 'loginController@logOut');
Route::get('getInstitution-{id?}','instituteMembershipsController@render');
Route::get("recuperar",function(){
	return View::make('landing.vista_cambiar_pass');
});
Route::match(["POST","GET"],'/recoveryPass{token?}','loginController@recoverCont');
/*
* -----------------------------------------------------------------------------
* Routes to manage the content.
* only for the administers into the system.
* -----------------------------------------------------------------------------
*/
Route::group(array('before' => 'auth'), function(){
	Route::group(array('before' => 'manage_content'),function(){
		// change institution description
		Route::post('/inst-change-politics', 'institutionsController@updateDescription');
		// Manage the levels
		Route::group(array('prefix' =>  'levels'),function(){
			Route::post('save', 'levelsController@save');
			Route::post('update', 'levelsController@update');
			Route::post('delete', 'levelsController@delete');
		});
		// Manage the intelligences
		Route::group(array('prefix' =>  'intelligences'),function(){
			Route::post('save', 'intelligencesController@save');
			Route::post('update', 'intelligencesController@update');
			Route::post('delete', 'intelligencesController@delete');
		});
		// Manage the Blocks
		Route::group(array('prefix' =>  'blocks'),function(){
			Route::post('save', 'blocksController@save');
			Route::post('update', 'blocksController@update');
			Route::post('delete', 'blocksController@delete');
		});
		// Manage the Topics
		Route::group(array('prefix' =>  'topics'),function(){
			Route::post('save', 'topicsController@save');
			Route::post('update', 'topicsController@update');
			Route::post('delete', 'topicsController@delete');
		});
		// mange the masive users
		Route::group(array('prefix' => '/institute-user'),function(){
			Route::get('/get-user-for-institute/{range}/{idInstitute}','instituteMembershipsController@generateMemebers');
			Route::post('/delete-user-for-institute/{idInstitute}','instituteMembershipsController@deleteUsers');
		});

		// Manage PDF's Library
		Route::group(array('prefix' =>  'pdfs'),function(){
			Route::post('save', 'libraryPdfController@save');
			Route::post('delete', 'libraryPdfController@delete');
		});
		// Manage Videos' Library
		Route::group(array('prefix' =>  'admin-video'),function(){
			Route::post('save', 'libraryVideoController@save');
			Route::post('update', 'libraryVideoController@update');
			Route::post('delete', 'libraryVideoController@delete');
		});
		// Manage News for parents
		Route::group(array('prefix' => 'news'),function(){
			Route::post('save', 'dadNewsController@save');
			Route::post('update', 'dadNewsController@update');
			Route::post('delete', 'dadNewsController@delete');
			Route::get('news-admin', 'dadNewsController@get');
			Route::post('title', 'dadNewsController@titleExists');
		});
	});
	Route::group(array('before' => 'manage_school_aliance'),function(){
		// Manage School asociated
		Route::group(array('prefix' =>  'schoolasc'),function(){
			Route::post('save', 'schoolAscController@save');
			Route::post('update', 'schoolAscController@update');
			Route::post('delete', 'schoolAscController@delete');
		});
	});
	Route::group(array('before' => 'manage_teacher_aliance'),function(){
		// Manage Teachers asociated
		Route::group(array('prefix' =>  'admin-teacher'),function(){
			Route::post('save', 'teachersController@save');
			Route::post('update', 'teachersController@update');
			Route::post('delete', 'teachersController@delete');
		});
	});
	Route::group(array('before' => 'manage_administrative'),function(){
		// Manage employees
		Route::group(array('prefix' =>  'admin-employee'),function(){
			Route::post('save', 'employeeController@save');
			Route::post('update', 'employeeController@update');
			Route::post('delete', 'employeeController@delete');
		});
		// Manage employees
		Route::group(array('prefix' =>  'admin-salerCode'),function(){
			Route::post('save', 'salersCodeController@save');
			Route::post('update', 'salersCodeController@update');
			Route::post('delete', 'salersCodeController@delete');
		});
	});
	// child actions when he is logued
	Route::group(array('before' => 'child_actions'),function(){
		Route::group(array('prefix' => '/child-goal'), function(){
			Route::post('updateConf', 'childrenHasGoal@update');
			Route::post('getChildSelected', 'childrenHasGoal@getChildSelected');
		});
	});
	Route::group(array('prefix' => '/admin-godhouses'), function(){
		Route::post('save', 'sponsoredController@save');
		Route::post('update', 'sponsoredController@update');
        Route::post('delete', 'sponsoredController@delete');
        Route::post('getChildren', 'sponsoredController@getChildren');
        Route::post('hide-show-home', 'sponsoredController@hide_show_home');
	});
});

  //institutions
  Route::group(array('prefix' => 'institutions'),function(){
    Route::post('save', 'institutionsController@save');
    Route::post('all', 'institutionsController@all');
    Route::post('info', 'institutionsController@institutionInfo');
    Route::post('update', 'institutionsController@update');
		Route::post('deleteInsti', 'institutionsController@deleteInsti');
  });

  //state
  Route::group(array('prefix' => 'state'),function(){
    Route::post('all', 'statesController@all');
  });

  //cities
  Route::group(array('prefix' => 'cities'), function(){
    Route::post('all', 'citiesController@all');
  });

	// Activities
	Route::group(array('prefix' =>  'activity-admin'),function(){
		Route::post('all', 'activitiesController@all');
		Route::post('save', 'activitiesController@save');
		Route::post('update', 'activitiesController@update');
		Route::post('delete', 'activitiesController@delete');
		Route::group(array('prefix' =>  'photo'),function(){
			Route::post('update', 'activitiesController@changeImage');
		});
		Route::group(array('prefix' =>  'game'),function(){
			Route::post('save','activitiesController@saveGame');
			Route::post('update','activitiesController@updateGame');
			Route::post('delete','activitiesController@deleteGame');
		});

    });

    // Plans
    Route::group(array('prefix' =>  'plans-admin'),function(){
        Route::post('all', 'plansController@all');
        Route::post('save', 'plansController@save');
        Route::post('update', 'plansController@update');
        Route::post('delete', 'plansController@delete');
		  Route::post('getHidden', 'plansController@getHidden');

    });
	// Manage School asociated
	 Route::group(array('prefix' =>  'schoolasc'),function(){
		 Route::post('save', 'schoolAscController@save');
		 Route::post('update', 'schoolAscController@update');
		 Route::post('delete', 'schoolAscController@delete');
	 });
// });

/*
* -----------------------------------------------------------------------------
* Routes to Sponsored.
* all without special permision and without login
* -----------------------------------------------------------------------------
*/
Route::group(array('prefix' =>  'sponsored'),function(){
	Route::post('payForChild', 'sponsoredController@paySponsored');
});

/*
* -----------------------------------------------------------------------------
* Routes to levels.
* all without special permision
* -----------------------------------------------------------------------------
*/
Route::group(array('prefix' =>  'levels'),function(){
	Route::post('all', 'levelsController@all');
	Route::post('getWithActivities', 'levelsController@getWithActivities');
});

/*
* -----------------------------------------------------------------------------
* Routes to intelligences.
* all without special permision
* -----------------------------------------------------------------------------
*/
Route::group(array('prefix' =>  'intelligences'),function(){
	Route::post('all', 'intelligencesController@all');
	Route::post('getByLevel', 'intelligencesController@getByLevel');
	Route::post('getWithActivities', 'intelligencesController@getWithActivities');
});

/*
* -----------------------------------------------------------------------------
* Routes to blocks.
* all without special permision
* -----------------------------------------------------------------------------
*/
Route::group(array('prefix' =>  'blocks'),function(){
	Route::post('all', 'blocksController@all');
	Route::post('getByIntelligent', 'blocksController@getByIntelligent');
	Route::post('getWithActivities', 'blocksController@getWithActivities');
});

/*
* -----------------------------------------------------------------------------
* Routes to topics.
* all without special permision
* -----------------------------------------------------------------------------
*/
Route::group(array('prefix' =>  'topics'),function(){
	Route::post('all', 'topicsController@all');
	Route::post('getByBlock', 'topicsController@getByBlock');
	Route::post('getWithActivities', 'topicsController@getWithActivities');
});

/*
* -----------------------------------------------------------------------------
* Routes to pdf's library.
* all without special permision
* -----------------------------------------------------------------------------
*/
Route::group(array('prefix' =>  'pdfs'),function(){
	Route::post('all', 'libraryPdfController@all');
	Route::post('getByIntelligent', 'libraryPdfController@getByIntelligent');
	Route::post('getByTopic', 'libraryPdfController@getByTopic');
	Route::get('find-pdfs','activitiesPdfsController@findPdfs');
});

/*
* -----------------------------------------------------------------------------
* Routes to school asociated.
* all without special permision
* -----------------------------------------------------------------------------
*/
Route::group(array('prefix' =>  'schoolasc'),function(){
	Route::post('all', 'schoolAscController@all');
});

/*
* -----------------------------------------------------------------------------
* Routes to activities.
* all without special permision
* -----------------------------------------------------------------------------
*/
Route::group(array('prefix' =>  'activity-admin'),function(){
	Route::post('all', 'activitiesController@all');
	Route::post('getByIntelligent', 'activitiesController@getByIntelligent');
	Route::post('getByTopic', 'activitiesController@getByTopic');
  	Route::post('has-game','activitiesController@hasGame');
});

/*
* -----------------------------------------------------------------------------
* Routes to teachers.
* all without special permision
* -----------------------------------------------------------------------------
*/
Route::group(array('prefix' =>  'teacher'),function(){
	Route::post('getWithSchool', 'teachersController@getWithSchool');
	Route::post('getBySchool', 'teachersController@getBySchool');
	Route::post('all', 'teachersController@all');
});

/*
* -----------------------------------------------------------------------------
* Routes to library videos.
* all without special permision
* -----------------------------------------------------------------------------
*/
Route::group(array('prefix' =>  'video'),function(){
	Route::post('getByTopic', 'libraryVideoController@getByTopic');
	Route::post('all', 'libraryVideoController@all');
});

/*
* -----------------------------------------------------------------------------
* Routes to avatar
* all without special permision
* -----------------------------------------------------------------------------
*/
Route::group(array('prefix' =>  'avatar'),function(){
	Route::post('all', 'avatarController@all');
	Route::post('getForChild', 'avatarController@getForChild');
	Route::post('save','avatarController@save');
	Route::post('allStylesAvatars', 'avatarController@allStylesAvatars');
	Route::post('delete', 'avatarController@delete');
	Route::post('update', 'avatarController@update');
	Route::post('addStyle', 'avatarController@addStyle');
	Route::post('deleteStyle','avatarController@deleteStyle');
	Route::post('updateStyle','avatarController@updateStyle');
});

/*
* -----------------------------------------------------------------------------
* Routes to sprites (avatar)
* all without special permision
* -----------------------------------------------------------------------------
*/
Route::group(array('prefix' =>  'sprite'),function(){
	Route::post('all', 'spriteController@all');
	Route::post('getByAvatarForChild', 'spriteController@getByAvatarForChild');
	Route::post('save', 'spriteController@save');
	Route::post('update', 'spriteController@update');
	Route::post('delete', 'spriteController@delete');
});

/*
* -----------------------------------------------------------------------------
* Routes to secuences (avatar)
* all without special permision
* -----------------------------------------------------------------------------
*/
Route::group(array('prefix' =>  'secuence'),function(){
	Route::post('all', 'secuenceController@all');
});
Route::post('/remote-username','usersController@remoteUsername');
Route::post('/remote-username-update','usersController@remoteUsernameUpdate');

/*
* -----------------------------------------------------------------------------
* Routes to positions
* all without special permision
* -----------------------------------------------------------------------------
*/
Route::group(array('prefix' =>  'position'),function(){
	Route::post('all', 'positionController@all');
});

/*
* -----------------------------------------------------------------------------
* Routes to employees
* all without special permision
* -----------------------------------------------------------------------------
*/
Route::group(array('prefix' =>  'employee'),function(){
	Route::post('getByPosition', 'employeeController@getByPosition');
	Route::post('getBySalers', 'employeeController@getBySalers');
});

/*
* -----------------------------------------------------------------------------
* Routes to salers code
* all without special permision
* -----------------------------------------------------------------------------
*/
Route::group(array('prefix' =>  'salerCode'),function(){
	Route::post('all', 'salersCodeController@all');
	Route::post('match', 'salersCodeController@verifyCodeMatch');
});

/*
*   Register for users
*/
Route::group(array('prefix' => 'parent'),function(){
   Route::post('save','parentsController@save');
   Route::post('update','parentsController@update');
   Route::post('remote-email','parentsController@remoteEmail');
   Route::get('confirm/{token}','parentsController@confirm');
   Route::post('payment-suscription','parentsController@payment_suscription');
   Route::post('create-charge-oxxo','parentsController@createOrderMembership');
   Route::post('get-sons','parentsController@getSons');
   Route::post('get-sonsInfo','parentsController@getSonsInfo');

   Route::group(array('prefix' => '/suscription'),function(){
       Route::post('pause','parentSuscriptionController@pause');
       Route::post('resume','parentSuscriptionController@resume');
       Route::post('cancel','parentSuscriptionController@cancel');
       Route::post('status','parentSuscriptionController@status');
   });

	Route::group(array('prefix' => 'plan'),function(){
		  Route::post('change','parentSuscriptionController@changePlan');
	});
});


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


        // Realizar Actividades*/
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

            Route::group(array('prefix' => "childDoActivities"), function(){
                Route::post("/save",'childrenDoActivitiesController@save');
                Route::get('/game-{activityId}','childrenDoActivitiesController@getGame')
    			->where(array(
		            'controller' => "^[0-9]*$"
			    ));
            });
            Route::group(array('prefix' => "sonRatesActivity"), function(){
                Route::post("/save",'sonRatesActivitiesController@save');
                Route::match(["POST","GET"],"/find","sonRatesActivitiesController@find");
            });
            Route::group(array('prefix' => "activity"), function(){
                Route::get("/find-new","activitiesController@getRecentsAdded");
                Route::get("/find-popular","activitiesController@getPopulars");
                Route::get("/find-rank","activitiesController@getMaxRank");
                Route::get("/find-recomended","activitiesController@getRecomended");
                Route::get("/find-all","activitiesController@getAll");
                Route::post("/updateViews","activitiesController@updateViews");

            });
            Route::group(array('prefix' => "admin-child"), function(){
                Route::post("/save","childrenController@save");
					 			Route::post("/updateConf","childrenController@updateConf");
								Route::post("delete","childrenController@delete");
            });
            /*Route::group(array('prefix' => ''),function(){
	 			Route::match(array('GET', 'POST'), '/', 'actividadController@viewPage');
	 			Route::get('juego/{idActividad}/{nombre}','actividadController@getViewJuego');
				Route::get('activity{id}', 'actividadController@verPaginaInWeb');
			});
	 		Route::group(array('prefix' => ''), function(){
	 			Route::match(array('GET', 'POST'), '/', 'nivelController@viewPage');
	 			Route::get('level', 'nivelController@verPaginaInWeb');
	 		});
            Route::group(array('prefix' => ''), function(){
				Route::match(array('GET', 'POST'), '/', 'inteligenciaController@viewPage');
				Route::get('intelligence-{idNivel}', 'inteligenciaController@verPaginaInWeb');
			});*/
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

        /*// Schools
        Route::group(array('before' => 'gestionar_escuelas'), function(){
            Route::group(array('prefix' =>  'school'),function(){
                Route::match(array('GET', 'POST'), '/', 'escuelaController@verPagina');
                Route::post('update', 'escuelaController@update');
                Route::post('delete', 'escuelaController@remove');
            });
        });

        //Route::group(array('before' => 'gestionar_actividades'),function(){
            // Activities
            Route::group(array('prefix' =>  'activity-admin'),function(){
                Route::post('all', 'activitiesController@all');
                Route::post('save', 'activitiesController@save');
                Route::post('update', 'activitiesController@update');
                Route::post('delete', 'activitiesController@delete');
                Route::group(array('prefix' =>  'photo'),function(){
                   Route::post('update', 'activitiesController@changeImage');
                });

                Route::group(array('prefix' =>  'game'),function(){
                    Route::post('update','actividadController@moveGame');
                    Route::post('delete','actividadController@disabledGame');
                });

            });

        //});

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

// Route::get('/', 'principalController@verPagina');
// Route::get('/nosotros', 'principalController@verNosotros');
// Route::get('/proximamente',function(){
//     return View::make('aviso_beta');
// });
// Route::get('/missedSession','sesionInfoController@missedSession');
// Route::post('/last-session','sesionInfoController@getLastSession');
Route::get('/terminos-y-condiciones',function(){
    return View::make('terminos');
});
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
