1.Explain what Laravel's query builder is and how it provides a simple and elegant way to interact with databases.
Ans: Laravel's query builder is a feature of the Laravel PHP framework that provides a simple and elegant way to interact with databases. It allows developers to build and execute database queries using a fluent, chainable interface.

2.Write the code to retrieve the "excerpt" and "description" columns from the "posts" table using Laravel's query builder. Store the result in the $posts variable. Print the $posts variable.

Ans:  
$posts = DB::table('posts')
            ->select('excerpt', 'description')
            ->get();

print_r($posts);


3.Describe the purpose of the distinct() method in Laravel's query builder. How is it used in conjunction with the select() method?

Ans: The   distinct()  method in Laravel's query builder is used to retrieve only unique values from a specific column or set of columns in a database table. Its purpose is to eliminate duplicate records and provide a distinct set of values.

4.Write the code to retrieve the first record from the "posts" table where the "id" is 2 using Laravel's query builder. Store the result in the $posts variable. Print the "description" column of the $posts variable.

Ans: 
$posts = DB::table('posts')
            ->where('id', 2)
            ->first();

if ($posts) {
    echo $posts->description;
}

5.Write the code to retrieve the "description" column from the "posts" table where the "id" is 2 using Laravel's query builder. Store the result in the $posts variable. Print the $posts variable.

Ans: 
$posts = DB::table('posts')
            ->where('id', 2)
            ->pluck('description');

print_r($posts);

6.Explain the difference between the first() and find() methods in Laravel's query builder. How are they used to retrieve single records? 

Ans: The first()  and find() methods in Laravel's query builder are used to retrieve single records from a database table, but they differ in how they determine which record to retrieve.

  first() Method: The first() method retrieves the first record that matches the query conditions. It returns a single instance of the model or an associative array if the query builder is used directly.


find() Method: The find() method retrieves a single record based on its primary key value. It expects the primary key value as an argument and returns the corresponding record.



7.Write the code to retrieve the "title" column from the "posts" table using Laravel's query builder. Store the result in the $posts variable. Print the $posts variable.

Ans:
$posts = DB::table('posts')
        	->select('title')
        	->get();

print_r($posts);


8.Write the code to insert a new record into the "posts" table using Laravel's query builder. Set the "title" and "slug" columns to 'X', and the "excerpt" and "description" columns to 'excerpt' and 'description', respectively. Set the "is_published" column to true and the "min_to_read" column to 2. Print the result of the insert operation.

Ans:

$result = DB::table('posts')->insert([
	'title' => 'X',
	'slug' => 'X',
	'excerpt' => 'excerpt',
	'description' => 'description',
	'is_published' => true,
	'min_to_read' => 2,
]);

print_r($result);

9.Write the code to update the "excerpt" and "description" columns of the record with the "id" of 2 in the "posts" table using Laravel's query builder. Set the new values to 'Laravel 10'. Print the number of affected rows.
 
Ans:
$affectedRows = DB::table('posts')
            	->where('id', 2)
            	->update([
                	'excerpt' => 'Laravel 10',
                	'description' => 'Laravel 10',
            	]);

echo "Number of affected rows: " . $affectedRows;

10.Write the code to delete the record with the "id" of 3 from the "posts" table using Laravel's query builder. Print the number of affected rows.

Ans:
$affectedRows = DB::table('posts')
            	->where('id', 3)
            	->delete();

echo "Number of affected rows: " . $affectedRows;

11.Explain the purpose and usage of the aggregate methods count(), sum(), avg(), max(), and min() in Laravel's query builder. Provide an example of each.

Ans: 
the count() method is used to retrieve the number of records that match the specified conditions. It can be used to count all records or apply conditions to count specific records.
The sum() method is used to calculate the sum of a specific column in the table.
The avg() method is used to calculate the average value of a specific column in the table.
The min() method is used to retrieve the minimum value from a specific column in the table.


12.Describe how the whereNot() method is used in Laravel's query builder. Provide an example of its usage.

Ans:
In Laravel's query builder, the whereNot() method is used to add a "WHERE NOT" clause to the query. It allows you to specify a condition that should not be met for the query to include a row in the result set. This method helps you retrieve records that do not match a specific condition.
  example: 
  $users = DB::table('users')
            ->whereNot('status', '=', 'active')
            ->orWhereNot('role', 'admin')
            ->get();


13.Explain the difference between the exists() and doesntExist() methods in Laravel's query builder. How are they used to check the existence of records?

Ans:
1. exists() Method:
The exists() method is used to check if any records exist in the table that match a specified condition. It returns a boolean value, true if at least one record exists, and false otherwise. This method is typically used when you want to determine if there are any records that meet a specific condition.
example: 
$hasActiveUsers = DB::table('users')
                   ->where('status', 'active')
                   ->exists();

2. doesntExist() Method:
The doesntExist() method is the inverse of exists(). It checks if no records exist in the table that match a specified condition. It returns a boolean value, true if no records exist, and false if there is at least one matching record. This method is useful when you want to ensure that no records satisfy a given condition.

$noInactiveUsers = DB::table('users')
                    ->where('status', 'inactive')
                    ->doesntExist();
