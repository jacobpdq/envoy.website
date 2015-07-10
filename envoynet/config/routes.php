<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\Router;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass('Route');

Router::scope('/', function ($routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */ 
    $routes->connect('sso-login/*',['controller'=>'Main','action'=>'login','prefix'=>'agent']);
    $routes->connect('sso-logout/*',['controller'=>'Main','action'=>'logout','prefix'=>'agent']);




    Router::prefix('agent', function ($routes) {
        // All routes here will be prefixed with `/agent`
        // And have the prefix => agent route element added.
        $routes->connect('/login', array('controller' => 'Main', 'action' => 'login', 'prefix' => 'agent'));

        $routes->connect('/logout', array('controller' => 'Main', 'action' => 'logout', 'prefix' => 'agent'));

        $routes->connect('/password/forgot', array('controller' => 'Password', 'action' => 'forgot', 'prefix' => 'supplier'));

        $routes->connect('/my-profile', array('controller' => 'Agents', 'action' => 'sso_profile', 'prefix' => 'agent'));
        $routes->connect('/agents/register', array('controller' => 'Agents', 'action' => 'sso_register', 'prefix' => 'agent'));
        $routes->fallbacks('InflectedRoute');
    });

    Router::prefix('supplier', function ($routes) {
        // All routes here will be prefixed with `/supplier`
        // And have the prefix => supplier route element added.
        $routes->connect('/login', array('controller' => 'Main', 'action' => 'login', 'prefix' => 'supplier'));
        $routes->connect('/logout', array('controller' => 'Main', 'action' => 'logout', 'prefix' => 'supplier'));
        $routes->connect('/my-profile', array('controller' => 'Suppliers', 'action' => 'profile', 'prefix' => 'supplier'));
        $routes->connect('/language',['controller'=>'Main','action'=>'language', 'prefix' => 'supplier']);
        
        $routes->fallbacks('InflectedRoute');
    });

    Router::prefix('admin', function ($routes) {
        // All routes here will be prefixed with `/admin`
        // And have the prefix => admin route element added.

        $routes->connect('/login', array('controller' => 'Main', 'action' => 'login', 'prefix' => 'admin'));
        $routes->connect('/logout', array('controller' => 'Main', 'action' => 'logout', 'prefix' => 'admin'));

        $routes->connect('/login', array('controller' => 'Main', 'action' => 'login', 'prefix' => 'admin'));
        $routes->connect('/language',['controller'=>'Main','action'=>'language', 'prefix' => 'admin']);
        $routes->fallbacks('InflectedRoute');
    });


    $routes->connect('/', array('controller' => 'Main', 'action' => 'index'));
    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);
    $routes->redirect(
        '/agent/pages/*',
        ['controller' => 'Pages', 'action' => 'display','prefix'=>false],
        [
            'persist' => true,
            'status' => 301
        ]
    );
    $routes->redirect(
        '/supplier/pages/*',
        ['controller' => 'Pages', 'action' => 'display','prefix'=>false],
        [
            'persist' => true,
            'status' => 301
        ]
    );

    //SSO hhijacked routes for responding to wordpress parent
    $routes->connect('wp-admin/admin-ajax.php', ['controller'=>'Sso', 'action' => 'async']);




    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `InflectedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'InflectedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'InflectedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks('InflectedRoute');
});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
