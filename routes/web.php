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

Route::get('test/{id}', 'backend\ProductController@AddVariant');

//backend
Route::get('login','backend\LoginController@GetLogin')->name('login.get')->middleware('CheckLogout');
Route::post('login','backend\LoginController@PostLogin');

Route::group(['prefix' => 'admin', 'namespace' => 'backend','middleware'=>'CheckLogin'], function () {
    Route::get('','LoginController@GetIndex')->name('admin.index');
    Route::get('logout','LoginController@Logout')->name('logout');
    Route::get('menu','LoginController@Menu')->name('Menu');
    //category
    Route::group(['prefix' => 'category'], function () {
        Route::get('','CategoryController@GetCategory')->name('category.index');
        Route::post('','CategoryController@PostCategory')->middleware('can:add');
        Route::get('edit/{id}','CategoryController@EditCategory')->name('category.edit')->middleware('can:edit');
        Route::post('edit/{id}','CategoryController@PostEditCategory')->middleware('can:edit');
        Route::get('del/{id}','CategoryController@DelCategory')->name('category.del');
    });
    //product
    Route::group(['prefix' => 'product'], function () {
        // product table
        Route::get('','ProductController@ListProduct')->name('product.index');
        Route::get('add','ProductController@AddProduct')->name('product.add')->middleware('can:add');
        Route::post('add','ProductController@PostProduct')->name('product.addPost')->middleware('can:add');
        Route::get('edit/{id}','ProductController@EditProduct')->name('product.edit')->middleware('can:edit');
        Route::post('edit/{id}','ProductController@PostEditProduct')->name('product.editPost')->middleware('can:edit');
        Route::get('del/{id}','ProductController@DeleteProduct')->name('product.delete');

        // attribute table
        Route::post('add-attr','ProductController@AddAttr')->name('add-attr');
        Route::get('detail-attr','ProductController@DetailAttr')->name('detail-attr');
        Route::get('edit-attr/{id}','ProductController@EditAttr')->name('edit-attr');
        Route::post('edit-attr/{id}','ProductController@EditAttrPost')->name('edit-attr-post');
        Route::get('del-attr/{id}','ProductController@DelAttr')->name('del-attr');
        // value table
        Route::post('add-value','ProductController@AddValue')->name('add-value');
        Route::get('edit-value/','ProductController@EditValue')->name('edit-value');
        Route::post('edit-value/{id}','ProductController@EditValuePost')->name('edit-value-post');
        Route::get('del-value','ProductController@DelValue')->name('del-value');

        Route::get('add-variant/{id}','ProductController@AddVariant')->name('add-variant');
        Route::post('add-variant/{id}','ProductController@PostVariant')->name('postadd-variant');
        Route::get('edit-variant/{id}','ProductController@EditVariant')->name('edit-variant');
        Route::post('edit-variant/{id}','ProductController@PostEditVariant')->name('postedit-variant');
        Route::get('del-variant/{id}','ProductController@DelVariant')->name('del-variant');

    });
    //order
    Route::group(['prefix' => 'order'], function () {
        Route::get('','OrderController@ListOrder')->name('order.index');
        Route::get('detail/{id}','OrderController@DetailOrder')->name('order.detail');
        Route::get('active/{id}','OrderController@ActiveOrder')->name('order.active');
        Route::get('processed','OrderController@Processed')->name('order.processed');
    });
    //user
    Route::group(['prefix' => 'quan-tri','middleware'=>['role:super-admin']], function () {
        Route::get('','UserController@List')->name('user.index');
        Route::get('them-quan-tri','UserController@add')->name('user.add');
        Route::post('them-quan-tri','UserController@addpost');
        Route::get('sua-quan-tri/{id}','UserController@edit')->name('user.edit');
        Route::post('sua-quan-tri/{id}','UserController@editpost');
        Route::get('xoa-quan-tri/{id}','UserController@del')->name('user.del');
        // Gán quyền truy cập
        Route::post('assignPermission/{id}', 'UserController@assign_permission')->name('user.assign_permission');
    });
    //user
    Route::group(['prefix' => 'cau-hinh'], function () {
        Route::get('','SettingController@setting')->name('setting');
        Route::post('','SettingController@settingPost');
    });
});

//frontend
Route::get('','frontend\HomeController@GetHome')->name('site.index');
Route::get('contact','frontend\HomeController@GetContact')->name('site.contact');
Route::get('about','frontend\HomeController@GetAbout')->name('site.about');
Route::group(['prefix' => ''], function () {
    Route::get('danh-sach-san-pham','frontend\ProductController@ListProduct')->name('site.product');
    // Route::get('danh-sach-san-pham-theo-danh-muc/{id}','frontend\ProductController@ListProductCat')->name('site.product.cat');
    Route::get('chi-tiet/{id}','frontend\ProductController@DetailProduct')->name('site.DetailProduct');
    Route::get('addcart','frontend\ProductController@AddCart')->name('site.addcart');
    Route::get('gio-hang','frontend\ProductController@GetCart')->name('site.cart');
    Route::get('removecart/{id}','frontend\ProductController@RemoveCart')->name('site.removecart');
    Route::get('updatecart/{rowid}/{qty}','frontend\ProductController@UpdateCart')->name('site.updatecart');
    Route::get('checkout','frontend\ProductController@CheckOut')->name('site.checkout');
    Route::post('checkout','frontend\ProductController@PostCheckOut')->name('site.postcheckout');
    Route::get('dat-hang-thanh-cong/{id}','frontend\ProductController@complate')->name('site.complate');
});
