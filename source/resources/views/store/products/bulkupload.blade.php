@extends('store.layout.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

<style>
    .material-icons{
        margin-top:0px !important;
        margin-bottom:0px !important;
    }
    a:hover {
 cursor:pointer;
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
      <h4 class="card-title ">Bulk Price/Mrp Update</h4>
    </div>
    
<div class="container"><br>    
<form class="forms-sample" action="{{route('bulk_uploadprice')}}" method="post" enctype="multipart/form-data">
 {{csrf_field()}}
    <p>If you want to see example and format of .csv file <a onclick="showImage();" ><span style="color:blue">click here</span></a></p>
    <div class="col-md-12">
    <img id="loadingImage"  class="img-responsive" src="https://i.imgur.com/WHy2pxB.png" style="display:none;"/>
    </div>
<div class="col-md-12">  
<input type="hidden" value="{{$store->store_id}}" name="store_id"/>
 <input type="file" name="select_file" accept=".csv" class="form-control"/>
<button type="submit" class="btn btn-primary" style="width:15%;padding: 3px 0px 3px 0px;"><i class="material-icons"></i>Bulk price Update</button>
</div> <br><br>
</form>
    </div>
    </div>
<div class="card">    
<div class="card-header card-header-primary">
      <h4 class="card-title ">Bulk Stock update</h4>
    </div>
    
<div class="container"><br>    
<form class="forms-sample" action="{{route('bulk_uploadstock')}}" method="post" enctype="multipart/form-data">
 {{csrf_field()}}
    <p>If you want to see example and format of .csv file <a onclick="showImage2();" ><span style="color:blue">click here</span></a></p>
    <div class="col-md-12">
    <img id="loadingImage2"  class="img-responsive" src="https://i.imgur.com/pwROUlU.png" style="display:none;"/>
    </div>
<div class="col-md-12"> 
<input type="hidden" value="{{$store->store_id}}" name="store_id"/>
 <input type="file" name="select_file" accept=".csv" class="form-control"/>
<button type="submit" class="btn btn-primary" style="width:15%;padding: 3px 0px 3px 0px;"><i class="material-icons"></i>Bulk stock Upload</button>
</div> <br><br>
</form>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div>
    </div>
   
     
    @endsection
 <script type="text/javascript">

    function showImage(){
        document.getElementById('loadingImage').style.display="block";
    }
    </script>
     <script type="text/javascript">

    function showImage2(){
        document.getElementById('loadingImage2').style.display="block";
    }
    </script>
</div>