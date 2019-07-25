@extends('layouts.app', ['activePage' => 'Abstractsss', 'titlePage' => __('Abstractsss')])
@section('content')
@foreach(collect($array) as $a)
<div class="modal fade" id="{{$a}}">
    <div class="modal-dialog modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Talk Abstract</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <iframe src="{{$a}}"  frameborder="0" style="width:100%;height:500px;"></iframe>
            </div>
        </div>
    </div>
</div>
<a href="#" class="target" style="display:none;" data-toggle="modal" data-target="#{{$a}}"></a>
@endforeach
@stop
@section('js')
<script>
    window.onload=function(){
        $('.target').click();
    }
</script>
@stop