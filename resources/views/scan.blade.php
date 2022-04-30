@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Scan the picture of your licence disk here and get an instant quote or generate a licence disc barcode ') }}
                        <a href="{{ route('home') }}">{{ __('here.') }}</a>
                    </div>
                    <div class="card-body">
                        <video id="preview" class="col-lg-6 mx-auto d-block"></video>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="vehicle_details" tabindex="-1" role="dialog" aria-labelledby="vehicleDetails" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm your vehicle's details.</h5>
                    <button type="button" class="close close_modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ Route('quote') }}" method="POST">
                    @csrf
                    <input type="hidden" name="details" id="details" />
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Car Make</label>
                            <p id="car_make"></p>
                        </div>
                        <div class="form-group">
                            <label>Model</label>
                            <p id="model"></p>
                        </div>
                        <div class="form-group">
                            <label>Year</label>
                            <p id="year"></p>
                        </div>

                        <button type="button" class="close btn btn-danger close_modal">No, that's not my car!</button>
                        <button type="submit" class="btn btn-primary">Yes, give me a quote</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript">
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
        scanner.addListener('scan', function (content) {
            $(document).ready(function() {
                const details = content.split(";");
                // Now write details in modal for confirmation.
                $('#details').val(content);
                $('#car_make').text(details[1]);
                $('#model').text(details[2]);
                $('#year').text(details[3]);
                $('#vehicle_details').modal('show');
            });
        });
        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('No cameras found.');
            }
        }).catch(function (e) {
            console.error(e);
        });
        $(document).ready(function() {
            $('.close_modal').click(function () {
                $('body').removeClass('modal-open');
                $('body').css('padding-right', '');
                $('.modal-backdrop').remove();
                $('#vehicle_details').hide();
            });
        });
    </script>
@endsection
