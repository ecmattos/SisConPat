<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

#Event::listen('illuminate.query',  function($query)
#{
#	var_dump($query);
#});

Route::get('app/{locale}', function ($locale) {
    App::setLocale($locale);
});


#Route::get('/', function () {
#    return view('/home');
#});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@authenticate');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::get('auth/register/confirm', 'Auth\AuthController@confirmUser');

Route::controllers(['password' => 'Auth\PasswordController']);

Route::pattern('id', '[0-9]+');

Route::get('/activate/{confirmation_code}', 'Auth\AuthController@activateAccount');

Route::get('/', ['as' => 'patrimonials', 'uses' => 'PatrimonialsController@search', 'middleware' => ['acl:patrimonials.search']]);

Route::get('/dashboard/pc_members', ['as' => 'dashboard.pc_members', 'uses' => 'DashboardController@pc_members']);
Route::get('/dashboard/pc_partners', ['as' => 'dashboard.pc_partners', 'uses' => 'DashboardController@pc_partners']);

Route::get('/regions/', ['as' => 'regions', 'uses' => 'RegionsController@index']);
Route::get('/regions/create', ['as' => 'regions.create', 'uses' => 'RegionsController@create', 'middleware' => ['acl:regions.create']]);
Route::get('/regions/{id}/show', ['as' => 'regions.show', 'uses' => 'RegionsController@show', 'middleware' => ['acl:regions.show']]);
Route::get('/regions/{id}/edit', ['as' => 'regions.edit', 'uses' => 'RegionsController@edit', 'middleware' => ['acl:regions.edit']]);
Route::get('/regions/{id}/destroy', ['as' => 'regions.destroy', 'uses' => 'RegionsController@destroy', 'middleware' => ['acl:regions.destroy']]);
Route::put('/regions/{id}/update', ['as' => 'regions.update', 'uses' => 'RegionsController@update']);
Route::post('/regions', ['as' => 'regions.store', 'uses' => 'RegionsController@store']);

Route::get('/states/', ['as' => 'states', 'uses' => 'StatesController@index']);
Route::get('/states/create', ['as' => 'states.create', 'uses' => 'StatesController@create', 'middleware' => ['acl:states.create']]);
Route::get('/states/{id}/show', ['as' => 'states.show', 'uses' => 'StatesController@show', 'middleware' => ['acl:states.show']]);
Route::get('/states/{id}/edit', ['as' => 'states.edit', 'uses' => 'StatesController@edit', 'middleware' => ['acl:states.edit']]);
Route::get('/states/{id}/destroy', ['as' => 'states.destroy', 'uses' => 'StatesController@destroy', 'middleware' => ['acl:states.destroy']]);
Route::put('/states/{id}/update', ['as' => 'states.update', 'uses' => 'StatesController@update']);
Route::post('/states', ['as' => 'states.store', 'uses' => 'StatesController@store']);
Route::get('/states/{id}/restore', ['as' => 'states.restore', 'uses' => 'StatesController@restore']);

Route::get('/cities/', ['as' => 'cities', 'uses' => 'CitiesController@index']);
Route::get('/cities/create', ['as' => 'cities.create', 'uses' => 'CitiesController@create', 'middleware' => ['acl:cities.create']]);
Route::get('/cities/{id}/show', ['as' => 'cities.show', 'uses' => 'CitiesController@show', 'middleware' => ['acl:cities.show']]);
Route::get('/cities/{id}/edit', ['as' => 'cities.edit', 'uses' => 'CitiesController@edit', 'middleware' => ['acl:cities.edit']]);
Route::get('/cities/{id}/destroy', ['as' => 'cities.destroy', 'uses' => 'CitiesController@destroy', 'middleware' => ['acl:cities.destroy']]);
Route::put('/cities/{id}/update', ['as' => 'cities.update', 'uses' => 'CitiesController@update']);
Route::post('/cities', ['as' => 'cities.store', 'uses' => 'CitiesController@store']);

Route::get('/plans/', ['as' => 'plans', 'uses' => 'PlansController@index']);
Route::get('/plans/create', ['as' => 'plans.create', 'uses' => 'PlansController@create', 'middleware' => ['acl:plans.create']]);
Route::get('/plans/{id}/show', ['as' => 'plans.show', 'uses' => 'PlansController@show', 'middleware' => ['acl:plans.show']]);
Route::get('/plans/{id}/edit', ['as' => 'plans.edit', 'uses' => 'PlansController@edit', 'middleware' => ['acl:plans.edit']]);
Route::get('/plans/{id}/destroy', ['as' => 'plans.destroy', 'uses' => 'PlansController@destroy', 'middleware' => ['acl:plans.destroy']]);
Route::put('/plans/{id}/update', ['as' => 'plans.update', 'uses' => 'PlansController@update']);
Route::post('/plans', ['as' => 'plans.store', 'uses' => 'PlansController@store']);

Route::get('/member_statuses/', ['as' => 'member_statuses', 'uses' => 'MemberStatusesController@index']);
Route::get('/member_statuses/create', ['as' => 'member_statuses.create', 'uses' => 'MemberStatusesController@create', 'middleware' => ['acl:member_statuses.create']]);
Route::get('/member_statuses/{id}/show', ['as' => 'member_statuses.show', 'uses' => 'MemberStatusesController@show', 'middleware' => ['acl:member_statuses.show']]);
Route::get('/member_statuses/{id}/edit', ['as' => 'member_statuses.edit', 'uses' => 'MemberStatusesController@edit', 'middleware' => ['acl:member_statuses.edit']]);
Route::get('/member_statuses/{id}/destroy', ['as' => 'member_statuses.destroy', 'uses' => 'MemberStatusesController@destroy', 'middleware' => ['acl:member_statuses.destroy']]);
Route::put('/member_statuses/{id}/update', ['as' => 'member_statuses.update', 'uses' => 'MemberStatusesController@update']);
Route::post('/member_statuses', ['as' => 'member_statuses.store', 'uses' => 'MemberStatusesController@store']);

