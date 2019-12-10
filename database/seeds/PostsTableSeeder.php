<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
use App\Tag;
use App\User;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author1 = User::create([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'password' => Hash::make('password')
        ]);

        $author2 = User::create([
            'name' => 'Jane Doe',
            'email' => 'jane@doe.com',
            'password' => Hash::make('password')
        ]);

        $category1 = Category::create([
            'name' => 'News'
        ]);

        $category2 = Category::create([
            'name' => 'Marketing'
        ]);

        $category3 = Category::create([
            'name' => 'Partnership'
        ]);

        $post1 = Post::create([
            'title' => 'We relocated our office to a new designed garage',
            'description' => 'Asdfasdf asd fsdf s  sf sdf sdf s s  sdf sf s s sd sdddf445 45 dsdf',
            'contentX' => 'sdfsdf dskK kdsfj JSDjsdfh  JJSJD j dsjsdkf KJd hf',
            'category_id' => $category1->id,
            'image' => 'posts/1.jpg',
            'user_id' => $author1->id
        ]);

        $post2 = $author2->posts()->create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => 'Asdfasdf asd fsdf s  sf sdf sdf s s  sdf sf s s sd sdddf445 45 dsdf',
            'contentX' => 'sdfsdf dskK kdsfj JSDjsdfh  JJSJD j dsjsdkf KJd hf',
            'category_id' => $category2->id,
            'image' => 'posts/2.jpg'
        ]);

        $post3 = $author1->posts()->create([
            'title' => 'Best practices for minimalist design with example',
            'description' => 'Asdfasdf asd fsdf s  sf sdf sdf s s  sdf sf s s sd sdddf445 45 dsdf',
            'contentX' => 'sdfsdf dskK kdsfj JSDjsdfh  JJSJD j dsjsdkf KJd hf',
            'category_id' => $category3->id,
            'image' => 'posts/3.jpg'
        ]);

        $post3 = $author2->posts()->create([
            'title' => 'Congratulate and thank to Maryam for joining our team',
            'description' => 'Asdfasdf asd fsdf s  sf sdf sdf s s  sdf sf s s sd sdddf445 45 dsdf',
            'contentX' => 'sdfsdf dskK kdsfj JSDjsdfh  JJSJD j dsjsdkf KJd hf',
            'category_id' => $category2->id,
            'image' => 'posts/4.jpg'
        ]);

        $tag1 = Tag::create([
            'name' => 'job'
        ]);

        $tag2 = Tag::create([
            'name' => 'customers'
        ]);

        $tag3 = Tag::create([
            'name' => 'record'
        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag2->id, $tag3->id]);
    }
}
