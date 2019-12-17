<section class="blog_area single-post-area section-padding text-center">
    <div class="container">
         <div class="row">
            <div class="col-lg-12 posts-list">
               <div class="single-post">
               @include('front-end.post.create')
               @foreach($Post as $Post)
               <div class="blog-author">
                  <div class="media align-items-center">
                  <img src="{{ url('uploads/'.$Post->user->filename) }}" alt="">
                     <div class="media-body">
                        <a href="{{ route('front.profile' , ['id' => $Post->user->id , 'slug' => slug($Post->user->name)]) }}">
                           <h4>{{$Post->user->name}}</h4>
                        </a>
                        <p>{{ $Post->post }}</p>
                        </div>
                        </div>
                        @include('front-end.post.comments')
            @include('front-end.post.create-comment')
                     </div>
                     
                     @endforeach
               </div>
               
            </div>
        </div>
    </div>
</section>