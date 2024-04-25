@extends('layouts.dashboard')

@section('title', 'Admin | MRIC')

@section('content')

<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Admin</a></li>
                    <li class="breadcrumb-item">Slider Manager</li>
                    <li class="breadcrumb-item active" aria-current="page">Sliders</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <button class="btn btn-primary" data-toggle="modal" data-target=".slider-modal"><i class="ri-add-line align-middle mr-2"></i>ADD</button>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-12">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h4>Uploaded Images</h4>
                        </div>
                        <div class="card-body">
                            <h2>Select Image</h2>
                            <form method="post" action="{{route('admin.saveSlider')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Image</label>
                                    <select name="title" required="required" class="form-control">
                                        <option></option>
                                        @if($images)
                                            @foreach ($images as $rec)

                                            <option value="{{$rec->link}}">{{$rec->title}}</option>

                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="upload" class="btn btn-info" value="Save">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-8">
                    <!--fluid space-->
                    <h2>Slider Images</h2>

                    <div class="row">

                        @if($slider_images)
                            @foreach ($slider_images as $rec)
                            <div class="col-md-4">
                                <div class="card">
                                    <img id="img{{$rec->id}}" src="{{ asset('storage/images/'.$rec->img) }}" height="200px" style="float: left; width: 100%">

                                    <span style="width: 100%; float: left">
                                        <button onclick="rmvPostImg('{{$rec->img}}')" class="btn btn-danger">Remove</button>
                                    </span>
                                </div>
                            </div>
                            @endforeach
                        @endif

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

@stop

@push('scripts')
<script>
    function rmvPostImg(file){
        if(confirm("Are you sure you want to delete this image?")){
            location.assign('/dashboard/deleteSlider/'+file);
        }
    }
</script>
@endpush
