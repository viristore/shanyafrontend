@extends('admin.layout.app')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

<style>
    .material-icons{
        margin-top:0px !important;
        margin-bottom:0px !important;
    }
</style>
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
     <a href="{{route('reward')}}" class="btn btn-primary ml-auto" style="width:12%;float:right;padding: 3px 0px 3px 0px;"><i class="material-icons">add</i>Add Reward</a>
</div> 
<div class="col-lg-12">
<div class="card">    
<div class="card-header card-header-primary">
      <h4 class="card-title ">Reward List</h4>
    </div>
<div class="container">   
<table class="dsplay" id="myTable">
    <thead>
        <tr>
            <th class="text-center">#</th>
                      <th>Cart Value</th>
                      <th>Reward Points</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                         @if(count($reward)>0)
                          @php $i=1; @endphp
                          @foreach($reward as $rewards)
                            <tr>
                                <td class="text-center">{{$i}}</td>
                                <td>{{$rewards->min_cart_value}}</td>
                                
                                <td>{{$rewards->reward_point}}</td>
                                    <td>
                                    <a href="{{route('rewardedit', $rewards->reward_id)}}" button type="button" class="btn btn-success">
                                        <i class="material-icons">edit</i>
                                    </button></a>
                                     <a href="{{route('rewarddelete', $rewards->reward_id)}}" button type="button" class="btn btn-danger">
                                        <i class="material-icons">close</i>
                                    </button></a>
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
    <script>
        $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
    @endsection
</div>