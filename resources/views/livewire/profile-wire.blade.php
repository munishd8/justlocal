
<form wire:submit.prevent="updateProfile"  class="form-horizontal">
    @csrf
    @if (session()->has('successMessage'))
        <div class="alert alert-success">
            {{ session('successMessage') }}
        </div>
    @endif
<div class="form-group row">
<label for="inputName2" class="col-sm-2 col-form-label">Name</label>
<div class="col-sm-10">
<input type="text" class="form-control" wire:model="name" id="inputName2" placeholder="Name">
</div>
</div>
<div class="form-group row">
<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
<div class="col-sm-10">
<input type="email" class="form-control" wire:model="email" id="inputEmail" placeholder="Email">
</div>
</div>

<div class="form-group row">
<div class="offset-sm-2 col-sm-10">
<button type="submit" class="btn btn-danger">Submit</button>
</div>
</div>
</form>