<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Front\HomeControlle;
use App\Http\Controllers\Web\Front\AboutControlle;
use App\Http\Controllers\Web\Front\ContactControlle;
use App\Http\Controllers\Web\Front\ServiceControlle;
use App\Http\Controllers\Web\Front\PortfolioControlle;
use App\Http\Controllers\Web\Front\BlogControlle;
use App\Http\Controllers\Web\front\CommentController;
use App\Http\Controllers\Web\Dashborad\AboutDashControlle;
use App\Http\Controllers\Web\Dashborad\TeamDashControlle;
use App\Http\Controllers\Web\Dashborad\TestimonialDashControlle;
use App\Http\Controllers\Web\Dashborad\ClientDashControlle;
use App\Http\Controllers\Web\Dashborad\ServiceDashControlle;
use App\Http\Controllers\Web\Dashborad\CategoryDashControlle;
use App\Http\Controllers\Web\Dashborad\PortfolioDashControlle;
use App\Http\Controllers\Web\Dashborad\FaqDashControlle;
use App\Http\Controllers\Web\Dashborad\ContactDashControlle;
use App\Http\Controllers\Web\Dashborad\BlogDashControlle;
use App\Http\Controllers\Web\Dashborad\MediaDashControlle;
use App\Http\Controllers\Web\Dashborad\SectionBlogDashControlle;
use App\Http\Controllers\Web\Dashborad\UserDashControlle;
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
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return redirect()->route('index');
});

Route::prefix('admin')->middleware('auth','isAdmin')->group(function(){
    //dashborad route
    Route::get('/dashborad',function(){
    return view('web.dashborad.welcome.index');
    })->name('dashborad');
    Route::resource('/abouts',AboutDashControlle::class);
    Route::resource('/teams',TeamDashControlle::class);
    Route::resource('/testimonials',TestimonialDashControlle::class);
    Route::resource('/clients',ClientDashControlle::class);
    Route::resource('/services',ServiceDashControlle::class);
    Route::resource('/categories',CategoryDashControlle::class);
    Route::resource('/portfolios',PortfolioDashControlle::class);
    Route::resource('/faqs',FaqDashControlle::class);
    Route::resource('/contacts',ContactDashControlle::class);
    Route::resource('/blogs',BlogDashControlle::class);
    Route::resource('/sectionblogs',SectionBlogDashControlle::class);
    Route::get('/medias',[MediaDashControlle::class,'index']);
    Route::post('/medias',[MediaDashControlle::class,'store']);
    Route::put('/medias/{media}',[MediaDashControlle::class,'update']);
    Route::resource('/users',UserDashControlle::class);
});

Route::get('home',[HomeControlle::class,'index'])->name('index');
//about route
Route::get('about',[AboutControlle::class,'index'])->name('about');
//contact route
Route::get('contact',[ContactControlle::class,'index'])->name('contact');
//service route
Route::get('service',[ServiceControlle::class,'index'])->name('service');
//portfolio route
Route::get('portfolio',[PortfolioControlle::class,'index'])->name('portfolio');
//blog route
Route::get('blog',[BlogControlle::class,'index'])->name('blog');

Route::get('portfolios/{portfolio}',[PortfolioControlle::class,'show']);
Route::get('blogs/{blog}',[BlogControlle::class,'show']);
Route::get('services/{service}',[ServiceControlle::class,'show']);
//contact route
Route::post('contacts',[ContactControlle::class,'store']);



Route::post('/comment/store',[CommentController::class,'store'])->name('comment.add')->middleware('auth');
Route::post('/reply/store', [CommentController::class,'replyStore'])->name('reply.add')->middleware('auth');




// Route::get('abouts',[AboutDashControlle::class,'index']);
// Route::get('abouts/create',[AboutDashControlle::class,'create']);
// Route::post('abouts',[AboutDashControlle::class,'store']);
// Route::get('abouts/{about}/edit',[AboutDashControlle::class,'edit']);
// Route::put('abouts/{about}',[AboutDashControlle::class,'update']);
// Route::delete('abouts/{about}',[AboutDashControlle::class,'destroy']);


