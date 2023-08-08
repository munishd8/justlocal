<?php

namespace App\Http\Livewire\PlanningApplication;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\PlanningApplication;
use App\Models\Image;
use Carbon\Carbon;

class EditPlanningApplicationWire extends Component
{
    use WithFileUploads;

    public $name;
    public $details;
    public $applicant_name;
    public $planning_reference;
    public $registration_date;
    public $due_submit_date;
    public $img;
    public $image;
    public $planningApplication;

    protected $rules = [
        'name' => 'required|string',
        'details' => 'required|string',
        'applicant_name' => 'required|string',
        'planning_reference' => 'required|string',
        'registration_date' => 'required|date',
        'due_submit_date' => 'required|date',
    ];

        protected $messages = [
        'name.required' => 'The Name cannot be empty.',
        'details.required' => 'The Details cannot be empty.',
        'applicant_name.required' => 'The Applicant Name cannot be empty.',
        'planning_reference.required' => 'The Planning Reference cannot be empty.',
        'registration_date.required' => 'The Registration Date  cannot be empty.',
        'due_submit_date.required' => 'The Due Submit Date  cannot be empty.',
        'image.image' => 'The uploaded file must be an image.',
        'image.mimes' => 'The image must be in JPEG, PNG, JPG, or GIF format.',
        'image.max' => 'The image size must not exceed 2MB.',
    ];

        public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function mount($planningApplication)
    {
        $this->planningApplication = $planningApplication;
        $this->name = $this->planningApplication->name;
        $this->details = $this->planningApplication->details;
        $this->applicant_name = $this->planningApplication->applicant_name;
        $this->planning_reference = $this->planningApplication->planning_reference;
        $this->registration_date = Carbon::parse($this->planningApplication->registration_date)->format('Y-m-d');
        $this->due_submit_date = Carbon::parse($this->planningApplication->due_submit_date)->format('Y-m-d');
        $this->img = $this->planningApplication->images[0]['image'];
    }

    public function updatePlanningApplication()
    {
        $validatedData = $this->validate();

        $image = $this->img;
        
        $this->planningApplication->update($validatedData);

        if ($this->image) {
           $this->validate(['image' => 'image|mimes:jpeg,png,jpg,gif|max:2048']); // Add image validation
           
            $oldUrl =  'upload/'.$this->img;
            if (file_exists($oldUrl)) {
                unlink($oldUrl);
            }
            $extension  = $this->image->getClientOriginalExtension();
        $path = $this->image->storeAs('images/planningApplication',$this->planningApplication->name.'-'.rand(100,999).'.'.$extension,'public');

    $imageModel = new Image();
    $imageModel->image = $path;
    $this->planningApplication->images()->delete();
    $this->planningApplication->images()->save($imageModel);
            
        }
        return redirect()->route('admin.planning-applications.index')->with('success', 'Planning Application updated successfully.');

    }

    public function render()
    {
        return view('livewire.planning-application.edit-planning-application-wire');
    }
}
