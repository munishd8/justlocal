
<form class="form-horizontal"  wire:submit.prevent="changePassword" >
@csrf
    @if (session()->has('successMessage'))
        <div class="alert alert-success">
            {{ session('successMessage') }}
        </div>
    @endif
    @if (session()->has('passwordError'))
        <div class="alert alert-danger">
            {{ session('passwordError') }}
        </div>
    @endif
<div class="form-group row">
<label for="inputName" class="col-sm-2 col-form-label">Current Password</label>
<div class="col-sm-10">
<input type="password" class="form-control" id="inputName" wire:model="current_password" placeholder="Current Password">
@error('current_password')
            <span  style="padding-left: 0;color: red;font-size: 14px;" class="error">{{ $message }}</span>
            @enderror
</div>
</div>
<div class="form-group row">
<label for="inputName" class="col-sm-2 col-form-label">New Password</label>
<div class="col-sm-10">
<input type="password" class="form-control" id="inputName" wire:model="password" placeholder="New Password">
@error('password')
            <span  style="padding-left: 0;color: red;font-size: 14px;" class="error">{{ $message }}</span>
            @enderror
</div>
</div>
<div class="form-group row">
<label for="inputName" class="col-sm-2 col-form-label">Confirm Password</label>
<div class="col-sm-10">
<input type="password" class="form-control" id="inputName" wire:model="password_confirmation" placeholder="Confirm Password">
@error('password_confirmation')
            <span  style="padding-left: 0;color: red;font-size: 14px;" class="error">{{ $message }}</span>
            @enderror
</div>
</div>
<div class="form-group row">
<div class="offset-sm-2 col-sm-10">
<button type="submit" class="btn btn-danger">Submit</button>
</div>
</div>
</form>
