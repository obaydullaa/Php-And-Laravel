Question

Write the code to create a new post using Model instance
Set the following attributes:
 - user_id: 1
 - title: "New Post"
 - slug: "new-post"
 - excerpt: "Lorem ipsum"
 - description: "New post description"
 - is_published: true
 - min_to_read: 10

 Ans:
 To create a new post using a Model instance in Laravel.
 Step 1:
 1. Create a new instance of the Post model.
 2. Set the desired attributes on the instance.
 3. Save the instance to persist it in the database.

 use App\Models\Post;

$post = new Post();
$post->user_id = 1;
$post->title = "New Post";
$post->slug = "new-post";
$post->excerpt = "Lorem ipsum";
$post->description = "New post description";
$post->is_published = true;
$post->min_to_read = 10;

$post->save();
