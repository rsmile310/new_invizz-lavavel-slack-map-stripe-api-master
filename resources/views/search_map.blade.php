@extends('layout.app')

@section('title', 'Search')

@section('content')
<style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      .customMarker {
        position: absolute;
        cursor: pointer;
        background: #424242;
        width: 100px;
        height: 100px;
        /* -width/2 */
        margin-left: -50px;
        /* -height + arrow */
        margin-top: -110px;
        border-radius: 50%;
        padding: 0px;
        }
        .customMarker:hover {
            background: #35c5a3;
        }
        .customMarker:after {
        content: "";
        position: absolute;
        bottom: -10px;
        left: 40px;
        border-width: 10px 10px 0;
        border-style: solid;
        border-color: #424242 transparent;
        display: block;
        width: 0;
        }

        .customMarker img {
        width: 96px;
        height: 96px;
        margin: 2px;
        border-radius: 50%;
        }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      @import url('https://fonts.googleapis.com/css?family=Muli&display=swap');

    .large-container {
      background-image: linear-gradient(45deg, #7175da, #9790F2);
      font-family: 'Muli', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      margin: 0;
    }

    .course {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
      max-width: 100%;
      overflow: hidden;
    }

    .course h6 {
      opacity: 0.6;
      margin: 0;
      letter-spacing: 1px;
      text-transform: none;
    }

    .course h2 {
      letter-spacing: 1px;
      margin: 10px 0;
    }

    .course-preview {
      background-color: #35c5a3;
      color: #fff;
      padding: 30px;
    }

    .course-preview a {
      color: #fff;
      display: inline-block;
      font-size: 12px;
      opacity: 0.6;
      margin-top: 30px;
      text-decoration: none;
    }

    .course-info {
      padding: 30px;
      position: relative;
      width: 100%;
      min-height: 200px;
    }
    </style>

  <div id="map"></div>

<!-- ------------------------------profile-------------------------------- -->

  <div id="modal-profile-dialog" class="profile-dialog">
    <div class="modal-profile-content">
      <div class="modal-profile-top">
        <span id="btn-close" class="profile-close"> &times; </span>
      </div>
      
      <div class="modal-profile-bottom">
        <div class="modal-profile-bottom-row">
          <div class="modal-profile-bottom-position">
            <div class="modal-profile-bottom-border">
              <img src="assets/img/testimonials/testimonials-1.jpg" id="profile-avatar" class="profile-avatar"/>
            </div>
          </div>
          <div class="modal-profile-bottom-name">
            <div class="profile-content">
              <div class="artists-name" id="artist_name">Isabella Fernanda</div>
              <div class="line-spacing"></div>

              <div class="artists-type"><span class="iconify" data-icon="mdi:certificate-outline" data-inline="false" style="font-size:20px;"></span><span  id="artist_type">Conceptual art</span> </div>

              <div class="line-spacing"></div>
              <div class="row">
                <div class="col-md-12">
                  <div class="artists-location">
                    <span class="iconify" data-icon="mdi:map-marker" data-inline="false" style="font-size:20px;"></span>
                    <span id="artist_location">7 E San Marino Ave, Alhambra, Los Angeles, CA, USA</span>
                  </div>
                </div>
              </div>
              <div class="line-spacing"></div>
              <div class="row">
                <div class="col-md-12">
                  <div class="modal-profile-bottom-info">
                    <div class="modal-profile-bottom-detail" style="margin-left:20px;display:flex;"><span class="iconify" data-icon="mdi:facebook" data-inline="false" style="font-size:20px;"></span><div style="margin-top: 1px;"  id="artist_fb">fernanda9812</div></div>
                    <div class="modal-profile-bottom-detail" style="margin-left:20px;display:flex;"><span class="iconify" data-icon="mdi:instagram" data-inline="false" style="font-size:20px;"></span><div style="margin-top: 1px;" id="artist_in">fernanda</div></div>
                    <div class="modal-profile-bottom-detail" style="margin-left:20px;display:flex;"><span class="iconify" data-icon="mdi:twitter" data-inline="false" style="font-size:20px;"></span><div style="margin-top: 1px;" id="artist_rw">fernanda45</div></div>
                    <div class="modal-profile-bottom-detail" style="margin-left:20px;display:flex;"><span class="iconify" data-icon="mdi:linkedin" data-inline="false" style="font-size:20px;"></span></span><div style="margin-top: 1px;" id="artist_lin">fernandalin</div></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      <div style="width:100%; background:#fff;">
        <div class="container">
          <div class="row">
            <div class="col-md-3" style="padding: 30px 20px;">
              <div class="modal-profile-bottom-detail" style="margin-left:0px;display:flex;margin-top:30px"><span class="iconify" data-icon="mdi:email" data-inline="false" style="font-size:25px;"></span><div style="margin-top: 1px;font-size: 16px;margin-left: 2px;"  id="artist_mail">loading...</div></div>
              <br>

              <div class="artists-age">
                <span class="iconify" data-icon="mdi:calendar-month-outline" data-inline="false" style="font-size:30px;"></span>
                 <div style="margin-top: 4px;" id="artist_age"> &nbsp;Age: none</div>
              </div>
              <br>

              <div class="artists-status">
                <span class="iconify" data-icon="mdi:account-multiple" data-inline="false" style="font-size:30px;"></span>
                  <div style="margin-top: 4px;"> &nbsp;Collab Status: On</div>
              </div>
              <br>

              <!-- <a class="btn-get-started scrollto bugfix" style="border-radius:20px;" id="join_invizz" href="/slack" target="_blank"><span class="iconify" data-icon="mdi:slack" data-inline="false" style="font-size:20px;margin-right:3px;margin-bottom:3px;"></span>Slack</a> -->
              <!-- <a class="btn-get-started scrollto bugfix" style="border-radius:20px;" id="join_invizz" href="https://app.slack.com/client/T01J6EAT9UP/D01LJ3C1XGF" target="_blank"><span class="iconify" data-icon="mdi:slack" data-inline="false" style="font-size:20px;margin-right:3px;margin-bottom:3px;"></span>Slack</a> -->
              <a class="btn-get-started scrollto bugfix" style="border-radius:20px;"  href="https://slack.com/app_redirect?channel=U01M3AQ97M5" target="_blank" id="join_invizz"><span class="iconify" data-icon="mdi:slack" data-inline="false" style="font-size:20px;margin-right:3px;margin-bottom:3px;"></span>Message</a>
              <!-- <div style="margin-top:30px;"></div> -->
              <!-- <button class="btn-get-started scrollto bugfix" style="border-radius:20px;" id="btn_slack"><span class="iconify" data-icon="mdi:message-reply-text" data-inline="false" style="font-size:20px;margin-right:3px;"></span>Send Message</button> -->
            </div>

            <div class="col-md-9" style="padding: 30px 20px;">
              <div class="courses-container">
                <div class="course">
                  <div class="course-preview">
                    <h6>INVIZZ</h6>
                    <h2>About Me</h2>
                  </div>
                  <div class="course-info">
                    <h6 id="my_bio"></h6>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>
        
      </div>
    </div>
  </div>

<!-- -------------------------------- profile dialog end ----------------------------- -->

<!-- map/list -->
<div class="change-list"><span class="iconify" data-icon="mdi:format-list-bulleted-square" data-inline="false" style="font-size:25px;float:left;"></span><div style="margin-top: 1px;">List</div></div>
<div class="change-map"><span class="iconify" data-icon="mdi:map-outline" data-inline="false" style="font-size:25px;float:left;"></span><div style="margin-top: 1px;">Map</div></div>
<!-- end -->

<!-- nabvar start -->
  <div class="artists-list">
    <div class="artists-navbar">
      <a href="/"><img src="assets/img/logo.png" class="logo"/></a>
 
      <div style="display:flex;">
        <form method="post" action="/search" id="form">
          @csrf
          <div class="form-group" id="search" style="display:flex;margin: 0px 8px 0 30px;">
            <input type="text" class="form-control" name="search_address" id="search_address" value="{{ $zipcode }}" placeholder="Enter city or ZIP code..." style="border-right: 0px;border-radius: 0.25rem 0rem 0 0.25rem"/>
            <input type="hidden" name="login_info" value="{{$login_info}}"/>
            <button type="submit" form="form" value="Submit" style="border: 1px solid #ced4da;border-left: 0px;padding: 10px;border-radius: 0rem 0.25rem 0.25rem 0rem;"><span class="iconify" data-icon="mdi:account-search" data-inline="false"></span></button>
          </div>
        </form>

        <form method="post" action="/all_view" id="all_view">
          @csrf
          <input type="hidden" name="login_info" value="{{$login_info}}"/>
          <button type="submit" form="all_view" value="Submit" class="search_all">
            <span class="iconify" data-icon="mdi:search-web" data-inline="false"></span>
          </button>
        </form>
      </div>
      

      <!-- <span class="iconify search_all" data-icon="mdi:refresh-circle" data-inline="false"></span> -->
      <!-- <span class="iconify" data-icon="mdi:view-comfy" data-inline="false" style="font-size:30px;margin-top: 4px;"></span> -->
      <!-- <i class="icofont-navigation-menu" style="font-size:30px;margin-top: 4px;"></i> -->
      <!-- <span class="iconify" data-icon="mdi:view-sequential" data-inline="false" style="font-size:30px"></span>  -->
    </div>
    <div class="list-content">

      <div class="container">
        <form method="post" action="/filterbytype" id="filterbytype">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <input type="hidden" name="login_info" value="{{$login_info}}"/>
              <input type="hidden" value="" id="serchbyzipcode" name="serchbyzipcode"/>
              Filter by Artist type:
              <select class="form-control" id="artist_type_for_search" name="artist_type_for_search">
                @foreach ($artist_type as $type)
                  @if($type->status == 'approved')
                    @if($type->id == '1') <option value="{{ $type->id }}" <?php echo ($type->id==$ar_type ? 'selected' : '');?>>Select your artist type...</option>
                    @else<option value="{{ $type->id }}" <?php echo ($type->id==$ar_type ? 'selected' : '');?>>{{ $type->artist_type }}</option>
                    @endif
                  @endif
                @endforeach
              </select>
            </div>
          </div>
        </form>
      </div>
        

        <div class="artists-list-header">Search Results</div>
        <hr/>
        <!-- IMAGE LIST  -->
        @if(count($artists)>0)
          @foreach($artists as $artist)
          <div class="m-list-object" id="profiledetail_{{ $artist->user_id }}">
            <img src="{{ $artist->avatar_src}}" class="m-avatar" id="avatar_{{ $artist->user_id }}"/>
            <div class="m-person-content">
              <div class="m-name">{{ $artist->first_name }} {{ $artist->last_name }}</div>
              <div class="m-type">&nbsp;&nbsp;&nbsp;
              <!-- <span class="iconify" data-icon="ic:outline-favorite" data-inline="false" style="font-size:26px;margin-bottom:3px;color:#B00020"></span> -->
                  @if($artist->a_type)
                    {{ $artist->a_type }}
                  @else
                    Other
                  @endif
              </div>
              <div class="m-location"><span class="iconify" data-icon="ic:baseline-location-on" data-inline="false" style="font-size:22px;margin-bottom:3px;"></span>{{ $artist->address }}</div>
            </div>
            <div class="m-enter"><span class="iconify" data-icon="ic:baseline-keyboard-arrow-right" data-inline="false" style="font-size:40px;"></span></div>
          </div>
          @endforeach
        @else
          <div style="text-align:center;">
          No result,  Please type the correct address or zip code.
          </div>
        @endif

        <!-- IMAGE LIST  -->

    </div>
    
    
    
 </div>
 <div id="pageloader"></div>
@include('scripts.preloader-script')
 @include('scripts.google-map-script')
 @include('scripts.dialog-script')

@endsection