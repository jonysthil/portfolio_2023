@extends('layouts.layout')

@section('title', 'Services')

@section('container')

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10 col-sm-12">
                        <h4 class="card-title">List Services</h4>
                    </div>
                    <div class="col-md-2 col-sm-12 text-right">
                        <a href="{{ route('service.new') }}" class="btn btn-sm btn-block btn-primary">
                            <i class="la la-plus-circle font-medium-1"></i> New service
                        </a>
                    </div>
                </div>                
            </div>
            <div class="card-content">
                <div class="card-body">

                    <span class="text-info">Sort the elements, just by moving the cells of the table.</span>

                    @if ($service->isEmpty())
                    <div class="alert alert-danger mb-2" role="alert">
                        <strong>Oh snap!</strong> No records were found in the db.
                    </div>
                    @else
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered zero-configuration table-condensed">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Status</th>
                                    <th>Logo</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="changeOrder" data-url="{{ route('service.order') }}">
                                @foreach ($service as $ser)
                                <tr id="ord-{{ $ser->ser_id }}">
                                    <td class="text-center"><span class="loop-{{ $ser->ser_id }}">{{ $loop->iteration }}</span></td>
                                    <td class="text-center">
                                        <div class="badge badge-{{ ($ser->ser_status) ? 'success' : 'danger' }} badge-square">
                                            <span>{{ ($ser->ser_status) ? 'Online' : 'Offline' }}</span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <img class="case-item__icon" src="{{ asset('uploads/service/' . $ser->ser_icon) }}" alt="" />
                                    </td>
                                    <td>{{ $ser->ser_name }}</td>
                                    <td>{!! $ser->ser_description !!}</td>
                                    <td style="width: 115px;" class="text-center">
                                        <a href="{{ route('service.detail', $ser->ser_id) }}" class="btn btn-icon btn-pure info mr-1">
                                            <i class="la la-eye"></i>
                                        </a>
                                        <a class="btn btn-icon btn-pure danger" href="javascript:return false;" onclick="document.modelForm.action='{{ route('service.delete', $ser->ser_id) }}';" data-toggle="modal" data-target="#service-delete"><i class="la la-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>


@include('admin/service/delete')

@endsection