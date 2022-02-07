@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    @can('admin')
                    <a href="/home/create" class="btn btn-primary">+ Tambah</a><br><br>
                    @endcan
                    <div class="table-responsive">
                        <table class="table table-striped">
                            @csrf
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Tanggal lahir</th>
                                    @can('admin')
                                    <th scope="col">Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($datas as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->nim }}</td>
                                        <td>{{ $data->tanggal_lahir }}</td>
                                        @can('admin')    
                                        <td>
                                            <a href="/home/{{ $data->id }}/edit" class="btn btn-success">Edit</a>
                                            <form action="/home/{{ $data->id }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                        @endcan
                                    </tr>
                                @empty
                                    <td class="text-center" colspan="5">Data tidak ada</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
