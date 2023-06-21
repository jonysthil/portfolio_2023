@extends('layouts.layout')

@section('title', 'Contact')

@section('container')

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="card-title">Contact</h4>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('contact') }}" class="btn btn-sm btn-secondary"><i class="la la-list"></i> List</a>
                    </div>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">

                    <p><b>Name:</b> {{ $contact->cnt_name }}</p>
                    <p><b>Mail:</b> {{ $contact->cnt_mail }}</p>
                    <p><b>Phone:</b> {{ $contact->cnt_phone }}</p>
                    <p><b>Date:</b> {{ $contact->cnt_date->format('d F, Y') }}</p>
                    <p><b>Message:</b></p>
                    {!! $contact->cnt_message !!}

                </div>
            </div>
        </div>
    </div>
</div>


@endsection