<?php

namespace App\Http\Livewire\DeathNotice;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\DeathNotice;
use App\Models\Image;
use Carbon\Carbon;

class EditDeathNoticeWire extends Component
{
    use WithFileUploads;

    public $successMessage = '';
    public $title;
    public $content;
    public $date_of_birth;
    public $date_of_death;
    public $notice_date;
    public $notice_link;
    public $link;
    public $image;
    public $deathNotice;
    public $img;

    protected $rules = [
        'title' => 'required|string',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'date_of_birth' => 'required|string|date',
        'date_of_death' => 'required|string|date',
        'notice_date' => 'required|string|date',
        'notice_link' => 'required|string',
        'link' => 'required|string',
    ];

        protected $messages = [
        'title.required' => 'The Title cannot be empty.',
        'content.required' => 'The Content cannot be empty',
        'date_of_birth.required' => 'Please Select Date Of Birth.',
        'date_of_death.required' => 'Please Select Date Of Death.',
        'notice_date.required' => 'Please Select Notice Date.',
        'notice_link.required' => 'Please Enter  Notice Link Url.',
        'link.required' => 'Please Enter  link Url.',
        'image.image' => 'The uploaded file must be an image.',
        'image.mimes' => 'The image must be in JPEG, PNG, JPG, or GIF format.',
        'image.max' => 'The image size must not exceed 2MB.',
    ];

        public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function mount($deathNotice)
    {
        $this->deathNotice = $deathNotice;
        $this->title = $this->deathNotice->title;
        $this->content = $this->deathNotice->content;
        $this->notice_link = $this->deathNotice->notice_link;
        $this->link = $this->deathNotice->link;
        $this->date_of_birth = Carbon::parse($this->deathNotice->date_of_birth)->format('Y-m-d');
        $this->date_of_death = Carbon::parse($this->deathNotice->date_of_death)->format('Y-m-d');
        $this->notice_date = Carbon::parse($this->deathNotice->notice_date)->format('Y-m-d');
        $this->img = $this->deathNotice->images[0]['image'];
        // dd($this->img);
    }

    public function updateDeathNotice()
    {
        $validatedData = $this->validate();

        $image = $this->img;
        
        if ($this->title != $this->deathNotice->title) {
           $this->deathNotice->slug = null;
        }
         

        // $this->deathNotice->update([
        //     'title' => $this->title,
        //     'content' => $this->content,
        //     'date_of_birth' => $this->date_of_birth,
        //     'date_of_death' => $this->date_of_death,
        //     'notice_date' => $this->notice_date,
        //     'notice_link' => $this->notice_link,
        //     'link' => $this->link,
        // ]);
        $this->deathNotice->update($validatedData);

        if ($this->image) {
           // dd($this->image);
           $this->validate(['image' => 'image|mimes:jpeg,png,jpg,gif|max:2048']); // Add image validation
           
            $oldUrl =  'upload/'.$this->img;
            if (file_exists($oldUrl)) {
                unlink($oldUrl);
            }
            $extension  = $this->image->getClientOriginalExtension();
        $path = $this->image->storeAs('images/death-notices',$this->deathNotice->slug.'-'.rand(100,999).'.'.$extension,'public');

    $imageModel = new Image();
    $imageModel->image = $path;
    $this->deathNotice->images()->delete();
    $this->deathNotice->images()->save($imageModel);
            
        }
        return redirect()->route('admin.death-notices.index')->with('success', 'Death Notice updated successfully.');

    }

    public function render()
    {
        return view('livewire.death-notice.edit-death-notice-wire');
    }
}
