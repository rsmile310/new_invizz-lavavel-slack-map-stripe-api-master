@extends('layout.app')
@section('title', 'Profile')
@section('content')
<div class="container top-padding">
    <!-- <meta name="_token" content="{{ csrf_token() }}"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    
    <style type="text/css">
        #image {
            display: block;
            max-width: 100%;
        }
        .preview {
            overflow: hidden;
            width: 160px; 
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }
        .modal-lg{
            max-width: 700px !important;
        } 
    </style>

        <div class="row">
            <div class="col-lg-4 col-xl-4">
                <div class="card-box text-center">
                    
                    <!-- <form action="{{ route('image.upload.post',$profile->user_id) }}" method="POST" enctype="multipart/form-data" name="upload_avatar" id="upload_avatar">
                        @csrf
                        <div class="upload-image">
                            <img id="cover_image_croped" src="@if($profile->avatar_src){{$profile->avatar_src}}@else{{ asset('assets/img/artists/avatar.jpg')}} @endif" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">
                            <input type="file" name="image" class="cover-image" id="file_upload">
                        </div>
                    </form> -->
                    <div class="upload-image">
                        @csrf
                        <img id="cover_image_croped" src="@if($profile->avatar_src){{$profile->avatar_src}}@else{{ asset('assets/img/artists/avatar.jpg')}} @endif" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">
                        <!-- <input type="file" name="image" class="cover-image" id="file_upload"> -->
                        <input type="file" name="images" class="cover-image" id="file_image">
                    </div>


                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">Crop the picture to show you well</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="img-container">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="preview"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel Upload</button>
                                    <button type="button" class="btn btn-primary" id="crop">Crop & Upload</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <h4 class="mb-0">@if(!$profile->first_name) Uncompleted @else {{ $profile->first_name }} {{ $profile->last_name }} @endif</h4>
                    <p class="text-muted">@if(!$profile->first_name) @Artist Type @else {{$profile->a_type }} @endif</p>

                    <p style="font-size:13px; ">We recommend that you upload a picture of your face or a picture of you performing your art! Artists are less likely to message if you are using an Avatar.</p>
                    
                    <br>
                    <hr/>
                    <div class="text-left mt-3">
                        <h4 class="font-13 text-uppercase">About Me :</h4>

                        @if(!$profile->bio)
                        <p class="text-muted font-13 mb-3"  style="font-size:15px; font-style:italic;">
                            "Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                            1500s, when an unknown printer took a galley of type."
                        </p>
                        @else
                        <p class="text-muted font-13 mb-3"  style="font-size:15px; font-style:italic;">
                            {{ $profile->bio }}
                        </p>
                        @endif

                        <br>
                        <br>
                        <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ml-2">@if(!$profile->first_name) Uncompleted @else {{ $profile->first_name }} {{ $profile->last_name }} @endif</span></p>

                        <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 ">{{Auth::user()->email}}</span></p>

                        <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ml-2">@if(!$profile->address) Uncompleted @else {{ $profile->address }} @endif</span></p>
                    </div>
                </div> <!-- end card-box -->
            </div> <!-- end col-->

            <div class="col-lg-8 col-xl-8">
                <div class="card-box">
                    <div class="tab-content">
                        <div class="tab-pane active" id="settings">
                            <form method="post" action="{{ route('profile.update',$profile->user_id) }}" id="profile_update">
                                @method('PUT')
                                @csrf
                                <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i> Personal Info</h5>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">First Name</label>
                                            <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $profile->first_name }}" placeholder="Enter first name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lastname">Last Name</label>
                                            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $profile->last_name }}" placeholder="Enter last name">
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="userbio">Bio</label>
                                            <textarea class="form-control" id="bio" name="bio" rows="4" placeholder="Write something...">{{ $profile->bio }}</textarea>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                
                                <br>
                                <div class="row">
                                    
                                    
                                </div> <!-- end row -->
                                

                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="address">Address </label>
                                            <input type="text" class="form-control" id="address" name="address" value="{{ $profile->address }}" placeholder="Enter your town or city">
                                            <span class="form-text text-muted"><small>(Ex. Fishtown, Philadelphia, PA, USA)</small></span> 
                                        </div>
                                    </div> 
                                    <!-- <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="address">Zip code</label>
                                            <input type="text" class="form-control" id="zipcode" name="zipcode" value="{{ $profile->zipcode }}" placeholder="zipcode">
                                        </div>
                                    </div>  -->
                                </div> <!-- end row -->

                                <input type="hidden" id="zipcode" name="zipcode" value="00000">

                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dob">DOB<small> (Age will appear in profile)</small></label>
                                            <input type="date" class="form-control" id="dob" name="dob" value="{{ $profile->dob }}" placeholder="Enter your birthday">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="artist_type">Artist Type</label>
                                            <select class="form-control" id="artist_type" name="artist_type">
                                                @if($profile->artist_type == 'other')
                                                    @foreach ($artist_type as $type)
                                                        @if($type->status == 'approved')
                                                            <option value="{{ $type->id }}">{{ $type->artist_type }}</option>
                                                        @endif
                                                    @endforeach
                                                        <option value="other" id="other_artist_type" selected>Other...</option>
                                                @else
                                                    @foreach ($artist_type as $type)
                                                        @if($type->status == 'approved')
                                                            <option value="{{ $type->id }}" <?php echo ($type->id==$profile->artist_type ? 'selected' : '');?>>{{ $type->artist_type }}</option>
                                                        @endif
                                                    @endforeach
                                                        <option value="other" id="other_artist_type">Other...</option>
                                                @endif
                                            </select>
                                            <span class="form-text text-muted"><small>What type of artist are you?</small></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="addtype">Don’t see your artist type?</label>
                                        <div class="form-group" id="search" style="display:flex;">
                                            <input type="text" class="form-control" id="addtype" name="addtype" placeholder="Enter your type" disabled="false" style="border-right: 0px;border-radius: 0.25rem 0rem 0 0.25rem">
                                            <button type="button" disabled="false" id="btn_add_type" style="border: 1px solid #ced4da;border-left: 0px;padding: 10px;border-radius: 0rem 0.25rem 0.25rem 0rem;"><span class="iconify" data-icon="mdi:content-save" data-inline="false"></span></button>
                                        </div>
                                        <span class="form-text text-muted"><small>Select ‘Other’ for now and submit your artist type here for our team to add to the list..</span>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <br>
                                <br>

                                <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building mr-1"></i> Profile Setting</h5>
                                <!-- <label for="social-tw">Show/Hide</label> -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="send_mail" name="send_mail" style="display:none;" <?php echo ($profile->send_mail=='on' ? 'checked' : '');?>>
                                            <span class="custom-control-indicator"></span>
                                        </label>
                                        <span>Send me an email whenever a new artist appears in my zip code</span>
                                    </div>
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="hide_age" name="hide_age" style="display:none;" value="on" <?php echo ($profile->hide_age=='on' ? 'checked' : '');?>>
                                            <span class="custom-control-indicator"></span>
                                        </label>
                                        <span>Hide my age in profile</span>
                                    </div>
                                </div> <!-- end row -->
                                <br>
                                <label for="social-tw">Collab Status</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="collab_status" name="collab_status"  style="display:none;" value="on" <?php echo ($profile->collab_status=='on' ? 'checked' : '');?>>
                                            <span class="custom-control-indicator"></span>
                                        </label>
                                        <span>Are you open to collab? If on, you will appear when other artists search your area.</span><br>
                                        <span class="form-text text-muted"><small style="margin-left:60px">(Perhaps you aren’t looking to collab at this time. Set your collab status to “off” and you will not appear in the invizz search.)</small></span>

                                        
                                    </div>
                                </div> <!-- end row -->

                                <br>
                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="addtype">Slack ID</label>
                                        <div class="form-group" style="display:flex;">
                                            <input type="text" class="form-control" id="slack_url" name="slack_url"  value="{{ $profile->slack_url }}" placeholder="Enter your slack ID" style="border-right: 0px;border-radius: 0.25rem 0rem 0 0.25rem">
                                            <a href="https://join.slack.com/t/invizz/shared_invite/zt-owjsbvq9-z7TmQ~dloMa7Fh7mYiJXmw" target="_blank" ><button type="button" id="btn_invite_msg" style="border: 1px solid #ced4da;border-left: 0px;padding: 10px;border-radius: 0rem 0.25rem 0.25rem 0rem;width:210px;"><span class="iconify" data-icon="icomoon-free:enter" data-inline="false"></span>&nbsp;&nbsp;&nbsp;Setup Slack Messenger</button></a>
                                        </div>
                                        <span class="form-text text-muted"><small>Please enter your slack id to chat with other artists. You can receive invite message in your mailbox</span>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                
                                <br>
                                <br>
                                <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth mr-1"></i> Social</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="social-fb">Facebook</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-facebook-square"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="social-fb" name="social_fb" value="{{ $profile->social_fb }}" placeholder="Url">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="social-tw">Twitter</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="social-tw" name="social_tw" value="{{ $profile->social_tw }}" placeholder="Username">
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="social-insta">Instagram</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="social-insta" name="social_insta" value="{{ $profile->social_insta }}" placeholder="Url">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="social-lin">Linkedin</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="social-lin" name="social_lin" value="{{ $profile->social_lin }}" placeholder="Url">
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="text-right" style="display:flex;justify-content:space-between;">
                                    <button type="button" class="btn btn-success waves-effect waves-light mt-2" id="save_profile"><i class="mdi mdi-content-save"></i> Save</button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light mt-2" id="deactive_account"><span class="iconify" data-icon="fe:disabled" data-inline="false"></span> Deactivate account</button>
                                </div>
                            </form>
                        </div>
                        <!-- end settings content-->
                    </div> <!-- end tab-content -->
                </div> <!-- end card-box-->
        </div> <!-- end col -->
    </div>
</div>

@include('scripts.profile-script')
@include('scripts.image-crop-upload-script')
<!-- Template Main JS File -->
<div id="pageloader"></div>
@include('scripts.preloader-script')
@endsection
