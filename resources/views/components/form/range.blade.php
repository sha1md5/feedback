<div class="col-12">
    <label for="{{$question->id}}" class="form-label">
        {{$question->name}}
@if(!isset($question->validator_array['required']) || !$question->validator_array['required'])
        <span class="text-muted">(Opcional)</span>
@endif
    </label>
    <input type="range" class="form-range"
           name="{{$question->id}}" id="{{$question->id}}"
           min="{{$question->validator_array['min']}}"
           max="{{$question->validator_array['max']}}"
           value="{{old($question->id, ($answers[$question->id] ?? ''))}}"
@if(isset($question->validator_array['required']) && $question->validator_array['required'])
           required
@endif
    >

@include('components.form.error', ['field' => $question->id])

</div>
