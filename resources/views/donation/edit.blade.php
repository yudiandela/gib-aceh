@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Change Donation Data</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Change Donation Data</li>
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

                        <form action="{{ route('donation.update', $donation->id) }}" method="post">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label for="otaID">Nama OTA</label>
                                <select class="form-control @error('ota') is-invalid @enderror" name="ota" id="otaID">
                                    <option value="">--Select Ota--</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ $user->id === $donation->ota_id ? 'selected' : '' }}>
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
                                <label for="jumlah">Jumlah</label>
                                <input name="jumlah" type="text"
                                    class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                                    data-inputmask="&quot;mask&quot;: &quot;+62 999 9999 9999&quot;" data-mask=""
                                    im-insert="true" value="{{ old('jumlah') ?: $donation->jumlah }}">

                                @error('jumlah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="type">Type</label>
                                <select class="form-control @error('type') is-invalid @enderror" name="type" id="type">
                                    <option value="">--Select Type--</option>
                                    <option value="TUNAI" {{ $donation->type === 'TUNAI' ? 'selected' : '' }}>
                                        TUNAI
                                    </option>
                                    <option value="BANK" {{ $donation->type === 'BANK' ? 'selected' : '' }}>
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
                                <button type="submit" class="btn btn-primary">Update Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
