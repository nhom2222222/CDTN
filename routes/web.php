<?php

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

Route::get('/','PageController@index');
Route::get('/gioithieu','PageController@gioithieu');

Route::get('/cafe','PageController@cafe');
Route::get('/thuvien','PageController@thuvien');
Route::post('/loadmore_tv','PageController@loadmore_tv');
Route::get('/thuvien/{name}.html','PageController@sachinfo');
Route::get('/tacgia/{name}.html','PageController@tacgia');
Route::get('/nhaxuatban/{name}.html','PageController@nhaxuatban');
Route::get('/namxb/{name}.html','PageController@namxb');
Route::get('/theloaisach/{name}.html','PageController@theloaisach');
Route::get('logoutuser','PageController@logoutuser');
Route::get('profile.html','PageController@profile');
Route::get('lichsu.html','PageController@lichsu');
Route::get('hoadon.html','PageController@hoadon');
Route::get('hoadon/{id}','PageController@pdf');
Route::get('phieumuon.html','PageController@phieumuon');
Route::get('phieumuon/{id}','PageController@pdfpm');



Route::get('/register','Admin\LogController@getRegister');
Route::post('/postregister','Admin\LogController@postRegister');

Route::get('login','Admin\LogController@getLogin')->middleware('LoggedOut');
Route::post('postlogin','Admin\LogController@postLogin');

Route::get('logout','Admin\LogController@logout');