// Route::get('teams',[TeamDashControlle::class,'index']);
// Route::get('teams/create',[TeamDashControlle::class,'create']);
// Route::post('teams',[TeamDashControlle::class,'store']);
// Route::get('teams/{team}/edit',[TeamDashControlle::class,'edit']);
// Route::put('teams/{team}',[TeamDashControlle::class,'update']);
// Route::delete('teams/{team}',[TeamDashControlle::class,'destroy']);

// Route::get('testimonials',[TestimonialDashControlle::class,'index']);
// Route::get('testimonials/create',[TestimonialDashControlle::class,'create']);
// Route::post('testimonials',[TestimonialDashControlle::class,'store']);
// Route::get('testimonials/{testimonial}/edit',[TestimonialDashControlle::class,'edit']);
// Route::put('testimonials/{testimonial}',[TestimonialDashControlle::class,'update']);
// Route::delete('testimonials/{testimonial}',[TestimonialDashControlle::class,'destroy']);

// Route::get('clients',[ClientDashControlle::class,'index']);
// Route::get('clients/create',[ClientDashControlle::class,'create']);
// Route::post('clients',[ClientDashControlle::class,'store']);
// Route::get('clients/{client}/edit',[ClientDashControlle::class,'edit']);
// Route::put('clients/{client}',[ClientDashControlle::class,'update']);
// Route::delete('clients/{client}',[ClientDashControlle::class,'destroy']);


// Route::get('services',[ServiceDashControlle::class,'index']);
// Route::get('services/create',[ServiceDashControlle::class,'create']);
// Route::post('services',[ServiceDashControlle::class,'store']);
// Route::get('services/{service}/edit',[ServiceDashControlle::class,'edit']);
// Route::put('services/{service}',[ServiceDashControlle::class,'update']);
// Route::delete('services/{service}',[ServiceDashControlle::class,'destroy']);


// Route::get('categories',[CategoryDashControlle::class,'index']);
// Route::get('categories/create',[CategoryDashControlle::class,'create']);
// Route::post('categories',[CategoryDashControlle::class,'store']);
// Route::get('categories/{category}/edit',[CategoryDashControlle::class,'edit']);
// Route::put('categories/{category}',[CategoryDashControlle::class,'update']);
// Route::delete('categories/{category}',[CategoryDashControlle::class,'destroy']);


// Route::get('portfolios',[PortfolioDashControlle::class,'index']);
// Route::get('portfolios/create',[PortfolioDashControlle::class,'create']);
// Route::post('portfolios',[PortfolioDashControlle::class,'store']);
// Route::get('portfolios/{portfolio}',[PortfolioDashControlle::class,'show']);
// Route::get('portfolios/{portfolio}/edit',[PortfolioDashControlle::class,'edit']);
// Route::put('portfolios/{portfolio}',[PortfolioDashControlle::class,'update']);
// Route::delete('portfolios/{portfolio}',[PortfolioDashControlle::class,'destroy']);


// Route::get('faqs',[FaqDashControlle::class,'index']);
// Route::get('faqs/create',[FaqDashControlle::class,'create']);
// Route::post('faqs',[FaqDashControlle::class,'store']);
// Route::get('faqs/{faq}/edit',[FaqDashControlle::class,'edit']);
// Route::put('faqs/{faq}',[FaqDashControlle::class,'update']);
// Route::delete('faqs/{faq}',[FaqDashControlle::class,'destroy']);


// Route::get('contacts',[ContactDashControlle::class,'index']);
// Route::post('contacts',[ContactDashControlle::class,'store']);
// Route::delete('contacts/{contact}',[ContactDashControlle::class,'destroy']);



// Route::get('blogs',[BlogDashControlle::class,'index']);
// Route::get('blogs/create',[BlogDashControlle::class,'create']);
// Route::post('blogs',[BlogDashControlle::class,'store']);
// Route::get('blogs/{blog}',[BlogDashControlle::class,'show']);
// Route::get('blogs/{blog}/edit',[BlogDashControlle::class,'edit']);
// Route::put('blogs/{blog}',[BlogDashControlle::class,'update']);
// Route::delete('blogs/{blog}',[BlogDashControlle::class,'destroy']);



