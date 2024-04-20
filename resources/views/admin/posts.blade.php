@extends('layouts.dashboard')

@section('title', 'Admin | DarlCreativeHub')

@section('content')

    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                        <li class="breadcrumb-item">Blog</li>
                        <li class="breadcrumb-item active" aria-current="page">Blog Posts</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <button class="btn btn-primary" data-toggle="modal" data-target=".post-modal"><i class="ri-add-line align-middle mr-2"></i>New Post</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbbar -->
    @include('partials.notifications')
    <!-- Start Contentbar -->
    <div class="contentbar">

        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">All Blog Posts</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Category</th>
                                        <th>Date Published</th>
                                        <th>Views</th>
                                        <th>Unpublish</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @if($posts)
                                            @foreach ($posts as $rec)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td><a href="/b/{{$rec->link}}" target="_blank">{{$rec->title}}</a></td>
                                                    <td>{{$rec->user->fname}}</td>
                                                    <td>{{$rec->category->title}}</td>
                                                    <td>{{$rec->created_at}}</td>
                                                    <td>{{$rec->views}}</td>
                                                    <td><button onclick="setDraft('{{$rec->id}}')" class="btn btn-warning">Unpub</button></td>
                                                    <td><a href="/dashboard/editPost/{{$rec->id}}"><button class="btn btn-success">Edit</button></a></td>
                                                    <td><a href="javascript:void(0)"><button class="btn btn-danger" onclick="deletePost('{{$rec->id}}')">Delete</button></a></td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="modal fade post-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Blog Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form method="post" name="myform" id="myform" action="{{route('admin.savePost')}}">

                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="post_title" required="required" placeholder="post title..." id="form-input-post-title" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category:</label>
                                        <select name="post_category" required="required" class="form-control">
                                            <option></option>
                                            @if($categories)
                                                @foreach($categories as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->title}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="post_status" required="required" class="form-control">
                                            <option></option>
                                            <option value="publish">Publish Now</option>
                                            <option value="draft">Save as Draft</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Thumbnail</label>
                                        <select name="thumbnail" placeholder="thumbnail image name" class="form-control">
                                            <option></option>
                                            @if($images)
                                                @foreach($images as $rec)
                                                    <option value="{{$rec->link}}">{{$rec->title}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <input type="hidden" name="author" value="{{auth()->user()->id}}">

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Post Body</label>
                                        <textarea id="summernote" name="myTextArea" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Excerpt</label>
                                        <textarea class="form-control" name="post_excerpt" required="required" id="post-excerpt" placeholder="post excerpt..."></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tags&darr;</label>
                                        <input type="text" name="tag" placeholder="enter post tag separated by comma" required="required" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group text-center">
                                        <input type="submit" name="publish" value="Save Post" class="btn btn-info">
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
@stop
