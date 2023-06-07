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