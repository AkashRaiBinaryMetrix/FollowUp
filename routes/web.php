<?php
use App\Http\Controllers\Admin\Banners;

use App\Http\Controllers\Admin\Common;

use App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Admin\Backofficedashboard;

use App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Admin\Login;

use App\Http\Controllers\User\SignUp;

use App\Http\Controllers\User\InspirationalFeed;

use App\Http\Controllers\User\AfterLogin;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Events;

use App\Http\Controllers\Admin\CMSPage;

use App\Http\Controllers\User\Home;

use App\Http\Controllers\User\MyProfile;

use App\Http\Controllers\Admin\TestimonialPage;

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

/*--------------------------------------- user routes ----------------------*/

Route::get('/', [Login::class, 'index']);

Route::get('sign-up', [SignUp::class, 'register']);

Route::get('blog', [SignUp::class, 'blog']);

Route::any('getstatemaster', [SignUp::class, 'getstatemaster'])->name('getstatemaster');

Route::any('getcitymaster', [SignUp::class, 'getcitymaster'])->name('getcitymaster');

Route::get('blog-detail/{id}', [Signup::class, 'blogDetail']);

Route::get('properties-management', [SignUp::class, 'propertiesManagement']);

Route::get('about-us', [SignUp::class, 'aboutUs']);

Route::get('House-in-Dominican-Republic', [SignUp::class, 'HouseinDominicanRepublic']);

Route::get('sale-property-list', [SignUp::class, 'salePropertyList']);

Route::get('buy-rent-property-list', [SignUp::class, 'buyRentPropertyList']);

Route::get('terms-and-conditions', [SignUp::class, 'termsandconditions']);

Route::get('privacy-policy', [SignUp::class, 'privacyPolicy']);

Route::get('contact-us', [SignUp::class, 'contactUs']);

Route::post('contact-process', [SignUp::class, 'contactProcess'])->name('contact.process');

Route::post('signIn', [SignUp::class, 'signIn']);

Route::get('login', [SignUp::class, 'login']);

Route::post('login', [SignUp::class, 'login']);

Route::get('forgot-password', [SignUp::class, 'forgotPassword']);

Route::post('forgot-password', [SignUp::class, 'forgotPassword']);

Route::get('auth-google', [SignUp::class, 'redirectToGoogle']);

Route::get('auth-google-callback', [SignUp::class, 'handleGoogleCallback']);

Route::get('user-logout', [SignUp::class, 'userLogout']);

Route::get('testimony', [Home::class, 'spiritualTestimony']);

Route::get('holy-spirit', [Home::class, 'powerOfHolySpirit']);

Route::get('tips', [Home::class, 'godLuvTips']);

Route::get('give', [Home::class, 'give']);

Route::post('signup-process', [SignUp::class, 'signupProcess'])->name('signup.process');

Route::get('auth-facebook', [SignUp::class, 'redirectToFB']);

Route::get('auth-facebook-callback', [SignUp::class, 'handleFacebookCallback']);

Route::get('auth-instagram', [SignUp::class, 'redirectToInsta']);

Route::get('auth-instagram-callback', [SignUp::class, 'handleInstagramCallback']);

Route::post('feedImageUpload', [AfterLogin::class, 'feedImageUpload'])->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

///
Route::post('search-query', [SignUp::class, 'searchQuery'])->name('search.query');

Route::post('search-queryfilters', [SignUp::class, 'searchQueryFilters'])->name('search.queryfilters');

Route::any('agents-list', [SignUp::class, 'agentsLists'])->name('agents.list');

Route::any('view-agent-detail/{id}', [SignUp::class, 'viewAgentDetail']);

Route::any('view-generaluser-profile/{id}', [SignUp::class, 'viewGeneralUserDetail']);

