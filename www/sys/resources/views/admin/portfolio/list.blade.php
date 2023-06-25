@extends('layouts.layout')

@section('title', 'Portfolio')

@section('container')

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10 col-sm-12">
                        <h4 class="card-title">List Proyect</h4>
                    </div>
                    <div class="col-md-2 col-sm-12 text-right">
                        <a href="{{ route('portfolio.new') }}" class="btn btn-sm btn-block btn-primary">
                            <i class="la la-plus-circle font-medium-1"></i> New Proyect
                        </a>
                    </div>
                </div>                
            </div>
            <div class="card-content">
                <div class="card-body">

                    <span class="text-info">Sort the elements, just by moving the cells of the table.</span>

                    @if ($portfolio->isEmpty())
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
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="changeOrder" data-url="{{ route('portfolio.order') }}">
                                @foreach ($portfolio as $prt)
                                <tr id="ord-{{ $prt->prt_id }}">
                                    <td class="text-center"><span class="loop-{{ $prt->prt_id }}">{{ $loop->iteration }}</span></td>
                                    <td class="text-center">
                                        <div class="custom-control-inline custom-switch">
                                            <input data-url="{{ route('portfolio.status', $prt->prt_id) }}" type="checkbox" class="custom-control-input isActiveElement" id="prt_status-{{ $prt->prt_id }}" {{ ($prt->prt_status) ? 'checked' : '' }} >
                                            <label class="custom-control-label" for="prt_status-{{ $prt->prt_id }}"><span id="up-control-{{ $prt->prt_id }}" class="text-{{ ($prt->prt_status) ? 'success' : 'danger' }}">{{ ($prt->prt_status) ? 'Online' : 'Offline' }}</span></label>
                                        </div>
                                    </td>
                                    <td>{{ $prt->prt_title }}</td>
                                    <td>{!! substr($prt->prt_description, 0, 80) !!} ...</td>
                                    <td style="width: 115px;" class="text-center">
                                        <a href="{{ route('portfolio.detail', $prt->prt_id) }}" class="btn btn-icon btn-pure info mr-1">
                                            <i class="la la-eye"></i>
                                        </a>
                                        <a class="btn btn-icon btn-pure danger" href="javascript:return false;" onclick="document.modelFormPort.action='{{ route('portfolio.delete', $prt->prt_id) }}';" data-toggle="modal" data-target="#portfolio-delete"><i class="la la-trash"></i></a>
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


@include('admin/portfolio/delete')

@endsection