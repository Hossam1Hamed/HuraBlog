@extends('web.layouts.base')

@section('content')
<div class="mx-auto col-md-6">
    <form action="{{route('website.posts.store')}}" method="POST">
        @csrf

        @include('web.pages.posts.partials.form')

        <div class="button-row  mt-3 ">
            <button type="submit" class="btn btn-primary ">Add</button>
        </div>

    </form>
</div>
@endsection