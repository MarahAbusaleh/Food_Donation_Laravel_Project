@extends('Layout.master')
@section('content')

<section class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center my-4">
        
        <h2>
         
          @php $categoryNameDisplayed = false; @endphp

          @foreach ($donations as $donation)
              @if (!$categoryNameDisplayed)
                  {{ $donation->category->name }}
                  @php $categoryNameDisplayed = true; @endphp
              @endif
          @endforeach
         
        </h2>
      </div>

        <div class="row grid">
          @foreach ($donations as $donation)
          <div class="col-sm-6 col-lg-4 all ">
            <div class="box">
              <div>
          
                <div class="img-box">
                  <img src="{{ asset('images/donations/' . $donation->image) }}" alt="{{ $donation->name }}" width="200"
                    height="200">
                </div>
                <div class="detail-box">
                  <h5>
                    {{ $donation->name }}
                  </h5>
                  <p>
                    {{ $donation->description }}
                  </p>
                  <div class="options d-flex justify-around">
                    <h6 class="text-light">
                      {{ $donation->price }} JOD
                    </h6>
                    <a href="{{ route('singleDonation', $donation->id) }}"><button class="orange-button">Donate</button></a>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
          @endforeach
          
          <div class="col-12 my-4 rounded-5 py-3" style="background: #f0f8ff">
            <center>
              <h4 style="color: #5a6f80">If you want to donate something else</h style="color: #5a6f80">
                <br><br>
                <div class="col-2 custom-form">
                  <button type="submit" class="form-control">click here</button>
                </div>
              </div>
            </center>
        </div>
        
      
        
    </div> <br>
    <div style="padding-bottom: 10px;font-size: 14px;margin-left:45%;margin-top:30px;" >
      {{ $donations->links() }}
  </div>
  </section>

@endsection
