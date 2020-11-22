@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Garasi Ibnu Sabil</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('dts.create') }}"> Create Product</a>
            </div>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
 
    <table class="table table-bordered">
        <tr>
        
            <th width="20px" class="text-center">No</th>
            <th>Supplier</th>
            <th>Nama</th>
            <th>Kode</th>
            <th>Minimal Stock</th>
            <th>Harga</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($dts as $dt)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $dt->supplier }}</td>
            <td>{{ $dt->nama }}</td>
            <td>{{ $dt->kode }}</td>
            <td>{{ $dt->minimal_stock }}</td>
            <td>{{ $dt->harga }}</td>
            <td class="text-center">
                <form action="{{ route('dts.destroy',$dt->id) }}" method="POST">
 
                    <a class="btn btn-info btn-sm" href="{{ route('dts.show',$dt->id) }}">Show</a>
 
                    <a class="btn btn-primary btn-sm" href="{{ route('dts.edit',$dt->id) }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $dts->links() !!}
 
@endsection