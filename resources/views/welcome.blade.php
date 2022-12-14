@extends('layout')
@section('content')


@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="has-text-danger">{{$error}}</div>
@endforeach
<hr>
@endif
<form action="{{route('issues.store')}}" method="post">
    @method('post')
    @csrf
    <div class="field">
        <label class="label">Title</label>
        <div class="control">
            <input name="title" class="input" type="text" placeholder="Eneter a title for your issue">
        </div>
    </div>


    <div class="field">
        <label class="label">Description</label>
        <div class="control">
            <textarea name="description" class="textarea" placeholder="Give us a breif about your issue"></textarea>
        </div>
    </div>


    <div class="field is-grouped">
        <div class="control">
            <button type="submit" class="button is-link">Submit</button>
        </div>
        <div class="control">
            <button type="reset" class="button is-link is-light">Reset</button>
        </div>

    </div>
</form>

@endsection