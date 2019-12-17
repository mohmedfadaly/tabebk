@if(auth()->user())
    <form action="{{route('front.postStore')}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="">Add post</label>
            <textarea class="single-textarea" name="post" placeholder="post" onfocus="this.placeholder = ''"
									onblur="this.placeholder = 'post'" required></textarea>
        </div>
        <button type="submit" class="btn  btn-default">Add post</button>
    </form>
    @endif
