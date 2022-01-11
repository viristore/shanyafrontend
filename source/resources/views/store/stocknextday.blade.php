@extends('store.layout.app')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

<style>
   
    .material-icons{
        margin-top:0px !important;
        margin-bottom:0px !important;
    }
        .dt-buttons > button.btn.btn-secondary {
    background-color: grey;
    margin: 1px;
    border-radius: 5px;
    color: white;
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
   
<div class="card">    
<div class="card-header card-header-primary">
      <h4 class="card-title ">Required Stock For Tommorow</h4>
    </div>
<div class="container"> <br> 
<table class="display" id="myTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>Stock requirement</th>
        </tr>
    </thead>
    <tbody>
           @if(count($ord)>0)
          @php $i=1; @endphp
          @foreach($ord as $ords)
        <tr>
            <td class="text-center">{{$i}}</td>
            <td>{{$ords->product_name}}</td>
            
            <td>@foreach($det as $dets)
                @if($dets->product_id == $ords->product_id)
                {{$dets->quantity}}{{$dets->unit}} * {{$dets->count* $dets->sumqty}}<b>({{$dets->quantity*$dets->count*$dets->sumqty}}{{$dets->unit}})</b> |
                @endif
                @endforeach</td>

            
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

    $(document).ready(function() {
    $('#myTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'print'
        ]
    } );
} );
</script>
    @endsection
</div>