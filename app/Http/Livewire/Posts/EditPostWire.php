<?php

namespace App\Http\Livewire\Posts;

use App\Models\Image;
use Livewire\WithFileUploads;
use Livewire\Component;

class EditPostWire extends Component
{
    use WithFileUploads;
    public $successMessage = '';
    public $failMessage = '';
    public $postCategories;
    public $categories = [];
    public $title;
    public $slug;
    public $content;
    public $excerpt;
    public $link;
    public $is_featured;
    public $images;
    public $post;
    public $parent_category;
    public $imgs;
    public $deletedImageIds = [];

    protected $rules = [
        'title' => 'required',
        // 'content' => 'required|string',
        'images' => 'max:2048',
    ];

        protected $messages = [
        'title.required' => 'The Post Title cannot be empty.',
        // 'content.required' => 'The Parent Post Content cannot be empty',
        // 'images.image' => 'Image need to be Image',
        // 'items.required' => 'The No of Items cannot be empty',
    ];

        public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount($post)
    {
        $this->post = $post;
        $this->title = $this->post->title;
        $this->content = $this->post->content;
        $this->excerpt = $this->post->excerpt;
        $this->is_featured = $this->post->is_featured;
        $this->link = $this->post->link;
        $this->parent_category = $this->post->categories->pluck('id')->toArray();
        $this->imgs = $this->post->images;
        $this->categories = $this->parent_category;
    }

    
    public function deleteImage($imageId)
    {
        // if($this->post->images->count() >= 2){
        //    dd($this->post->images);
            $image = Image::findOrFail($imageId);
            $oldUrl =  'upload/'.$image->image;
            if (file_exists($oldUrl)) {
                unlink($oldUrl);
            }
            $image->delete();
            $this->deletedImageIds[] = $imageId;
            $this->post->load('images');
        // }else{
        //     $this->failMessage = 'At least one image is required.';
            // $this->reset('images');
            
        // }

    }

    public function updatePost()
    {
        if ($this->title != $this->post->title) {
            $this->post->slug = null;
         }
        $validatedData = $this->validate();
        $validatedData['menu_id'] = 1;
       $post =  $this->post->update($validatedData + ['content'=>$this->content,'link'=>$this->link,'is_featured'=>$this->is_featured,'excerpt'=>$this->excerpt]);

    $this->post->categories()->sync($this->categories);
       if(isset($this->images)){
       foreach ($this->images as $image) {
                $extension  = $image->getClientOriginalExtension();
        $path = $image->storeAs('images/posts',$this->post->slug.'-'.rand(100,999).'.'.$extension,'public');

    $imageModel = new Image();
    $imageModel->image = $path;
    $this->post->images()->save($imageModel);

}
}
        $this->successMessage = 'Post Updated successfully.';
        $this->post->load('images');
    }


    public function render()
    {
        return view('livewire.posts.edit-post-wire');
    }
}
