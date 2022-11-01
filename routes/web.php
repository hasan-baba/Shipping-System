<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('layouts.master');
Route::get('/admin/user', 'App\Http\Controllers\AdminController@list');
Route::post('/admin/user/create', 'App\Http\Controllers\AdminController@store');
Route::get('/admin/user/{id}', 'App\Http\Controllers\AdminController@edit');
Route::put('/admin/user/{id}', 'App\Http\Controllers\AdminController@update');
Route::delete('/admin/user/{id}', 'App\Http\Controllers\AdminController@destroy');

/*
 * Agency Routes
 * */
Route::get('/admin/agency', 'App\Http\Controllers\AgencyController@list');
Route::post('/admin/agency/create', 'App\Http\Controllers\AgencyController@store');
Route::get('/admin/agency/{id}', 'App\Http\Controllers\AgencyController@edit');
Route::put('/admin/agency/{id}', 'App\Http\Controllers\AgencyController@update');
Route::delete('/admin/agency/{id}', 'App\Http\Controllers\AgencyController@destroy');

/*
 * Cargo Routes
 * */
Route::get('/admin/cargo', 'App\Http\Controllers\CargoController@list');
Route::post('/admin/cargo/create', 'App\Http\Controllers\CargoController@store');
Route::get('/admin/cargo/{id}', 'App\Http\Controllers\CargoController@edit');
Route::put('/admin/cargo/{id}', 'App\Http\Controllers\CargoController@update');
Route::delete('/admin/cargo/{id}', 'App\Http\Controllers\CargoController@destroy');

/*
 * Package Routes
 * */
Route::get('/admin/package', 'App\Http\Controllers\PackageController@list');
Route::post('/admin/package/create', 'App\Http\Controllers\PackageController@store');
Route::get('/admin/package/{id}', 'App\Http\Controllers\PackageController@edit');
Route::put('/admin/package/{id}', 'App\Http\Controllers\PackageController@update');
Route::delete('/admin/package/{id}', 'App\Http\Controllers\PackageController@destroy');

/*
 * Port Routes
 * */
Route::get('/admin/port', 'App\Http\Controllers\PortController@list');
Route::post('/admin/port/create', 'App\Http\Controllers\PortController@store');
Route::get('/admin/port/{id}', 'App\Http\Controllers\PortController@edit');
Route::put('/admin/port/{id}', 'App\Http\Controllers\PortController@update');
Route::delete('/admin/port/{id}', 'App\Http\Controllers\PortController@destroy');

/*
 * Receiver Routes
 * */
Route::get('/admin/receiver', 'App\Http\Controllers\ReceiverController@list');
Route::post('/admin/receiver/create', 'App\Http\Controllers\ReceiverController@store');
Route::get('/admin/receiver/{id}', 'App\Http\Controllers\ReceiverController@edit');
Route::put('/admin/receiver/{id}', 'App\Http\Controllers\ReceiverController@update');
Route::delete('/admin/receiver/{id}', 'App\Http\Controllers\ReceiverController@destroy');

/*
 * Ship Type Routes
 * */
Route::get('/admin/shiptype', 'App\Http\Controllers\ShipTypeController@list');
Route::post('/admin/shiptype/create', 'App\Http\Controllers\ShipTypeController@store');
Route::get('/admin/shiptype/{id}', 'App\Http\Controllers\ShipTypeController@edit');
Route::put('/admin/shiptype/{id}', 'App\Http\Controllers\ShipTypeController@update');
Route::delete('/admin/shiptype/{id}', 'App\Http\Controllers\ShipTypeController@destroy');

/*
 * Company Routes
 * */
Route::get('/admin/company', 'App\Http\Controllers\CompanyController@list');
Route::post('/admin/company/create', 'App\Http\Controllers\CompanyController@store');
Route::get('/admin/company/{id}', 'App\Http\Controllers\CompanyController@edit');
Route::put('/admin/company/{id}', 'App\Http\Controllers\CompanyController@update');
Route::delete('/admin/company/{id}', 'App\Http\Controllers\CompanyController@destroy');



/*
 * Ships Routes
 * */
Route::get('/admin/ship', 'App\Http\Controllers\ShipController@list');
Route::post('/admin/ship/create', 'App\Http\Controllers\ShipController@store');
Route::get('/admin/ship/{id}', 'App\Http\Controllers\ShipController@edit');
Route::put('/admin/ship/{id}', 'App\Http\Controllers\ShipController@update');
Route::delete('/admin/ship/{id}', 'App\Http\Controllers\ShipController@destroy');

