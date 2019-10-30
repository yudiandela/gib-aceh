@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img" src="{{ $user->profile->avatar }}" alt="User profile picture">

                            <form action="{{ route('profile.update', $user->profile->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <input type="file" name="photo" id="photo-user" hidden>
                                <button type="submit" class="btn btn-success btn-sm btn-upload hide">
                                    <i class="fas fa-check"></i>
                                </button>
                            </form>
                        </div>


                        <h3 class="profile-username text-center">
                            {{ $user->name }}
                        </h3>

                        <p class="text-muted text-center">
                            {{ $user->email }}
                            <br>
                            {{ $user->profile->phone }}
                        </p>

                        <ul class="list-group list-group-unbordered mb-3">

                            @if ($user->profile->facebook !== null)
                            <li class="list-group-item">
                                <b>{{ __('Facebook') }}</b>
                                <a href="{{ $user->profile->facebook_link }}" class="text-muted float-right"
                                    target="_blank">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                            </li>
                            @endif

                            @if ($user->profile->youtube !== null)
                            <li class="list-group-item">
                                <b>{{ __('Youtube') }}</b>
                                <a href="{{ $user->profile->youtube_link }}" class="text-muted float-right"
                                    target="_blank">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                            </li>
                            @endif

                            @if ($user->profile->instagram !== null)
                            <li class="list-group-item">
                                <b>{{ __('Instagram') }}</b>
                                <a href="{{ $user->profile->instagram_link }}" class="text-muted float-right"
                                    target="_blank">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                            </li>
                            @endif

                            @if ($user->profile->twitter !== null)
                            <li class="list-group-item">
                                <b>{{ __('Twitter') }}</b>
                                <a href="{{ $user->profile->twitter_link }}" class="text-muted float-right"
                                    target="_blank">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
            <div class="col-md-8">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <form action="{{ route('profile') }}" method="POST" class="form-horizontal">

                            @csrf

                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">
                                    {{ __('Name') }}
                                </label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input name="name" type="text" class="form-control" id="inputName"
                                            value="{{ $user->name ?: old('name') }}"
                                            placeholder="{{ __('Full Name') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row border-bottom pb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">
                                    {{ __('Email') }}
                                </label>

                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input disabled type="email" class="form-control disabled" id="inputEmail"
                                            value="{{ $user->email ?: old('email') }}" placeholder="{{ __('Email') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPhone" class="col-sm-2 col-form-label">
                                    {{ __('Handphone') }}
                                </label>

                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input name="phone" id="inputPhone" type="text" class="form-control"
                                            data-inputmask="&quot;mask&quot;: &quot;+62 999 9999 9999&quot;"
                                            data-mask="" im-insert="true"
                                            value="{{ $user->profile->phone ?: old('phone') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row border-bottom pb-3">
                                <label for="inputAddress" class="col-sm-2 col-form-label">
                                    {{ __('Address') }}
                                </label>

                                <div class="col-sm-10">
                                    <textarea name="address" class="form-control" id="inputAddress"
                                        placeholder="Address ex: Jln Medan-Banda Aceh Km 25"
                                        rows="3">{{ $user->profile->address ?: old('address') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label">
                                    {{ __('Facebook') }}
                                </label>

                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                                        </div>
                                        <input name="facebook" type="text" class="form-control"
                                            placeholder="Link Facebook"
                                            value="{{ $user->profile->facebook_link ?: old('facebook') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label">
                                    {{ __('Youtube') }}
                                </label>

                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                                        </div>
                                        <input name="youtube" type="text" class="form-control"
                                            placeholder="Link Youtube"
                                            value="{{ $user->profile->youtube_link ?: old('youtube') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label">
                                    {{ __('Instagram') }}
                                </label>

                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                        </div>
                                        <input name="instagram" type="text" class="form-control"
                                            placeholder="Link Instagram"
                                            value="{{ $user->profile->instagram_link ?: old('instagram') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label">
                                    {{ __('Twitter') }}
                                </label>

                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                        </div>
                                        <input name="twitter" type="text" class="form-control"
                                            placeholder="Link Twitter"
                                            value="{{ $user->profile->twitter_link ?: old('twitter') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row border-top mt-2 pt-3">
                                <div class="offset-sm-8 col-sm-4">
                                    <button type="submit" class="float-right btn btn-primary btn-block btn-flat">
                                        <i class="far fa-save"></i>
                                        {{ __('Update Data') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection

@push('script')
<script>
    function readURL() {
        var $input = $(this)
        var $photo =  $('.profile-user-img ')
        if (this.files && this.files[0]) {
            var reader = new FileReader()
            reader.onload = function (e) {
                $photo.attr('src', e.target.result).show()
            }
            reader.readAsDataURL(this.files[0])
            $('.btn-upload').show()
        }
    }

    $('.profile-user-img').click(function() {
        $('#photo-user').click()
    })

    $('.btn-upload').hide()

    $("#photo-user").change(readURL)
</script>
@endpush
