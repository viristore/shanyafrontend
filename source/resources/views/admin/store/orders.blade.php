@extends('admin.layout.app')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

@section ('content')
<div class="container-fluid">
 <div class="row">
<div class="col-lg-12">
    @if (session()->has('success'))
   <div class="alert alert-success">
    @if(is_array(session()->get('success')))
            <ul>
                @foreach (session()->get('success') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
            @else
                {{ session()->get('success') }}
            @endif
        </div>
    @endif
     @if (count($errors) > 0)
      @if($errors->any())
        <div class="alert alert-danger" role="alert">
          {{$errors->first()}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
      @endif
    @endif
    </div>
<div class="col-lg-12">
<div class="card">    
<div class="card-header card-header-primary">
      <h4 class="card-title ">Store Order List</h4>
    </div>
<div class="container"> <br> 
<table class="display" id="myTable">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Cart_id</th>
            <th>Cart price</th>
            <th>User</th>
            <th>Delivery_Date</th>
            <th>Cart Products</th>
            <th class="text-right">status</th>
        </tr>
    </thead>
    <tbody>
           @if(count($ord)>0)
          @php $i=1; @endphp
          @foreach($ord as $ords)
        <tr>
            <td class="text-center">{{$i}}</td>
            <td>{{$ords->cart_id}}</td>
            <td>{{$ords->total_price}}</td>
            <td>{{$ords->user_name}}({{$ords->user_phone}})</td>
             <td>{{$ords->delivery_date}}</td>
            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1{{$ords->cart_id}}">Details</button>
            <td class="td-actions text-right">
                @if($ords->order_status == 'Confirmed'||$ords->order_status == 'confirmed'||$ords->order_status == 'Confirm'||$ords->order_status == 'confirm')
                <p>Confirmed</p>
                @endif
                @if($ords->order_status == 'Completed'||$ords->order_status == 'completed'||$ords->order_status == 'Completed'||$ords->order_status == 'complete')
                  <p>Completed</p>
                @endif
                @if($ords->order_status == 'PENDING'||$ords->order_status == 'pending'||$ords->order_status == 'Pending')
                  <p>Pending</p>
                @endif
            </td>
        </tr>
          @php $i++; @endphp
                 @endforeach
                  @else
                    <tr>
                      <td>No data found</td>
                    </tr>
                  @endif
    </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<div>
</div>


<!--/////////details model//////////-->
@foreach($ord as $ords)
        <div class="modal fade" id="exampleModal1{{$ords->cart_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        	<div class="modal-dialog" role="document">
        		<div class="modal-content">
        			<div class="modal-header">
        				<h5 class="modal-title" id="exampleModalLabel">Order Details (<b>{{$ords->cart_id}}</b>)</h5>
        					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        						<span aria-hidden="true">&times;</span>
        					</button>
        			</div>
        			<!--//form-->
        			<table class="table table-bordered" id="example2" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                        <th>product details</th>
                        <th>order qty</th>
                        <th>Price</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      @if(count($details)>0)
                                      @php $i=1; @endphp
                                      
                          <tr>             
                        @foreach($details as $detailss)
                          @if($detailss->cart_id==$ords->cart_id)
                            <td><p><img style="width:25px;height:25px; border-radius:50%" src="{{url($detailss->varient_image)}}" alt="$detailss->product_name">  {{$detailss->product_name}}({{$detailss->quantity}}{{$detailss->unit}})</p>
                            </td>
                            <td>{{$detailss->qty}}</td>
                            <td> 
                            <p><span style="color:grey">{{$detailss->price}}</span></p>
                           </td>
    		          	  @endif
                         </tr>
                            @php $i++; @endphp
                            @endforeach
                          @else
                            <tr>
                              <td>No data found</td>
                            </tr>
                                  @endif
                                   
                      </tbody>
                    </table>

        			<!--//form-->
        		</div>
        	</div>
        </div>
 @endforeach

 <script>
        $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
    @endsection
</div>