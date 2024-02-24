<div class="form-outline mb-4 mt-4">
    <x-form.input label="Email" name="email"  :value="$admin->email??''" type="text"/>
</div>

<div class="form-outline mb-4">
    <x-form.input label="Name" name="name"  :value="$admin->name??''" type="text"/>
</div>
<div class="form-outline mb-4">
    @if($edit)
    <label for="form2Example1">New password</label>
    @endif
    <input type="password" name="password" id="form2Example1"  class="form-control" placeholder="password" />
</div>


<!-- Submit button -->
<button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

