@extends('Admin.mainFrame')
@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- BEGIN: Subheader -->
    	<div class="m-subheader ">
    		<div class="d-flex align-items-center">
    			<div class="mr-auto">
    				<h3 class="m-subheader__title m-subheader__title--separator">{{ $page_title}}</h3>
    				<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
    					<li class="m-nav__item m-nav__item--home">
    						<a href="{{route('dashboard')}}" class="m-nav__link m-nav__link--icon">
    							<i class="m-nav__link-icon la la-home"></i>
    						</a>
    					</li>
    					<li class="m-nav__separator">-</li>
    					<li class="m-nav__item">
    						<a href="{{route('Articles.index')}}" class="m-nav__link">
    							<span class="m-nav__link-text">All Articles</span>
    						</a>
    					</li>
    					
    				</ul>
    			</div>
    		</div>
    	</div>
        
        

        <!-- END: Subheader -->
		<div class="m-content">
			<div class="row">
				<div class="col-lg-12">
					<!--begin::Portlet-->
					<div class="m-portlet">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<span class="m-portlet__head-icon m--hide">
										<i class="la la-gear"></i>
									</span>
									<h3 class="m-portlet__head-text">
                                        {{ $page_title}}
									</h3>
								</div>
							</div>
						</div>
                        
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

						<!--begin::Form-->
						<form class="m-form" method="post" action="{{$page_route}}" enctype="multipart/form-data">
                            @csrf
                            
                            @if(isset($article_data))
                                @method('PUT')
                            @endif
							<div class="m-portlet__body">
								<div class="m-form__section m-form__section--first">
									
                                    <div class="form-group m-form__group row">
										<label class="col-lg-3 col-form-label">Category:</label>
										<div class="col-lg-6">
                                            <select name="category_id" class="form-control">
                                                @foreach($categories as $cat)
                                                    <option {{isset($article_data)&&$article_data->category_id == $cat->id ? 'selected':''}} value="{{$cat->id}}">{{$cat->title}}</option>
                                                @endforeach
                                            </select>
											@error('cat_id')
                                                <span class="m-form__help text-danger">{{$message}}</span>
                                            @enderror
										</div>
									</div>
                                    
                                    <div class="form-group m-form__group row">
										<label class="col-lg-3 col-form-label">Article title:</label>
										<div class="col-lg-6">
											<input type="text" class="form-control m-input" placeholder="" name="title" value="{{ isset($article_data) ? $article_data->title : old('title')}}">
											@error('title')
                                                <span class="m-form__help text-danger">{{$message}}</span>
                                            @enderror
										</div>
									</div>
								
                                    
                                    <div class="form-group m-form__group row">
										<label class="col-lg-3 col-form-label">{{__('messages.Image')}}:</label>
										<div class="col-lg-6">
											<input type="file" class="form-control m-input dropify" name="image" <?php  if(isset($article_data)){ ?> data-default-file="{{ Storage::URL('uploads/'.$article_data->image)}}<?php }?>" />
											@error('image')
                                                <span class="m-form__help text-danger">{{$message}}</span>
                                            @enderror
										</div>
									</div>
                                    
                                    <div class="form-group m-form__group row">
										<label class="col-lg-3 col-form-label">Article Description:</label>
										<div class="col-lg-6">
											<textarea class="form-control m-input" placeholder="" name="description">{{isset($article_data)?$article_data->description:old('description')}}</textarea>
											@error('description')
                                                <span class="m-form__help text-danger">{{$message}}</span>
                                            @enderror
										</div>
									</div>
									
								</div>
							</div>
							<div class="m-portlet__foot m-portlet__foot--fit">
								<div class="m-form__actions m-form__actions">
									<div class="row">
										<div class="col-lg-3"></div>
										<div class="col-lg-6">
											<button type="submit" class="btn btn-success">Submit</button>
											<button type="reset" class="btn btn-secondary">Cancel</button>
										</div>
									</div>
								</div>
							</div>
						</form>

						<!--end::Form-->
					</div>

					<!--end::Portlet-->
				</div>
				
			</div>
			
		</div>
</div>
	
@endsection('content')