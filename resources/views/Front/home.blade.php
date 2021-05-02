@extends('Front.layout')

@section('content')
    <h1 class="my-4">Blog Articles</h1>
    <div class="row" style="margin: 1px;">
        <form action="{{url('/')}}" method="get" id="cats_form">
            <label>Choose Categry</label>
            <select class="form-control" name="category_id" id="category_id">
                <option value="0">--all categories--</option>
                @foreach($categories as $cat)
                    <option value="{{$cat->id}}"  {{isset($selected_cat) && $selected_cat == $cat->id ?'selected':''}}>{{$cat->title}}</option>
                @endforeach
            </select>
            
        </form>
    </div>
    <div class="row">
        
        @foreach($articles as $row)
            <div class="col-md-4" style="margin-bottom: 1px;">
                <div class="card" style="width: 18rem;">
                  <img src="{{ Storage::URL('uploads/'.$row->image)}}" class="card-img-top" alt="" height="150">
                  <div class="card-body">
                    <h5 class="card-title">{{$row->title}}</h5>
                    <p class="card-text">{{ substr($row->description, 0, 150)}}</p>
                    <a href="{{route('article_details', $row->id)}}" class="btn btn-primary">Details</a>
                  </div>
                </div>
            </div>
        @endforeach
        
    </div>
@endsection

@section('script')
    <script>
        $('#category_id').change(function(){
            $('#cats_form').submit();
        })
    </script>
@endsection