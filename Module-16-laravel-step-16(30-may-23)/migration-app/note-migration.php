/**
* 46 [Migration] Working With Column Types
*/

//2023_06_06_175214_create_profiles.php

public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('is_bangladesh');
            $table->bigInteger('vote');
            $table->binary('photo');
            $table->char('name', length: 50);
            $table->dateTime('voting__date_time');
            $table->double('population');
            $table->enum('group', ['A', 'B']);
        }); 
    }  

/**
* 47 [Migration] Working With Column Types
*/

public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->float('dollar');
            $table->geometryCollection('positions');
            $table->geometry('positions_2');
            $table->integer('populations');
            $table->ipAddress('visitor');
            $table->json('user_details');
            $table->longText('blog_post');
        });
    }

    php artisan migrate:refresh

/**
* 48 [Migration] Working With Column Types
*/

/**
* 49 [Migration] Exploring Column Attributes
* Exploring column attributes study
*/

/**
* 50 [Migration] Working With Column Attributes
*/


/**
* 51 [Migration] Working With Column Attributes
*/


/**
* 52 [Migration] Rename and Drop Table
* command for migration
*
*
*/

php artisan make:migration rename_profiles

public function up(): void
    {
        Schema::rename('profiles', 'new_profiles');
    }

php artisan migrate

php artisan make:migration drop_new_profiles_table 

public function up(): void
    {
        Schema::dropIfExists('new_profiles');
    }

    php artisan migrate









