<div class="comments-area">
@php $comments = $Post->comments @endphp
                <h5>Comments ({{ count($comments) }})</h5>
                @foreach($comments as $comment)
                  <div class="comment-list">
                  
                     <div class="single-comment justify-content-between d-flex" style="padding-bottom: 15px;">
                        <div class="user justify-content-between d-flex">
               
                

                <div class="thumb">
                <img src="{{ url('uploads/'.$comment->user->filename) }}" alt="{{ $comment->user->name }} " width="250">
                           </div>
                           <div class="desc">
                           <p>{{ $comment->comment }} </p>
                    @if(auth()->user())
                        @if((auth()->user()->group == 'admin') || auth()->user()->id == $comment->user->id )
                            <a href="" onclick="$(this).next('div').slideToggle(1000);return false;">edit</a>
                            <div style="display: none">
                                <form action="{{route('front.commentUpdate' , ['id' =>$comment->id ])}}" method="post">
                                    {{ csrf_field() }}
                                    @method('PUT') 
                                    <div class="form-group">
                                        <textarea name="comment"  class="form-control"  rows="4">{{  $comment->comment }}</textarea>
                                    </div>
                                    <button type="submit" class="btn">Edit</button>
                                </form>
                            </div>
                        @endif
                    @endif
                    @if(!$loop->last)
                        <hr>
                    @endif
                              <div class="d-flex justify-content-between">
                                 <div class="d-flex align-items-center">
                                    <h5>
                                    <a href="{{ route('front.profile' , ['id' => $comment->user->id , 'slug' => slug($comment->user->name)]) }}">
                                {{ $comment->user->name }}
                            </a>
                                    </h5>
                                    <p class="date">{{ $comment->created_at}} </p>
                                 </div>
                              </div>
                              

                           </div>
                        </div>
                       
                     </div>
                     @endforeach
                  </div>






