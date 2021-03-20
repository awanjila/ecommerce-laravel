@extends('admin.layouts.appadmin')
@section('title')
Add Categories
@endsection
@section('content')
<div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Categories</h4>
                  @if (Session::has('status'))
                  <div class="alert alert-success">

                    {{Session::get('status')}}

                </div>
                @endif
                @if (Session::has('status1'))
                <div class="alert alert-danger">

                    {{Session::get('status1')}}

                </div>
                @endif
                    {!!Form::open(['action' => 'CategoryController@savecategories', 'class' =>'cmxform', 'method' => 'POST', 'id' => 'commentForm'])!!}
                    {{csrf_field()}}
                    <fieldset>
                      <div class="form-group">
                       
                        {{Form::label('', 'Product Category', ['for' => 'cname'])}}
                         {{Form::text('category_name', '', ['class' => 'form-control', 'minlength' =>'2'])}}
                        
                      </div>
                  
                      {{Form::submit('save', ['class'=>'btn btn-primary'])}}
                      <!--<input class="btn btn-primary" type="submit" value="Submit">-->
                    </fieldset>
                    {!!Form::close()!!}
                  </form>
                </div>
              </div>
            </div>
          </div>
      @endsection
