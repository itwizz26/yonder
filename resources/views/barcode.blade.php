@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('First, take picture of this barcode with your mobile device and click on the "Get quote" button below to get a quote for your vehicle\'s windscreen.') }}
                    </div>

                    <div class="card-body">
                        <form action="{{ route('scanner') }}" class="col-lg-6">
                            @csrf
                            <div class="mb-3 mx-auto d-block">{!! QrCode::size(500)->generate($barcode); !!}</div>
                            <label class="form-label" for="barcode">{{ __('Your vehicle\'s licence disc.') }}</label>
                            <div class="mb-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <button type="submit" class="btn btn-secondary w-full" id="lookup_vin">
                                            {{ __('Get quote') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
