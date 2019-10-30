@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ __('User Management') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('User Management') }}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <table class="dataTable table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}
                            </td>
                            <td>
                                <a href="{{ $user->id }}" class="showUser btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#modal-lg" data-name="{{ $user->name }}"
                                    data-email="{{ $user->email }}"
                                    data-photo="{{ $user->profile !== null ? $user->profile->avatar : '/images/gib-logo.png' }}"
                                    data-phone="{{ $user->profile !== null ? $user->profile->phone : 'Belum ada data' }}"
                                    data-address="{{ $user->profile !== null ? $user->profile->address : 'Belum ada data' }}"
                                    data-facebook="{{ $user->profile !== null ? $user->profile->facebook_user : 'Belum ada data' }}"
                                    data-twitter="{{ $user->profile !== null ? $user->profile->twitter_user : 'Belum ada data' }}"
                                    data-instagram="{{ $user->profile !== null ? $user->profile->instagram_user : 'Belum ada data' }}"
                                    data-youtube="{{ $user->profile !== null ? $user->profile->youtube_user : 'Belum ada data' }}">
                                    <i class="fas fa-eye"></i>
                                </a>

                                @if (Auth::user()->isAdmin())
                                <a href="{{ route('user.destroy', $user->id) }}"
                                    class="btn-remove btn btn-danger btn-sm"
                                    onclick="event.preventDefault(); document.getElementById('delete-user-{{ $user->id }}').submit();">
                                    <i class="fas fa-trash"></i>
                                </a>

                                <form hidden id="delete-user-{{ $user->id }}"
                                    action="{{ route('user.destroy', $user->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>

                                <a href="{{ route('user.role', $user->id) }}" class="btn btn-info btn-sm"
                                    onclick="event.preventDefault(); document.getElementById('role-{{ $user->id }}').submit();">
                                    <i class="fas fa-user"></i>
                                </a>

                                <form hidden id="role-{{ $user->id }}" action="{{ route('user.role', $user->id) }}"
                                    method="post">
                                    @csrf
                                    @method('patch')
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>



<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">User Detail</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4 text-center">
                        <img id="userShowPhoto" src="" class="img-thumbnail" alt="">
                    </div>
                    <div class="col-sm-8">
                        <table class="table no-border table-sm">
                            <thead>
                                <tr class="bg-primary">
                                    <th colspan="3" class="align-top">Profile</th>
                                </tr>
                                <tr>
                                    <th class="align-top">Nama</th>
                                    <td>:</td>
                                    <td><span id="userShowName"></span></td>
                                </tr>
                                <tr>
                                    <th class="align-top">Email</th>
                                    <td>:</td>
                                    <td><span id="userShowEmail"></span></td>
                                </tr>
                                <tr>
                                    <th class="align-top">Handphone</th>
                                    <td>:</td>
                                    <td><span id="userShowPhone"></span></td>
                                </tr>
                                <tr>
                                    <th class="align-top">Alamat</th>
                                    <td>:</td>
                                    <td><span id="userShowAddress"></span></td>
                                </tr>
                                <tr class="bg-primary">
                                    <th colspan="3" class="align-top">Socials</th>
                                </tr>
                                <tr>
                                    <th class="align-top">Facebook</th>
                                    <td>:</td>
                                    <td><span id="userShowFacebook"></span></td>
                                </tr>
                                <tr>
                                    <th class="align-top">Instagram</th>
                                    <td>:</td>
                                    <td><span id="userShowInstagram"></span></td>
                                </tr>
                                <tr>
                                    <th class="align-top">Youtube</th>
                                    <td>:</td>
                                    <td><span id="userShowYoutube"></span></td>
                                </tr>
                                <tr>
                                    <th class="align-top">Twitter</th>
                                    <td>:</td>
                                    <td><span id="userShowTwitter"></span></td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="fas fa-times"></i>
                    Close
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection

@push('script')
<script>
    $('.showUser').click(function() {
        const name = $(this).data('name')
        const photo = $(this).data('photo')
        const email = $(this).data('email')
        const phone = $(this).data('phone')
        const address = $(this).data('address')
        const facebook = $(this).data('facebook')
        const instagram = $(this).data('instagram')
        const youtube = $(this).data('youtube')
        const twitter = $(this).data('twitter')

        $('#userShowName').text(name)
        $('#userShowPhoto').attr('src', photo)
        $('#userShowEmail').text(email)
        $('#userShowPhone').text(phone)
        $('#userShowAddress').text(address)
        $('#userShowFacebook').text(facebook)
        $('#userShowInstagram').text(instagram)
        $('#userShowYoutube').text(youtube)
        $('#userShowTwitter').text(twitter)
    })
</script>
@endpush