Route::get('/member_status_reasons/', ['as' => 'member_status_reasons', 'uses' => 'MemberStatusReasonsController@index']);
Route::get('/member_status_reasons/create', ['as' => 'member_status_reasons.create', 'uses' => 'MemberStatusReasonsController@create', 'middleware' => ['acl:member_status_reasons.create']]);
Route::get('/member_status_reasons/{id}/show', ['as' => 'member_status_reasons.show', 'uses' => 'MemberStatusReasonsController@show', 'middleware' => ['acl:member_status_reasons.show']]);
Route::get('/member_status_reasons/{id}/edit', ['as' => 'member_status_reasons.edit', 'uses' => 'MemberStatusReasonsController@edit', 'middleware' => ['acl:member_status_reasons.edit']]);
Route::get('/member_status_reasons/{id}/destroy', ['as' => 'member_status_reasons.destroy', 'uses' => 'MemberStatusReasonsController@destroy', 'middleware' => ['acl:member_status_reasons.destroy']]);
Route::put('/member_status_reasons/{id}/update', ['as' => 'member_status_reasons.update', 'uses' => 'MemberStatusReasonsController@update']);
Route::post('/member_status_reasons', ['as' => 'member_status_reasons.store', 'uses' => 'MemberStatusReasonsController@store']);

Route::get('/genders/', ['as' => 'genders', 'uses' => 'GendersController@index']);
Route::get('/genders/create', ['as' => 'genders.create', 'uses' => 'GendersController@create', 'middleware' => ['acl:genders.create']]);
Route::get('/genders/{id}/show', ['as' => 'genders.show', 'uses' => 'GendersController@show', 'middleware' => ['acl:genders.show']]);
Route::get('/genders/{id}/edit', ['as' => 'genders.edit', 'uses' => 'GendersController@edit', 'middleware' => ['acl:genders.edit']]);
Route::get('/genders/{id}/destroy', ['as' => 'genders.destroy', 'uses' => 'GendersController@destroy', 'middleware' => ['acl:genders.destroy']]);
Route::put('/genders/{id}/update', ['as' => 'genders.update', 'uses' => 'GendersController@update']);
Route::post('/genders', ['as' => 'genders.store', 'uses' => 'GendersController@store']);

Route::get('/banks/', ['as' => 'banks', 'uses' => 'BanksController@index']);
Route::get('/banks/create', ['as' => 'banks.create', 'uses' => 'BanksController@create', 'middleware' => ['acl:genders.create']]);
Route::get('/banks/{id}/show', ['as' => 'banks.show', 'uses' => 'BanksController@show', 'middleware' => ['acl:genders.show']]);
Route::get('/banks/{id}/edit', ['as' => 'banks.edit', 'uses' => 'BanksController@edit', 'middleware' => ['acl:genders.edit']]);
Route::get('/banks/{id}/destroy', ['as' => 'banks.destroy', 'uses' => 'BanksController@destroy', 'middleware' => ['acl:genders.destroy']]);
Route::put('/banks/{id}/update', ['as' => 'banks.update', 'uses' => 'BanksController@update']);
Route::post('/banks', ['as' => 'banks.store', 'uses' => 'BanksController@store']);

Route::get('/members/', ['as' => 'members', 'uses' => 'MembersController@search', 'middleware' => ['acl:members.search']]);
Route::get('/members/create', ['as' => 'members.create', 'uses' => 'MembersController@create', 'middleware' => ['acl:members.create']]);
Route::get('/members/{id}/show', ['as' => 'members.show', 'uses' => 'MembersController@show', 'middleware' => ['acl:members.show']]);
Route::get('/members/{id}/edit', ['as' => 'members.edit', 'uses' => 'MembersController@edit', 'middleware' => ['acl:members.edit']]);
#Route::get('/members/search', ['as' => 'members.search', 'uses' => 'MembersController@search', 'middleware' => ['acl:members.search']]);
Route::post('/members/search_results', ['as' => 'members.search_results', 'uses' => 'MembersController@search_results']);
Route::get('/members/search_results_back', ['as' => 'members.search_results_back', 'uses' => 'MembersController@search_results_back']);
Route::get('/members/{id}/destroy', ['as' => 'members.destroy', 'uses' => 'MembersController@destroy', 'middleware' => ['acl:members.destroy']]);
Route::put('/members/{id}/update', ['as' => 'members.update', 'uses' => 'MembersController@update']);
Route::post('/members', ['as' => 'members.store', 'uses' => 'MembersController@store']);

Route::get('/dashboard/members_reports', ['as' => 'dashboard.members_reports', 'uses' => 'DashboardController@members_reports', 'middleware' => ['acl:dashboard.members_reports']]);
Route::get('/dashboard/members_labels', ['as' => 'dashboard.members_labels', 'uses' => 'DashboardController@members_labels', 'middleware' => ['acl:dashboard.members_labels']]);

