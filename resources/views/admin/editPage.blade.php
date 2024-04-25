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
                        <li class="breadcrumb-item">Pages</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Page</li>
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
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Edit Page</h5>
                </div>
                <div class="card-body">
                    <?php
                    if($page){
                        if($page->status == 1){
                            $status = "Publish Now";
                            $val = 1;
                        }else{
                            $status = "Save as Draft";
                            $val = 0;
                        }
                        $thumbnail = $page->thumbnail;
                        $title = $page->title;
                        $content = $page->content;
                        $tags = $page->keywords;
                        $desc = $page->description;
                        $pid = $page->id;
                    }
                    ?>

                    <form method="post" name="myform" id="myform" action="{{route('admin.updatePage', ['page_id' => $pid])}}">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="pid" value="{{$pid}}">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="title" required="required" value="{{$title}}" placeholder="page title..." class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" required="required" class="form-control">
                                        <option value="{{$val}}">{{$status}}</option>
                                        <option value="publish">Publish Now</option>
                                        <option value="draft">Save as Draft</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Your Content</label>
                                    <textarea id="summernote" name="myTextArea" class="form-control">{{$content}}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Excerpt&darr;</label>
                                    <textarea name="description" id="summernote" class="form-control" required="required" placeholder="post excerpt...">{{$desc}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">

                                    <label>Keywords&darr;</label>
                                    <input type="text" name="keywords" value="{{$tags}}" placeholder="enter page keywords separated by comma" required="required" class="form-control" value="">

                                </div>
                            </div>

                        </div>
                        <!--end of ectra-bar-->

                        <div class="form-group">
                            <input type="submit" name="publish" value="Save Page" class="btn btn-info">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@push('scripts')
    <script>

        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Hi. I am your text editor...',
                tabsize: 2,
                height: 150,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
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
