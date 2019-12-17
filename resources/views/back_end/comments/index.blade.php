<table class="table" id="comments">
    <tbody>
    @foreach($Post->comments as $comment)
        <tr>
            <td>
                <small>{{ $comment->user->name }}</small>
                <p>{{ $comment->comment }}</p>
                <small>{{ $comment->created_at }}</small>
            </td>
            <td class="td-actions text-left">
                <button type="button" rel="tooltip" title="" onclick="$(this).closest('tr').next('tr').slideToggle()"  class="btn btn-link btn-customized-2"
                        data-original-title="Edit Comment">
                        <i class="far fa-edit"></i>تعديل
                </button>


                <form action="{{ route('comment.delete' , ['id' => $comment->id]) }}" method="POST"style="display: inline;">
                        
                        @csrf
                        @method('DELETE')
                        <button type="submit" rel="tooltip" title="" class="btn btn-link btn-customized-2" data-original-title="delete">
                        <i class="far fa-trash-alt"></i>مسح
                        </button>

                    </form>
            </td>
        </tr>
        <tr style="display: none">
            <td colspan="4">
                <form action="{{ route('comment.update' , ['id' => $comment->id]) }}" method="post">
                    {{ csrf_field() }}
                        @method('PUT') 
                    @include('back_end.comments.form' , ['Post' => $comment ])
                    <input type="hidden" value="{{ $Post->id }}" name="post_id">
                    <button type="submit" class="btn btn-primary pull-right"><i class="far fa-edit"></i>تعديل التعليق</button>
                    <div class="clearfix"></div>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>