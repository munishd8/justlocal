<?php

namespace App\Http\Livewire\PlanningApplication;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\PlanningApplication;
use App\Models\Image;


class CreatePlanningApplicationWire extends Component
{
    use WithFileUploads;

    public $successMessage = '';
    public $name;
    public $details;
    public $applicant_name;
    public $planning_reference;
    public $registration_date;
    public $due_submit_date;
    public $image;

    protected $rules = [
        'name' => 'required|string',
        'details' => 'required|string',
        'image' => 'required|max:2048',
        'applicant_name' => 'required|string',
        'planning_reference' => 'required|string',
        'registration_date' => 'required|date',
        'due_submit_date' => 'required|date',
    ];

        protected $messages = [
        'name.required' => 'The Name cannot be empty.',
        'details.required' => 'The Details cannot be empty',
        'applicant_name.required' => 'The Applicant Name cannot be empty',
        'planning_reference.required' => 'Please Enter Registration Date.',
        'due_submit_date.required' => 'Please Enter Due date to submit observations  Date.',
    ];

        public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function savePlanningApplication()
    {
        // dd(12344);
        // return $this->validate();
        $validatedData = $this->validate();
        // dd($validatedData);
       $planningApplication =  PlanningApplication::create($validatedData);


      
                $extension  = $this->image->getClientOriginalExtension();
        $path = $this->image->storeAs('images/planningApplication/',$planningApplication->slug.'-'.rand(100,999).'.'.$extension,'public');

    $imageModel = new Image();
    $imageModel->image = $path;
    $planningApplication->images()->save($imageModel);



    $this->successMessage = 'Planning Application created successfully.';
    $this->name = '';
    $this->details = '';
    $this->applicant_name = '';
    $this->planning_reference = '';
    $this->registration_date = '';
    $this->due_submit_date = '';
    $this->image = null;
    }

    public function render()
    {
        return view('livewire.planning-application.create-planning-application-wire');
    }
}
