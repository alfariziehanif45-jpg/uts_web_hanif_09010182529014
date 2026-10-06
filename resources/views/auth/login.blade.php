<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Perpustakaan Digital - Login</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <style>

        /* =====================================================
           GLOBAL
        ===================================================== */

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100%;
        }

        body {
            font-family:
                'Inter',
                'Segoe UI',
                Arial,
                sans-serif;

            overflow: hidden;
        }


        /* =====================================================
           WATER CANVAS
        ===================================================== */

        #waterCanvas {
            position: fixed;
            inset: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 9999;
        }


        /* =====================================================
           MAIN OCEAN
        ===================================================== */

        .ocean {
            min-height: 100vh;
            width: 100%;
            position: relative;
            overflow: hidden;

            background:

                radial-gradient(
                    circle at 50% 20%,
                    rgba(56, 189, 248, 0.20),
                    transparent 35%
                ),

                radial-gradient(
                    circle at 15% 80%,
                    rgba(14, 165, 233, 0.25),
                    transparent 30%
                ),

                linear-gradient(
                    180deg,
                    #082f49 0%,
                    #075985 30%,
                    #0369a1 60%,
                    #0c4a6e 100%
                );
        }


        /* =====================================================
           LIGHT RAYS
        ===================================================== */

        .light-ray {
            position: absolute;

            top: -100px;

            width: 130px;
            height: 120%;

            background:
                linear-gradient(
                    180deg,
                    rgba(255,255,255,0.10),
                    rgba(255,255,255,0)
                );

            transform: rotate(12deg);

            filter: blur(10px);

            opacity: 0.35;

            animation:
                rayMove
                8s
                ease-in-out
                infinite;

            pointer-events: none;
        }

        .ray-1 {
            left: 10%;
        }

        .ray-2 {
            left: 35%;
            width: 180px;
            animation-delay: 2s;
        }

        .ray-3 {
            right: 20%;
            width: 150px;
            animation-delay: 4s;
        }

        @keyframes rayMove {

            0%, 100% {
                transform:
                    rotate(12deg)
                    translateX(0);
            }

            50% {
                transform:
                    rotate(16deg)
                    translateX(40px);
            }
        }


        /* =====================================================
           BUBBLES
        ===================================================== */

        .bubble {
            position: absolute;

            bottom: -50px;

            border-radius: 50%;

            border:
                1px solid
                rgba(255,255,255,0.45);

            background:
                radial-gradient(
                    circle at 30% 30%,
                    rgba(255,255,255,0.45),
                    rgba(255,255,255,0.08)
                );

            box-shadow:
                inset 0 0 8px
                rgba(255,255,255,0.25);

            animation:
                bubbleUp
                linear
                infinite;

            pointer-events: none;
        }

        .bubble-1 {
            width: 16px;
            height: 16px;
            left: 8%;
            animation-duration: 8s;
        }

        .bubble-2 {
            width: 9px;
            height: 9px;
            left: 22%;
            animation-duration: 6s;
            animation-delay: 2s;
        }

        .bubble-3 {
            width: 22px;
            height: 22px;
            left: 42%;
            animation-duration: 10s;
            animation-delay: 1s;
        }

        .bubble-4 {
            width: 12px;
            height: 12px;
            left: 63%;
            animation-duration: 7s;
            animation-delay: 3s;
        }

        .bubble-5 {
            width: 20px;
            height: 20px;
            left: 80%;
            animation-duration: 9s;
            animation-delay: 1s;
        }

        .bubble-6 {
            width: 7px;
            height: 7px;
            left: 92%;
            animation-duration: 5s;
            animation-delay: 2s;
        }

        @keyframes bubbleUp {

            0% {
                transform:
                    translateY(0)
                    translateX(0);

                opacity: 0;
            }

            10% {
                opacity: 0.7;
            }

            50% {
                transform:
                    translateY(-50vh)
                    translateX(25px);
            }

            100% {
                transform:
                    translateY(-115vh)
                    translateX(-20px);

                opacity: 0;
            }
        }


        /* =====================================================
           FISH
        ===================================================== */

        .fish {
            position: absolute;

            display: flex;
            align-items: center;

            width: 90px;
            height: 45px;

            animation:
                fishSwim
                linear
                infinite;

            z-index: 1;

            pointer-events: none;
        }

        .fish-body {
            width: 52px;
            height: 34px;

            border-radius:
                60% 45% 45% 60%;

            position: relative;

            background:
                linear-gradient(
                    135deg,
                    #fbbf24,
                    #f97316
                );

            box-shadow:
                0 5px 15px
                rgba(0,0,0,0.15);
        }

        .fish-body::before {
            content: '';

            position: absolute;

            width: 10px;
            height: 10px;

            border-radius: 50%;

            background: white;

            right: 8px;
            top: 8px;
        }

        .fish-body::after {
            content: '';

            position: absolute;

            width: 5px;
            height: 5px;

            border-radius: 50%;

            background: #0f172a;

            right: 10px;
            top: 10px;
        }

        .fish-tail {
            width: 0;
            height: 0;

            border-top: 20px solid transparent;
            border-bottom: 20px solid transparent;

            border-right:
                30px solid #f97316;

            margin-left: -3px;
        }

        .fish-fin {
            position: absolute;

            width: 18px;
            height: 15px;

            background: #fb923c;

            top: -7px;
            left: 22px;

            border-radius:
                80% 20% 80% 20%;

            transform: rotate(-20deg);
        }

        .fish-small .fish-body {
            transform: scale(0.7);
        }

        .fish-small .fish-tail {
            transform: scale(0.7);
        }


        .fish-1 {
            top: 18%;
            left: -120px;

            animation-duration: 18s;
        }

        .fish-2 {
            top: 35%;
            left: -150px;

            transform: scale(0.65);

            animation-duration: 24s;

            animation-delay: 4s;
        }

        .fish-3 {
            top: 70%;
            left: -120px;

            transform: scale(0.8);

            animation-duration: 21s;

            animation-delay: 7s;
        }


        @keyframes fishSwim {

            0% {
                left: -130px;
                transform:
                    translateY(0)
                    scaleX(1);
            }

            25% {
                transform:
                    translateY(-20px)
                    scaleX(1);
            }

            50% {
                transform:
                    translateY(10px)
                    scaleX(1);
            }

            75% {
                transform:
                    translateY(-15px)
                    scaleX(1);
            }

            100% {
                left: 110%;
                transform:
                    translateY(0)
                    scaleX(1);
            }
        }


        /* =====================================================
           LITTLE FISH
        ===================================================== */

        .little-fish {
            position: absolute;

            width: 35px;
            height: 20px;

            border-radius: 50%;

            background: #67e8f9;

            opacity: 0.75;

            animation:
                littleFish
                15s
                linear
                infinite;

            pointer-events: none;
        }

        .little-fish::after {
            content: '';

            position: absolute;

            right: -12px;
            top: 3px;

            width: 0;
            height: 0;

            border-top: 8px solid transparent;
            border-bottom: 8px solid transparent;

            border-right:
                14px solid #22d3ee;
        }

        .little-1 {
            top: 25%;
            left: -50px;
        }

        .little-2 {
            top: 55%;
            left: -50px;

            animation-delay: 5s;
            animation-duration: 19s;
        }

        .little-3 {
            top: 82%;
            left: -50px;

            animation-delay: 8s;
            animation-duration: 17s;
        }

        @keyframes littleFish {

            0% {
                left: -60px;
                transform:
                    translateY(0)
                    scaleX(1);
            }

            50% {
                transform:
                    translateY(-25px)
                    scaleX(1);
            }

            100% {
                left: 110%;
                transform:
                    translateY(15px)
                    scaleX(1);
            }
        }


        /* =====================================================
           SEA FLOOR
        ===================================================== */

        .sea-floor {
            position: absolute;

            bottom: 0;
            left: 0;

            width: 100%;
            height: 80px;

            background:
                linear-gradient(
                    180deg,
                    rgba(2,132,199,0),
                    rgba(15,118,110,0.45)
                );

            pointer-events: none;
        }


        .plant {
            position: absolute;

            bottom: 0;

            width: 12px;
            height: 100px;

            border-radius:
                100% 0 100% 0;

            background:
                linear-gradient(
                    90deg,
                    #065f46,
                    #10b981
                );

            transform-origin: bottom;

            animation:
                plantWave
                3s
                ease-in-out
                infinite;
        }

        .plant-1 {
            left: 5%;
            height: 100px;
        }

        .plant-2 {
            left: 12%;
            height: 70px;
            animation-delay: 1s;
        }

        .plant-3 {
            right: 8%;
            height: 120px;
            animation-delay: 0.5s;
        }

        .plant-4 {
            right: 17%;
            height: 80px;
            animation-delay: 1.5s;
        }

        @keyframes plantWave {

            0%, 100% {
                transform:
                    rotate(-5deg);
            }

            50% {
                transform:
                    rotate(7deg);
            }
        }


        /* =====================================================
           LOGIN WRAPPER
        ===================================================== */

        .login-wrapper {

            min-height: 100vh;

            display: flex;

            justify-content: center;

            align-items: center;

            padding: 25px 20px;

            position: relative;

            z-index: 10;
        }


        /* =====================================================
           LOGIN CARD
        ===================================================== */

        .login-card {

            width: 100%;

            max-width: 460px;

            padding: 38px 42px;

            border-radius: 30px;

            background:
                rgba(
                    255,
                    255,
                    255,
                    0.13
                );

            border:
                1px solid
                rgba(
                    255,
                    255,
                    255,
                    0.25
                );

            backdrop-filter:
                blur(25px);

            -webkit-backdrop-filter:
                blur(25px);

            box-shadow:

                0 30px 80px
                rgba(
                    0,
                    0,
                    0,
                    0.35
                ),

                inset
                0 1px 1px
                rgba(
                    255,
                    255,
                    255,
                    0.25
                );

            animation:
                cardAppear
                1s
                ease-out;

            transition:
                transform
                0.3s ease;
        }


        .login-card:hover {

            transform:
                translateY(-4px);
        }


        @keyframes cardAppear {

            from {

                opacity: 0;

                transform:
                    translateY(50px)
                    scale(0.94);
            }

            to {

                opacity: 1;

                transform:
                    translateY(0)
                    scale(1);
            }
        }


        /* =====================================================
           BOOK LOGO
        ===================================================== */

        .book-logo {

            width: 78px;
            height: 78px;

            margin:
                0 auto 18px;

            display: flex;

            justify-content: center;
            align-items: center;

            border-radius: 22px;

            background:
                linear-gradient(
                    135deg,
                    #0ea5e9,
                    #2563eb,
                    #4f46e5
                );

            box-shadow:

                0 15px 40px
                rgba(
                    14,
                    165,
                    233,
                    0.45
                );

            font-size: 38px;

            animation:
                bookFloat
                3s
                ease-in-out
                infinite;
        }


        @keyframes bookFloat {

            0%, 100% {
                transform:
                    translateY(0)
                    rotate(0);
            }

            50% {
                transform:
                    translateY(-7px)
                    rotate(2deg);
            }
        }


        /* =====================================================
           TITLE
        ===================================================== */

        .library-title {

            color: white;

            text-align: center;

            font-size: 31px;

            line-height: 1.15;

            font-weight: 850;

            margin: 0;

            letter-spacing:
                -0.5px;

            text-shadow:
                0 4px 20px
                rgba(
                    0,
                    0,
                    0,
                    0.25
                );
        }


        .library-title span {

            background:
                linear-gradient(
                    90deg,
                    #67e8f9,
                    #bfdbfe,
                    #c4b5fd
                );

            -webkit-background-clip:
                text;

            -webkit-text-fill-color:
                transparent;

            background-clip:
                text;
        }


        .library-subtitle {

            color:
                rgba(
                    255,
                    255,
                    255,
                    0.68
                );

            text-align: center;

            font-size: 14px;

            margin:
                9px 0 30px;

            line-height: 1.5;
        }


        /* =====================================================
           INPUT
        ===================================================== */

        .input-group {

            position: relative;

            margin-bottom: 20px;

            transition:
                transform
                0.25s ease;
        }


        .input-label {

            display: block;

            color:
                rgba(
                    255,
                    255,
                    255,
                    0.88
                );

            font-size: 13px;

            font-weight: 650;

            margin-bottom: 8px;
        }


        .input-wrapper {

            position: relative;
        }


        .input-icon {

            position: absolute;

            left: 16px;

            top: 50%;

            transform:
                translateY(-50%);

            color:
                rgba(
                    255,
                    255,
                    255,
                    0.45
                );

            font-size: 16px;

            pointer-events: none;

            transition:
                0.3s;
        }


        .login-input {

            width: 100%;

            height: 53px;

            padding:
                0 48px;

            color: white;

            background:
                rgba(
                    255,
                    255,
                    255,
                    0.08
                );

            border:
                1px solid
                rgba(
                    255,
                    255,
                    255,
                    0.17
                );

            border-radius: 15px;

            outline: none;

            font-size: 14px;

            transition:
                all
                0.3s
                ease;
        }


        .login-input::placeholder {

            color:
                rgba(
                    255,
                    255,
                    255,
                    0.32
                );
        }


        .login-input:focus {

            background:
                rgba(
                    255,
                    255,
                    255,
                    0.14
                );

            border-color:
                #67e8f9;

            box-shadow:

                0 0 0 4px
                rgba(
                    34,
                    211,
                    238,
                    0.13
                );
        }


        /* =====================================================
           PASSWORD BUTTON
        ===================================================== */

        .password-toggle {

            position: absolute;

            right: 15px;

            top: 50%;

            transform:
                translateY(-50%);

            border: none;

            background: transparent;

            color:
                rgba(
                    255,
                    255,
                    255,
                    0.50
                );

            cursor: pointer;

            font-size: 17px;

            transition:
                0.2s;
        }


        .password-toggle:hover {

            color: white;

            transform:
                translateY(-50%)
                scale(1.15);
        }


        /* =====================================================
           ERROR
        ===================================================== */

        .error-message {

            margin-top: 7px;

            color:
                #fecaca;

            font-size: 12px;
        }


        /* =====================================================
           OPTIONS
        ===================================================== */

        .form-options {

            display: flex;

            justify-content:
                space-between;

            align-items: center;

            margin:
                5px 0 24px;
        }


        .remember {

            display: flex;

            align-items: center;

            gap: 8px;

            color:
                rgba(
                    255,
                    255,
                    255,
                    0.65
                );

            font-size: 13px;

            cursor: pointer;
        }


        .remember input {

            width: 16px;

            height: 16px;

            accent-color:
                #06b6d4;

            cursor: pointer;
        }


        .forgot-link {

            color:
                #a5f3fc;

            font-size: 13px;

            text-decoration: none;

            transition:
                0.2s;
        }


        .forgot-link:hover {

            color: white;
        }


        /* =====================================================
           LOGIN BUTTON
        ===================================================== */

        .login-button {

            width: 100%;

            height: 54px;

            border: none;

            border-radius: 15px;

            color: white;

            background:

                linear-gradient(
                    135deg,
                    #0891b2,
                    #2563eb,
                    #4f46e5
                );

            font-size: 14px;

            font-weight: 750;

            cursor: pointer;

            box-shadow:

                0 12px 30px
                rgba(
                    8,
                    145,
                    178,
                    0.35
                );

            transition:
                all
                0.3s ease;

            position: relative;

            overflow: hidden;
        }


        .login-button::before {

            content: '';

            position: absolute;

            top: 0;
            left: -100%;

            width: 70%;
            height: 100%;

            background:
                linear-gradient(
                    90deg,
                    transparent,
                    rgba(
                        255,
                        255,
                        255,
                        0.25
                    ),
                    transparent
                );

            transform:
                skewX(-20deg);

            transition:
                0.6s;
        }


        .login-button:hover::before {

            left: 130%;
        }


        .login-button:hover {

            transform:
                translateY(-3px);

            box-shadow:

                0 18px 40px
                rgba(
                    8,
                    145,
                    178,
                    0.45
                );
        }


        .login-button:active {

            transform:
                translateY(0);
        }


        .login-button.loading {

            pointer-events:
                none;

            opacity:
                0.8;
        }


        /* =====================================================
           SPINNER
        ===================================================== */

        .spinner {

            width: 18px;

            height: 18px;

            border:
                2px solid
                rgba(
                    255,
                    255,
                    255,
                    0.35
                );

            border-top-color:
                white;

            border-radius: 50%;

            display:
                inline-block;

            animation:
                spin
                0.7s
                linear
                infinite;

            vertical-align:
                middle;

            margin-right:
                8px;
        }


        @keyframes spin {

            to {
                transform:
                    rotate(360deg);
            }
        }


        /* =====================================================
           STATUS
        ===================================================== */

        .status-message {

            padding:
                12px 15px;

            border-radius:
                12px;

            margin-bottom:
                20px;

            color:
                #bbf7d0;

            background:
                rgba(
                    34,
                    197,
                    94,
                    0.12
                );

            border:
                1px solid
                rgba(
                    34,
                    197,
                    94,
                    0.22
                );

            font-size:
                13px;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .login-footer {

            text-align:
                center;

            color:
                rgba(
                    255,
                    255,
                    255,
                    0.40
                );

            font-size:
                12px;

            margin-top:
                23px;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 600px) {

            body {
                overflow-y: auto;
            }

            .login-wrapper {

                padding:
                    25px 15px;
            }

            .login-card {

                padding:
                    30px 24px;

                border-radius:
                    24px;
            }

            .library-title {

                font-size:
                    27px;
            }

            .library-subtitle {

                font-size:
                    13px;
            }

            .fish-2,
            .fish-3 {

                display:
                    none;
            }
        }

    </style>

</head>


<body>


<!-- ==========================================================
     WATER PARTICLE CANVAS
=========================================================== -->

<canvas id="waterCanvas"></canvas>


<!-- ==========================================================
     OCEAN
=========================================================== -->

<div class="ocean">


    <!-- Light rays -->

    <div class="light-ray ray-1"></div>

    <div class="light-ray ray-2"></div>

    <div class="light-ray ray-3"></div>


    <!-- ======================================================
         BUBBLES
    ======================================================= -->

    <div class="bubble bubble-1"></div>
    <div class="bubble bubble-2"></div>
    <div class="bubble bubble-3"></div>
    <div class="bubble bubble-4"></div>
    <div class="bubble bubble-5"></div>
    <div class="bubble bubble-6"></div>


    <!-- ======================================================
         BIG FISH
    ======================================================= -->

    <div class="fish fish-1">

        <div class="fish-body">

            <div class="fish-fin"></div>

        </div>

        <div class="fish-tail"></div>

    </div>


    <div class="fish fish-2">

        <div class="fish-body">

            <div class="fish-fin"></div>

        </div>

        <div class="fish-tail"></div>

    </div>


    <div class="fish fish-3">

        <div class="fish-body">

            <div class="fish-fin"></div>

        </div>

        <div class="fish-tail"></div>

    </div>


    <!-- ======================================================
         SMALL FISH
    ======================================================= -->

    <div class="little-fish little-1"></div>

    <div class="little-fish little-2"></div>

    <div class="little-fish little-3"></div>


    <!-- ======================================================
         SEA PLANTS
    ======================================================= -->

    <div class="plant plant-1"></div>

    <div class="plant plant-2"></div>

    <div class="plant plant-3"></div>

    <div class="plant plant-4"></div>

    <div class="sea-floor"></div>


    <!-- ======================================================
         LOGIN
    ======================================================= -->

    <div class="login-wrapper">


        <div class="login-card">


            <!-- Book Logo -->

            <div class="book-logo">
                📚
            </div>


            <!-- TITLE -->

            <h1 class="library-title">

                <span>
                    Perpustakaan Digital
                </span>

            </h1>


            <p class="library-subtitle">

                Jelajahi dunia pengetahuan,
                temukan buku favoritmu,
                dan mulai membaca.

            </p>


            <!-- SESSION STATUS -->

            @if (session('status'))

                <div class="status-message">

                    {{ session('status') }}

                </div>

            @endif


            <!-- ==================================================
                 LOGIN FORM
            =================================================== -->

            <form
                method="POST"
                action="{{ route('login') }}"
                id="loginForm"
            >

                @csrf


                <!-- EMAIL -->

                <div class="input-group">

                    <label
                        for="email"
                        class="input-label"
                    >
                        Email Address
                    </label>


                    <div class="input-wrapper">


                        <span class="input-icon">
                            ✉
                        </span>


                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="nama@email.com"
                            required
                            autofocus
                            autocomplete="username"
                            class="login-input"
                        >


                    </div>


                    @if ($errors->has('email'))

                        <div class="error-message">

                            {{ $errors->first('email') }}

                        </div>

                    @endif

                </div>


                <!-- PASSWORD -->

                <div class="input-group">

                    <label
                        for="password"
                        class="input-label"
                    >
                        Password
                    </label>


                    <div class="input-wrapper">


                        <span class="input-icon">
                            🔒
                        </span>


                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="Masukkan password"
                            required
                            autocomplete="current-password"
                            class="login-input"
                        >


                        <button
                            type="button"
                            class="password-toggle"
                            id="togglePassword"
                            aria-label="Tampilkan password"
                        >
                            👁
                        </button>


                    </div>


                    @if ($errors->has('password'))

                        <div class="error-message">

                            {{ $errors->first('password') }}

                        </div>

                    @endif

                </div>


                <!-- OPTIONS -->

                <div class="form-options">


                    <label class="remember">

                        <input
                            type="checkbox"
                            name="remember"
                            id="remember"
                        >

                        <span>
                            Ingat saya
                        </span>

                    </label>


                    @if (Route::has('password.request'))

                        <a
                            href="{{ route('password.request') }}"
                            class="forgot-link"
                        >
                            Lupa password?
                        </a>

                    @endif


                </div>


                <!-- LOGIN BUTTON -->

                <button
                    type="submit"
                    class="login-button"
                    id="loginButton"
                >

                    <span id="buttonText">
                        Masuk ke Perpustakaan
                    </span>

                </button>


            </form>


            <!-- FOOTER -->

            <div class="login-footer">

                © {{ date('Y') }}

                {{ config('app.name', 'Perpustakaan Digital') }}

                <br>

                Membaca hari ini,
                menambah wawasan untuk esok.

            </div>


        </div>

    </div>


</div>


<!-- ==========================================================
     JAVASCRIPT
=========================================================== -->

<script>


    /* =========================================================
       WATER PARTICLES
    ========================================================= */


    const canvas =
        document.getElementById(
            'waterCanvas'
        );

    const ctx =
        canvas.getContext('2d');


    let particles = [];


    function resizeCanvas() {

        canvas.width =
            window.innerWidth;

        canvas.height =
            window.innerHeight;

    }


    resizeCanvas();


    window.addEventListener(
        'resize',
        resizeCanvas
    );


    /* =========================================================
       PARTICLE
    ========================================================= */


    class WaterParticle {


        constructor(
            x,
            y,
            vx,
            vy,
            size
        ) {

            this.x = x;

            this.y = y;

            this.vx = vx;

            this.vy = vy;

            this.size = size;

            this.life = 1;

            this.gravity =
                0.075;

            this.friction =
                0.985;

        }


        update() {

            this.vx *=
                this.friction;

            this.vy *=
                this.friction;

            this.vy +=
                this.gravity;

            this.x +=
                this.vx;

            this.y +=
                this.vy;

            this.life -=
                0.022;

            this.size *=
                0.985;

        }


        draw() {

            if (
                this.life <= 0
            ) {
                return;
            }


            ctx.save();


            ctx.globalAlpha =
                this.life;


            const gradient =
                ctx.createRadialGradient(

                    this.x,
                    this.y,
                    0,

                    this.x,
                    this.y,
                    this.size * 3

                );


            gradient.addColorStop(
                0,
                'rgba(255,255,255,0.95)'
            );


            gradient.addColorStop(
                0.3,
                'rgba(103,232,249,0.90)'
            );


            gradient.addColorStop(
                0.65,
                'rgba(56,189,248,0.55)'
            );


            gradient.addColorStop(
                1,
                'rgba(34,211,238,0)'
            );


            ctx.fillStyle =
                gradient;


            ctx.beginPath();


            ctx.arc(

                this.x,
                this.y,
                this.size,

                0,
                Math.PI * 2

            );


            ctx.fill();


            ctx.restore();

        }

    }


    /* =========================================================
       CREATE SPLASH
    ========================================================= */


    function createSplash(
        x,
        y,
        amount = 8
    ) {


        for (
            let i = 0;
            i < amount;
            i++
        ) {


            const angle =
                Math.random()
                *
                Math.PI
                *
                2;


            const speed =
                Math.random()
                *
                2.8
                +
                0.5;


            const vx =
                Math.cos(angle)
                *
                speed;


            const vy =
                Math.sin(angle)
                *
                speed
                -
                1.3;


            const size =
                Math.random()
                *
                2.8
                +
                1;


            particles.push(

                new WaterParticle(

                    x,
                    y,
                    vx,
                    vy,
                    size

                )

            );

        }

    }


    /* =========================================================
       CURSOR
    ========================================================= */


    let mouseX = 0;

    let mouseY = 0;

    let lastX = 0;

    let lastY = 0;

    let lastSplash = 0;


    document.addEventListener(
        'mousemove',
        function(event) {


            mouseX =
                event.clientX;

            mouseY =
                event.clientY;


            const dx =
                mouseX -
                lastX;

            const dy =
                mouseY -
                lastY;


            const distance =
                Math.sqrt(
                    dx * dx +
                    dy * dy
                );


            const now =
                Date.now();


            if (

                distance > 5 &&

                now -
                lastSplash >
                25

            ) {


                const amount =
                    Math.min(

                        Math.floor(
                            distance / 4
                        ),

                        12

                    );


                createSplash(

                    mouseX,
                    mouseY,
                    amount

                );


                lastSplash =
                    now;

            }


            lastX =
                mouseX;

            lastY =
                mouseY;

        }
    );


    /* =========================================================
       CLICK SPLASH
    ========================================================= */


    document.addEventListener(
        'click',
        function(event) {

            createSplash(

                event.clientX,
                event.clientY,

                40

            );

        }
    );


    /* =========================================================
       ANIMATION LOOP
    ========================================================= */


    function animateWater() {


        ctx.clearRect(

            0,
            0,
            canvas.width,
            canvas.height

        );


        for (

            let i =
                particles.length - 1;

            i >= 0;

            i--

        ) {


            const particle =
                particles[i];


            particle.update();


            particle.draw();


            if (
                particle.life <= 0
            ) {

                particles.splice(
                    i,
                    1
                );

            }

        }


        /*
         * Batas particle agar
         * animasi tetap ringan.
         */

        if (
            particles.length > 500
        ) {

            particles.splice(
                0,
                particles.length - 500
            );

        }


        requestAnimationFrame(
            animateWater
        );

    }


    animateWater();


    /* =========================================================
       SHOW / HIDE PASSWORD
    ========================================================= */


    const passwordInput =
        document.getElementById(
            'password'
        );


    const togglePassword =
        document.getElementById(
            'togglePassword'
        );


    togglePassword.addEventListener(
        'click',
        function() {


            if (
                passwordInput.type ===
                'password'
            ) {


                passwordInput.type =
                    'text';


                togglePassword.textContent =
                    '🙈';


                togglePassword.setAttribute(
                    'aria-label',
                    'Sembunyikan password'
                );


            } else {


                passwordInput.type =
                    'password';


                togglePassword.textContent =
                    '👁';


                togglePassword.setAttribute(
                    'aria-label',
                    'Tampilkan password'
                );

            }

        }
    );


    /* =========================================================
       LOGIN LOADING
    ========================================================= */


    const loginForm =
        document.getElementById(
            'loginForm'
        );


    const loginButton =
        document.getElementById(
            'loginButton'
        );


    const buttonText =
        document.getElementById(
            'buttonText'
        );


    loginForm.addEventListener(
        'submit',
        function() {


            if (
                !loginForm.checkValidity()
            ) {

                return;

            }


            loginButton.classList.add(
                'loading'
            );


            buttonText.innerHTML =

                '<span class="spinner"></span>' +
                'Sedang masuk...';

        }
    );


    /* =========================================================
       INPUT ANIMATION
    ========================================================= */


    const inputs =
        document.querySelectorAll(
            '.login-input'
        );


    inputs.forEach(
        function(input) {


            input.addEventListener(
                'focus',
                function() {


                    this
                        .closest(
                            '.input-group'
                        )
                        .style.transform =
                        'translateY(-2px)';

                }
            );


            input.addEventListener(
                'blur',
                function() {


                    this
                        .closest(
                            '.input-group'
                        )
                        .style.transform =
                        'translateY(0)';

                }
            );

        }
    );


</script>


</body>

</html>