
@extends('Admin.mainFrame')
@section('content')
	<div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- BEGIN: Subheader -->
    	<div class="m-subheader ">
    		<div class="d-flex align-items-center">
    			<div class="mr-auto">
    				<h3 class="m-subheader__title m-subheader__title--separator">All Articles</h3>
    				<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
    					<li class="m-nav__item m-nav__item--home">
    						<a href="{{route('dashboard')}}" class="m-nav__link m-nav__link--icon">
    							<i class="m-nav__link-icon la la-home"></i>
    						</a>
    					</li>
    					
    				</ul>
    			</div>
    			
    		</div>
    	</div>

					<!-- END: Subheader -->
					<div class="m-content">
						
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											All Articles
										</h3>
									</div>
								</div>
								<div class="m-portlet__head-tools">
									<ul class="m-portlet__nav">
										<li class="m-portlet__nav-item">
											<a href="{{route('Articles.create')}}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
												<span>
													<i class="la la-plus"></i>
													<span>Add new article</span>
												</span>
											</a>
										</li>
										<li class="m-portlet__nav-item"></li>
										
									</ul>
								</div>
							</div>
							<div class="m-portlet__body">
                            
                            @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show " role="alert">
                                <p class="text-center">
                                  {{Session::get('success')}}
                                  </p>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                            @endif

								<!--begin: Datatable -->
								<table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
									<thead>
										<tr>
                                            <th>Category</th>
											<th>Title</th>
											<th>Description</th>
											<th>Image</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach($grid_data as $row)
										<tr>
											<td>{{$row->category->title}}</td>
                                            <td>{{$row->title}}</td>
											<td>{{$row->description}}</td>
                                            <td><img src="{{ Storage::URL('uploads/'.$row->image)}}" height="150" /> </td>
											
											<td nowrap>
                                                <a href="{{route('Articles.edit', $row->id)}}" class="btn btn-info float-left">Edit</a>
                                                <form class="float-left" method='post' action="{{ route('Articles.destroy', $row->id)}}" >
                                                    <input type='hidden' name='_method' value='DELETE'>
                                                    <input type='hidden' name='_token' value='{{csrf_token()}}'>
                                                    <button class='btn btn-danger' id='{{ $row->id }}'>Delete </button>
                                                </form>
                                            </td>
										</tr>
                                        @endforeach
										
										
									</tbody>
								</table>
                                {{$grid_data->links()}}
							</div>
						</div>

						<!-- END EXAMPLE TABLE PORTLET-->
					</div>
				</div>
	
@endsection('content')