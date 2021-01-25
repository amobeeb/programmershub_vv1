<div>
    @foreach ($comments as $comment) 
    <div class="col-md-12">
        <div class="card">
            <h4>{{$comment->comment}}</h4>
            {{$comment->created_at->diffForHumans()}}

        </div>
    </div>
    @endforeach
    <form wire:submit.prevent="add_comment">
        <div class="form-group">
             <textarea name="comment" wire:model="comment" cols="10" rows="5" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">comment</button>
    </form>
</div>
