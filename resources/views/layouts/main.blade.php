<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Library</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>

<body>
@include('partials.header')
  <div id="app">
    <main class="container">
      @yield('content')
    </main>
  </div>
  @include('partials.footer')
</body>

</html>
