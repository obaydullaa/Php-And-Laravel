
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


/**
 * 11 Step 05 Back End Testing
 * testing use postman
 */

 /**
  * 12 Step 6 Blade Component Design
  *
  */

  <!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MR-X</title>
    <link rel="icon" type="image/x-icon" href="{{asset('/favicon.ico')}}" />
    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <script src="{{asset('js/axios.min.js')}}"></script>
</head> 

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">

        @include('components.navbar')
        @include('components.loader')

        <div class="" id="content-div">
            @yield('content')
        </div>

        @include('components.footer')


        <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
 
</html>


/**
 * 3 Step 7 HTML to Blade Conversion
 * html cut and past component
 */


 /**
 * 14 Step 8 Ajax Call
 */

 <!-- contact-form.blade.php  -->
 <script>
    const contactForm = document.getElementById('contactForm');
    contactForm.addEventListener('submit',async (event)=>{
        event.preventDefault();

        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let phone = document.getElementById('phone').value;
        let msg = document.getElementById('message').value;

        if(name.length === 0){
            alert('Name Is Required');
        }else if(email.length === 0){
            alert('Email Is Required');
        }else if(phone.length === 0){
            alert('Phone Is Required');
        } else {
            let fromData = {
                fullName:name,
                email:email,
                phone:phone,
                message:msg,
            }

            let URL="/contactRequest";
            // Loder show content hide
            document.getElementById('loading-div').classList.remove('d-none')
            document.getElementById('content-div').classList.add('d-none')

            let result = await axios.post(URL, fromData);

            // Loder hide content show
            document.getElementById('loading-div').classList.add('d-none')
            document.getElementById('content-div').classList.remove('d-none')


            if(result.status === 200 && result.data ===1){
                alert('Your Request Data has been submitted successfuly.');
                contactForm.reset();
            }else {
                contactForm.alert('Something is wrong..');
            }
        }
    })

</script>

/**
* 15 Step 8 Ajax Call
*/
<!-- project-list.blade.php   -->

<script>
    getProjectList();
    async function getProjectList () {
        let URL="/projectsData"; 

        try{
            
            // Loder show content hide
            document.getElementById('loading-div').classList.remove('d-none')
            document.getElementById('content-div').classList.add('d-none')

            const response = await axios.get(URL);

            // Loder hide content show
            document.getElementById('loading-div').classList.add('d-none')
            document.getElementById('content-div').classList.remove('d-none')

            response.data.forEach((item)=>{
                
                document.getElementById('project-list').innerHTML+=(`<div class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                    <div class="card-body p-0">
                        <div class="d-flex align-items-center">
                            <div class="p-5">
                                <h2 class="fw-bolder">${item['title']}</h2>
                                <p>${item['details']}</p>
                                <a class="text-decoration-none" target="_blank" href="${item['previewLink']}">View Projec</a>
                            </div>
                            <img class="w-100" src="${item['thumbnailLink']}" alt="..." />
                        </div>
                    </div>
                </div>`)
            })
        }catch(error){
            alert(error);
        }
    }

</script>


/**
* 16 Step 8 Ajax Call
* 
*/
<!-- languages.blade.php  -->
<script>
        LanguagesList();
        async function LanguagesList() {
            try {
                let URL="/languageData";
                let response = await axios.get(URL);

                response.data.forEach((item)=>{
                    document.getElementById('skill-list').innerHTML +=(`<div class="col mb-4 mb-md-0">
                                    <div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">${item['name']}</div>
                                </div>`)
                })
            } catch(error) {
                alert(error); 
            }
        }
    </script>

