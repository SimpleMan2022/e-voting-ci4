<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/login', 'Home::login');
$routes->post('/login', 'Home::authenticate');

$routes->post('/logout', 'Home::logout');

$routes->get('/', 'WebController::index');

$routes->group('dashboard', ['filter' => ['auth', 'admin']], function ($routes) {
  $routes->get('/', 'DashboardController::index');

  $routes->get('voters', 'DashboardUserController::index');
  $routes->post('voters/store', 'DashboardUserController::store');
  $routes->post('voters/update', 'DashboardUserController::update');

  $routes->get('classes', 'DashboardClassController::index');
  $routes->post('classes/store', 'DashboardClassController::store');
  $routes->post('classes/update', 'DashboardClassController::update');
  $routes->post('classes/delete', 'DashboardClassController::delete');

  $routes->get('groups', 'DashboardGroupController::index');
  $routes->post('groups/store', 'DashboardGroupController::store');
  $routes->post('groups/update', 'DashboardGroupController::update');
  $routes->post('groups/delete', 'DashboardGroupController::delete');

  $routes->get('candidates', 'DashboardCandidateController::index');
  $routes->get('candidates/create', 'DashboardCandidateController::create');
  $routes->get('candidates/edit/(:segment)', 'DashboardCandidateController::edit/$1');
  $routes->post('candidates/store', 'DashboardCandidateController::store');
  $routes->post('candidates/update/(:segment)', 'DashboardCandidateController::update/$1');
  $routes->post('candidates/delete/(:segment)', 'DashboardCandidateController::delete/$1');

  $routes->get('candidates/experiences', 'DashboardCandidateExperienceController::index');
  $routes->get('candidates/experiences/create', 'DashboardCandidateExperienceController::create');
  $routes->get('candidates/experiences/edit/(:segment)', 'DashboardCandidateExperienceController::edit/$1');
  $routes->post('candidates/experiences/store', 'DashboardCandidateExperienceController::store');
  $routes->post('candidates/experiences/update/(:segment)', 'DashboardCandidateExperienceController::update/$1');
  $routes->post('candidates/experiences/delete/(:segment)', 'DashboardCandidateExperienceController::delete/$1');
});
