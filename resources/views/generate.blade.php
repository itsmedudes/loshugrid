@extends('layout.master')
@section('content')
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


    <section class="backgroud-section-2 py-3 mt-3" style="background-image: url('{{ asset('assets/image/bg2.webp') }}');">

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
@endsection
@push('script')
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
@endpush
