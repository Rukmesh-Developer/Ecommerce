
@include('admin/layout/header');

<!DOCTYPE html>
<html>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add new category
</button>

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with minimal features & hover style</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Category Name</th>
                  <th>Img</th>
                  <th>action</th>
                 
                </tr>
                </thead>
                <tbody>
                @foreach ($Data as $row)
        
                <tr>
                  <td>{{$row->id}}</td>
                  <td>{{$row->categoryname}}</td>
                 <td> <img src="{{('image/' . $row->img) }}" class="css-class" alt="alt text"  width="100px"> 
                
</td>
                  <td>
                  <a href=" {{route('edit',$row->id)}}" id="createNewPost"class="btn btn-info" >Edit</a>
                 
                                
                  <a href="{{ route('delete', $row->id) }}"class="btn btn-danger">Delete</button>
                </td>
             
                </tr>
                @endforeach
            
                </tbody>
                <tfoot>
              
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<!-- page script -->


</body>
</html>
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('store')}}" method="post" enctype="multipart/form-data"onsubmit="return validate();">
            @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="categoryname"name="categoryname"required>
            <span id="categorynameError" class="text-danger"></span>
          </div>
        
          <div class="form-group">
            <label for="Img" class="col-form-label">Img:</label>
            <input type="file" class="form-control" id=""name="img"required></textarea>
          </div>
          <div>
          <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
</div>
<br>
<div><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div>
        </form>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  function validate(){
   
    var categoryname = $('#categoryname').val();
    var error= '0';
   
//alert(categoryname)



//alert(error)
if (!/^[a-zA-Z]+$/.test(categoryname)) {
    $('#categorynameError').text('categoryname  must contain only letters (characters).');
    var error = 1;
}



if(error === '0'){
//alert('a')
return true;

}else{
 // alert('aa')
return false;
}

  }
</script>

      
      </div>
      <div class="modal-footer">
        
        
      </div>
    </div>
  </div>
</div>

@include('admin/layout/fotter');
