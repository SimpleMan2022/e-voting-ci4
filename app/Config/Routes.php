<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/dashboard/voters', 'DashboardUserController::index');

$routes->get('/dashboard/classes', 'DashboardClassController::index');
$routes->post('/dashboard/classes/store', 'DashboardClassController::store');
$routes->post('/dashboard/classes/update', 'DashboardClassController::update');
$routes->post('/dashboard/classes/delete', 'DashboardClassController::delete');


$routes->get('/dashboard/groups', 'DashboardGroupController::index');
$routes->post('/dashboard/groups/store', 'DashboardGroupController::store');
$routes->post('/dashboard/groups/update', 'DashboardGroupController::update');
$routes->post('/dashboard/groups/delete', 'DashboardGroupController::delete');

$routes->get('/dashboard/candidates', 'DashboardCandidateController::index');
$routes->get('/dashboard/candidates/create', 'DashboardCandidateController::create');
$routes->post('/dashboard/candidates/store', 'DashboardCandidateController::store');
$routes->post('/dashboard/candidates/update', 'DashboardCandidateController::update');
$routes->post('/dashboard/candidates/delete', 'DashboardCandidateController::delete');
