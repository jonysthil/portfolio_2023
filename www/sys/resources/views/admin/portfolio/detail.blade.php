@extends('layouts.layout')

@section('title', 'Portfolio')

@section('container')

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="card-title">Proyect Detail</h4>             
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-sm btn-danger" 
                            href="javascript:return false;" 
                            onclick="document.modelForm.action='{{ route('portfolio.delete', $proyect->prt_id) }}';" 
                            data-toggle="modal" 
                            data-target="#portfolio-delete">
                            <i class="la la-trash font-medium-1"></i>
                        </a>
                        <a href="{{ route('portfolio.edit', $proyect->prt_id) }}" class="btn btn-sm btn-info">
                            <i class="la la-edit font-medium-1"></i>
                        </a>
                        <a href="{{ route('portfolio') }}" class="btn btn-sm btn-secondary">
                            <i class="la la-list font-medium-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            @include('admin/portfolio/delete')
            <div class="card-content">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            
                            <p>
                                <div class="custom-control-inline custom-switch">
                                    <input data-url="{{ route('portfolio.status', $proyect->prt_id) }}" type="checkbox" class="custom-control-input isActiveElement" id="prt_status" {{ ($proyect->prt_status) ? 'checked' : '' }} >
                                    <label class="custom-control-label" for="prt_status">Status <span id="up-control-{{ $proyect->prt_id }}" class="text-{{ ($proyect->prt_status) ? 'success' : 'danger' }}">{{ ($proyect->prt_status) ? 'Online' : 'Offline' }}</span></label>
                                </div>
                            </p>
                            <p><b>Title:</b> {{ $proyect->prt_title }}</p>
                            <p><b>Category:</b> {{ $proyect->pc_name }}</p>
                            <p><b>Date of delivery:</b> {{ $proyect->prt_date->format('d F, Y') }}</p>

                        </div>
                        <div class="col-md-6">
                            <p><b>Description:</b></p>
                            {!! $proyect->prt_description !!}
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>

@endsection