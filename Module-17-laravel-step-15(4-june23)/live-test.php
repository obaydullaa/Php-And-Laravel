
<!-- Insert multiple records into the "posts" table using Laravel's query builder. If a record with the same "title" or "slug" already exists, ignore the insertion.

Use the "insertOrIgnore()" method. Print the result of the insert operation. -->


$posts = [
    ['title' => 'First Post', 'slug' => 'first-post', 'content' => 'This is Our Demo Post..'],
    ['title' => 'Second Post', 'slug' => 'second-post', 'content' => 'This is Our Demo Post..'],
    ['title' => 'Third Post', 'slug' => 'third-post', 'content' => 'This is Our Demo Post..'],
];

$result = DB::table('posts')->insertOrIgnore($posts);

print_r($result);
