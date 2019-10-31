@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Donation</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Create Donation</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="card card-primary card-outline">
                    <div class="card-body">

                        <form action="{{ route('donation') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="otaID">Nama OTA<span class="text-danger">*</span></label>
                                <select class="form-control @error('ota') is-invalid @enderror" name="ota" id="otaID">
                                    <option value="">--Select Ota--</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ old('ota') == $user->id ? 'selected' : ''}}>
                                        {{ $user->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('ota')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="jumlah">Jumlah<span class="text-danger">*</span></label>
                                <input name="jumlah" type="text"
                                    class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                                    value="{{ old('jumlah') }}">

                                @error('jumlah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="type">Type<span class="text-danger">*</span></label>
                                <select class="form-control @error('type') is-invalid @enderror" name="type" id="type">
                                    <option value="">--Select Type--</option>
                                    <option value="TUNAI" {{ old('type') == 'TUNAI' ? 'selected' : '' }}>
                                        TUNAI
                                    </option>
                                    <option value="BANK" {{ old('type') == 'BANK' ? 'selected' : '' }}>
                                        BANK
                                    </option>
                                </select>

                                @error('type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="float-right">
                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
