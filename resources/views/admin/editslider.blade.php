@extends('admin.layouts.appadmin')
@section('title')
Edit Slider
@endsection
@section('content')
<div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  @if (Session::has('status'))
                  <div class="alert alert-success">

                    {{Session::get('status')}}

                </div>
                @endif
                  <h4 class="card-title">Add Slider</h4>
                    {!!Form::open(['action' => 'SliderController@updateslider', 'class' =>'cmxform', 'method' => 'POST', 'id' => 'commentForm', 'enctype' => 'multipart/form-data'])!!}
                    {{csrf_field()}}
                    <fieldset>
                      <div class="form-group">
                      	{{Form::hidden('id', $slider->id)}}
                        {{Form::label('', 'Description One', ['for' => 'cname'])}}
                        {{Form::text('description_one', $slider->description1, ['class' => 'form-control'])}}
                        {{Form::label('', 'Description Two', ['for' => 'cname'])}}
                        {{Form::text('description_two', $slider->description2 , ['class' => 'form-control'])}}
                        {{Form::label('', 'Slider Image')}}
                        {{Form::file('slider_image', ['class' => 'form-control'])}}
                        
                      </div>
                  
                      {{Form::submit('Update', ['class'=>'btn btn-primary'])}}
                      <!--<input class="btn btn-primary" type="submit" value="Submit">-->
                    </fieldset>
                    {!!Form::close()!!}
                  </form>
                </div>
              </div>
            </div>
          </div>
      @endsection