Route::get('/dashboard/members', ['as' => 'dashboard.members', 'uses' => 'DashboardController@members', 'middleware' => ['acl:dashboard.members']]);


Route::get('/dashboard/partners_reports', ['as' => 'dashboard.partners_reports', 'uses' => 'DashboardController@partners_reports', 'middleware' => ['acl:dashboard.partners_reports']]);
Route::get('/dashboard/partners_labels', ['as' => 'dashboard.partners_labels', 'uses' => 'DashboardController@partners_labels', 'middleware' => ['acl:dashboard.partners_labels']]);

Route::get('/dashboard/partners', ['as' => 'dashboard.partners', 'uses' => 'DashboardController@partners', 'middleware' => ['acl:dashboard.partners']]);

Route::get('/partner_types/', ['as' => 'partner_types', 'uses' => 'PartnerTypesController@index']);
Route::get('/partner_types/create', ['as' => 'partner_types.create', 'uses' => 'PartnerTypesController@create', 'middleware' => ['acl:partner_types.create']]);
Route::get('/partner_types/{id}/show', ['as' => 'partner_types.show', 'uses' => 'PartnerTypesController@show', 'middleware' => ['acl:partner_types.show']]);
Route::get('/partner_types/{id}/edit', ['as' => 'partner_types.edit', 'uses' => 'PartnerTypesController@edit', 'middleware' => ['acl:partner_types.edit']]);
Route::get('/partner_types/{id}/destroy', ['as' => 'partner_types.destroy', 'uses' => 'PartnerTypesController@destroy', 'middleware' => ['acl:partner_types.destroy']]);
Route::put('/partner_types/{id}/update', ['as' => 'partner_types.update', 'uses' => 'PartnerTypesController@update']);
Route::post('/partner_types', ['as' => 'partner_types.store', 'uses' => 'PartnerTypesController@store']);

Route::get('/partners/', ['as' => 'partners', 'uses' => 'PartnersController@search', 'middleware' => ['acl:partners.search']]);
Route::post('/partners/search_results', ['as' => 'partners.search_results', 'uses' => 'PartnersController@search_results']);
Route::get('/partners/search_results_back', ['as' => 'partners.search_results_back', 'uses' => 'PartnersController@search_results_back']);
Route::get('/partners/create', ['as' => 'partners.create', 'uses' => 'PartnersController@create', 'middleware' => ['acl:partners.create']]);
Route::get('/partners/{id}/show', ['as' => 'partners.show', 'uses' => 'PartnersController@show', 'middleware' => ['acl:partners.show']]);
Route::get('/partners/{id}/edit', ['as' => 'partners.edit', 'uses' => 'PartnersController@edit', 'middleware' => ['acl:partners.edit']]);
Route::get('/partners/{id}/destroy', ['as' => 'partners.destroy', 'uses' => 'PartnersController@destroy', 'middleware' => ['acl:partners.destroy']]);
Route::put('/partners/{id}/update', ['as' => 'partners.update', 'uses' => 'PartnersController@update']);
Route::post('/partners', ['as' => 'partners.store', 'uses' => 'PartnersController@store']);
Route::get('/partners/{id}/deleted', ['as' => 'partners.deleted', 'uses' => 'PartnersController@deleted']);
Route::get('/partners/{id}/restore', ['as' => 'partners.restore', 'uses' => 'PartnersController@restore']);

#Route::get('/access/', ['as' => 'access', 'uses' => 'AccessController@search']);
#Route::post('/accesss/search_results', ['as' => 'access.search_results', 'uses' => 'AccessController@search_results']);

Route::get('/users/access_denied', 'UsersController@access_denied');

Route::get('/users/{id}/enable',  ['as' => 'users.enable', 'uses' => 'UsersController@enable']);
Route::get('/users/{id}/disable',  ['as' => 'users.disable', 'uses' => 'UsersController@disable']);

Route::get('/users/', ['as' => 'users', 'uses' => 'UsersController@index', 'middleware' => ['acl:users.index']]);
Route::get('/users/create', ['as' => 'users.create', 'uses' => 'UsersController@create', 'middleware' => ['acl:users.create']]);
Route::get('/users/{id}/show', ['as' => 'users.show', 'uses' => 'UsersController@show', 'middleware' => ['acl:users.show']]);
Route::get('/users/{id}/edit', ['as' => 'users.edit', 'uses' => 'UsersController@edit', 'middleware' => ['acl:users.edit']]);
Route::get('/users/{id}/destroy', ['as' => 'users.destroy', 'uses' => 'UsersController@destroy']);
Route::put('/users/{id}/update', ['as' => 'users.update', 'uses' => 'UsersController@update', 'middleware' => ['acl:users.destroy']]);
Route::post('/users', ['as' => 'users.store', 'uses' => 'UsersController@store']);


Route::get('/roles/', ['as' => 'roles', 'uses' => 'RolesController@index']);
Route::get('/roles/create', ['as' => 'roles.create', 'uses' => 'RolesController@create']);
Route::get('/roles/{id}/show', ['as' => 'roles.show', 'uses' => 'RolesController@show']);
Route::get('/roles/{id}/edit', ['as' => 'roles.edit', 'uses' => 'RolesController@edit']);
Route::get('/roles/{id}/destroy', ['as' => 'roles.destroy', 'uses' => 'RolesController@destroy']);
Route::put('/roles/{id}/update', ['as' => 'roles.update', 'uses' => 'RolesController@update']);
Route::post('/roles', ['as' => 'roles.store', 'uses' => 'RolesController@store']);

