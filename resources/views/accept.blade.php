@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Thank you</h3>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <p>Thank you for your interest our windscreens. One of our competent agents will get in touch with you soon to conclude your quotation.<br />
                                Please note your reference number: #{{ $ref }}.
                            </p>
                            <p>
                                Regards,<br />
                                The Glass Guru online team
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
