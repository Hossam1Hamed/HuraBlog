<!-- Name -->
<div>
    <label> {{ __('title') }}</label>
    @error('title')
    <br><label style="color: red">{{ $message }}</label>
    @enderror
    <input class="form-control mb-0" id="title" type="text" name="title" value="{{ isset($post) ? $post[0]->title : old('title') }}" required autofocus />

    <label> {{ __('body') }}</label>
    @error('body')
    <br><label style="color: red">{{ $message }}</label>
    @enderror
    <textarea class="form-control mb-0" name="content" id="body" cols="30" rows="10">
    {{ isset($post) ? $post[0]->body : old('body') }}
    </textarea>

    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">


</div>