Route::group(['middleware' => 'auth_user'],function () {

    Route::post('savereview', [AfterLogin::class, 'saveReview'])->name('savereview');

    Route::post('followunfollow', [AfterLogin::class, 'followUnfollow'])->name("followunfollow");

    Route::post('user-makeprocesspayment', [AfterLogin::class, 'makeProcessPayment'])->name('user.makeprocesspayment');

    Route::post('user-makeotherpayment', [AfterLogin::class, 'makeOtherPayment'])->name('user.makeotherpayment');

    Route::post('user_paypal_form',[AfterLogin::class,'userpaypalform'])->name('user.userpaypalform');

    Route::post('user_monocash_form.',[AfterLogin::class,'usermonocashform'])->name('user.usermonocashform');


    Route::post('user-makeprocesspaymentccmethod', [AfterLogin::class, 'makeprocesspaymentccmethod'])->name('user.makeprocesspaymentccmethod');

    Route::any('getandsetpaypalresponsecancel', [AfterLogin::class, 'getAndSetPaypalResponseCancel']);

    Route::any('getandsetpaypalresponsereturn', [AfterLogin::class, 'getAndSetPaypalResponseReturn']);

    Route::any('savemoncashthankyou', [AfterLogin::class, 'savemoncashthankyou']);

    Route::any('ipnverify', [AfterLogin::class, 'ipnVerify']);

    Route::get('get-paypal-paymentdetails', [AfterLogin::class, 'getPaypalPaymentDetails']);

    Route::post('user-usersendmessage', [AfterLogin::class, 'userSendmessageProcess'])->name('user.usersendmessage');

    Route::post('user-edit-propertyprocess', [AfterLogin::class, 'userEditPropertyProcess'])->name('user.usereditpropertyprocess');

    Route::post('user-edit-addlistingprocess', [AfterLogin::class, 'userEditaddlistingProcess'])->name('user.usereditaddlistingprocess');

    Route::post('property-detail-enquiry', [AfterLogin::class, 'propertyDetailEnquiry'])->name('property.detail.enquiry');

    Route::post('update-process', [AfterLogin::class, 'updateProcess'])->name('update.process');

    Route::post('update-becomeagentprocess', [AfterLogin::class, 'updateBecomeAgentProcess'])->name('update.becomeagentprocess');

    Route::post('user-listnewpropertyprocess', [AfterLogin::class, 'listNewPropertyProcess'])->name('user.listnewpropertyprocess');

    Route::post('user-listnewaddprocess', [AfterLogin::class, 'listNewaddProcess'])->name('user.listnewaddprocess');

    Route::post('user-createanaddprocess', [AfterLogin::class, 'createanaddProcess'])->name('user.createanaddprocess');

    Route::post('uploadprofile', [AfterLogin::class, 'uploadprofileProcess'])->name('uploadprofile');

    Route::post('deleteUserProperty', [AfterLogin::class, 'deleteUserProperty'])->name('deleteUserProperty');

    Route::post('deleteUserAddlisting', [AfterLogin::class, 'deleteUserAddlisting'])->name('deleteUserAddlisting');

    Route::post('deleteAnnouncement', [AfterLogin::class, 'deleteAnnouncement'])->name('deleteAnnouncement');

    Route::post('addToWishList', [AfterLogin::class, 'addToWishList'])->name('addToWishList');

    Route::post('removeFromWishList', [AfterLogin::class, 'removeFromWishList'])->name('removeFromWishList');

    Route::post('removeaddFromWishList', [AfterLogin::class, 'removeaddFromWishList'])->name('removeaddFromWishList');

    Route::post('AddFromWishList', [AfterLogin::class, 'AddFromWishList'])->name('AddFromWishList');

    Route::post('getChatHistory', [AfterLogin::class, 'getChatHistory'])->name('getChatHistory');

    Route::post('getChatHistoryButton', [AfterLogin::class, 'getChatHistoryButton'])->name('getChatHistoryButton');

    Route::post('saveMessageReply', [AfterLogin::class, 'saveMessageReply'])->name('saveMessageReply');

    Route::post('deleteUserPropertyImageById', [AfterLogin::class, 'deleteUserPropertyImageById'])->name('deleteUserPropertyImageById');

    Route::post('deleteUserAddlistingImageById', [AfterLogin::class, 'deleteUserAddlistingImageById'])->name('deleteUserAddlistingImageById');

    Route::get('user-dashboard',[AfterLogin::class,'index']);

    Route::get('changepassword',[AfterLogin::class,'changepassword']);
    
    Route::get('myreview',[AfterLogin::class,'myreview']);

    Route::get('manageannouncement',[AfterLogin::class,'manageannouncement']);

    Route::post('addAnnouncement',[AfterLogin::class,'addAnnouncement']);
    
    Route::post('changepasswordprocess',[AfterLogin::class,'changepasswordprocess'])->name('changepasswordprocess');
    
    Route::get('user-becomeanagent',[AfterLogin::class,'userBecomeAgent']);

    Route::get('user-listnewproperty',[AfterLogin::class,'userListNewProperty']);

    Route::get('user-listnewadd',[AfterLogin::class,'userListNewadd']);

    Route::get('user-createanadd',[AfterLogin::class,'usercreateanadd']);

    Route::get('user-myproperty',[AfterLogin::class,'userMyProperty']);

    Route::get('user-addlisting',[AfterLogin::class,'useraddlisting']);

    Route::get('user-paypal_form',[AfterLogin::class,'userpaypalform']);

    Route::get('saved-myproperty',[AfterLogin::class,'savedMyProperty']);

    Route::get('saved-add',[AfterLogin::class, 'savedadd']);

    Route::get('delete-add',[AfterLogin::class, 'deleteadd']);

    Route::get('messagelist',[AfterLogin::class,'messageList']);

    Route::get('subscription',[AfterLogin::class,'subscription']);

    Route::get('make_payment',[AfterLogin::class,'make_payment']);

    Route::any('subscription',[AfterLogin::class,'subscription']);
    
    Route::get('inspirational-feed',[InspirationalFeed::class,'index']);

    Route::post('createGroup',[InspirationalFeed::class,'createGroup']);

    Route::post('hideEventOrReport',[InspirationalFeed::class,'hideEventOrReport']);

    Route::post('fellingSearch', [InspirationalFeed::class, 'fellingSearch']);

    Route::post('activitySearch', [InspirationalFeed::class, 'activitySearch']);

    Route::post('createInspirationalFeedPost', [InspirationalFeed::class, 'createInspirationalFeedPost']);

    Route::post('createInspirationalFeedTestimony', [InspirationalFeed::class, 'createInspirationalFeedTestimony']);

    Route::post('hideInspirationalFeed', [InspirationalFeed::class, 'hideInspirationalFeed']);

    Route::post('likePost', [InspirationalFeed::class, 'likePost']);

    Route::post('sharePostOnTimeLine', [InspirationalFeed::class, 'sharePostOnTimeLine']);

    Route::post('commentOnPost', [InspirationalFeed::class, 'commentOnPost']);

    Route::post('likeComment', [InspirationalFeed::class, 'likeComment']);

    Route::post('replyOnComment', [InspirationalFeed::class, 'replyOnComment']);

    Route::get('events-list', [Home::class, 'eventsList']);

    Route::get('event-detail/{id}', [Home::class, 'eventDetail']);

    Route::post('showInterestInEvent', [Home::class, 'showInterestInEvent']);

    Route::post('isUserGoingInEvent', [Home::class, 'isUserGoingInEvent']);

    Route::get('groups-list', [Home::class, 'groupsList']);

    Route::get('discover-groups-list', [Home::class, 'discoverGroupsList']);

    Route::get('group-detail/{id}', [Home::class, 'groupDetail']);

    Route::get('edit-user-property/{id}', [Afterlogin::class, 'editUserProperty']);
    
    Route::get('view-user-property/{id}', [Afterlogin::class, 'viewUserProperty']);

    Route::get('edit-user-addlisting/{id}', [Afterlogin::class, 'editUseraddlisting']);

    Route::get('view-user-addlisting/{id}', [Afterlogin::class, 'viewUseraddlisting']);

    Route::post('joinGroup', [Home::class, 'joinGroup']);

    Route::get('profile', [MyProfile::class, 'index']);

    Route::post('profile', [MyProfile::class, 'index']);
});

