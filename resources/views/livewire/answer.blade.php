    <div>
        @foreach ($answers as $answer) 
        <div class="col-md-12">
            <div class="card">
                <h6>{{$answer->members->surname}}</h6>
                <h4>{{$answer->answers}}</h4>
                {{$answer->created_at->diffForHumans()}}
    
            </div>
        </div>
        @endforeach
        <form wire:submit.prevent="add_answer">
            <div class="form-group">
                 <textarea name="answer" wire:model="reply" cols="10" rows="5" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Answer</button>
        </form>
    </div>
    
