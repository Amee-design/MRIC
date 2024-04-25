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
                    <li class="breadcrumb-item">Settings</li>
                    <li class="breadcrumb-item active" aria-current="page">Site Settings</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <div class="col-lg-4 col-md-12">
            <div class="card mb-30">
                <div class="card-header">
                    <p>Site Logo</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <img src="/storage/images/{{$data->logo ?? '#'}}" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="card mb-30">
                <div class="card-header">
                    <p>Last Modified: {{$data->updated_at ?? null}}</p>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('admin.saveSettings')}}" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Site Logo</label>
                                <select name="logo" class="form-control">
                                    <option value="{{$data->logo ?? null}}">{{$data->logo}}</option>
                                    @if($images)
                                        @foreach($images as $rec)
                                            <option value="{{$rec->link}}">{{$rec->title}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{$data->id ?? 0}}">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Site Title</label>
                                <input type="text" name="title" value="{{$data->title ?? null}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Site Description</label>
                                <textarea name="description" class="form-control">{{$data->description ?? null}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Site Keywords</label>
                                <input type="text" name="keywords" value="{{$data->keywords ?? null}}" placeholder="enter keywords separated by comma" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Official Email</label>
                                <input type="email" name="email" value="{{$data->email ?? null}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Official Phone</label>
                                <input type="text" name="phone" value="{{$data->phone ?? null}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Vision Statement</label>
                                <input type="text" name="vision" value="{{$data->vision ?? null}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Mission Statement</label>
                                <input type="text" name="mission" value="{{$data->mission ?? null}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Core Values</label>
                                <input type="text" name="values" value="{{$data->core_values ?? null}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Facebook</label>
                                <input type="text" name="fb" value="{{$data->fb ?? null}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>X</label>
                                <input type="text" name="x" value="{{$data->x ?? null}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>IG</label>
                                <input type="text" name="ig" value="{{$data->ig ?? null}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Bank Name</label>
                                <input type="text" name="bank_name" value="{{$data->bank_name ?? null}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Account Name</label>
                                <input type="text" name="account_name" value="{{$data->account_name ?? null}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Account Number</label>
                                <input type="text" name="account_number" value="{{$data->account_number ?? null}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" style="height:80px" class="form-control">{{$data->address ?? null}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" name="siteInfoBtn" class="btn btn-info" value="Save">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