/*
 * Trips Routes
 * */
Route::get('/admin/trip', 'App\Http\Controllers\TripController@list');
Route::get('/admin/print', 'App\Http\Controllers\TripController@print');
Route::post('/admin/trip/create', 'App\Http\Controllers\TripController@store');
Route::get('/admin/trip/{id}', 'App\Http\Controllers\TripController@edit');
Route::put('/admin/trip/{id}', 'App\Http\Controllers\TripController@update');
Route::delete('/admin/trip/{id}', 'App\Http\Controllers\TripController@destroy');

/*
 * Manifest Routes
 * */
Route::get('/admin/manifest', 'App\Http\Controllers\ManifestController@list');
Route::get('/admin/printmn', 'App\Http\Controllers\ManifestController@print');
Route::get('/admin/tripmnlist', 'App\Http\Controllers\ManifestController@triplist');
Route::get('/admin/mnlist', 'App\Http\Controllers\ManifestController@mnlist');
Route::get('/admin/transitlist', 'App\Http\Controllers\ManifestController@transitlist');
Route::get('/admin/addmn', 'App\Http\Controllers\ManifestController@addmn');
Route::get('/admin/manifest/{id}', 'App\Http\Controllers\ManifestController@edit');
Route::put('/admin/manifest/{id}', 'App\Http\Controllers\ManifestController@update');
Route::post('/admin/manifest/create', 'App\Http\Controllers\ManifestController@store');
Route::delete('/admin/manifest/{id}', 'App\Http\Controllers\ManifestController@destroy');

/*
 * Bill of Lading Routes
 * */
Route::get('/admin/billoflading', 'App\Http\Controllers\BillofLadingController@list');
Route::post('/admin/billoflading/create', 'App\Http\Controllers\BillofLadingController@store');
Route::post('/admin/billoflading/mn', 'App\Http\Controllers\BillofLadingController@index');
Route::get('/admin/billoflading/{id}', 'App\Http\Controllers\BillofLadingController@edit');
Route::put('/admin/billoflading/{id}', 'App\Http\Controllers\BillofLadingController@update');
Route::delete('/admin/billoflading/{id}', 'App\Http\Controllers\BillofLadingController@destroy');
Route::get('/admin/billoflading/cargo/{id}', 'App\Http\Controllers\BillofLadingController@cargo');
Route::get('/admin/billoflading/cargoqtywght/{trip}/{cargo}', 'App\Http\Controllers\BillofLadingController@cargoTotalWeightQuantity');

/*
 * Transit Routes
 * */
Route::post('/admin/transit/create', 'App\Http\Controllers\TransitController@store');
Route::get('/admin/transit/{id}', 'App\Http\Controllers\TransitController@edit');
Route::put('/admin/transit/{id}', 'App\Http\Controllers\TransitController@update');
Route::delete('/admin/transit/{id}', 'App\Http\Controllers\TransitController@destroy');

/*
 * Discharging Plan Routes
 * */
Route::post('/admin/dischargingplan/create', 'App\Http\Controllers\DischargingPlanController@store');
Route::get('/admin/fetch/{id}', 'App\Http\Controllers\DischargingPlanController@fetch');
Route::get('/admin/dischargingplan/{id}', 'App\Http\Controllers\DischargingPlanController@edit');
Route::put('/admin/dischargingplan/{id}', 'App\Http\Controllers\DischargingPlanController@update');
Route::delete('/admin/dischargingplan/{id}', 'App\Http\Controllers\DischargingPlanController@destroy');

/*
 * Crew Routes
 * */
Route::get('/admin/crew', 'App\Http\Controllers\CrewController@list');
Route::post('/admin/crew/create', 'App\Http\Controllers\CrewController@store');
Route::get('/admin/crewlist', 'App\Http\Controllers\CrewController@crewlist');
Route::get('/admin/crew/{id}', 'App\Http\Controllers\CrewController@edit');
Route::put('/admin/crew/{id}', 'App\Http\Controllers\CrewController@update');
Route::delete('/admin/crew/{id}', 'App\Http\Controllers\CrewController@destroy');

/*
 * Prit Routes
 * */
