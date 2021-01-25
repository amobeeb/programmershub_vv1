<div>
    <div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-title">
                <a href="{{route('article.create')}}" class="btn btn-success">Create Article</a>
                <button wire:click="published" href="{{route('article.create')}}" class="btn btn-info">  Published</button>
                <button wire:click="unpublished" class="btn btn-warning">  Unpublished</button>
                
            </div>
            <div class="card-body">
                
                    <div class="row">
                     
                    @foreach ($articles as $article)
                    <div class="col-md-12">
                 
                        <div class="card">
                            <div class="card-body">
                               <h4>{{$article->title}}</h4>
                                
                                @if($article->is_approved == 1)
                                <span class="badge badge-success">published</span>
                                @else
                                <span class="badge badge-dark">unpublished</span>
                                <a href="{{route('article.edit', $article->id)}}">edit</a>
                                @endif 
                            </div>
                        </div>
                   
                    </div>
                   @endforeach
                </div>
                
                
            </div>
        </div>
    </div>
</div> 
</div>
