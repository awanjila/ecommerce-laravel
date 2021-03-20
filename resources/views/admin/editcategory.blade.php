@extends('admin.layouts.appadmin')
@section('title')
Edit Category
@endsection
@section('content')
<div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Category</h4>
                    {!!Form::open(['action' => 'CategoryController@savecategories', 'class' =>'cmxform', 'method' => 'POST', 'id' => 'commentForm'])!!}
                    {{csrf_field()}}
                    <fieldset>
                      <div class="form-group">
                       
                        {{Form::label('', 'Product Category', ['for' => 'cname'])}}
                         {{Form::text('category_name', $category->category_name, ['class' => 'form-control', 'minlength' =>'2'])}}
                        
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
