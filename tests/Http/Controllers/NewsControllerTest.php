<?php

namespace Http\Controllers;

use App\Http\Controllers\NewsController;
use App\Models\News;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Lumen\Testing\DatabaseTransactions;
use TestCase;


class NewsControllerTest extends TestCase
{
//    use DatabaseTransactions;

    public function testIndexSuccess()
    {
        $this->get( '/api/news');

        $this->seeJsonStructure([
            'data'=>['*'=>[
                'title',
                'text',
                'category',
                'id',
                'tags'=>['*'=>['id', 'name']]
            ]
            ]]);
    }

    public function testStoreSuccess()
    {
        $this->post( '/api/news/',[
            'title'=>'qwe',
            'text'=>'asd',
            'category_id'=>3,
            'tags'=>['sdf','ghj']
        ]);

        $this->seeJsonStructure([
            'data'=>[
                'title',
                'text',
                'category',
                'id',
                'tags'=>['*'=>['id', 'name']]
            ]]);

        $this->seeJson([
                'title'=>'qwe',
                'text'=>'asd',
            ]);
    }

    public function testShowSuccess()
    {
        $news = News::factory()->create();
        $this->get( '/api/news/'.$news->id);

        $this->seeJsonStructure([
            'data'=>[
                'title',
                'text',
                'category',
                'id',
                'tags'=>['*'=>['id', 'name']]
            ]
        ]);

        $this->seeJson([
                'title'=>$news->title,
                'text'=>$news->text,
                'category'=>$news->category->name,
                'id'=>$news->id,
        ]);
    }

    public function testUpdateSuccess()
    {
        $news = News::factory()->create();
        $this->put( '/api/news/'.$news->id,[
            'title'=>'test',
            'text'=>'test',
        ]);

        $news = News::find($news->id);

        $this->assertEquals($news->title,'test');
        $this->assertEquals($news->text,'test');
    }

    public function testDestroySuccess()
    {
        $news = News::factory()->create();
        $this->delete( '/api/news/'.$news->id);
        try {
            News::findOrFail($news->id);
        } catch (ModelNotFoundException $ex) {
            $this->assertFalse(false);
        }
    }
}
