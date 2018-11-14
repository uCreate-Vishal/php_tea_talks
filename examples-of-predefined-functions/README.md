
# Examples of pre-defined functions

These are code examples taken from laravel documentation. *Please note* that some of the suggested solutions were not tested on project, only in sandbox, so there's a very small chance that something is missing - usually something only someone with in-depth knowledge of the particular project might notice. But in general it should just work.

<hr>

###  Increments and Decrements

<hr>

**CODE:**
```Instead of this:

$article = Article::find($article_id);
$article->read_count++;
$article->save();

We can do this:
$article = Article::find($article_id);
$article->increment('read_count');

Also these will work:
Article::find($article_id)->increment('read_count');
Article::find($article_id)->increment('read_count', 10); // +10
Product::find($produce_id)->decrement('stock'); // -1
```

<div align="right">
    <b><a href="#top">↥ back to top</a></b>
</div>

<hr>

###  Eloquent::when() – no more if-else’s

<hr>

**CODE:**
```Many of us write conditional queries with “if-else”, something like this:

if (request('filter_by') == 'likes') {
   $query->where('likes', '>', request('likes_amount', 0));
}
if (request('filter_by') == 'date') {
   $query->orderBy('created_at', request('ordering_rule', 'desc'));
}
----------------------------------------------------------------

But there’s a better way – to use when():

$query = Author::query();
$query->when(request('filter_by') == 'likes', function ($q) {
   return $q->where('likes', '>', request('likes_amount', 0));
});
$query->when(request('filter_by') == 'date', function ($q) {
   return $q->orderBy('created_at', request('ordering_rule', 'desc'));
});
It may not feel shorter or more elegant, but the most powerful is passing of the parameters:
---------------------------------------------------------------------------------------------

$query = User::query();
$query->when(request('role', false), function ($q, $role) {
   return $q->where('role_id', $role);
});
$authors = $query->get();
```


<div align="right">
    <b><a href="#top">↥ back to top</a></b>
</div>

<hr>

###  Transform brackets into an Eloquent query

<hr>

**CODE:**
```What if you have and-or mix in your SQL query, like this:

WHERE (gender = 'Male' and age >= 18) or (gender = 'Female' and age >= 65)

----------------------------------------------------------------

How to translate it into Eloquent?

This is the wrong way:
$q->where('gender', 'Male');
$q->orWhere('age', '>=', 18);
$q->where('gender', 'Female');
$q->orWhere('age', '>=', 65);
The order will be incorrect.

This is fine..
$q->where('gender', 'Male')->where('age', '>=', 18);
$q->orWhere('gender', 'Female')->where('age', '>=', 65);
But there’s a better way
-----------------------------------------------------------------
The right way is a little more complicated, using closure functions as sub-queries:

$q->where(function ($query) {
   $query->where('gender', 'Male')
       ->where('age', '>=', 18);
})->orWhere(function($query) {
   $query->where('gender', 'Female')
       ->where('age', '>=', 65);
})
```


<div align="right">
    <b><a href="#top">↥ back to top</a></b>
</div>

<hr>

###  Eloquent has quite a few functions that combine two methods, like “please do X, otherwise do Y”.

<hr>

**CODE:**
```Like:  firstOrCreate():

Instead of:
$user = User::where('email', $email)->first();
if (!$user) {
 User::create([
   'email' => $email
 ]);
}

Do just this:
$user = User::firstOrCreate(['email' => $email]);
```


<div align="right">
    <b><a href="#top">↥ back to top</a></b>
</div>

<hr>

###  Find multiple entries

<hr>

**CODE:**
```1. *find()*
Everyone knows the find() method, right?

$user = User::find(1);

I’m quite surprised how few people know about that it can accept multiple IDs as an array:
$users = User::find([1,2,3]);

--------------------------------------------------------

2. *WhereX*
There’s an elegant way to turn this:

$users = User::where('approved', 1)->get();
Into this:

$users = User::whereApproved(1)->get();

Yes, you can change the name of any field and append it as a suffix to “where” and it will work by magic.

-----------------------------------------------------------

Also, there are some pre-defined methods in Eloquent, related to date/time:

User::whereDate('created_at', date('Y-m-d'));
User::whereDay('created_at', date('d'));
User::whereMonth('created_at', date('m'));
User::whereYear('created_at', date('Y'));
```


<div align="right">
    <b><a href="#top">↥ back to top</a></b>
</div>

<hr>

###  BelongsTo Default Models

<hr>

**CODE:**
```Let’s say you have Post belonging to Author and then Blade code:

{{ $post->author->name }}

But what if the author is deleted, or isn’t set for some reason?
You will get an error, something like “property of non-object”.

Of course, you can prevent it like this:

{{ $post->author->name ?? '' }}
---------------------------------------------------------

But you can do it on Eloquent relationship level:

public function author()
{
   return $this->belongsTo('App\Author')->withDefault();
}
In this example, the author() relation will return an empty App\Author model if no author is attached to the post.

Furthermore, we can assign default property values to that default model.

public function author()
{
   return $this->belongsTo('App\Author')->withDefault([
       'name' => 'Guest Author'
   ]);
}
```


<div align="right">
    <b><a href="#top">↥ back to top</a></b>
</div>

<hr>
