<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <h1>Truck</h1>
            <form action="/truck/update/{{$truck->id}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Unit Number</label>
                    <input value="{{$truck->unit_number}}" name="unit_number">
                    @error('unit_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Year</label>
                    <input value="{{ $truck->year }}" name="year">
                    @error('year')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Notes</label>
                    <input value="{{ $truck->notes }}" name="notes">
                </div>
                <button class="btn btn-primary mt-1">Save & Go Back</button>
            </form>
            <a href="{{ URL::previous() }}">Go Back</a>
        </div>
    </body>
</html>
