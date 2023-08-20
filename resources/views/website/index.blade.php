@extends('website.master')

@section('body')
<div class="row">
    <div class="col-12">
    <h4 class="text-center text-success">{{Session::get('message')}}</h4> 
        <!-- Button trigger modal -->
        <div class="d-flex justify-content-between mx-3 px-4">

        <input type="text" class="form-control mx-2"  id="name_med1" size="4"  onkeyup="med_name1()" placeholder="Filter using BarCode" title="Type BarCode">
            <input type="text" size="4"  class="form-control mx-2"  id="med_name" onkeyup="quanti()" placeholder="Filter using Medicine Name" title="Type Medicine Name">
            <input type="text" size="4"   class="form-control mx-2" id="med_exp_date" onkeyup="exp_date()" placeholder="Filter using Registered Date" title="Type in registered date">
            <input type="text" size="4"  class="form-control mx-2" id="med_status" onkeyup="stat_search()" placeholder="Filter using Profit Margin" title="Type in profit amount">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-1">
  Add Medicine
    </button>
      </div>

      <table id="table0" class="table table-bordered table-striped table-hover my-3 ">
           <thead>
             <tr style="background-color: #383838; color: #FFFFFF;" >
             <th width="3%">Code</th>
             <th width="3%">Medicine</th>
             <th width="1%">Category</th>
             <th width="5%">Registered Qty</th>
             <th width="1%">Sold Qty</th>
             <th  width="1%">Remain Qty</th>
             <th width="1%">Registered</th>
             <th style="background-color: #c53f3f;" width="1%">Expiry</th>
             <th width="1%">Remark</th>     
             <th width="2%">Acutal Price</th>
             <th width="2%">Selling Price</th>
             <th width="2%">Profit</th>
             <th width = "3%">Status</th>
             <th width = "5%">Actions</th>
             </tr>
           </thead>
           <tbody>
                @foreach($mediciens as $medicien)
                     <tr>
                      <td>{{$medicien->bar_code}}</td>
                      <td>{{$medicien->med_name}}</td>
                      <td>{{$medicien->category}}</td>
                      <td>{{$medicien->quantity}}</td>
                      <td>{{$medicien->quantity}}</td>
                      <td>{{$medicien->quantity}}</td>
                      <td>{{$medicien->reg_date}}</td>
                      <td>{{$medicien->exp_date}}</td>
                      <td>{{$medicien->company}}</td>
                      <td>{{$medicien->actual_price}}</td>
                      <td>{{$medicien->selling_price}}</td>
                      <td>{{$medicien->profit_price}}</td>
                      <td>{{$medicien->quantity>1?"Avaibale":"Not"}}</td>
                      
                      <td>
                      <a href="{{route('medicine.edit',['id'=>$medicien->id])}}" class=" d-inline" id="popup" data-bs-toggle="modal" data-bs-target="#exampleModal-2" ><button class="btn btn-info d-inline">Edit</button></a>
                        <button class=" mt-2 btn btn-danger delete d-inline" id="{{$medicien->id}}"><span class="icon-trash">Delete</button></td>
                      </td>
                     </tr>
                @endforeach
           </tbody>
</table>
           