Route::group(['prefix'=>'admin','middleware'=>['LoggedIn','AuthOrigin']],function (){
    route::get('/',function (){
        return view('backend.dashboard');
    });//
	Route::get('/hoadonnv','Admin\HoaDonSachController@hoadonnv');
    Route::group(['prefix'=>'profile'],function (){
        Route::get('/','Admin\UserController@show');
        Route::post('editimage','Admin\UserController@editImage');
        Route::post('editinfo','Admin\UserController@editInfo');

    });
    Route::group(['prefix'=>'user'],function (){
        Route::get('/','Admin\UserController@index');
        Route::get('/data','Admin\UserController@getData');
        Route::get('/edit','Admin\UserController@edit');
        Route::get('/delete','Admin\UserController@destroy');
        Route::post('update','Admin\UserController@update');
        Route::post('/add','Admin\UserController@store');
        Route::post('/active','Admin\UserController@active');
        Route::post('/resetpass','Admin\UserController@resetpass');
    });
    Route::group(['prefix'=>'naptien'],function (){
        Route::post('/add','Admin\VitienController@store');
        Route::get('/lichsu','Admin\VitienController@history');
    });
    Route::group(['prefix'=>'book'],function (){
        Route::group(['prefix'=>'theloai'],function (){
            Route::get('/','Admin\TheLoaiSachController@index');
            Route::get('/data','Admin\TheLoaiSachController@getData');
            Route::get('/edit','Admin\TheLoaiSachController@edit');
            Route::get('/delete','Admin\TheLoaiSachController@destroy');
            Route::post('/update','Admin\TheLoaiSachController@update');
            Route::post('/add','Admin\TheLoaiSachController@store');
        });
        Route::group(['prefix'=>'nxb'],function (){
            Route::get('/','Admin\NXBController@index');
            Route::get('/data','Admin\NXBController@getData');
            Route::get('/edit','Admin\NXBController@edit');
            Route::get('/delete','Admin\NXBController@destroy');
            Route::post('/update','Admin\NXBController@update');
            Route::post('/add','Admin\NXBController@store');
        });
        Route::group(['prefix'=>'tacgia'],function (){
            Route::get('/','Admin\TacGiaController@index');
            Route::get('/data','Admin\TacGiaController@getData');
            Route::get('/edit','Admin\TacGiaController@edit');
            Route::get('/delete','Admin\TacGiaController@destroy');
            Route::post('/update','Admin\TacGiaController@update');
            Route::post('/add','Admin\TacGiaController@store');
        });
            Route::get('/','Admin\SachController@index');
            Route::get('/data','Admin\SachController@getData');
            Route::get('/edit','Admin\SachController@edit');
            Route::get('/delete','Admin\SachController@destroy');
            Route::post('/update','Admin\SachController@update');
            Route::post('/add','Admin\SachController@store');
            Route::post('/info','Admin\SachController@Info');
            Route::post('/themsl','Admin\SachController@ThemSL');
            Route::post('/giamsl','Admin\SachController@GiamSL');
            Route::get('/lsnhaphuy','Admin\SachController@history');
            route::post('/noibat','Admin\SachController@noibat');
    });
    Route::group(['prefix'=>'muontrasach'],function (){
        Route::get('/','Admin\MSTSController@index');
        Route::get('/data','Admin\MSTSController@getData');
        Route::post('/searchuser','Admin\MSTSController@searchuser');
        Route::get('/add','Admin\MSTSController@create');
        Route::post('/datcoc','Admin\MSTSController@datcoc');
        Route::post('/muonsach','Admin\MSTSController@store');
        Route::post('/phieumuon','Admin\MSTSController@show');
        Route::get('/edit','Admin\MSTSController@edit');
        Route::post('/update','Admin\MSTSController@update');
        Route::post('/delete','Admin\MSTSController@destroy');
        Route::get('/trasach','Admin\MSTSController@gettrasach');
        Route::post('/searchpm','Admin\MSTSController@searchpm');
        Route::post('/trasach','Admin\MSTSController@posttrasach');
        Route::get('/phieumuonpdf/{id}','Admin\MSTSController@pdf');
    });
    Route::group(['prefix'=>'hoadonsach'],function (){
        Route::get('/','Admin\HoaDonSachController@index');
        route::get('/hdct','Admin\HoaDonSachController@showhdct');
        Route::post('/','Admin\HoaDonSachController@show');
        Route::get('/hoadonpdf/{id}','Admin\HoaDonSachController@pdf');
    });

    Route::group(['prefix'=>'thongke'],function (){
        Route::get('/','Admin\ThongKeController@index');
        Route::post('/','Admin\ThongKeController@thongke');
    });
    route::get('/email',function (){
        return view('backend.emailnaptien');
    });
    Route::group(['prefix'=>'menu'],function (){
        Route::get('/','Admin\MenuController@index');
        Route::get('/data','Admin\MenuController@getData');
        Route::get('/delete','Admin\MenuController@delete');
        Route::post('/add','Admin\MenuController@store');
        Route::get('/getdouong','Admin\MenuController@getdouong');
        Route::post('/edit','Admin\MenuController@edit');

    });
    Route::group(['prefix'=>'theloai_douong'],function (){
        Route::get('/','Admin\Theloai_DouongController@index');
        Route::get('/data','Admin\Theloai_DouongController@getData');
        Route::post('/add','Admin\Theloai_DouongController@store');
        Route::post('/edit','Admin\Theloai_DouongController@edit');
        Route::get('/delete','Admin\Theloai_DouongController@delete');
    });
    Route::group(['prefix'=>'ban'],function (){
        Route::get('/','Admin\banController@index');
        Route::get('/data','Admin\banController@getData');
        Route::post('/orderdrink','Admin\banController@orderdrink');
        Route::post('/checkcmt','Admin\banController@checkcmt');
    });
    Route::group(['prefix'=>'thanhtoan'],function (){
        Route::get('','Admin\banController@listThanhtoan');
    });
    Route::group(['prefix'=>'hoadon'],function (){
        Route::get('/','Admin\HoaDonCafeController@index');
        route::get('/hdct','Admin\HoaDonCafeController@showhdct');
        Route::get('/pdf/{id}','Admin\HoaDonCafeController@pdf');
    });
    Route::group(['prefix'=>'thongkecafe'],function (){
        Route::get('/','Admin\ThongKeCafeController@index');
        /*        Route::post('/','Admin\ThongKeCafeController@thongke');*/
    });
});
