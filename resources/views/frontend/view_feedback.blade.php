@extends('frontend.master')
@section('title', 'feedback')

@section('main')
<section id="main">

	<div class="container-fluid">
	<h3>Feedback</h3>

		<!-- Add anything from here -->

		<div class="panel panel-default panel-list">
			<!-- start panel heading -->
			<div class="panel-heading compact-pagination ">
				<div class="row">
					<div class="col-md-9">
						{{-- other content --}}
					</div>
					<div class="col-md-3">
						<!-- some data -->

					</div>
				</div>
			</div>
			<!-- ending panel-heading -->

			{{-- starting list items --}}
			<div class="panel-body">
				@if(!($feedbacks->isEmpty()))
					@foreach($feedbacks as $feedback)
						@include('frontend.partials._feedbackViewCard')
					@endforeach   
				@else
					<p>No records</p>
				@endif 
			</div>
			{{-- ending list items --}}

			<!-- panel-footer -->
			<div class="panel-footer compact-pagination">
				<div class="row">
					<div class="col-md-9">
						{{-- other content --}}
					</div>
					<div class="col-md-3">
						{{-- some data --}}
					</div>
				</div>
			</div>
		</div>
		<!-- /.panel -->
		<!-- Add anything till here -->
	</div>
</section>
@endsection



