@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Donation</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Donation</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <a href="{{ route('donation.create') }}" class="btn btn-primary mb-3">
            Create a New Donation
        </a>
        <div class="card card-primary card-outline">
            <div class="card-body">
                <table class="dataTable table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>OTA</th>
                            <th>Paskas</th>
                            <th>Jumlah</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($donations as $donation)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $donation->ota->name }}</td>
                            <td>{{ $donation->paskas->name }}</td>
                            <td>Rp. {{ number_format($donation->jumlah, 0, ',', '.') }},-</td>
                            <td>{{ $donation->type }}</td>
                            <td>{{ $donation->created_at->format('d F Y') }}</td>
                            <td>
                                <a href="{{ route('donation.edit', $donation->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
