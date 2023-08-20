@extends('website.master')

@section('body')

<div class="row">
      <div class="contentheader">
        <h2>Home - Manage Sales</h2>
       </div> <hr>
     
    <center>
      <div class="col-md-12">
        <form method="post" action="{{route('medicine.sales.new')}}">
          @csrf
          <input type="hidden" name="product_id" id="product_id" required class="form-control" autocomplete="off" placeholder="Medicine" style="width:400px;height: 30px;">
         <input type="text" name="bar_code" id="bar_code" autocomplete="off" placeholder="Enter Barcode Number" style="width:200px;height: 30px;">
       <input type="text"  name="product" id="medicine" required  autocomplete="off" placeholder="Medicine" style="width:400px;height: 30px;">
     <!-- <div class="ui-widget">
     <input type="hidden" name="product" id="product_hidden" required class="form-control" autocomplete="off" placeholder="Medicine" style="width:400px;height: 30px;"> -->
   <!-- </div> -->
      <input type="hidden" name="expire_date"  id="date_hidden" required class="form-control" autocomplete="off" placeholder="Medicine" style="width:400px;height: 30px;">
      <input type="hidden" name="selling_price"  id="selling_price" required class="form-control" autocomplete="off" placeholder="Medicine" style="width:400px;height: 30px;">
     <input type="number" name="avai_qty" id="avai_qty"   readonly placeholder="Available qty" style="width: 100px; height:30px;">
   
     <input type="number" name="qty" id="qty"   placeholder="Qty" autocomplete="off"  style="width: 100px; height:30px;" required>
     <input type="hidden" name="date" value="">
     <input type="text" name="discount" id="dis" autocomplete="off" placeholder="Enter discount" style="width:100px;height: 30px;">
     <input type="hidden" value="0" name="grand_total" id="grand_total" autocomplete="off" placeholder="Enter discount" style="width:100px;height: 30px;">
     <input type="hidden" value="0" name="grand_profit" id="grand_profit" autocomplete="off" placeholder="Enter discount" style="width:100px;height: 30px;">
     <input type="submit"  name="submit" class="btn btn-success" id="btn_submit" value="Add To Cart" style="width: 130px; height:40px; margin-top:-8px;"><i class="icon icon-plus-sign"></i> </input>
      </form> 
      </div>
    </center>
     </div>

  </div>
   <div class="container">
  <div class="row">
  <div class="col-md-12">
  <table class="table table-bordered table-striped table-hover" id="resultTable" data-responsive="table">
  
  <thead>
  <tr style="background-color: #383838; color: #FFFFFF;" >
      <th> Medicine Name </th>
      <th> Qty </th>
      <th> Price </th>
      <th> Amount </th>
      <th> Action </th>
    </tr>
  </thead>
  <tbody>
    
    @foreach($carts as $cart)
    <tr>
    <td>{{$cart->name}}</td>
    <td>
    <form action="{{route('update-cart-product',['id'=>$cart->__raw_id])}}" method="POST">
        @csrf
    <div class="input-group">
    <input  class="form-control" value="{{$cart->qty}}" name="qty" min="1" required />
    <input type="submit" class="btn btn-success" value="Update" />
</div>
</form>
</td>
    <td>{{$cart->price}}</td>
    <td>{{$cart->total}}</td>
    <td>
    <a href="{{route('medicine.remove',['id'=>$cart->__raw_id])}}" onclick="return confirm('Aer u sure to delete')" ><button class="btn btn-info">Remove</button></a>
    </td>
    
    </tr>
    @endforeach
</tbody>
</table>
  </div>
  </div>
  </div>
@endsection