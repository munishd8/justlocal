<?php

namespace App\Http\Livewire\DeathNotice;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\DeathNotice;
use App\Models\Image;


class CreateDeathNoticeWire extends Component
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

    protected $rules = [
        'title' => 'required|string',
        'content' => 'required|string',
        'image' => 'required|max:2048',
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
    ];

        public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveDeathNotice()
    {
        // dd(12344);
        // return $this->validate();
        $validatedData = $this->validate();
        // dd($validatedData);
       $deathNotice =  DeathNotice::create($validatedData);


      
                $extension  = $this->image->getClientOriginalExtension();
        $path = $this->image->storeAs('images/death-notices/',$deathNotice->slug.'-'.rand(100,999).'.'.$extension,'public');

    $imageModel = new Image();
    $imageModel->image = $path;
    $deathNotice->images()->save($imageModel);



    $this->successMessage = 'Death Notice created successfully.';
    $this->title = '';
    $this->content = '';
    $this->date_of_birth = '';
    $this->date_of_death = '';
    $this->notice_date = '';
    $this->notice_link = '';
    $this->link = '';
    $this->image = '';
    }

    public function render()
    {
        return view('livewire.death-notice.create-death-notice-wire');
    }
}
