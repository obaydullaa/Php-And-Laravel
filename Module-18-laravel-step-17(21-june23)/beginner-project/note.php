Step 1:

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

php artisan make:controller 
php artisan make:controller ContactController
php artisan make:controller HomeController
php artisan make:controller ProjectController
php artisan make:controller ResumeController