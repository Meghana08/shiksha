@extends('frontend.master')
@section('title', 'Home')

@section('custom-style')
<style type="text/css">
	div {
		text-align: center;
	}

</style>
@endsection

@section('main')

<!-- Registration Section -->
<section id="main" style="background-color:#5a9fe2">
	<div class="row">
		<div class="col-md-12" style="background-color: #5a9fe2; height:30vh;">        

		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="clearfix" style="padding:50px">
				<h2 class="small-heading" id="regSectionLabel">
					FEEDBACK
				</h2>
				{{ Form::open(['url'=>'/feedback/','method'=>'post','id'=>'feedback_form'])  }}
				{{ csrf_field() }}

				<div class="row">
					<div class="form-group col-md-6">                            
						<label for="response" class="col-md-4 control-label pull-left">Responsse on querry :</label>

						<select id="response" name="response" class="form-control">
						@foreach($grades as $grade)
							<option value="{{ $grade->id }}">{{ $grade->name }}</option>
						@endforeach
						</select>
					</div>

					<div class="form-group col-md-6">                            
						<label for="material" class="col-md-4 control-label pull-left">Material availability :</label>

						<select id="material" name="material" class="form-control">
						@foreach($grades as $grade)
							<option value="{{ $grade->id }}">{{ $grade->name }}</option>
						@endforeach
						</select>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-6">                            
						<label for="query_resolve" class="col-md-4 control-label pull-left">Querry Resolved :</label>

						<select id="query_resolve" name="query_resolve" class="form-control">
						@foreach($grades as $grade)
							<option value="{{ $grade->id }}">{{ $grade->name }}</option>
						@endforeach
						</select>
					</div>

					<div class="form-group col-md-6">                            
						<label for="message" class="col-md-4 control-label pull-left">Enter your message :</label>

						<input id="feedback" type="text" class="form-control" name="message" placeholder="Enter your first name" required>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<center>
							<button type="submit" class="btn btn-primary submit-btn">
								<i class="fa fa-btn fa-edit"></i> Submit
							</button>
						</center>
					</div>
				</div>

				{!! Form::Close() !!}
			</div>
		</div>
	</div>
</section>
@endsection