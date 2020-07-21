<div style="text-align: center">
    Add Steps for Task  <a class="ml-2" wire:click="increment" style="color: limegreen"><i class="fad fa-plus"></i></a>
    @foreach($count as $step)
        <div class="row mb-2" wire:key="{{$step}}">
            <div class="col"><input type="text" name="steps[]" class="form-control"></div>
            <div class="col-auto"><a class="ml-2" wire:click="decrement({{$step}})" style="color: red"><i class="fad fa-times fa-2x"></i></a></div>
        </div>
    @endforeach

</div>
