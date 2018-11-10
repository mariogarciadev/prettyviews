@if(count($errors) > 0)
  @foreach($errors->all() as $error)
    <div class="alert alert-danger lead" style="font-family: 'Graduate', cursive">
      {{$error}}
    </div>
  @endforeach
@endif

@if(session('success'))
  <div class="alert alert-success lead" style="font-family: 'Graduate', cursive">
    {{session('success')}}
  </div>
@endif

@if(session('error'))
  <div class="alert alert-danger lead" style="font-family: 'Graduate', cursive">
    {{session('error')}}
  </div>
@endif
