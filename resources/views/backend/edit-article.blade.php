@extends('backend.backend-wrap')
@section('content')
{{{ $name or null }}}
<div class="columns">
    <div class="three-fifths column">
        <h3>Edit Blog Post</h3>
        {!! Form::model($article) !!}
            {!! csrf_field() !!}
            <dl class="form">
                <dt><label>Article Title</label></dt>
                <dd>{!! Form::text('article_headline') !!}</dd>
            </dl>
            <dl class="form">
                <dt><label>Article Subtitle</label></dt>
                <dd>{!! Form::text('article_catch') !!}</dd>
            </dl>
            <dl class="form">
                <dt><label>Article Body</label></dt>
                <dd><textarea name="article_body" id="editor1" rows="20" cols="80">
                    {{$article['article_body']}}
                </textarea>
                    <script>CKEDITOR.replace( 'editor1' );</script>
                </dd>
            </dl>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="button" class="btn">Cancel</button>
            </div>
        {!! Form::close() !!}



    </div>
</div>
@endsection
