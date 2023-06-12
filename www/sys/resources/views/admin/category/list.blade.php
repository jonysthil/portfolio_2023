@extends('layouts.layout')

@section('title', 'Categories')

@section('container')

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Categories</h4>
            </div>
            <div class="card-content">
                <div class="card-body">

                    @if ($category->isEmpty())
                    <div class="alert alert-danger mb-2" role="alert">
                        <strong>Oh snap!</strong> No records were found in the db.
                    </div>
                    @else
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $pc)
                                <tr>
                                    <td class="text-center"><span class="loop-{{ $pc->pc_id }}">{{ $loop->iteration }}</span></td>
                                    <td>{{ $pc->pc_name }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-icon btn-pure danger" href="javascript:return false;" onclick="document.modelForm.action='{{ route('category.delete', $pc->pc_id) }}';" data-toggle="modal" data-target="#category-delete"><i class="la la-trash"></i></a>
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
    <div class="col-md-4 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">New Category</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    @include('admin.category.new')
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin/category/delete')


@endsection