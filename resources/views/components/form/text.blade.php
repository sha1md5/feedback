<div class="col-12">
    <label for="{{$question->id}}" class="form-label">
        {{$question->name}}
@if(!isset($question->validator_array['required']) || !$question->validator_array['required'])
            <span class="text-muted">(Opcional)</span>
@endif
    </label>
    <textarea class="form-control" rows=5
              id="{{$question->id}}" name="{{$question->id}}"
              placeholder=""
@if(isset($question->validator_array['required']) && $question->validator_array['required'])
              required
@endif
    >{{old($question->id, ($answers[$question->id] ?? ''))}}</textarea>
@include('components.form.error', ['field' => $question->id])
</div>

