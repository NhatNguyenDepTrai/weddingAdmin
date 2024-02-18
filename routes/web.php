<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\LinkController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\CategoryProjectController;
use App\Http\Controllers\ProjectVideoController;
use App\Http\Controllers\ProjectImageController;
use App\Http\Controllers\VinawebappController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ChatGPTController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryBlogController;
use App\Http\Controllers\BlogTagController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\ContactController;
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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::post('/generate-content', [ChatGPTController::class, 'AskToChatGpt']);
    Route::post('/ckediter-uploads-file', [FileController::class, 'ckediterUploadsImage']);
    Route::post('/change-status', [VinawebappController::class, 'changeStatus']);
    Route::post('/change-highlight', [VinawebappController::class, 'changeHighlight']);
    Route::post('/delete-items', [VinawebappController::class, 'deleteItems']);
    Route::post('/restore-items', [VinawebappController::class, 'restoreItems']);
    Route::post('/change-ord', [VinawebappController::class, 'changeORD']);
    Route::post('/get-data-district/{id}', [VinawebappController::class, 'getDataDistrict']);
    Route::post('/get-data-ward/{id}', [VinawebappController::class, 'getDataWard']);
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    // start Company
    Route::prefix('company')->group(function () {
        Route::get('', [CompanyController::class, 'showCompany'])->name('Company');
        Route::post('', [CompanyController::class, 'UpdateCompany']);
    });
    // end Company
    // start  Process
    Route::prefix('process')->group(function () {
        Route::get('', [ProcessController::class, 'showIndex'])->name('Process');
        Route::post('load-data-table', [ProcessController::class, 'loadDataTable']);
        Route::get('/create', function () {
            return Inertia::render('Process/Create');
        })->name('Process.create');
        Route::post('/create', [ProcessController::class, 'create']);

        Route::get('/edit/{id}', [ProcessController::class, 'showEdit'])->name('Process.edit');
        Route::post('/edit/{id}', [ProcessController::class, 'update']);
    });
    // end  Process

    // start links
    Route::prefix('link')->group(function () {
        Route::get('', [LinkController::class, 'showIndex'])->name('Link');
        Route::post('load-data-table', [LinkController::class, 'loadDataTable']);
        Route::get('/create', function () {
            return Inertia::render('Link/Create');
        })->name('LinkCreate');
        Route::post('/create', [LinkController::class, 'create']);

        Route::get('/edit/{id}', [LinkController::class, 'showEdit'])->name('LinkEdit');
        Route::post('/edit/{id}', [LinkController::class, 'update']);
    });
    // end links

    // start  Contact
    Route::prefix('contact')->group(function () {
        Route::get('', [ContactController::class, 'showIndex'])->name('Contact');
        Route::post('load-data-table', [ContactController::class, 'loadDataTable']);
        Route::get('/create', function () {
            return Inertia::render('Contact/Create');
        })->name('Contact.create');
        Route::post('/create', [ContactController::class, 'create']);

        Route::get('/edit/{id}', [ContactController::class, 'showEdit'])->name('Contact.edit');
        Route::post('/edit/{id}', [ContactController::class, 'update']);
    });
    // end  Contact

    // start Category Project
    Route::prefix('category-project')->group(function () {
        Route::get('', [CategoryProjectController::class, 'showIndex'])->name('CategoryProject');
        Route::post('load-data-table', [CategoryProjectController::class, 'loadDataTable']);

        Route::get('/trash', [CategoryProjectController::class, 'showTrash'])->name('CategoryProjectTrash');
        Route::get('/create', function () {
            return Inertia::render('CategoryProject/Create');
        })->name('CategoryProjectCreate');
        Route::post('/create', [CategoryProjectController::class, 'create']);

        Route::get('/edit/{id}', [CategoryProjectController::class, 'showEdit'])->name('CategoryProjectEdit');
        Route::post('/edit/{id}', [CategoryProjectController::class, 'updateCategoryProject']);
    });
    // end Category Project
    // start  Project Video
    Route::prefix('project-video')->group(function () {
        Route::get('', [ProjectVideoController::class, 'showIndex'])->name('ProjectVideo');
        Route::post('load-all-data-category-project', [ProjectVideoController::class, 'loadAllDataCategoryProject']);
        Route::post('load-data-table', [ProjectVideoController::class, 'loadDataTable']);
        Route::get('/trash', [ProjectVideoController::class, 'showTrash'])->name('ProjectVideo.trash');
        Route::get('/create', function () {
            return Inertia::render('ProjectVideo/Create');
        })->name('ProjectVideo.create');

        Route::post('/create', [ProjectVideoController::class, 'create']);

        Route::get('/edit/{id}', [ProjectVideoController::class, 'showEdit'])->name('ProjectVideo.edit');
        Route::post('/edit/{id}', [ProjectVideoController::class, 'update']);
    });
    // end  Project Video

    // start  Project Image
    Route::prefix('project-image')->group(function () {
        Route::get('', [ProjectImageController::class, 'showIndex'])->name('ProjectImage');
        Route::post('load-all-data-category-project', [ProjectImageController::class, 'loadAllDataCategoryProject']);
        Route::post('load-data-table', [ProjectImageController::class, 'loadDataTable']);
        Route::get('/trash', [ProjectImageController::class, 'showTrash'])->name('ProjectImage.trash');
        Route::get('/create', function () {
            return Inertia::render('ProjectImage/Create');
        })->name('ProjectImage.create');
        Route::post('/create', [ProjectImageController::class, 'create']);
        Route::get('/edit/{id}', [ProjectImageController::class, 'showEdit'])->name('ProjectImage.edit');
        Route::post('/edit/{id}', [ProjectImageController::class, 'update']);
    });
    // end  Project Image

    Route::prefix('brand')->group(function () {
        Route::get('', [BrandController::class, 'showIndex'])->name('Brand');
        Route::post('load-data-table', [BrandController::class, 'loadDataTable']);
        Route::get('/trash', [BrandController::class, 'showTrash'])->name('Brand.trash');
        Route::get('/create', function () {
            return Inertia::render('Brand/Create');
        })->name('Brand.create');

        Route::post('/create', [BrandController::class, 'create']);

        Route::get('/edit/{id}', [BrandController::class, 'showEdit'])->name('Brand.edit');
        Route::post('/edit/{id}', [BrandController::class, 'update']);
    });

    // start  category blogs
    Route::prefix('category-blog')->group(function () {
        Route::get('', [CategoryBlogController::class, 'showIndex'])->name('CategoryBlog');
        Route::post('load-data-table', [CategoryBlogController::class, 'loadDataTable']);

        Route::get('/trash', [CategoryBlogController::class, 'showTrash'])->name('CategoryBlogTrash');
        Route::get('/create', function () {
            return Inertia::render('CategoryBlog/Create');
        })->name('CategoryBlogCreate');
        Route::post('/create', [CategoryBlogController::class, 'create']);

        Route::get('/edit/{id}', [CategoryBlogController::class, 'showEdit'])->name('CategoryBlogEdit');
        Route::post('/edit/{id}', [CategoryBlogController::class, 'update']);
    });
    // end category blogs
    // start blog tags
    Route::prefix('tag-blog')->group(function () {
        Route::get('', [BlogTagController::class, 'showIndex'])->name('BlogTag');
        Route::post('load-data-table', [BlogTagController::class, 'loadDataTable']);
        Route::get('/create', function () {
            return Inertia::render('BlogTag/Create');
        })->name('BlogTagCreate');
        Route::post('/create', [BlogTagController::class, 'create']);

        Route::get('/edit/{id}', [BlogTagController::class, 'showEdit'])->name('BlogTagEdit');
        Route::post('/edit/{id}', [BlogTagController::class, 'update']);
    });
    // end blog tags

    // start  Blogs
    Route::prefix('blog')->group(function () {
        Route::get('', [BlogController::class, 'showIndex'])->name('Blog');
        Route::post('load-all-data-category-blog', [BlogController::class, 'loadDataTable']);
        Route::post('load-data-table', [BlogController::class, 'loadDataTable']);
        Route::get('/trash', [BlogController::class, 'showTrash'])->name('Blog.trash');
        Route::get('create', [BlogController::class, 'showCreate'])->name('Blog.create');

        Route::post('/create', [BlogController::class, 'create']);

        Route::get('/edit/{id}', [BlogController::class, 'showEdit'])->name('Blog.edit');
        Route::post('/edit/{id}', [BlogController::class, 'update']);
    });
    // end  Blogs
});
