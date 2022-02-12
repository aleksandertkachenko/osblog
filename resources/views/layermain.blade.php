<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="test">
    <title>Blog</title>

    <!-- Bootstrap core CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>
    
<header>
  
</header>

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <a href="{{url('/')}}"> <h1 class="fw-light">My blog</h1> </a>
        <p class="lead text-muted">My blog for adding notes and photos for memory.</p>
        
        @if (!Route::is('createpost'))
        <p>
          <a href="{{url('/create')}}" class="btn btn-primary my-2">Add new item</a>
        </p>
        @endif

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible mt-4" role="alert">            
            {{ $message }}
        </div>
        @endif


      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">


        @if (Route::is('listposts'))
          <div class="row">
            <div class="col">
              
              <form class="form-inline" action="{{ route('listposts') }}">
                  @csrf
                  

                  <div class="input-group mb-3">
                    <input type="search" class="form-control" placeholder="search title post..." name="textsearch" aria-label="search title post..." aria-describedby="basic-addon2" value="{{ $textsearch ?? ''  }}">
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                  </div>


                  


              </form>




            </div>
          </div>
        @endif
      

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
        
      @yield('content')

        


      </div>
    </div>
  </div>

</main>

  </body>
</html>