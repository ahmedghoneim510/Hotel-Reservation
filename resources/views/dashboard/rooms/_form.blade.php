<div class="form-outline mb-4 mt-4">
    <x-form.input label="Name" name="name"  :value="$room->name??''" type="text"/>
</div>
<div class="form-outline mb-4">
    <label>Hotel</label>
    <select name="hotel_id" class="form-control form-select">
        @foreach($hotels as $hotel)
            <option value="{{$hotel->id}}" @selected(old('hotel_id', $room->hotel_id??'')== $hotel->id) >{{$hotel->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-outline mb-4">
    <x-form.input label="View" name="view"  :value="$room->view??''" type="text"/>
</div>
<div class="form-outline mb-4">
    <x-form.input label="Max Num Of Person " name="max_person"  :value="$room->max_person??''" type="text"/>
</div>
<div class="form-outline mb-4">
    <x-form.input label="Beds Number" name="num_beds"  :value="$room->num_beds??''" type="text"/>
</div>
<div class="form-outline mb-4">
    <x-form.input label="Size" name="size"  :value="$room->size??''" type="text"/>
</div>
<div class="form-outline mb-4">
    <x-form.input label="Price" name="price"  :value="$room->price??''" type="text"/>
</div>
<div class="form-group">
    <x-form.label  id="image" >Image</x-form.label>
    <x-form.input  type="file" name="image" value="" accept="image/*" />
    @if (isset($room->image))
        <img src="{{$room->image_url}}"  @style('margin:10px;') height="100px" >
    @endif

</div>

<!-- Submit button -->
<div class="form-group">
    <input type="submit" name="submit" value="{{$edit ?? 'Save'}}" class="form-control btn btn-primary">
</div>
