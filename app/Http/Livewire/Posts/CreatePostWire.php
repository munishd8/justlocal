<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use App\Models\Image;

class CreatePostWire extends Component
{
    use WithFileUploads;

    public $successMessage = '';
    public $postCategories;
    public $categories = [];
    public $title;
    public $content;
    public $excerpt;
    public $is_featured;
    public $link;
    public $images;

    protected $rules = [
        'title' => 'required',
        // 'content' => 'required|string',
        'images' => 'max:2048',
    ];

        protected $messages = [
        'title.required' => 'The Post Title cannot be empty.',
        // 'content.required' => 'The Parent Post Content cannot be empty',
        'items.required' => 'The No of Items cannot be empty',
    ];

        public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {


        $validatedData = $this->validate();
        $validatedData['menu_id'] = 1;
        //$this->image->store('images');image
   // dd($this->categories);

   $this->is_featured = (is_null($this->is_featured))? 0 : $this->is_featured;
       $post =  Post::create($validatedData + ['content'=>$this->content,'is_featured'=>$this->is_featured,'excerpt'=>$this->excerpt]);
    
       if(collect($this->categories)->count() > 0){
               foreach($this->categories as $category){
        $post->categories()->attach($category); 
       }
       }

       if(isset($this->images)){
        foreach ($this->images as $image) {
            $extension  = $image->getClientOriginalExtension();
    $path = $image->storeAs('images/posts',$post->slug.'-'.rand(100,999).'.'.$extension,'public');

$imageModel = new Image();
$imageModel->image = $path;
$post->images()->save($imageModel);

}
       }


        $this->successMessage = 'Post created successfully.';
    $this->title = '';
     $this->content = '';
    $this->excerpt = '';
    $this->link = '';
    $this->is_featured = false;
    $this->categories = [];
    $this->images = null;
    }

    public function render()
    {
        return view('livewire.posts.create-post-wire');
    }
}
