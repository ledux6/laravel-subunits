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
            <form action="/sub-unit/{{$subunit->id}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Main Truck</label>
                    <select name="main_truck_id">
                        @foreach ($trucks as $truck)
                            <option 
                                value="{{ $truck->id }}"
                                @if($subunit->main_truck_id === $truck->id) {{ 'selected' }} @endif
                            >
                                {{ $truck->unit_number }}
                            </option>
                        @endforeach
                    </select>
                    @error('main_truck_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Sub Unit</label>
                    <select name="sub_unit_id">
                        @foreach ($trucks as $truck)
                            <option 
                                value="{{ $truck->id }}"
                                @if($subunit->sub_unit_id === $truck->id) {{ 'selected' }} @endif
                            >
                                {{ $truck->unit_number }}
                            </option>
                        @endforeach
                      </select>
                    @error('sub_unit_id')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Date From</label>
                    <input value="{{$subunit->start_date}}" name="start_date" type="date">
                    @error('start_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Date To</label>
                    <input value="{{$subunit->end_date}}" name="end_date" type="date">
                    @error('end_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                </div>
                <button class="btn btn-primary mt-1">Save & Go Back</button>
            </form>
            <a href="{{ URL::previous() }}">Go Back</a>
        </div>
    </body>
</html>