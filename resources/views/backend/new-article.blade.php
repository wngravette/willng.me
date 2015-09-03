@extends('backend.backend-wrap')
@section('content')
{{{ $name or null }}}
<div class="columns">
    <div class="three-fifths column">
        <h3>New Blog Post</h3>
        <form method="post">
            {!! csrf_field() !!}
            <dl class="form">
                <dt><label>Article Title</label></dt>
                <dd><input type="text" name="article_headline"></dd>
            </dl>
            <dl class="form">
                <dt><label>Article Subtitle</label></dt>
                <dd><input type="text" name="article_catch"></dd>
            </dl>
            <dl class="form">
                <dt><label>Article Body</label></dt>
                <dd><textarea name="article_body" id="editor1" rows="20" cols="80"></textarea>
                    <script>CKEDITOR.replace( 'editor1' );</script>
                </dd>
            </dl>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Publish</button>
                <button type="button" class="btn">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection
