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
            <h1>Trucks</h1>
            <a href="/truck">Add new truck</a>
            <table class="table">
                <tr>
                    <th>Unit Number</th>
                    <th>Year</th>
                    <th>Notes</th>
                    <th></th>
                  </tr>
                @foreach ($trucks as $truck)
                    <tr>
                        <td>{{ $truck->unit_number }}</td>
                        <td>{{ $truck->year }}</td>
                        <td>{{ $truck->notes }}</td>
                        <td>
                            <a href="/truck/{{ $truck->id }}"><button class="btn btn-primary">Edit</button></a>
                            <a href="/truck/delete/{{ $truck->id }}">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            <table>
            <h1>Sub Units</h1>
            <a href="/sub-unit">Add new Sub-unit</a>
            <table class="table">
                <tr>
                    <th>Main Truck</th>
                    <th>Sub Unit</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th></th>
                  </tr>
                @foreach ($subUnits as $subUnit)
                    <tr>
                        <td>{{ $subUnit->mainTruck->unit_number }}</td>
                        <td>{{ $subUnit->subUnit->unit_number }}</td>
                        <td>{{ $subUnit->start_date }}</td>
                        <td>{{ $subUnit->end_date }}</td>
                        <td>
                            <a href='/sub-unit/{{ $subUnit->id }}'>
                                <button class="btn btn-primary">Edit</button>
                            </a>
                            <a href='/sub-unit/delete/{{ $subUnit->id }}'>
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            <table>
        </div>
    </body>
</html>