Route::post('/roles/{id}/permissions/store', ['as' => 'role_permissions.store', 'uses' => 'RolesController@permission_store']);
Route::get('/roles/{id}/permissions/destroy', ['as' => 'role_permissions.destroy', 'uses' => 'RolesController@permission_destroy']);

Route::post('/roles/{id}/users/store', ['as' => 'role_users.store', 'uses' => 'RolesController@user_store']);
Route::get('/roles/{id}/users/destroy', ['as' => 'role_users.destroy', 'uses' => 'RolesController@user_destroy']);


Route::get('/payment_statuses/', ['as' => 'payment_statuses', 'uses' => 'PaymentStatusesController@index']);
Route::get('/payment_statuses/create', ['as' => 'payment_statuses.create', 'uses' => 'PaymentStatusesController@create', 'middleware' => ['acl:payment_statuses.create']]);
Route::get('/payment_statuses/{id}/show', ['as' => 'payment_statuses.show', 'uses' => 'PaymentStatusesController@show', 'middleware' => ['acl:payment_statuses.show']]);
Route::get('/payment_statuses/{id}/edit', ['as' => 'payment_statuses.edit', 'uses' => 'PaymentStatusesController@edit', 'middleware' => ['acl:payment_statuses.edit']]);
Route::get('/payment_statuses/{id}/destroy', ['as' => 'payment_statuses.destroy', 'uses' => 'PaymentStatusesController@destroy', 'middleware' => ['acl:payment_statuses.destroy']]);
Route::put('/payment_statuses/{id}/update', ['as' => 'payment_statuses.update', 'uses' => 'PaymentStatusesController@update']);
Route::post('/payment_statuses', ['as' => 'payment_statuses.store', 'uses' => 'PaymentStatusesController@store']);

Route::get('/payment_reasons/', ['as' => 'payment_reasons', 'uses' => 'PaymentReasonsController@index']);
Route::get('/payment_reasons/create', ['as' => 'payment_reasons.create', 'uses' => 'PaymentReasonsController@create', 'middleware' => ['acl:payment_reasons.create']]);
Route::get('/payment_reasons/{id}/show', ['as' => 'payment_reasons.show', 'uses' => 'PaymentReasonsController@show', 'middleware' => ['acl:payment_reasons.show']]);
Route::get('/payment_reasons/{id}/edit', ['as' => 'payment_reasons.edit', 'uses' => 'PaymentReasonsController@edit', 'middleware' => ['acl:payment_reasons.edit']]);
Route::get('/payment_reasons/{id}/destroy', ['as' => 'payment_reasons.destroy', 'uses' => 'PaymentReasonsController@destroy', 'middleware' => ['acl:payment_reasons.destroy']]);
Route::put('/payment_reasons/{id}/update', ['as' => 'payment_reasons.update', 'uses' => 'PaymentReasonsController@update']);
Route::post('/payment_reasons', ['as' => 'payment_reasons.store', 'uses' => 'PaymentReasonsController@store']);

Route::get('/payment_methods/', ['as' => 'payment_methods', 'uses' => 'PaymentMethodsController@index']);
Route::get('/payment_methods/create', ['as' => 'payment_methods.create', 'uses' => 'PaymentMethodsController@create', 'middleware' => ['acl:payment_methods.create']]);
Route::get('/payment_methods/{id}/show', ['as' => 'payment_methods.show', 'uses' => 'PaymentMethodsController@show', 'middleware' => ['acl:payment_methods.show']]);
Route::get('/payment_methods/{id}/edit', ['as' => 'payment_methods.edit', 'uses' => 'PaymentMethodsController@edit', 'middleware' => ['acl:payment_methods.edit']]);
Route::get('/payment_methods/{id}/destroy', ['as' => 'payment_methods.destroy', 'uses' => 'PaymentMethodsController@destroy', 'middleware' => ['acl:payment_methods.destroy']]);
Route::put('/payment_methods/{id}/update', ['as' => 'payment_methods.update', 'uses' => 'PaymentMethodsController@update']);
Route::post('/payment_methods', ['as' => 'payment_methods.store', 'uses' => 'PaymentMethodsController@store']);

Route::get('/payments/upload', ['as' => 'payments.upload', 'uses' => 'PaymentsController@upload']);
Route::get('/payments/edit', ['as' => 'payments.edit', 'uses' => 'PaymentsController@edit']);
Route::get('/payments/{id}/destroy', ['as' => 'payments.destroy', 'uses' => 'PaymentsController@destroy']);
Route::post('/payments', ['as' => 'payments.import', 'uses' => 'PaymentsController@import']);
Route::get('/payments/search', ['as' => 'payments.search', 'uses' => 'PaymentsController@search']);
Route::post('/payments/search_results', ['as' => 'payments.search_results', 'uses' => 'PaymentsController@search_results']);
Route::get('/payments/search_results_back', ['as' => 'payments.search_results_back', 'uses' => 'PaymentsController@search_results_back']);

