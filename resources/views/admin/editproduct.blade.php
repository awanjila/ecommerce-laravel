@extends('admin.layouts.appadmin')
@section('title')
Edit Product
@endsection
@section('content')
<div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Product</h4>
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
                    {!!Form::open(['action' => 'ProductController@updateproduct', 'class' =>'cmxform', 'method' => 'POST', 'id' => 'commentForm', 'enctype' => 'multipart/form-data'])!!}
                    {{csrf_field()}}
                    <fieldset>
                      <div class="form-group">
                        {{Form::hidden('id', $product->id)}}
                        {{Form::label('', 'Product Name', ['for' => 'cname'])}}
                        {{Form::text('product_name', $product->product_name, ['class' => 'form-control'])}}
                      </div>
                        <div class="form-group">
                        {{Form::label('', 'Product Price', ['for' => 'cname'])}}
                        {{Form::number('product_price', $product->product_price, ['class' => 'form-control'])}}
                      </div>
                        <div class="form-group">
                        {{Form::label('', 'Product Category')}}
                        {{Form::select('product_category',$categories, $product->product_category, ['class' => 'form-control'])}}
                      </div>
                        
                        
                        <div class="form-group">
                          {{Form::label('', 'Product Image')}}
                        {{Form::file('product_image', ['class' => 'form-control'])}}
                        </div>
                        <div class="form-group">
                        {{Form::label('', 'Product Description', ['for' => 'cname'])}}
                        {{Form::textarea('product_description', $product->product_description, ['class' => 'form-control'])}}
                        
                        
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
