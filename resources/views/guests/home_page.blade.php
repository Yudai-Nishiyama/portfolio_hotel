@extends('layouts.app')

@section('title', 'Home')
@section('content')

    <div class="room-background mt-0">
        <h1 class="text-center" >My RooM YouR RooM</h1>
    </div>



    {{-- MENU --}}
    <h3 class="memo mt-5 text-center" style="border-bottom:2px solid #448A47; padding-bottom:5px;
        margin-bottom:10px; width:25%">MENU</h3>
    <div class="images mt-3">
        <div class="images1">
            <a href="#"><img src="{{ asset('images/guest_home_1.png') }}"  alt="hotel_bed" >
                <div class="item">
                    <i class="fa-solid fa-bed text-white " style="font-size: 80px;"></i>
                    <p class="text-white" style="font-size: 50px; font-family: 'Bona Nova'; ">Rooms</p>
                </div>
            </a>
        </div>
        <div class="images2">
            <a href="#"><img src="{{ asset('images/guest_home_2.png') }}"  alt="hotel_bed" >
                <div class="item">
                    <i class="fa-regular fa-square-check text-white " style="font-size: 80px;"></i>
                    <p class="text-white" style="font-size: 50px; font-family: 'Bona Nova'; ">Check Reservation</p>
                </div>
            </a>
        </div>
        <div class="images3">
            <a href="#"><img src="{{ asset('images/guest_home_sarch.png') }}"  alt="hotel_bed" >
                <div class="item">
                    <i class="fa-solid fa-magnifying-glass text-white" style="font-size: 80px;"></i>
                    <p class="text-white" style="font-size: 50px; font-family: 'Bona Nova'; ">Search</p>
                </div>
            </a>
        </div>
    </div>


@endsection
