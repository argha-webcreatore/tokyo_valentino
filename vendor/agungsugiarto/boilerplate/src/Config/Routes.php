<?php
$routes->group('admin', function ($routes) {

    /**
     * Admin routes.
     **/
    $routes->group('/', [
        'filter'    => config('Boilerplate')->dashboard['filter'],
        'namespace' => config('Boilerplate')->dashboard['namespace'],
    ], function ($routes) {
        $routes->get('/', config('Boilerplate')->dashboard['controller']);
    });

    $routes->group('contact_us',[
        'filter'    => 'permission:contact-us',
        'namespace' => 'agungsugiarto\boilerplate\Controllers',
    ],function($routes){
        $routes->get('/', 'ContactUsController::index');
        $routes->post('/', 'ContactUsController::index');
    });



    $routes->group('home', [
        'filter' => config('Boilerplate')->home['filter'],
        'namespace' => config('Boilerplate')->home['namespace'],
    ], function ($routes) {
        $routes->get('banner_images', config('Boilerplate')->home['banneImageController']);
        $routes->group('stores', [
            'filter' => config('Boilerplate')->home['filter'],
            'namespace' => config('Boilerplate')->home['namespace'],
        ], function($routes) {
            $routes->get('/', config('Boilerplate')->home['storeController']);
            $routes->match(['get','post'], 'add','Home::add_store');
            $routes->match(['get','post'], 'edit/(:num)','Home::edit_store/$1');
            $routes->post('updateStatus','Home::updateStore');
            $routes->post('delete','Home::deleteStore');
            $routes->get('list','Home::storeDatatable');
        });
        $routes->group('testimonials', [
            'filter' => config('Boilerplate')->home['filter'],
            'namespace' => config('Boilerplate')->home['namespace'],
        ], function($routes) {
            $routes->get('/', 'Home::testimonials');
            $routes->match(['get','post'], 'add','Home::add_testimonials');
            $routes->match(['get','post'], 'edit/(:num)','Home::edit_testimonials/$1');
            $routes->post('delete','Home::deleteTestimonials');
            $routes->get('list','Home::testimonialsDatatable');
        });
        $routes->match(['get','post'],'about', 'Home::about');
    });

     

    /**
     * User routes.
     **/
    $routes->group('user', [
        'filter'    => 'permission:back-office',
        'namespace' => 'agungsugiarto\boilerplate\Controllers\Users',
    ], function ($routes) {
        $routes->match(['get', 'post'], 'profile', 'UserController::profile', ['as' => 'user-profile']);
        $routes->resource('manage', [
            'filter'     => 'permission:manage-user',
            'namespace'  => 'agungsugiarto\boilerplate\Controllers\Users',
            'controller' => 'UserController',
            'except'     => 'show',
        ]);
    });

    /**
     * Permission routes.
     */
    $routes->resource('permission', [
        'filter'     => 'permission:role-permission',
        'namespace'  => 'agungsugiarto\boilerplate\Controllers\Users',
        'controller' => 'PermissionController',
        'except'     => 'show,new',
    ]);

    /**
     * Role routes.
     */
    $routes->resource('role', [
        'filter'     => 'permission:role-permission',
        'namespace'  => 'agungsugiarto\boilerplate\Controllers\Users',
        'controller' => 'RoleController',
    ]);

    /**
     * Menu routes.
     */
    $routes->resource('menu', [
        'filter'     => 'permission:menu-permission',
        'namespace'  => 'agungsugiarto\boilerplate\Controllers\Users',
        'controller' => 'MenuController',
        'except'     => 'new,show',
    ]);

    $routes->put('menu-update', 'MenuController::new', [
        'filter'    => 'permission:menu-permission',
        'namespace' => 'agungsugiarto\boilerplate\Controllers\Users',
        'except'    => 'show',
        'as'        => 'menu-update',
    ]);
});
