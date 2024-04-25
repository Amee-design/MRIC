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
                        <li class="breadcrumb-item" aria-current="page">Pages</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <button class="btn btn-primary" data-toggle="modal" data-target=".page-modal"><i class="ri-add-line align-middle mr-2"></i>ADD</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbbar -->
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Pages</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Date Published</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($pages)

                                    @foreach($pages as $rec)
                                        <?php
                                        if($rec->page_status == '0')
                                            $status = 'Draft';
                                        else
                                            $status = 'Published';
                                        ?>
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$rec->title}}</td>
                                            <td>{{substr($rec->description,0,255)}}...</td>
                                            <td>{{$rec->created_at}}</td>
                                            <td>{{$status}}</td>
                                            <td><a href="{{route('admin.editPage', [$rec->id])}}"><button class="btn btn-info btn-sm"><i class="fa fa-pencil"></button></a></td>
                                            <td><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></button></td>
                                        </tr>
                                    @endforeach

                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade page-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Page</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form method="post" name="myform" id="myform" action="{{route('admin.savePage')}}">

                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" required="required" placeholder="post title..." id="form-input-post-title" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" required="required" class="form-control">
                                            <option></option>
                                            <option value="1">Publish Now</option>
                                            <option value="0">Save as Draft</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Page Body</label>
                                        <textarea id="summernote" name="content" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Excerpt</label>
                                        <textarea class="form-control" name="description" required="required" id="post-excerpt" placeholder="post excerpt..."></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tags&darr;</label>
                                        <input type="text" name="keywords" placeholder="enter page tags separated by comma" required="required" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group text-center">
                                        <input type="submit" name="publish" value="Save Page" class="btn btn-info">
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End Contentbar -->
@push('scripts')
    <script>

        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Hi. I am your text editor...',
                tabsize: 2,
                height: 150,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });

    </script>
@endpush

@endsection