<!-- Modal add medicine -->
<div class="modal fade" id="exampleModal-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Medicine</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{route('medicine.new')}}">
        @csrf
  	  	  <table id="table" style="width: 400px; margin: auto;overflow-x:auto; overflow-y: auto;">
  	  	 <tr>
         <td>Bar Code:</td>
         <td><input type="text" name="bar_code" id="bar_code" size="10" placeholder="Set a bar code"></td>
          </tr>
          <tr id="row1">
         <td>Medicine Name:</td>
         <td><input type="text" name="med_name"   id="med_name" size="10" required ></td>
        </tr>
        <tr>
                   <td>Category:</td>

          <td><input type="text" name="category" id="category" size="10"  required></td>
        </tr>
        <tr>
                   <td>Quantity:</td>
         
        <td><input type="number" style="width: 95px;" name="quantity">

             <select style="width: 95px; height: 28px; border-color: #000080" name="sell_type" > 
                 <option value="Bot">Bot</option>
                 <option value="Stp">Stp</option>
                  <option value="Tab">Tab</option>
		     <option value="Sachet">Sachet</option>	
		     <option value="Unit">Unit</option>
		       <option value="Tube">Tube</option>
                 </select></td>
        
        </tr> 
        <tr>
                   <td>Registered Date:</td>

          <td><input type="date"  name="reg_date" id="reg_date" size="5"  required>  </td>
        </tr>
        <tr>
                   <td>Expired Date:</td>

          <td><input type="date" name="exp_date" id="exp_date" size="5"  required></td>
        </tr>
        <tr>
                   <td>Remark:</td>

          <td><input type="text" name="company" id="company" size="10"></td>
        </tr>
       
          <tr>
                     <td>Actual Price:</td>

          <td><input type="number" name="actual_price" id="actual_price"></td>
        </tr>
        <tr>
                   <td>Selling Price:</td>

          <td><input type="number" name="selling_price" id="selling_price"></td>
        </tr>
        <tr> 
                   <td>Profit:</td>

          <td><input type="text" name="profit_price" id="profit_price"></td>
        </tr>

        <tr>
          <td></td>
          <td> <input type="submit" name="submit" class="btn btn-success btn-large" style="width: 225px" value="Save"> </td>
        </tr>

  	  	 </table> 
        <br>
  	  	 </form><br>
      </div>
      <div class="modal-footer">
        <small id="StatusLogMsg"></small>
      <button onclick="addMedicine()" type="button" id="stuLoginbtn" class="btn btn-primary">Login</button>
      <!-- <button onclick="addMedicine()" type="button" id="stuLoginbtn" class="btn btn-primary">M</button> -->
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancle</button>
       
      </div>
    </div>
  </div>
</div>
  <!-- end  add madicine modal -->

  <!-- Modal edit  medicine -->
<div class="modal fade" id="exampleModal-2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Medicine</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     
      <form method="POST" action="{{route('medicine.update',['id'=>$medicien->id])}}">
        @csrf
  	  	  <table id="table" style="width: 400px; margin: auto;overflow-x:auto; overflow-y: auto;">
  	  	 <tr>
         <td>Bar Code:</td>
         <td><input type="text" name="bar_code" {{$medicien->bar_code}} id="bar_code" size="10" placeholder="Set a bar code"></td>
          </tr>
          <tr id="row1">
         <td>Medicine Name:</td>
         <td><input type="text" name="med_name" value="{{$medicien->med_name}}"  id="med_name" size="10" required ></td>
        </tr>
        <tr>
                   <td>Category:</td>

          <td><input type="text" name="category"  value="{{$medicien->category}}" id="category" size="10"  required></td>
        </tr>
        <tr>
                   <td>Quantity:</td>
         
        <td><input type="number" style="width: 95px;" name="quantity">

             <select style="width: 95px; height: 28px; border-color: #000080" name="sell_type" > 
                 <option value="Bot">Bot</option>
                 <option value="Stp">Stp</option>
                  <option value="Tab">Tab</option>
		     <option value="Sachet">Sachet</option>	
		     <option value="Unit">Unit</option>
		       <option value="Tube">Tube</option>
                 </select></td>
        
        </tr> 
        <tr>
                   <td>Registered Date:</td>

          <td><input type="date"  name="reg_date" id="reg_date" size="5"  required>  </td>
        </tr>
        <tr>
                   <td>Expired Date:</td>

          <td><input type="date" name="exp_date" id="exp_date" size="5"  required></td>
        </tr>
        <tr>
                   <td>Remark:</td>

          <td><input type="text" name="company" id="company" size="10"></td>
        </tr>
       
          <tr>
                     <td>Actual Price:</td>

          <td><input type="number" name="actual_price" id="actual_price"></td>
        </tr>
        <tr>
                   <td>Selling Price:</td>

          <td><input type="number" name="selling_price" id="selling_price"></td>
        </tr>
        <tr> 
                   <td>Profit:</td>

          <td><input type="text" name="profit_price" id="profit_price"></td>
        </tr>

        <tr>
          <td></td>
          <td> <input type="submit" name="submit" class="btn btn-success btn-large" style="width: 225px" value="Update"> </td>
        </tr>

  	  	 </table> 
        <br>
  	  	 </form><br>
       
      </div>
      <div class="modal-footer">
        <small id="StatusLogMsg"></small>
      <button onclick="addMedicine()" type="button" id="stuLoginbtn" class="btn btn-primary">Login</button>
      <!-- <button onclick="addMedicine()" type="button" id="stuLoginbtn" class="btn btn-primary">M</button> -->
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancle</button>
       
      </div>
    </div>
  </div>
</div>
  <!-- end  student singin modal -->


  <!-- start admin singin modal -->
<!-- Modal -->

    </div>
</div>
@endsection