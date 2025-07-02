<?php

namespace Database\Seeders;

use App\Models\category;
use App\Models\PostWithDb;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::factory()->create([
        //     'name' => "John Doe"
        // ]);


        // PostWithDb::factory(3)->create([
        //     'user_id' => $user->id      //------------->here 1 demouser having 5 posts are created
        // ]);

        PostWithDb::factory(20)->create();  // ----it creates 5 number of posts 

        // $user = User::factory()->create();

        // $personal = category::create([
        //     "name" => "Personal",
        //     "slug" => "Personal"
        // ]);
        // $work = category::create([
        //     "name" => "work",
        //     "slug" => "work"
        // ]);
        // $family = category::create([
        //     "name" => "Family",
        //     "slug" => "Family"
        // ]);
        // postwithdb::create([
        //     'category_id' => $personal->id,
        //     'user_id' => $user->id,
        //     'slug' => 'laravel-eloquent-basics',
        //     'title' => 'Laravel Eloquent Basics',
        //     'excerpt' => '<p>Learn the fundamentals of Eloquent ORM in Laravel.</p>',
        //     'body' => '<p>Eloquent provides a beautiful, simple ActiveRecord implementation for working with your database. It is an ORM (Object-Relational Mapper) that helps you interact with your database tables using PHP models. In this article, we will cover the basics of Eloquent including how to define models, query the database, and work with relationships between tables. Whether you are building a simple application or a complex one, understanding how Eloquent works will make it easier to manage your database interactions.</p>',
        //     'date' => now(),
        // ]);

        // postwithdb::create([
        //     'category_id' => $work->id,
        //     'user_id' => $user->id,
        //     'slug' => 'advanced-relationships',
        //     'title' => 'Advanced Eloquent Relationships',
        //     'excerpt' => '<p>Dive deep into Eloquent relationships.</p>',
        //     'body' => '<p>Laravel’s Eloquent ORM makes working with relationships between database tables intuitive and easy. In this advanced guide, we’ll explore more complex relationships, including many-to-many, one-to-many, and polymorphic relations. Eloquent offers methods that allow you to easily retrieve related models, manage pivot tables, and handle updates to related records. We will also discuss the performance implications of these relationships, and how to optimize queries when dealing with large datasets. Understanding these advanced features of Eloquent will enable you to build more powerful applications with Laravel.</p>',
        //     'date' => now(),
        // ]);

        // postwithdb::create([
        //     'category_id' => $family->id,
        //     'user_id' => $user->id,
        //     'slug' => 'eloquent-polymorphic-relations',
        //     'title' => 'Understanding Polymorphic Relationships in Eloquent',
        //     'excerpt' => '<p>Explore how polymorphic relationships work in Laravel Eloquent.</p>',
        //     'body' => '<p>Laravel’s Eloquent ORM supports polymorphic relationships, allowing a model to belong to more than one other model on a single association. In this guide, you will learn how to set up one-to-many and many-to-many polymorphic relations, retrieve related models, and properly structure your database for flexibility. These relationships are ideal for applications with comments, tags, or other reusable content types. Mastering polymorphic relations allows you to write more modular, reusable code in Laravel.</p>',
        //     'date' => now(),
        // ]);
    }
}
