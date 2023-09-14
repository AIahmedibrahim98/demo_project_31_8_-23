<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main class="container">
        <h1 class="text-center">Hello</h1>
        <h3> <?php echo 'Hello From PHP'; ?> </h3>
        {{ '<h3>Hello From PHP</h3>' }}
        {!! '<h3>Hello From PHP</h3>' !!}
        {{ route('users.index') }}
        {{ route('users.show', 50) }}
        {{ route('users.show', ['id' => 50]) }}

        @if (date('d') == 14)
            <div class="alert alert-primary" role="alert">
                <strong> Today is {{ date('d') }} </strong>
            </div>
        @elseif(date('Y') == 2023)
            <div class="alert alert-info" role="alert">
                <strong> Year is 2023 </strong>
            </div>
        @else
            <div class="alert alert-danger" role="alert">
                <strong> Err </strong>
            </div>
        @endif

        {{-- @unless (date('d') == 15)
            <div class="alert alert-danger" role="alert">
                <strong> Err </strong>
            </div>
        @endunless --}}

        {{-- @empty()

        @endempty

        @isset()

        @endisset --}}
        <?php ?>
        {{-- @php
            $x = 10;
        @endphp --}}
        @php($x = 1)

{{--         @switch($x)
            @case(10)
            X is 10
                @break
                @case(20)
                    X is 20
                @break
                @case(30)
X is 30
                @break
            @default
            X invaid
        @endswitch --}}

        {{-- @while($x < 10)
        {{ $x++ }}
        @endwhile --}}

        @for ($i = 0 ; $i<10 ; $i++)
        {{ $i }}
        @endfor
        <hr><hr><hr><hr><hr><hr><hr>
        @php($arr = [])
        @foreach($arr as $key => $value)
        {{ $value }} <br>
        @endforeach
        @if (empty($arr))
        No Data Found
        @endif

        @forelse ($arr as $key => $value)
        {{ $value }} <br>
        @empty
        No Data Found
        @endforelse
        <hr><hr><hr><hr><hr><hr><hr>

        @foreach (range(1,10) as $ii)
        {{-- @continue($ii == 5) --}}
        @break($ii == 5)
        {{ $ii }} <br>
        @endforeach

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
