<div class="form-outline mb-4 mt-4">
    <x-form.input label="Name" name="name"  :value="$hotel->name??''" type="text"/>
</div>

<div class="form-outline mb-4">
    <x-form.input label="Location" name="address"  :value="$hotel->address??''" type="text"/>
</div>

<div class="form-outline mb-4">
    <x-form.input label="Description" name="description"  :value="$hotel->description??''" type="text"/>
</div>
<div class="form-group">
    <x-form.label  id="image" >Image</x-form.label>
    <x-form.input  type="file" name="image" value="" accept="image/*" />
    @if (isset($hotel->image))
        <img src="{{$hotel->image_url}}"  @style('margin:10px;') height="100px" >
    @endif
    @if($errors->has('image'))
        <p class="text-danger">{{$errors->first('image')}}</p>
    @endif
</div>

<!-- Submit button -->
<div class="form-group">
    <input type="submit" name="submit" value="{{$edit ?? 'Save'}}" class="form-control btn btn-primary">
</div>
