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
                    <li class="breadcrumb-item">Media Manager</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <button class="btn btn-primary" data-toggle="modal" data-target=".media-modal"><i class="ri-add-line align-middle mr-2"></i>ADD</button>
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
                 <div class="col-md-12 col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h2>Uploaded Media</h2>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @if($media)
                                    @foreach($media as $key => $med)
                                    <div class="col-lg-4 col-md-3 text-center mb-2">

                                        <iframe class="mt-3 w-100 embed-responsive-item" src="https://www.youtube.com/embed/{{$med->video_id}}" frameborder="0" allowfullscreen></iframe>

                                        <div class="row p-2 text-center">
                                            <div class="col-md-4 m-auto text-center">
                                                <button onclick="deleteMedia('{{$med->id}}')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                <div class="col-md-4 text-center">
                                    <p>No media uploaded yet..</p>
                                </div>
                                @endif
                            </div>
                            <div class="row mt-4">
                                <div class="container text-center">
                                {{ $media->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End col -->
    </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->

<div class="modal fade media-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Media</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('admin.saveMedia')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-2">
                        <label>Media Title</label>
                        <input type="text" name="title" required="required" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label>Media Description</label>
                        <textarea name="description" required="required" class="form-control"></textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label>Video ID</label>
                        <input type="text" name="video_id" required="required" class="form-control">
                    </div>

                    <div class="form-group mb-2">
                        <input type="submit" name="upload" class="btn btn-info" value="Add Media">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function deleteMedia(id){
        Swal.fire({
            title: "Do you want to delete this item?",
            showCancelButton: true,
            confirmButtonText: "Yes"
        }).then((result) => {
            if (result.isConfirmed) {
                var url = '/admin/delete-media/' + id;
                $.ajax({
                    url: url,
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        response = JSON.parse(response);
                        if (response.status == 'success') {
                            Swal.fire("info", "Media deleted", "success");
                            location.reload();
                        } else {
                            Swal.fire("Oooops!", "The server was unable to handle your request at the moment!", "error");
                        }
                    },
                    error: function (xhr) {
                        console.error('Error:', xhr.responseText);
                        Swal.fire("Oooops!", "The server encountered an error while processing your request!", "error");
                    }
                });

            }
        });
    }
</script>
@endpush
@endsection
