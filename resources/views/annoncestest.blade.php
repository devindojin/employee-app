@extends('layouts.main')

@section('title', 'Jobs')

@section('content')

@include('partials.success')

              <div>
                  <main class="row">
                                          <div class="col-lg-3 hidden-xs">
                          <div id="JobCategory" class="facet"></div>
                          <div id="lieu" class="facet"></div>
                          <div id="Contrat" class="facet"></div>
                      </div>
                                          <div class="col-lg-9">
                        <div class="row">
                          <div id="search-input" class="col-lg-12 bottomspace"></div>
                          <div id="stats" class="col-lg-10 bottomspace"></div>
                        </div>
                          <div id="hits" class="row bottomspace"></div>
                      </div>
              </div>


        <!-- Hit template Algolia -->
        <script type="text/html" id="hits-template">
                  <div class="card-mb-2"><a href="@{{url}}">
                        <div class="card-body">
                          <h5 class="heading1">@{{titre}} - @{{entreprise}} </h5>
                          <p class="card-text" style="padding: 10px 0;color: #35693a;">
                              <i class="fa fa-map-marker"></i> @{{lieu}}  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  <i class="far fa-clock"></i> @{{date}} &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;   <i class="fas fa-briefcase"></i> @{{contrat}} </p>
                          <p class="card-text"> VOIR L'OFFRE </p>
                        </div>
                      </a>
                </div>
       </script>
       <!-- stat template Algolia -->
        <script type="text/html" id="stats-template">
            <div data-reactroot="" class="ais-root ais-stats">
            <div class="ais-body ais-stats--body">
                <div> 
                    @{{nbHits}} offre(s) correspond(ent) à votre recherche
                </div>
            </div>
        </div>
    </script>
        <hr>
        </main>
    </header>

@endsection
