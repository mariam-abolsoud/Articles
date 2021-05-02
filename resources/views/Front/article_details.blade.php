@extends('Front.layout')

@section('content')
    <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">
        {{$row_data->title}}
        <small>{{$row_data->category->title}}</small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{url('/')}}">Home</a>
      </li>
      <li class="breadcrumb-item active">{{$row_data->title}}</li>
    </ol>

    <!-- Intro Content -->
    <div class="row">
      <div class="col-lg-6">
        <img class="img-fluid rounded mb-4" src="{{ Storage::URL('uploads/'.$row_data->image)}}" alt="">
      </div>
      <div class="col-lg-6">
        <h2>{{$row_data->title}}</h2>
        <p>{{$row_data->description}}</p>
      </div>
    </div>
    <!-- /.row -->

    <!-- Team Members -->
    <h2>Comments</h2>

    <div class="row">
      <form name="sentMessage" id="contactForm" action="#">
          <div class="control-group form-group">
            <div class="controls">
              <label for="name">Full Name:</label>
              <input type="text" name="name" class="form-control" id="name" required />
              @error('name')
                <p class="help-block">{{$messages}}</p>
              @enderror
            </div>
          </div>
          
          
          <div class="control-group form-group">
            <div class="controls">
              <label>Comment:</label>
              <textarea rows="10" name="comment" cols="100" class="form-control" id="comment" required maxlength="999" style="resize:none"></textarea>
            </div>
          </div>
          <div id="msg"></div>
          <!-- For success/fail messages -->
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Add comment</button>
        </form>
      
      
    </div>
    <!-- /.row -->


  </div>
@endsection

@section('script')
<script>
$('#sendMessageButton').click(function(e){
    e.preventDefault();
    
    postData = {
        name: $('#name').val(),
        comment: $('#comment').val(),
        article_id: '{{$row_data->id}}',
        "_token": "{{ csrf_token() }}"
        
    };
    $.post('{{route("add_comment")}}', postData, function(result){
        
        if(result['status'] == 'success')
        {
            $('#contactForm')[0].reset();
        }
        
        $('#msg').html(result['message']);
    })
});
</script>
@endsection