Route::get('/patrimonial_types/', ['as' => 'patrimonial_types', 'uses' => 'PatrimonialTypesController@index']);
Route::get('/patrimonial_types/create', ['as' => 'patrimonial_types.create', 'uses' => 'PatrimonialTypesController@create', 'middleware' => ['acl:patrimonial_types.create']]);
Route::get('/patrimonial_types/{id}/show', ['as' => 'patrimonial_types.show', 'uses' => 'PatrimonialTypesController@show', 'middleware' => ['acl:patrimonial_types.show']]);
Route::get('/patrimonial_types/{id}/edit', ['as' => 'patrimonial_types.edit', 'uses' => 'PatrimonialTypesController@edit', 'middleware' => ['acl:patrimonial_types.edit']]);
Route::get('/patrimonial_types/{id}/destroy', ['as' => 'patrimonial_types.destroy', 'uses' => 'PatrimonialTypesController@destroy', 'middleware' => ['acl:patrimonial_types.destroy']]);
Route::put('/patrimonial_types/{id}/update', ['as' => 'patrimonial_types.update', 'uses' => 'PatrimonialTypesController@update']);
Route::post('/patrimonial_types', ['as' => 'patrimonial_types.store', 'uses' => 'PatrimonialTypesController@store']);

Route::get('/patrimonial_sub_types/', ['as' => 'patrimonial_sub_types', 'uses' => 'PatrimonialSubTypesController@index']);
Route::get('/patrimonial_sub_types/create', ['as' => 'patrimonial_sub_types.create', 'uses' => 'PatrimonialSubTypesController@create', 'middleware' => ['acl:patrimonial_sub_types.create']]);
Route::get('/patrimonial_sub_types/{id}/show', ['as' => 'patrimonial_sub_types.show', 'uses' => 'PatrimonialSubTypesController@show', 'middleware' => ['acl:patrimonial_sub_types.show']]);
Route::get('/patrimonial_sub_types/{id}/edit', ['as' => 'patrimonial_sub_types.edit', 'uses' => 'PatrimonialSubTypesController@edit', 'middleware' => ['acl:patrimonial_sub_types.edit']]);
Route::get('/patrimonial_sub_types/{id}/destroy', ['as' => 'patrimonial_sub_types.destroy', 'uses' => 'PatrimonialSubTypesController@destroy', 'middleware' => ['acl:patrimonial_sub_types.destroy']]);
Route::put('/patrimonial_sub_types/{id}/update', ['as' => 'patrimonial_sub_types.update', 'uses' => 'PatrimonialSubTypesController@update']);
Route::post('/patrimonial_sub_types', ['as' => 'patrimonial_sub_types.store', 'uses' => 'PatrimonialSubTypesController@store']);

Route::get('/patrimonial_brands/', ['as' => 'patrimonial_brands', 'uses' => 'PatrimonialBrandsController@index']);
Route::get('/patrimonial_brands/create', ['as' => 'patrimonial_brands.create', 'uses' => 'PatrimonialBrandsController@create', 'middleware' => ['acl:patrimonial_brands.create']]);
Route::get('/patrimonial_brands/{id}/show', ['as' => 'patrimonial_brands.show', 'uses' => 'PatrimonialBrandsController@show', 'middleware' => ['acl:patrimonial_brands.show']]);
Route::get('/patrimonial_brands/{id}/edit', ['as' => 'patrimonial_brands.edit', 'uses' => 'PatrimonialBrandsController@edit', 'middleware' => ['acl:patrimonial_brands.edit']]);
Route::get('/patrimonial_brands/{id}/destroy', ['as' => 'patrimonial_brands.destroy', 'uses' => 'PatrimonialBrandsController@destroy', 'middleware' => ['acl:patrimonial_brands.destroy']]);
Route::put('/patrimonial_brands/{id}/update', ['as' => 'patrimonial_brands.update', 'uses' => 'PatrimonialBrandsController@update']);
Route::post('/patrimonial_brands', ['as' => 'patrimonial_brands.store', 'uses' => 'PatrimonialBrandsController@store']);

Route::get('/patrimonial_models/', ['as' => 'patrimonial_models', 'uses' => 'PatrimonialModelsController@index']);
Route::get('/patrimonial_models/create', ['as' => 'patrimonial_models.create', 'uses' => 'PatrimonialModelsController@create', 'middleware' => ['acl:patrimonial_models.create']]);
Route::get('/patrimonial_models/{id}/show', ['as' => 'patrimonial_models.show', 'uses' => 'PatrimonialModelsController@show', 'middleware' => ['acl:patrimonial_models.show']]);
Route::get('/patrimonial_models/{id}/edit', ['as' => 'patrimonial_models.edit', 'uses' => 'PatrimonialModelsController@edit', 'middleware' => ['acl:patrimonial_models.edit']]);
Route::get('/patrimonial_models/{id}/destroy', ['as' => 'patrimonial_models.destroy', 'uses' => 'PatrimonialModelsController@destroy', 'middleware' => ['acl:patrimonial_models.destroy']]);
Route::put('/patrimonial_models/{id}/update', ['as' => 'patrimonial_models.update', 'uses' => 'PatrimonialModelsController@update']);
Route::post('/patrimonial_models', ['as' => 'patrimonial_models.store', 'uses' => 'PatrimonialModelsController@store']);

