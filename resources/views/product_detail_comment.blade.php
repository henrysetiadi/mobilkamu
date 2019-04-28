@foreach($comments as $comment)
    <div class="display-comment">
        
        <p>{{ $comment->body }}</p>
        
        
        
    </div>
@endforeach