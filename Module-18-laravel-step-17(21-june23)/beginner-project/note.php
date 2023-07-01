
/**
 * 7 Step 01 Migration And Databas
*
 */
<!-- create Migration file  -->
php artisan make:migration create_contacts
php artisan make:migration create_experiences
php artisan make:migration create_educations
php artisan make:migration create_skills
php artisan make:migration create_languages
php artisan make:migration create_resumes
php artisan make:migration create_abouts
php artisan make:migration create_projects
php artisan make:migration create_seoproperties
php artisan make:migration create_socials
php artisan make:migration create_heroproperties

php artisan migrate
php artisan migrate:refresh
php artisan migrate:fresh

Schema::create('contacts', function (Blueprint $table) {
    $table->id();
    $table->string('fullName', 100);
    $table->string('email', 50);
    $table->string('phone', 50);
    $table->text('message');
    $table->timestamp('created_at')->useCurrent();
    $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
});

Schema::create('educations', function (Blueprint $table) {
    $table->id();
    $table->string('duration', 50);
    $table->string('title', 50);
    $table->string('designation', 200);
    $table->text('details');
    $table->timestamp('created_at')->useCurrent();
    $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
});
Schema::create('experiences', function (Blueprint $table) {
    $table->id();
    $table->string('duration', 50);
    $table->string('title', 50);
    $table->string('designation', 200);
    $table->text('details');
    $table->timestamp('created_at')->useCurrent();
    $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
});

Schema::create('languages', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->timestamp('created_at')->useCurrent();
    $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
});
Schema::create('resumes', function (Blueprint $table) {
    $table->id();
    $table->string('downloadLink', 100);
    $table->timestamp('created_at')->useCurrent();
    $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
});


/**
 * 8 Step 02 Taking Dummy Data
 * data insert from phpMyAdmin manually
 */

<!-- 9 Step 03 Controller Methods Routes -->

php artisan make:controller 
php artisan make:controller ContactController
php artisan make:controller HomeController
php artisan make:controller ProjectController
php artisan make:controller ResumeController

// Page Routes 
Route::get('/', [HomeController::class, 'page']);
Route::get('/contact', [ContactController::class, 'page']);
Route::get('/projects', [ProjectController::class, 'page']);
Route::get('/resume', [ResumeController::class, 'page']);


// Ajax Call Routes
Route::get('/heroData', [HomeController::class, 'heroData']);
Route::get('/aboutData', [HomeController::class, 'aboutData']);
Route::get('/socialData', [HomeController::class, 'socialData']);
Route::get('/projectsData', [ProjectController::class, 'projectsData']);
Route::get('/experiencesData', [ResumeController::class, 'experiencesData']);
Route::get('/educationData', [ResumeController::class, 'educationData']);
Route::get('/skillsData', [ResumeController::class, 'skillsData']);
Route::get('/languageData', [ResumeController::class, 'languageData']);
Route::post('/contactRequest', [ContactController::class, 'contactRequest']);

Route create and test use postman..


/**
 * 10 Step 04 Query Writings
 */
class HomeController extends Controller
{
    function page(Request $request) {
        return view('pages.home');
    }

    function heroData(Request $request) {
        return DB::table('heroproperties')->get();
    }
    function aboutData(Request $request) {
        return DB::table('abouts')->get();
    }
    function socialData(Request $request) {
        return DB::table('socials')->get();
    }

}


class ContactController extends Controller
{
    function page(Request $request) {
        return view('pages.contact');
    }

    function contactRequest(Request $request) {
        return DB::table('contacts')->insert($request->input());
    }
}

class ProjectController extends Controller
{
    function page(Request $request) {
        return view('pages.projects');
    }

    function projectsData(Request $request) {
        return DB::table('projects')->get();
    }
}

class ResumeController extends Controller
{
    function page(Request $request) {
        return view('pages.resume');
    }

    function resumeLink(Request $request) {
        return DB::table('resumes')->get();
    }
    function experiencesData(Request $request) {
        return DB::table('experiences')->get();
    }
    function educationData(Request $request) {
        return DB::table('educations')->get();
    }
    function skillsData(Request $request) {
        return DB::table('skills')->get();
    }
    function languageData(Request $request) {
        return DB::table('languages')->get();
    }
}


Step 2:
    views file create...
    
