@extends('layouts.app')

@section('title', 'View Cleaning Task')

@section('content')


    <div class="row">
        <div class="col-3">
        </div>
        <div class="col-5">
            <div class="card mt-5 custom-card" style="height:700px; border-radius:25px 25px 25px 25px;" >
                <div class="card-header" style="border:1px solid black; border-bottom:none; background-color: #fbfbfb; border-radius:25px 25px 0px 0px;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 style="color:#F4BB4B" class="fw-bold">Room1</h1>
                        <p>
                            <i class="fa-solid fa-heart" style="font-size:60px; color:rgb(142, 8, 8);"></i>
                        </p>
                        {{-- if we have 'favoraite'colum in db --}}
                        {{-- @if ($item->is_favorite)
                            <p class="color"><i class="fa-solid fa-heart"></i></p>
                        @else
                            <i class="fa-thin fa-heart"></i>
                        @endif

                        // データベースのマイグレーション
                        Schema::table('favorites', function (Blueprint $table) {
                            $table->boolean('is_favorite')->default(false);
                        }); --}}
                    </div>
                </div>
                <div class="card-body"  style="border:1px solid black; border-top:none; border-radius:0px 0px 25px 25px;">
                    <div class="row "  >
                        <div class="col imagebox"><img src="{{ asset('images/guest_roompage.png') }}"  alt="TEST"></div>
                    </div>
                    {{-- <img src="{{ $post->image }}" alt="#" class="w-100"> --}}
                    {{-- details --}}
                    <div class="row detail mx-auto" >
                        <div class="col">
                        <a href="#" style="text-decoration:none;" >
                            <div class=" row col">
                                <div class="adult ms-3 col text-dark" ><h3 style="font-family: 'Raleway', sans-serif; font-size:25px;">Adult</h3></div>
                                <div class="col" style="font-size:25px;"><p class="badge bg-light bg-opacity-50 text-dark"
                                    style="border-radius:25px;border:1px solid black; border-shadow: 1px 2px 1px rgba(0, 0, 0, 0.3);">1bed</p></div>
                            </div>
                            <div class="row align-items-center" >
                                <div class="col ms-3">
                                    <h1 style="color:#981E1E;">Sum $(tax)</h1>
                                </div>
                                <div class="col text-end text-secondary me-3"
                                    style="font-size:30px; "><i class="fa-solid fa-chevron-right"></i>
                                </div>
                            </div>
                        </a>
                        </div>
                    </div>

                    {{-- Reservation --}}
                    <div class="row">
                        <a href="#">
                            <div class="col btn btn-custom-color text-light float-end mt-2 "
                            style="border-radius: 25px; font-weight: bold; min-width: 200px;"><h4 style="font-family: 'Raleway', sans-serif;">Reservation<i class="fa-solid fa-caret-right"></i></h4>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="mt-5"  >
                <div class="justify-content-center d-flex "><h3 class="btn btn-custom-color1 text-light d-flex justify-content-center align-items-center fw-bold" style="font-family: 'Raleway', sans-serif; font-size:25px;">HOME</h3></div>
                <div class="justify-content-center d-flex "><h3 class="btn btn-custom-color2 text-light mt-2 d-flex justify-content-center align-items-center fw-bold" style="font-family: 'Raleway', sans-serif; font-size:25px;" ><i
                     class="fa-regular fa-square-check d-flex" style="font-size:40px;"></i> <span class="d-flex me-4 p-0">Check Confirmation</span></h3></div>
                <div class="justify-content-center d-flex "><h3 class="btn btn-custom-color2 text-light mt-2 d-flex justify-content-center align-items-center fw-bold" style="font-family: 'Raleway', sans-serif; font-size:25px;" ><i
                     class="fa-solid fa-magnifying-glass d-flex" style="font-size:40px; margin-right:55px;"></i><span class="d-flex" style="margin-right:95px;">Search</span></div>
                </div>
        </div>

    </div>


@endsection
