@extends('layout')
@section('content')
<a href="{{route('issues.create')}}" class="button mb-4">Create an issue</a>
<table class="table is-fullwidth">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        @foreach($issues as $issue)
        <tr class="{{$issue->status->code=='closed'?'has-background-danger-light':''}}">
            <td>{{$issue->title}}</td>
            <td>{{$issue->body}}</td>
            <td>
                <p>
                    {{$issue->status->title}}
                </p>
                <small>
                    {{$issue->status->description}}
                </small>
            </td>
            <td>
                @if($issue->status->code=='open')
                <a class="mx-4" href="{{route('issues.edit',$issue->id)}}">Edit</a>
                <form action="{{route('issues.destroy',$issue->id)}}" method="post">
                    @method('delete')
                    @csrf
                    <button class="button is-ghost" type="submit">Close</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection