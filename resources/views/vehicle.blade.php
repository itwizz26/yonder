@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @if (isset($errors) && $errors[0])
                        <div class="card-header alert alert-warning" role="alert">
                            {{ __('A quote could not be generated due to the following reason(s)!')}}
                        </div>
                        <div class="card-body">
                            <ul>
                                @foreach($errors as $message)
                                    <li><strong>{{ $message }}</strong></li>
                                @endforeach
                            </ul>
                            <p>Try <a href="{{ Route('home') }}">again.</a> Maybe you entered incorrect details for your car?</p>
                        </div>
                    @else
                        <div id="quotation">
                            <div class="card-header alert alert-success" role="alert">
                                {{ __('Vehicle windscreen quotation: #') . $quote['ref'] }}
                            </div>
                            <form action="{{ Route('accept') }}" method="POST" class="col-lg-8">
                                @csrf
                                <input type="hidden" name="ref" value="{{ $quote['ref'] }}" />
                                <input type="hidden" name="cost" value="{{ $quote['cost'] }}" />
                                <input type="hidden" name="name" value="{{ $quote['name'] }}" />
                                <input type="hidden" name="email" value="{{ $quote['email'] }}" />
                                <input type="hidden" name="vin" value="{{ $quote['vin'] }}" />
                                <input type="hidden" name="make" value="{{ $quote['make'] }}" />
                                <input type="hidden" name="model" value="{{ $quote['model'] }}" />
                                <input type="hidden" name="year" value="{{ $quote['year'] }}" />
                                <input type="hidden" name="reg" value="{{ $quote['reg'] }}" />
                                <input type="hidden" name="issue" value="{{ $quote['issue'] }}" />
                                <input type="hidden" name="expire" value="{{ $quote['expire'] }}" />

                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">{{ __('Order made out to') }}</label>
                                        <input value="{{ $quote['name'] }}" type="text" class="col-lg-6 form-control" disabled />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="email">{{ __('Email address') }}</label>
                                        <input value="{{ $quote['email'] }}" name="email" type="text" class="col-lg-6 form-control" disabled />
                                    </div>
                                    <hr />
                                    <div class="mb-3">
                                        <h5>{{ __('This quotation is for a fitment of a windscreen on vehicle details') }}</h5>
                                        <label class="form-label" for="vin">{{ __('VIN number') }}</label>
                                        <input value="{{ $quote['vin'] }}" name="vin" type="text" class="col-lg-6 form-control" disabled />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="make">{{ __('Car make') }}</label>
                                        <input value="{{ $quote['make'] }}" name="make" type="text" class="col-lg-6 form-control" disabled />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="model">{{ __('Model') }}</label>
                                        <input value="{{ $quote['model'] }}" name="model" type="text" class="col-lg-6 form-control" disabled />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="year">{{ __('Year of first registration') }}</label>
                                        <input value="{{ $quote['year'] }}" name="year" type="text" class="col-lg-6 form-control" disabled />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="reg">{{ __('Registration number') }}</label>
                                        <input value="{{ $quote['reg'] }}" name="reg" type="text" class="col-lg-6 form-control" disabled />
                                    </div>
                                    <hr />
                                    <div class="mb-3">
                                        <label class="form-label" for="issue">{{ __('Licence disc issue date') }}</label>
                                        <input value="{{ $quote['issue'] }}" name="issue" type="text" class="col-lg-6 form-control" disabled />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="expire">{{ __('Licence disc expiration date') }}</label>
                                        <input value="{{ $quote['expire'] }}" name="expire" type="text" class="col-lg-6 form-control" disabled />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="stores">{{ __('Select a fitment center near you.') }}</label>
                                        <select name="stores" class="col-lg-6 form-control" required>
                                            <option value="">-- Select fitment center --</option>
                                            <option value="johannesburg" class="form-select">Johannesburg</option>
                                            <option value="durban" class="form-select">Durban</option>
                                            <option value="tape town" class="form-select">Cape Town</option>
                                            <option value="bloemfontein" class="form-select">Bloemfontein</option>
                                            <option value="tshwane" class="form-select">Tshwane</option>
                                            <option value="mafikeng" class="form-select">Mafikeng</option>
                                            <option value="polokwane" class="form-select">Polokwane</option>
                                            <option value="witbank" class="form-select">Witbank</option>
                                            <option value="gqebera" class="form-select">Gqebera</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <h3>{{ __('Total cost') }}</h3>
                                        <h2>R{{ $quote['cost'] }}</h2>
                                    </div>
                                    <hr />

                                    <div class="mb-3">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <button type="button" class="btn btn-danger w-full" id="cancel-quote">
                                                    {{ __('Cancel quote') }}
                                                </button>
                                                <button type="submit" class="btn btn-secondary w-full">
                                                    {{ __('Accept quote') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="thank-you" class="visually-hidden">
                            <div class="card-header">
                                <h3>Thank you</h3>
                            </div>

                            <div class="card-body">
                                <div class="mb-3">
                                    <p>Thank you for your interest our windscreens. Hope we could be able to offer you the help you were looking for in the future.</p>
                                    <p>
                                        Regards,<br />
                                        The Glass Guru online team
                                    </p>
                                </div>
                            </div>

                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#cancel-quote').click(function() {
                $('#quotation').hide();
                $('#thank-you').removeClass('visually-hidden');
            });
        });
    </script>
@endsection
