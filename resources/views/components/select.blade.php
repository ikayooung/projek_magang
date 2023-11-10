<label for="{{$name}}">{{$label}}</label>
<select name="{{$name}}" class="form-control" wire:model.prevent="{{$wire}}">
    <option value="" selected disabled>
        -- Pilih --
    </option>
    {{$slot}}
</select>