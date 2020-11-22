@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Show Supplier</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('suppliers.index') }}"> Back</a>
            </div>
        </div>
    </div>
 
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No:</strong>
                {{ $supplier->no }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Supplier:</strong>
                {{ $supplier->nama_supplier }}
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kode Supplier</strong>
                {{ $supplier->kode_supplier }}
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Minimal Stock:</strong>
                {{ $supplier->minimal_stock }}
            </div>
        </div>
    </div>
@endsection