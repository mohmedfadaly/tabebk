<form action="{{ route('comments.store') }}" method="post">
    {{ csrf_field() }}
    @include('back_end.comments.form')
    <input type="hidden" value="{{ $Post->id }}" name="post_id">
    <button type="submit" class="btn btn-primary pull-right"><i class="fas fa-plus"></i><span>اضافة تعليق</button>
    <div class="clearfix"></div>
</form>