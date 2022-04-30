@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('First, let\'s get your licence disc ready. If you already have your licence disc barcode ready, head over here and get a ') }}
                    <a href="{{ route('scanner') }}">{{ __('quote.') }}</a>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('lookup') }}" class="col-lg-8">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" for="vin">{{ __('Please enter the 17 digit vehicle\'s VIN number below.') }}</label>
                            <input placeholder="e.g. VIN123ABC456D9990" id="vin" type="text" class="col-lg-6 form-control @error('vin') is-invalid @enderror" name="vin" required autocomplete="vin" autofocus />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="make">{{ __('The make of the car.') }}</label>
                            <input placeholder="e.g. Mitsubishi" id="make" type="text" class="col-lg-6 form-control @error('vin') is-invalid @enderror" name="make" required autocomplete="vin" autofocus />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="model">{{ __('The model.') }}</label>
                            <input placeholder="e.g. Outlander" id="model" type="text" class="form-control @error('vin') is-invalid @enderror" name="model" required autocomplete="vin" autofocus />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="year">{{ __('The year of first registration.') }}</label>
                            <input placeholder="e.g. 2015" id="year" type="number" class="form-control @error('vin') is-invalid @enderror" name="year" required autocomplete="vin" autofocus />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="registration">{{ __('The car registration.') }}</label>
                            <input placeholder="e.g. KB20FFGP" id="registration" type="text" class="form-control @error('vin') is-invalid @enderror" name="registration" required autocomplete="vin" autofocus />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="issue_date">{{ __('The licence disc issue date.') }}</label>
                            <input placeholder="e.g. 20210501" id="issue_date" type="number" class="form-control @error('vin') is-invalid @enderror" name="issue_date" required autocomplete="vin" autofocus />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="expire_date">{{ __('The licence disc expiry date.') }}</label>
                            <input placeholder="e.g. 20220430" id="expire_date" type="number" class="form-control @error('vin') is-invalid @enderror" name="expire_date" required autocomplete="vin" autofocus />
                        </div>

                        <div class="mb-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <button type="submit" class="btn btn-secondary w-full">
                                        {{ __('Generate') }}
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
