<!-- _comment_replies.blade.php -->
@if(isset($comment->replies))
@foreach($comment->replies as $com_replay)
<div id="comment-reply-1" class="comment comment-reply">
        <div class="d-flex">
                <div class="comment-img"><img src="<?php if($com_replay->user->image!='team-3.jpg'): ?>{{url('/Images/user/'.$com_replay->user->image)}} <?php else: ?>{{url('/assets/img/team/'.$com_replay->user->image)}} <?php endif; ?>" alt=""></div>
                <div>
                    <h5><a href="">{{$com_replay->user->name}}</a> <a href="#!" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                    <time datetime="2020-01-01">{{$com_replay->created_at}}</time>
                    <p>
                        {{$com_replay->body}}
                    </p>
                </div>
        </div>
</div><!-- End comment reply #1-->
<form class="reply_form_active" method="post" action="{{ route('reply.add') }}">
    @csrf
    <div class="form-group">
        <input type="text" name="comment_body" class="form-control" placeholder="enter your reply"  />
        <input type="hidden" name="blog_id" value="{{ $blog->id }}" />
        <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
    </div>
    <div class="form-group mt-2">
        <input type="submit" class="btn btn-warning" value="Reply" />
    </div>
</form>
@endforeach
@endif