@extends('layout')
@section('content')


@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="has-text-danger">{{$error}}</div>
@endforeach
<hr>
@endif

<form action="{{route('issues.update',$issue->id)}}" method="post">
    @method('put')
    @csrf

    <div class="field">
        <label class="label">Title</label>
        <div class="control">
            <input name="title" value="{{$issue->title}}" class="input" type="text" placeholder="Eneter a title for your issue">
        </div>
    </div>

    <div class="field">
        <label class="label">Description</label>
        <div class="control">
            <textarea name="description" class="textarea" placeholder="Give us a breif about your issue">
            {{$issue->body}}
            </textarea>
        </div>
    </div>
    <div class="field is-grouped">
        <div class="control">
            <button type="submit" class="button is-link">Submit</button>
        </div>
        <div class="control">
            <button type="reset" class="button is-link is-light">Cancel</button>
        </div>
    </div>
</form>

@endsection