Route::get('/patrimonial_sectors/', ['as' => 'patrimonial_sectors', 'uses' => 'PatrimonialSectorsController@index']);
Route::get('/patrimonial_sectors/create', ['as' => 'patrimonial_sectors.create', 'uses' => 'PatrimonialSectorsController@create', 'middleware' => ['acl:patrimonial_sectors.create']]);
Route::get('/patrimonial_sectors/{id}/show', ['as' => 'patrimonial_sectors.show', 'uses' => 'PatrimonialSectorsController@show', 'middleware' => ['acl:patrimonial_sectors.show']]);
Route::get('/patrimonial_sectors/{id}/edit', ['as' => 'patrimonial_sectors.edit', 'uses' => 'PatrimonialSectorsController@edit', 'middleware' => ['acl:patrimonial_sectors.edit']]);
Route::get('/patrimonial_sectors/{id}/destroy', ['as' => 'patrimonial_sectors.destroy', 'uses' => 'PatrimonialSectorsController@destroy', 'middleware' => ['acl:patrimonial_sectors.destroy']]);
Route::put('/patrimonial_sectors/{id}/update', ['as' => 'patrimonial_sectors.update', 'uses' => 'PatrimonialSectorsController@update']);
Route::post('/patrimonial_sectors', ['as' => 'patrimonial_sectors.store', 'uses' => 'PatrimonialSectorsController@store']);

Route::get('/patrimonial_sub_sectors/', ['as' => 'patrimonial_sub_sectors', 'uses' => 'PatrimonialSubSectorsController@index']);
Route::get('/patrimonial_sub_sectors/create', ['as' => 'patrimonial_sub_sectors.create', 'uses' => 'PatrimonialSubSectorsController@create', 'middleware' => ['acl:patrimonial_sub_sectors.create']]);
Route::get('/patrimonial_sub_sectors/{id}/show', ['as' => 'patrimonial_sub_sectors.show', 'uses' => 'PatrimonialSubSectorsController@show', 'middleware' => ['acl:patrimonial_sub_sectors.show']]);
Route::get('/patrimonial_sub_sectors/{id}/edit', ['as' => 'patrimonial_sub_sectors.edit', 'uses' => 'PatrimonialSubSectorsController@edit', 'middleware' => ['acl:patrimonial_sub_sectors.edit']]);
Route::get('/patrimonial_sub_sectors/{id}/destroy', ['as' => 'patrimonial_sub_sectors.destroy', 'uses' => 'PatrimonialSubSectorsController@destroy', 'middleware' => ['acl:patrimonial_sub_sectors.destroy']]);
Route::put('/patrimonial_sub_sectors/{id}/update', ['as' => 'patrimonial_sub_sectors.update', 'uses' => 'PatrimonialSubSectorsController@update']);
Route::post('/patrimonial_sub_sectors', ['as' => 'patrimonial_sub_sectors.store', 'uses' => 'PatrimonialSubSectorsController@store']);

Route::get('/management_units/', ['as' => 'management_units', 'uses' => 'ManagementUnitsController@index']);
Route::get('/management_units/search_results_back', ['as' => 'management_units.search_results_back', 'uses' => 'ManagementUnitsController@search_results_back']);
Route::get('/management_units/create', ['as' => 'management_units.create', 'uses' => 'ManagementUnitsController@create', 'middleware' => ['acl:management_units.create']]);
Route::get('/management_units/{id}/show', ['as' => 'management_units.show', 'uses' => 'ManagementUnitsController@show', 'middleware' => ['acl:management_units.show']]);
Route::get('/management_units/{id}/edit', ['as' => 'management_units.edit', 'uses' => 'ManagementUnitsController@edit', 'middleware' => ['acl:management_units.edit']]);
Route::get('/management_units/{id}/destroy', ['as' => 'management_units.destroy', 'uses' => 'ManagementUnitsController@destroy', 'middleware' => ['acl:management_units.destroy']]);
Route::put('/management_units/{id}/update', ['as' => 'management_units.update', 'uses' => 'ManagementUnitsController@update']);
Route::post('/management_units', ['as' => 'management_units.store', 'uses' => 'ManagementUnitsController@store']);

Route::get('/providers/', ['as' => 'providers', 'uses' => 'ProvidersController@index']);
Route::get('/providers/create', ['as' => 'providers.create', 'uses' => 'ProvidersController@create', 'middleware' => ['acl:providers.create']]);
Route::get('/providers/{id}/show', ['as' => 'providers.show', 'uses' => 'ProvidersController@show', 'middleware' => ['acl:providers.show']]);
Route::get('/providers/{id}/edit', ['as' => 'providers.edit', 'uses' => 'ProvidersController@edit', 'middleware' => ['acl:providers.edit']]);
Route::get('/providers/{id}/destroy', ['as' => 'providers.destroy', 'uses' => 'ProvidersController@destroy', 'middleware' => ['acl:providers.destroy']]);
Route::put('/providers/{id}/update', ['as' => 'providers.update', 'uses' => 'ProvidersController@update']);
Route::post('/providers', ['as' => 'providers.store', 'uses' => 'ProvidersController@store']);


Route::get('/patrimonials/', ['as' => 'patrimonials', 'uses' => 'PatrimonialsController@search', 'middleware' => ['acl:patrimonials.search']]);
Route::post('/patrimonials/search_results', ['as' => 'patrimonials.search_results', 'uses' => 'PatrimonialsController@search_results']);
Route::get('/patrimonials/search_results_back', ['as' => 'patrimonials.search_results_back', 'uses' => 'PatrimonialsController@search_results_back']);
Route::get('/patrimonials/create', ['as' => 'patrimonials.create', 'uses' => 'PatrimonialsController@create', 'middleware' => ['acl:patrimonials.create']]);
Route::get('/patrimonials/{id}/show', ['as' => 'patrimonials.show', 'uses' => 'PatrimonialsController@show', 'middleware' => ['acl:patrimonials.show']]);
Route::get('/patrimonials/{id}/edit', ['as' => 'patrimonials.edit', 'uses' => 'PatrimonialsController@edit', 'middleware' => ['acl:patrimonials.edit']]);
Route::get('/patrimonials/{id}/destroy', ['as' => 'patrimonials.destroy', 'uses' => 'PatrimonialsController@destroy', 'middleware' => ['acl:patrimonials.destroy']]);
Route::put('/patrimonials/{id}/update', ['as' => 'patrimonials.update', 'uses' => 'PatrimonialsController@update']);
Route::post('/patrimonials', ['as' => 'patrimonials.store', 'uses' => 'PatrimonialsController@store']);
Route::get('/patrimonials/{id}/copy', ['as' => 'patrimonials.copy', 'uses' => 'PatrimonialsController@copy', 'middleware' => ['acl:patrimonials.copy']]);


