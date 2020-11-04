{{--@if($errors->any())--}}
{{--    <ul class="list-unstyled">--}}
{{--        @foreach($errors->all() as $error)--}}
{{--            <li class="list-group-item list-group-item-danger">{{$error}}</li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}
{{--@endif--}}

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if(session('danger'))
    <div class="alert alert-danger">
        {{session('danger')}}
    </div>
@endif
