@extends('layouts.main')

@section('title', 'Jobs')

@section('content')

@include('partials.success')

<div class="container mt-5">  
          <div class="ml-1">
              <div>
                  <main class="row">
                                          <div class="col-lg-3 d-none d-sm-block">
                          <div id="JobCategory" class="facet"></div>
                          <div id="lieu" class="facet"></div>
                      </div>
                                          <div class="col-lg-9">
                        <div class="row">
                          <div id="search-input" class="col-lg-10 mb-2"></div>
                          <div id="stats" class="col-lg-10 mb-2"></div>
                        </div>
                          <div id="hits" class="row"></div>
                          <div id="pagination" class="event"></div>
                      </div>
              </div>
          </div>
        </div>
        <!-- Hit template Algolia -->
        <script type="text/html" id="hits-template">
                  <div class="card-mb-2"><a href="{{url}}">
                        <div class="card-body">
                          <h5 class="card-title text-center">@{{ titre }}</h5>
                          <p class="card-text text-center" style="padding: 10px 0;margin-bottom: 20px;">
                            @{{ #lieu }}
                              <i class="fas fa-map-marked-alt"></i> @{{ lieu }}
                            @{{ /lieu }}
                          </p>
                        </div>
                      </a>
                </div>
       </script>
       <!-- stat template Algolia -->
        <script type="text/html" id="stats-template">
            <div data-reactroot="" class="ais-root ais-stats">
            <div class="ais-body ais-stats--body">
                <div> 
                    @{{ nbHits }} offres correspondent à votre recherche
                </div>
            </div>
        </div>
    </script>
        <hr>
        </main>
    </header>
    <!-- Algolia --> 
      <script src="https://cdn.jsdelivr.net/instantsearch.js/1.5.1/instantsearch.min.js"></script>
      <script type="text/javascript" src="{{ asset('js/search_algolia.js') }}"></script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

@endsection