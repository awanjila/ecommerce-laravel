 
<ul class="nav">
  <li class="nav-item">
    <a class="nav-link" href="{{URL::to('/dashboard')}}">
      <i class="ti-home menu-icon"></i>
      <span class="menu-title">Dashboard</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
      <i class="ti-clipboard menu-icon"></i>
      <span class="menu-title">Creations</span>
      <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="form-elements">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item"><a class="nav-link" href="{{URL::to('/addcategories')}}">Add Categories</a></li>
        <li class="nav-item"><a class="nav-link" href="{{URL::to('/addproducts')}}">Add Products</a></li>
        <li class="nav-item"><a class="nav-link" href="{{URL::to('/addslider')}}">Add Slider</a></li>

      </ul>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
      <i class="ti-layout menu-icon"></i>
      <span class="menu-title">Views</span>
      <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="tables">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="{{URL::to('/categories')}}">Categories</a></li>
        <li class="nav-item"> <a class="nav-link" href="{{URL::to('/products')}}">Products</a></li>
        <li class="nav-item"> <a class="nav-link" href="{{URL::to('/sliders')}}">Sliders</a></li>
        <li class="nav-item"> <a class="nav-link" href="{{URL::to('/orders')}}">Orders</a></li>
        <li class="nav-item"> <a class="nav-link" href="{{URL::to('/mpesa_transactions')}}">Mpesa Transactions</a></li>
      </ul>
    </div>
  </li>
</ul>
