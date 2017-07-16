@extends('dashboard.container')
@section('content')
    <section class="content">
      @if(Session::has('message'))
        <div class="alert alert-success">
          {{ Session::get('message') }}
        </div>
      @endif
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="user_list" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
	                @foreach($alluserdata as $aud)
		                <tr>
		                  <td>{{$aud->name}}</td>
		                  <td>{{$aud->username}}</td>
		                  <td>{{$aud->email}}</td>
		                  <td>
		                  <a 
		                  	type="button" 
		                  	href="/commonuser/{{$aud->id}}/edit" class="btn btn-block btn-primary">
		                  	<i class="fa fa-edit"></i>
		                  		EDIT
		                  </a>
                      <form action="{{ route('commonuser.destroy', $aud->id) }}" method="POST">
                          {{ method_field('DELETE') }}
                          {{ csrf_field() }}
                          <button  class="btn btn-block btn-danger"><i class="fa fa-trash"></i> Delete</button>
                      </form>
		                  </td>
		                </tr>
	                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
<link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('#user_list').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "pageLength": 5
    });
  });

</script>
@endsection