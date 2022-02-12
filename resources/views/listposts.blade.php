@extends('layermain')


@section('content')

    @foreach ($posts as $post)
       <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>{{$post->title}}</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">{{$post->title}}</text></svg>

            <div class="card-body">
              <p class="card-text">{{$post->text}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  
                  <button type="button" class="btn btn-sm btn-outline-secondary">Del</button>
                </div>
                <small class="text-muted">{{$post->created_at}}</small>
              </div>
            </div>
          </div>
        </div>
    @endforeach
            

    @empty($posts)
        <div class="col">
          <div class="card shadow-sm">
             Not posts
          </div>
        </div>
    @endempty


@endsection

        
        
        

        