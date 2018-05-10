<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
| example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
| https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
| $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
| $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
| $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|   my-controller/my-method -> my_controller/my_method
*/
$route['default_controller'] = 'fiestashoy';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;


//rutas para Fiestas
$route['fiestas']['get'] = 'fiestas/index';
$route['fiestas/(:num)']['get'] = 'fiestas/find/$1';
$route['fiestas']['post'] = 'fiestas/index';
$route['fiestas/(:num)']['put'] = 'fiestas/index/$1';
$route['fiestas/(:num)']['delete'] = 'fiestas/index/$1';


//rutas para Fotografias
$route['fotografia']['get'] = 'fotografia/index';
$route['fotografia/(:num)']['get'] = 'fotografia/find/$1';
$route['fotografia']['post'] = 'fotografia/index';
$route['fotografia/(:num)']['put'] = 'fotografia/index/$1';
$route['fotografia/(:num)']['delete'] = 'fotografia/index/$1';

//rutas para Comunidad
$route['comunidades']['get'] = 'comunidades/index';
$route['comunidades/(:num)']['get'] = 'comunidades/find/$1';
$route['comunidades']['post'] = 'comunidades/index';
$route['comunidades/(:num)']['put'] = 'comunidades/index/$1';
$route['comunidades/(:num)']['delete'] = 'comunidades/index/$1';

//fiestas del municipio
$route['comunidadfiesta']['get'] = 'comunidadfiesta/index';
$route['comunidadfiesta/(:num)']['get'] = 'comunidadfiesta/find/$1';

//Fiestas del departamento
$route['departamentofiestas']['get'] = 'departamentofiestas/index';
$route['departamentofiestas/(:num)']['get'] = 'departamentofiestas/find/$1';

//Fiestas Dia de Hoy
$route['fiestashoy']['get'] = 'fiestashoy/index';
$route['fiestashoy/(:any)']['get'] = 'fiestashoy/find/$1';

//Fiestas Dia de Hoy
$route['fiestasmes']['get'] = 'fiestasmes/index';
$route['fiestasmes/(:any)']['get'] = 'fiestasmes/find/$1';

//Busqueda de Municipio o Departamento
$route['search/(:any)']['get'] = 'search/find/$1';
/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/
//$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
//$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8
