@extends('layouts.app')
@section('title', 'User Added')

@section('css')

    <style>
        * {
            box-sizing: border-box;
        }

        .dashboard {
            display: block;
            flex-wrap: nowrap;
            gap: 0;
        }

        input[type=text],
        input[type=email],
        input[type=password],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit] {
            background-color: #04AA6D;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }

        .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {

            .col-25,
            .col-75,
            input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }
        span {
            color: crimson;
            font-size: 14px;
        }
    </style>

@endsection

@section('content')
    <div class="container">
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-25">
                    <label for="name">Name</label>
                </div>
                <div class="col-75">
                    <input type="text" name="name" placeholder="User Name">
                    @error('name') <span>{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="email">Email</label>
                </div>
                <div class="col-75">
                    <input type="email" name="email" placeholder="Email address">
                    @error('email') <span>{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="password">Password</label>
                </div>
                <div class="col-75">
                    <input type="password" name="password" placeholder="Password">
                    @error('password') <span>{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="password">Confirm Password</label>
                </div>
                <div class="col-75">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password">
                    @error('password') <span>{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
@endsection
