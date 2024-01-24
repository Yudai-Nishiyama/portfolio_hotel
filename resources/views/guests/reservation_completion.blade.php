@extends('layouts.app')

@section('title', 'Reservation')

@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 style="font-size: 64px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);" class="line underline">Reservation Completion</h1>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card" style="background-color: #981E1E; color: white;">
                <div class="card-header d-flex justify-content-center align-items-center" style="height: 100px; border-bottom: 1px solid white;">
                    <h1 style="font-size: 48px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">Room1</h1>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center" style="height: 500px;">
                    <div class="d-flex justify-content-center align-items-center" style="width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.3); border-radius: 20px; overflow: hidden;">
                        <img src={{ asset($room->image) }} class="img-fluid" alt="Room1 Image" style="width: 90%; height: 90%; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 text-center mt-5">
            <i style="font-size: 48px; color:#448a47;" class="fa-regular fa-circle-check"></i>
            <h2 style="font-size: 48px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);" class="mt-5">Thank you</h2>
            <h2 style="font-size: 48px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);" class="mt-3">for the reservation!!</h2>
            <p style="font-size: 20px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);" class="mt-5">Reservation Number</p>
            <p style="font-size: 20px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);" class="mt-2">{{ $reservation->reservation_number }}</p>
            <a href="/guests/check-reservation/{{ $reservation->reservation_number }}"><button class="mt-5 check_button" style="width: 250px; height: 35px; border-radius: 5px; background-color: #448A47; color: #ffffff; font-family: 'Raleway', sans-serif; font-weight: bold;">Check the reservation</button></a>
        </div>
    </div>
</div>


@endsection
