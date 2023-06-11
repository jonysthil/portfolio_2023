@extends('layouts.layout')

@section('title', 'Detail Service')

@section('container')

<div class="row">
    <div class="col-1"></div>
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="card-title">Detail Services</h4>  
                    </div>
                    <div class="col-md-6 text-right">

                        <a class="btn btn-sm btn-danger" 
                            href="javascript:return false;" 
                            onclick="document.modelForm.action='{{ route('service.delete', $service->ser_id) }}';" 
                            data-toggle="modal" 
                            data-target="#service-delete">
                            <i class="la la-trash font-medium-1"></i>
                        </a>
                        <a href="{{ route('service.edit', $service->ser_id) }}" class="btn btn-sm btn-info">
                            <i class="la la-edit font-medium-1"></i>
                        </a>
                        <a href="{{ route('services') }}" class="btn btn-sm btn-secondary">
                            <i class="la la-list font-medium-1"></i>
                        </a>
                    </div>
                </div>
                
            </div>
            @include('admin/service/delete')
            <div class="card-content">
                <div class="card-body">

                    <div class="custom-control-inline custom-switch">
                        <input data-url="{{ route('service.status', $service->ser_id) }}" type="checkbox" class="custom-control-input isActiveElement" id="ser_status" {{ ($service->ser_status) ? 'checked' : '' }} >
                        <label class="custom-control-label" for="ser_status">Status <span id="up-control" class="text-{{ ($service->ser_status) ? 'success' : 'danger' }}">{{ ($service->ser_status) ? 'Online' : 'Offline' }}</span></label>
                    </div>
                    <p><b>Title:</b> {{ $service->ser_name }}</p>
                    <p><b>Description:</b></p>
                    {!! $service->ser_description !!}

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Icon</h4>             
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <img class="img-fluid img-responsive" src="{{ asset(Tools::exist_image('service', $service->ser_icon)) }}" alt="Service icon">
                        </div>
                    </div>
                    <hr>
                    <form action="{{ route('service.icon', $service->ser_id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <fieldset class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="ser_icon" name="ser_icon">
                                <label class="custom-file-label" for="ser_icon" aria-describedby="ser_icon">Choose icon</label>
                            </div>
                            @error('ser_icon') <span class="text-danger">{!! $message !!}</span> @enderror
                        </fieldset>

                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-sm btn-success">Save icon</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection