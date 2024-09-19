<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lo Shu Grid</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    @stack('style')
</head>
hello

<body>
    <section class="backgroud-section" style="background-image: url('{{ asset('assets/image/bg5.webp') }}');">
        <div class="corner_design">
            <img src="{{ asset('assets/image/a.webp') }}" alt="">
            <img src="{{ asset('assets/image/a.webp') }}" alt="">
            <img src="{{ asset('assets/image/a.webp') }}" alt="">
            <img src="{{ asset('assets/image/a.webp') }}" alt="">

        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="lord">
                        <img src="{{ asset('assets/image/chakra.webp') }}" alt="">
                        <img src="{{ asset('assets/image/lord_ganesh.webp') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="breakhere"></div>
    <div style="clear:both;"></div>

    <section class="backgroud-section-2 mt-3" style="background-image: url('{{ asset('assets/image/bg2.webp') }}');">


        <div class="container d-flex justify-content-center mt-3">
            <div class="grid">
                <?php
                
                foreach ($values as $value) {
                    echo "<div class='cell'>$value</div>";
                }
                ?>
            </div>
        </div>
        <div class="container">
            <ul class="">
                <h4>Matched</h4>

                @foreach ($number as $value)
                    @if (in_array($value->number, $found))
                        <li>
                            <h5>{{ $value->number }} <span>{{ $value->merit }}</span></h5>
                            <p>{{ $value->description ?? '' }}</p>
                        </li>
                    @endif
                @endforeach



            </ul>
        </div>
    </section>

    <div class="breakhere"></div>
    <div style="clear:both;"></div>


    <section class="backgroud-section-2 py-3" style="background-image: url('{{ asset('assets/image/bg2.webp') }}');">

        <div class="container d-flex justify-content-center mt-3">
            <div class="grid">
                <?php
                
                foreach ($values as $value) {
                    echo "<div class='cell'>$value</div>";
                }
                ?>
            </div>
        </div>
        <div class="container">
            <ul class="">


                <h4>Unmatched</h4>
                @foreach ($number as $value)
                    @if (in_array($value->number, $missing))
                        <li>
                            <h5>{{ $value->number }} <span>{{ $value->merit }}</span></h5>
                            <p>{{ $value->description ?? '' }}</p>
                        </li>
                    @endif
                @endforeach

            </ul>
        </div>
    </section>
</body>

</html>