Route::get('/admin/print/knowledge', 'App\Http\Controllers\TripController@printKnowledge');
Route::get('/admin/print/customstatement', 'App\Http\Controllers\TripController@printCustomStatement');
Route::get('/admin/print/motor', 'App\Http\Controllers\TripController@printMotor');
Route::get('/admin/print/customersatisfaction', 'App\Http\Controllers\TripController@printCustomerSatisfaction');
Route::get('/admin/print/customersatisfactionwss', 'App\Http\Controllers\TripController@printCustomerSatisfactionWSS');
Route::get('/admin/print/shipsparticular', 'App\Http\Controllers\TripController@printShipsParticular');
Route::get('/admin/print/jiengeneralsecurity', 'App\Http\Controllers\TripController@printJiehGeneralSecurity');
Route::get('/admin/print/saidageneralsecurity', 'App\Http\Controllers\TripController@printSaidaGeneralSecurity');
Route::get('/admin/print/permessionleavejieh', 'App\Http\Controllers\TripController@printPermessionLeaveJieh');
Route::get('/admin/print/permessionleavezahrani', 'App\Http\Controllers\TripController@printPermessionLeaveZahrani');
Route::get('/admin/print/permessionleavesaida', 'App\Http\Controllers\TripController@printPermessionLeaveSaida');
Route::get('/admin/print/permessionleavesaidarmy', 'App\Http\Controllers\TripController@printPermessionLeaveSaidaArmy');
Route::get('/admin/print/receivepassport', 'App\Http\Controllers\TripController@printReceivePassport');
Route::get('/admin/print/assigncrewjieh', 'App\Http\Controllers\TripController@printAssignCrewJieh');
Route::get('/admin/print/assigncrewsaida', 'App\Http\Controllers\TripController@printAssignCrewSaida');
Route::get('/admin/print/assignpassenger', 'App\Http\Controllers\TripController@printAssignPassenger');
Route::get('/admin/print/visa', 'App\Http\Controllers\TripController@printVisa');
Route::get('/admin/print/departurejieh', 'App\Http\Controllers\TripController@printDepartureJieh');
Route::get('/admin/print/departuresaida', 'App\Http\Controllers\TripController@printDepartureSaida');
Route::get('/admin/print/departurepassengersaida', 'App\Http\Controllers\TripController@printDeparturePassengerSaida');
Route::get('/admin/print/boardpermitsaidazahrani', 'App\Http\Controllers\TripController@printBoardPermitSaidaZahrani');
Route::get('/admin/print/boardpermitjieh', 'App\Http\Controllers\TripController@printBoardPermitJieh');
Route::get('/admin/print/clearancepermission', 'App\Http\Controllers\TripController@printClearancePermission');
Route::get('/admin/print/requeststatement', 'App\Http\Controllers\TripController@printRequestStatement');
Route::get('/admin/print/statement', 'App\Http\Controllers\TripController@printStatement');
Route::get('/admin/print/obligationsaida', 'App\Http\Controllers\TripController@printObligationSaida');
Route::get('/admin/print/obligationjieh', 'App\Http\Controllers\TripController@printObligationJieh');
Route::get('/admin/print/obligationzahrani', 'App\Http\Controllers\TripController@printObligationZahrani');
Route::get('/admin/print/cargorecap', 'App\Http\Controllers\TripController@printCargpRecap');
Route::get('/admin/print/cargorecapmultiple', 'App\Http\Controllers\TripController@printCargpRecapMultiple');
Route::get('/admin/print/cargorecaplebport', 'App\Http\Controllers\TripController@printCargpRecapLebPort');
Route::get('/admin/print/cargorecapnextport', 'App\Http\Controllers\TripController@printCargpRecapNextPort');
Route::get('/admin/print/cargorecaptransit', 'App\Http\Controllers\TripController@printCargpRecapTransit');
Route::get('/admin/print/cargorecaptableform', 'App\Http\Controllers\TripController@printCargpRecapTableForm');
Route::get('/admin/print/deliverybon', 'App\Http\Controllers\TripController@printDeliveryBon');
Route::get('/admin/print/shippingorder', 'App\Http\Controllers\TripController@printShippingOrder');
Route::get('/admin/print/bulkcargomn', 'App\Http\Controllers\ManifestController@printBulkCargoMn');
Route::get('/admin/print/cargomn', 'App\Http\Controllers\ManifestController@printCargoMn');
Route::get('/admin/print/emptymn', 'App\Http\Controllers\ManifestController@printEmptyMn');
Route::get('/admin/print/bluemn', 'App\Http\Controllers\ManifestController@printBlueMn');
Route::get('/admin/print/redmn', 'App\Http\Controllers\TripController@printRedMn');
Route::get('/admin/print/redmnoqty', 'App\Http\Controllers\TripController@printRedMnNoQty');
Route::get('/admin/print/emptyredmn', 'App\Http\Controllers\TripController@printEmptyRedMn');