/*--------------------------------------- user routes ----------------------*/

Route::get('search_city_property/{id}', [Signup::class, 'searchCityProperty']);

/*------------------------------admin route ---------------------------*/

Route::get('/pwd', [Login::class, 'pwd']);

Route::get('/admin', [Login::class, 'index']);

Route::post('/admin', [Login::class, 'index']);

Route::get('/admin/forgot-password', [Login::class, 'forgotPassword']);

Route::post('/admin/forgot-password', [Login::class, 'forgotPassword']);

Route::get('/admin/logout', [Login::class, 'logout']);


//
Route::get('/backoffice', [Login::class, 'associateLogin']);

Route::post('/backoffice', [Login::class, 'associateLogin']);

Route::group(['middleware' => 'auth_backoffice'], function () {
  Route::get('/backoffice/dashboard', [Backofficedashboard::class, 'index']);
});
//




Route::group(['middleware' => 'auth_admin'], function () {

Route::get('/admin/dashboard', [Dashboard::class, 'index']);



     /*------------------ common route ----------------*/

       Route::post('/admin/changeStatus', [Common::class, 'changeStatus']);

       Route::post('/admin/delete', [Common::class, 'delete']);

      Route::post('/admin/delete', [Common::class, 'delete']);

      Route::post('/admin/deleteHouseRule', [Users::class, 'deleteHouseRule']); 

     /*------------------ common route ----------------*/

    /*------------------- user route ------------------*/

      Route::get('/admin/users-list', [Users::class, 'index']);

      Route::get('/admin/propertyenquiry-list', [Users::class, 'propertyEnquiry']);

      Route::get('/admin/agent-list', [Users::class, 'agentEnquiry']);

      Route::get('/admin/contact-list', [Users::class, 'contactEnquiry']);

      Route::get('/admin/create-blog', [Users::class, 'createBlog']);
      
      Route::get('/admin/create-sociallinks', [Users::class, 'createSocialLinks']);

      Route::post('/admin/create-blog-process', [Users::class, 'createBlogProcess']);

      //
      Route::post('/admin/save-users-list', [Users::class, 'saveUsersList']);

      

      

      Route::post('/admin/create-houserule-process', [Users::class, 'createHouseRuleProcess']);

      Route::post('/admin/create-sociallinks-process', [Users::class, 'createSocialLinksProcess']);

      Route::get('/admin/manage-houserules', [Users::class, 'manageHouseRules']);

      Route::get('/admin/manage-cms', [Users::class, 'manageCms']);

      Route::get('/admin/manage-testimonial', [Users::class, 'manageTestimonial']);

      Route::post('/admin/deleteTestimonial', [TestimonialPage::class, 'deleteTestimonial'])->name('deleteTestimonial');

      Route::get('/admin/fetchUserData', [Users::class, 'fetchUserData']);

      Route::post('/admin/update-cms-process', [Users::class, 'updateCmsProcess']);

    /*------------------- user route ------------------*/


    /*------------------- events route ------------------*/

    Route::get('/admin/events-list', [Events::class, 'index']);

    Route::get('/admin/add-event', [Events::class, 'addEvent']);

    Route::post('/admin/addUpdateEvent', [Events::class, 'addUpdateEvent']);

    Route::any('/admin/edit-event/{id}', [Events::class, 'editEvent']);

    Route::any('/admin/fetchEventsData', [Events::class, 'fetchEventsData']);

   /*------------------- events route ------------------*/

    /*------------------- cms page route ------------------*/

    Route::get('/admin/cms-page-list', [CMSPage::class, 'index']);

    Route::get('/admin/add-cms-page', [CMSPage::class, 'addCMSPage']);

    Route::post('/admin/addUpdateCMSPage', [CMSPage::class, 'addUpdateCMSPage']);

    Route::any('/admin/edit-cms-page/{id}', [CMSPage::class, 'editCMSPage']);

    Route::any('/admin/fetchCMSPageData', [CMSPage::class, 'fetchCMSPageData']);

    //Route::get('/upload_image_cke', [CMSPage::class, 'upload_image_cke']);

    Route::post('/ckeditor/upload', [CMSPage::class, 'upload_image_cke'])->name('ckeditor.upload');

    Route::post('/admin/addUpdateTestimonialPage', [TestimonialPage::class, 'addUpdateTestimonialPage']);

    Route::any('/admin/testimonialedit/{id}', [TestimonialPage::class, 'testimonialedit']);

   /*------------------- cms page route ------------------*/

   /*------------------- banners route ------------------*/

   Route::get('/admin/banners-list', [Banners::class, 'index']);

   Route::get('/admin/add-banner', [Banners::class, 'addBanner']);

   Route::post('/admin/addUpdateBanner', [Banners::class, 'addUpdateBanner']);

   Route::any('/admin/edit-banner/{id}', [Banners::class, 'editBanner']);

   Route::any('/admin/fetchBannersData', [Banners::class, 'fetchBannersData']);

  /*------------------- banners route ------------------*/

});

/*------------------------------admin route ---------------------------*/