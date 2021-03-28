laravel 中 with(), has(), whereHas() 方法的区别

* with() 方法是 “渴求式加载” 的, 伴随着主要模型 预加载出确切的关联关系, 缓解了 N+1 的问题,
例如:User return $this->hasMany(Post::class);

$users = User::with('post')->get();
foreach ($users as $user) {
    $user->post;
}

* has() 方法是基于关联关系去过滤模型的查询结果, 所以他的作用和 where 条件非常相似, 如果你只使用 has('post'), 这表示你只想得到这个模型, 这个模型至少存在一个 post 的关联关系.
例如:  User return $this->hasMany(Post::class)

$users = User::has('post')->get();
还可以构造嵌套 has 语句
$users = User::has('post.votes', '>', '3')->get();

* whereHas 方法的原理基本和 has() 方法相同, 但是他允许你自己添加对这个模型的过滤条件.
例如: User return $this->hasMany(Post::class)

$users = User::whereHas('posts', function ($query) {
	$query->where('created_at', '>=', now());
})->get();
