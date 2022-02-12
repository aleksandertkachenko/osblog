@extends('layermain')


@section('content')

    
       <div class="col">

      @if ($errors->any())
      
         <div class="row">
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        </div>
      
      @endif

         <div class="row">
          <form action="{{ route('storepost') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="exampleFormControlInput1">Title</label>
              <input type="text" class="form-control" name ="title" id="title" value="{{old('title')}}">
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Text post</label>
              <textarea class="form-control" id="text" name ="text" rows="3"> {{old('text')}}</textarea>
            </div>


            <div class="form-group">
              <label for="exampleFormControlFile1">File input</label>
              <input type="file" class="form-control-file"  name ="image" id="exampleFormControlFile1">
            </div>

              <button type="submit" class="btn btn-primary">Submit</button>

          </form>
         </div>
        </div>
    
            

    


@endsection