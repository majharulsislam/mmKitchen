@extends('frontend.layouts.master')


@section('pages_content')


    {{-- Navbar --}}
       @include('frontend.partials.navbar')

    {{-- Slider --}}
        <style>
            @foreach($sliders as $key => $slider)
                .owl-carousel .owl-wrapper, .owl-carousel .owl-item:nth-child({{ $key+1 }}) .item
                {
                    background: url({{ asset('uploads/slider/'.$slider->image) }});
                    background-size: cover;
                }
            @endforeach
        </style>

        <!--== 5. Header ==-->
        <section id="header-slider" class="owl-carousel">
            @foreach($sliders as $key => $slider)
                <div class="item">
                    <div class="container">
                        <div class="header-content">
                            <h1 class="header-title">{{ $slider->title }}</h1>
                            <p class="header-sub-title">{{ $slider->subtitle }}</p>
                        </div> <!-- /.header-content -->
                    </div>
                </div>
            @endforeach
        </section>

    {{-- About section --}}
        @include('frontend.section.about')
        
 {{-- pricing section --}}
  <!--==  7. Afordable Pricing  ==-->
  <section id="pricing" class="pricing">
      <div id="w">
          <div class="pricing-filter">
              <div class="pricing-filter-wrapper">
                  <div class="container">
                      <div class="row">
                          <div class="col-md-10 col-md-offset-1">
                              <div class="section-header">
                                  <h2 class="pricing-title">Our Food In Affordable Pricing</h2>
                                  <ul id="filter-list" class="clearfix">
                                      <li class="filter" data-filter="all">All</li>
                                    @foreach($categories as $category)
                                       <li class="filter" data-filter="#{{ $category->slug }}">{{ $category->name }}<span class="badge">{{ $category->items->count() }}</span></li>
                                    @endforeach
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="container">
              <div class="row">  
                  <div class="col-md-10 col-md-offset-1">
                      <ul id="menu-pricing" class="menu-price">

                        @foreach($items as $item)
                          <li class="item" id="{{ $item->category->slug }}">
                              <a href="#">
                                  <img src="{{ asset('uploads/item/'.$item->image) }}" class="img-responsive" alt="Food" >
                                  <div class="menu-desc text-center">
                                      <span>
                                          <h3>{{ $item->name }}</h3>
                                          {{ $item->description }}
                                      </span>
                                  </div>
                              </a>
                                  
                              <h2 class="white">${{ $item->price }}</h2>
                          </li>
                        @endforeach
                      </ul>
                  </div>   
              </div>
          </div>
      </div> 
  </section>

        
    {{-- menudisplay section --}}
        @include('frontend.section.menudisplay')
    
    {{-- menulist section --}}
        @include('frontend.section.menulist')

    {{-- slider-dishes section --}}
        @include('frontend.section.sliderdishes')

    {{-- Reservation --}}
        @include('frontend.section.reserv')

    {{-- contact section --}}
        @include('frontend.section.contact')


@endsection