<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;

class CreatePostWire extends Component
{
    public $successMessage = '';
    public $postCategories;
    public $categories = [];
    public $title;
    public $content;
    public $excerpt;
    public $is_featured;


    protected $rules = [
        'title' => 'required',
        'content' => 'required|string',
    ];

        protected $messages = [
        'title.required' => 'The Post Title cannot be empty.',
        'content.required' => 'The Parent Post Content cannot be empty',
    ];

        public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
      // dd($this->categories);
        $validatedData = $this->validate();
        $validatedData['menu_id'] = 1;
        //$this->image->store('images');
 
       $post =  Post::create($validatedData);
       if(collect($this->categories)->count() > 0){
               foreach($this->categories as $category){
        $post->categories()->attach($category);
       }
       }
        $this->successMessage = 'Post created successfully.';
    $this->title = '';
     $this->content = '';
    $this->excerpt = '';
    $this->is_featured = false;
    $this->categories = [];
    }

    public function render()
    {
        return view('livewire.posts.create-post-wire');
    }
}
