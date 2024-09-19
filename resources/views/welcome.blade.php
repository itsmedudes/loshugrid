@extends('layout.master')
@section('content')
    <section>
        <div class="container">
            <h2 class="text-center mb-4">Lo shu Grid</h2>
            <form action="{{ route('generate') }}" method="post" class="p-4 border rounded shadow">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="dob">Date of Birth</label>
                    <input class="form-control" type="date" id="dob" name="dob" required>
                </div>
                <button class="btn btn-primary btn-lg w-100" type="submit">Generate</button>
            </form>
        </div>

        <div class="container d-flex justify-content-center mb-3 mt-3">
            <div class="grid">
                <?php
                // Lo Shu Grid values
                $values = [4, 9, 2, 3, 5, 7, 8, 1, 6];
                
                foreach ($values as $value) {
                    echo "<div class='cell'>$value</div>";
                }
                ?>
            </div>
        </div>



    </section>
@endsection