Route::get('/patrimonial_movement_types/', 				['as' => 'patrimonial_movement_types', 			'uses' => 'PatrimonialMovementTypesController@index']);
Route::get('/patrimonial_movement_types/create', 		['as' => 'patrimonial_movement_types.create', 	'uses' => 'PatrimonialMovementTypesController@create', 'middleware' => ['acl:patrimonial_movement_types.create']]);
Route::get('/patrimonial_movement_types/{id}/show', 	['as' => 'patrimonial_movement_types.show', 	'uses' => 'PatrimonialMovementTypesController@show', 'middleware' => ['acl:patrimonial_movement_types.show']]);
Route::get('/patrimonial_movement_types/{id}/edit', 	['as' => 'patrimonial_movement_types.edit', 	'uses' => 'PatrimonialMovementTypesController@edit', 'middleware' => ['acl:patrimonial_movement_types.edit']]);
Route::get('/patrimonial_movement_types/{id}/destroy', 	['as' => 'patrimonial_movement_types.destroy', 	'uses' => 'PatrimonialMovementTypesController@destroy', 'middleware' => ['acl:patrimonial_movement_types.destroy']]);
Route::put('/patrimonial_movement_types/{id}/update', 	['as' => 'patrimonial_movement_types.update', 	'uses' => 'PatrimonialMovementTypesController@update']);
Route::post('/patrimonial_movement_types', 				['as' => 'patrimonial_movement_types.store', 	'uses' => 'PatrimonialMovementTypesController@store']);

Route::get('/accounting_accounts/', ['as' => 'accounting_accounts', 'uses' => 'AccountingAccountsController@index']);
Route::get('/accounting_accounts/create', ['as' => 'accounting_accounts.create', 'uses' => 'AccountingAccountsController@create', 'middleware' => ['acl:accounting_accounts.create']]);
Route::get('/accounting_accounts/{id}/show', ['as' => 'accounting_accounts.show', 'uses' => 'AccountingAccountsController@show', 'middleware' => ['acl:accounting_accounts.show']]);
Route::get('/accounting_accounts/{id}/edit', ['as' => 'accounting_accounts.edit', 'uses' => 'AccountingAccountsController@edit', 'middleware' => ['acl:accounting_accounts.edit']]);
Route::get('/accounting_accounts/{id}/destroy', ['as' => 'accounting_accounts.destroy', 'uses' => 'AccountingAccountsController@destroy', 'middleware' => ['acl:accounting_accounts.destroy']]);
Route::put('/accounting_accounts/{id}/update', ['as' => 'accounting_accounts.update', 'uses' => 'AccountingAccountsController@update']);
Route::post('/accounting_accounts', ['as' => 'accounting_accounts.store', 'uses' => 'AccountingAccountsController@store']);

Route::get('/patrimonials/{id}/create_movement', 		['as' => 'patrimonial_movements.create', 	'uses' => 'PatrimonialsController@create_movement', 'middleware' => ['acl:patrimonial_movements.create']]);
Route::post('/patrimonials/{id}/movements', 				['as' => 'patrimonial_movements.store', 	'uses' => 'PatrimonialsController@store_movement']);

Route::get('/material_units/', ['as' => 'material_units', 'uses' => 'MaterialUnitsController@index']);
Route::get('/material_units/create', ['as' => 'material_units.create', 'uses' => 'MaterialUnitsController@create', 'middleware' => ['acl:material_units.create']]);
Route::get('/material_units/{id}/show', ['as' => 'material_units.show', 'uses' => 'MaterialUnitsController@show', 'middleware' => ['acl:material_units.show']]);
Route::get('/material_units/{id}/edit', ['as' => 'material_units.edit', 'uses' => 'MaterialUnitsController@edit', 'middleware' => ['acl:material_units.edit']]);
Route::get('/material_units/{id}/destroy', ['as' => 'material_units.destroy', 'uses' => 'MaterialUnitsController@destroy', 'middleware' => ['acl:material_units.destroy']]);
Route::put('/material_units/{id}/update', ['as' => 'material_units.update', 'uses' => 'MaterialUnitsController@update']);
Route::post('/material_units', ['as' => 'material_units.store', 'uses' => 'MaterialUnitsController@store']);

Route::get('/materials/', ['as' => 'materials', 'uses' => 'MaterialsController@index']);
Route::get('/materials/search_results_back', ['as' => 'materials.search_results_back', 'uses' => 'MaterialsController@search_results_back']);
Route::get('/materials/create', ['as' => 'materials.create', 'uses' => 'MaterialsController@create', 'middleware' => ['acl:materials.create']]);
Route::get('/materials/{id}/show', ['as' => 'materials.show', 'uses' => 'MaterialsController@show', 'middleware' => ['acl:materials.show']]);
Route::get('/materials/{id}/edit', ['as' => 'materials.edit', 'uses' => 'MaterialsController@edit', 'middleware' => ['acl:materials.edit']]);
Route::get('/materials/{id}/destroy', ['as' => 'materials.destroy', 'uses' => 'MaterialsController@destroy', 'middleware' => ['acl:materials.destroy']]);
Route::put('/materials/{id}/update', ['as' => 'materials.update', 'uses' => 'MaterialsController@update']);
Route::post('/materials', ['as' => 'materials.store', 'uses' => 'MaterialsController@store']);

