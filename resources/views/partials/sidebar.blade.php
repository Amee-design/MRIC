<div class="col-md-4">
    <div class="card m-b-30">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-12">
                    <h5 class="card-title mb-0">Recent Events</h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <ul class="list-group">
            @if($latest)
                @foreach ($latest as $rec)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <img src="{{asset('storage/images/'.$rec->thumbnail)}}" alt="{{$rec->thumbnail}}" style="width:100px;height:100px;object-fit:cover" class="img-fluid" />
                    <div class="media-body">
                        <a href="{{url('/')}}/b/{{$rec->link}}">
                            <h5 style="color: #2d2d2d;">{{$rec->title}}</h5>
                        </a>
                        <p style="font-size: 12px">{{strftime("%b %d, %Y", strtotime($rec->created_at))}}</p>
                    </div>
                </li>
                @endforeach
            @endif
            </ul>
        </div>
    </div>
</div>
