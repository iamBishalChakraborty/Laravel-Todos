<div style="text-align: center">
    Add Steps for Task  <a class="ml-2" wire:click="increment" style="color: limegreen"><i class="fad fa-plus"></i></a>
    @foreach($count as $step)
        <div class="row mb-2 mx-5" wire:key="{{$loop->index}}">
            @if (isset($step['steps']))
                <div class="col"><input type="text" name="stepsName[]" class="form-control" value="{{$step['steps']}}"></div>
                <input type="hidden" name="stepsID[]" value="{{$step['id']}}">
            @else
                <div class="col"><input type="text" name="stepsName[]" class="form-control"></div>
                <input type="hidden" name="stepsID[]">
            @endif
            <div class="col-auto"><a class="ml-2" wire:click="decrement({{$loop->index}})" style="color: red"><i class="fad fa-times fa-2x"></i></a></div>
        </div>
    @endforeach

</div>