Route::get('/patrimonials/{id}/create_material', ['as' => 'patrimonial_materials.create', 'uses' => 'PatrimonialsController@create_material', 'middleware' => ['acl:patrimonial_materials.create']]);
Route::post('/patrimonials/{id}/materials', ['as' => 'patrimonial_materials.store', 'uses' => 'PatrimonialsController@store_material']);
Route::get('/patrimonials/edit_material/{id}', ['as' => 'patrimonial_materials.edit', 'uses' => 'PatrimonialsController@edit_material', 'middleware' => ['acl:patrimonial_materials.edit']]);
Route::put('/patrimonials/update_material/{id}', ['as' => 'patrimonial_materials.update', 'uses' => 'PatrimonialsController@update_material']);

Route::get('/services/', ['as' => 'services', 'uses' => 'ServicesController@index']);
Route::get('/services/create', ['as' => 'services.create', 'uses' => 'ServicesController@create', 'middleware' => ['acl:services.create']]);
Route::get('/services/{id}/show', ['as' => 'services.show', 'uses' => 'ServicesController@show', 'middleware' => ['acl:services.show']]);
Route::get('/services/{id}/edit', ['as' => 'services.edit', 'uses' => 'ServicesController@edit', 'middleware' => ['acl:services.edit']]);
Route::get('/services/{id}/destroy', ['as' => 'services.destroy', 'uses' => 'ServicesController@destroy', 'middleware' => ['acl:services.destroy']]);
Route::put('/services/{id}/update', ['as' => 'services.update', 'uses' => 'ServicesController@update']);
Route::post('/services', ['as' => 'services.store', 'uses' => 'ServicesController@store']);

Route::get('/patrimonials/{id}/create_service', ['as' => 'patrimonial_services.create', 'uses' => 'PatrimonialsController@create_service', 'middleware' => ['acl:patrimonial_services.create']]);
Route::post('/patrimonials/{id}/services', ['as' => 'patrimonial_services.store', 'uses' => 'PatrimonialsController@store_service']);
Route::get('/patrimonials/edit_service/{id}', ['as' => 'patrimonial_services.edit', 'uses' => 'PatrimonialsController@edit_service', 'middleware' => ['acl:patrimonial_services.edit']]);
Route::put('/patrimonials/update_service/{id}', ['as' => 'patrimonial_services.update', 'uses' => 'PatrimonialsController@update_service']);


Route::get('/balance_sheet_previouses/', ['as' => 'balance_sheet_previouses', 'uses' => 'BalanceSheetPreviousesController@search', 'middleware' => ['acl:balance_sheet_previouses.search']]);
Route::post('/balance_sheet_previouses/search_results', ['as' => 'balance_sheet_previouses.search_results', 'uses' => 'BalanceSheetPreviousesController@search_results']);
Route::post('/balance_sheet_previouses/search_results_back', ['as' => 'balance_sheet_previouses.search_results_back', 'uses' => 'BalanceSheetPreviousesController@search_results_back']);
Route::get('/balance_sheet_previouses/create', ['as' => 'balance_sheet_previouses.create', 'uses' => 'BalanceSheetPreviousesController@create', 'middleware' => ['acl:balance_sheet_previouses.create']]);
Route::post('/balance_sheet_previouses', ['as' => 'balance_sheet_previouses.store', 'uses' => 'BalanceSheetPreviousesController@store']);
Route::get('/balance_sheet_previouses/{id}/destroy', ['as' => 'balance_sheet_previouses.destroy', 'uses' => 'BalanceSheetPreviousesController@destroy', 'middleware' => ['acl:balance_sheet_previouses.destroy']]);
Route::get('/balance_sheet_previouses/{id}/edit', ['as' => 'balance_sheet_previouses.edit', 'uses' => 'BalanceSheetPreviousesController@edit', 'middleware' => ['acl:balance_sheet_previouses.edit']]);
Route::put('/balance_sheet_previouses/{id}/update', ['as' => 'balance_sheet_previouses.update', 'uses' => 'BalanceSheetPreviousesController@update']);


Route::post('/balance_sheet_previouses/{id}/show', ['as' => 'balance_sheet_previouses.show', 'uses' => 'BalanceSheetPreviousesController@show']);


Route::get('/balance_sheets/', ['as' => 'balance_sheets.search', 'uses' => 'BalanceSheetsController@search', 'middleware' => ['acl:balance_sheets.search']]);
Route::post('/balance_sheets/search_results', ['as' => 'balance_sheets.search_results', 'uses' => 'BalanceSheetsController@search_results']);


Route::get('/patrimonials_reports_purchases/', ['as' => 'patrimonials_reports_purchases.search', 'uses' => 'PatrimonialsController@rpt_purchases_search', 'middleware' => ['acl:patrimonials_reports_purchases.search']]);

Route::post('/patrimonials_reports_purchases/', ['as' => 'patrimonials_reports_purchases.search_results', 'uses' => 'PatrimonialsController@rpt_purchases_search_results']);
