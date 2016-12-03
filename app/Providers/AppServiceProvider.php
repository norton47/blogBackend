<?php

namespace App\Providers;

use Api\App\Contracts\Entities\CommentRepository as CommentInterface;
use Api\App\Contracts\Entities\LikeRepository as LikeInterface;
use Api\App\Contracts\Entities\CategoryRepository as CategoryInterface;
use Api\App\Contracts\Entities\PostRepository as PostInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CommentRepository;
use App\Repositories\LikeRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\Category;
use View;
use App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        App::singleton(\App\Http\Composers\NewCommentsComposer::class);
        View::composer(['vendor.adminlte.layouts.partials.headernotice.news'], \App\Http\Composers\NewCommentsComposer::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // ContentImageInterface to ContentImageRepository
        $this->app->bind(CommentInterface::class, function ($app) {
            return new CommentRepository(new Comment());
        });

        // ContentImageInterface to ContentImageRepository
        $this->app->bind(LikeInterface::class, function ($app) {
            return new LikeRepository(new Like());
        });

        // ContentImageInterface to ContentImageRepository
        $this->app->bind(PostInterface::class, function ($app) {
            return new PostRepository(new Post());
        });

        // ContentImageInterface to ContentImageRepository
        $this->app->bind(CategoryInterface::class, function ($app) {
            return new CategoryRepository(new Category());
        });

    }
}
