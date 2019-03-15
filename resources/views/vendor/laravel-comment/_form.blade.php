<br /><form method="POST" action="{{ url()->current() }}">
    @csrf
    <input type="hidden" name="commentable_type" value="\{{ get_class($model) }}" />
    <input type="hidden" name="commentable_id" value="{{ $model->id }}" />
<div class="field">
    <p class="control">
        <label for="message">Enter your comment here:</label>
        <textarea class="textarea @if($errors->has('message')) is-danger @endif" name="message"></textarea>
        @if ($errors->has('message'))
        <p class="help is-danger invalid-feedback">{{ $errors->first('message') }}</p>
        @endif
   {{-- <small class="form-text text-muted"><a target="_blank" href="https://help.github.com/articles/basic-writing-and-formatting-syntax">Markdown</a> cheatsheet.</small>--}}
    </p>
</div>
<nav class="level">
    <div class="level-left">
        <div class="level-item">
            <button type="submit" class="button is-info">Submit</button>
        </div>
    </div>
</nav>
</form>