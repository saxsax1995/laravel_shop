@extends('backend.view_layout')
@section('controller')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản Lý Sản Phẩm
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li class="active">Quản lý Sản Phẩm</li>
      </ol>
    </section>
    <a href="{{ url('add_product') }}">
      <input type="button"  class="btn btn-block btn-primary" style="width: 150px; margin-left: 20px; margin-top: 20px;" value="Thêm Sản Phẩm">
    </a>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Tên Sản Phẩm</th>
                  <th>Danh Mục</th>
                  <th>Ảnh Sản Phẩm</th>
                  <th>Miêu Tả</th>
                  <th>Hãng</th>
                  <th>Giá</th>
                  <th>Số Lượng</th>
                  <th>Tùy Chọn</th>
                </tr>
                </thead>
              <?php
                foreach($arr as $rows){
                  // dd($rows->product_pk_id);
              ?>
    
                  <tbody>
                  <tr>
                    <td>{{ $rows->product_name }}</td>
                    <td>{{ $rows->category_name }}</td>
                    <td><img src="{{ asset('assets/img/product/'.$rows->product_img) }}" height="100" width="100"></td>
                    <td style="max-width: 200px;">{{ $rows->product_description }}</td>
                    <td>{{ $rows->product_brand }}</td>
                    <td>{{ $rows->product_price }}</td>
                    <td>{{ $rows->product_stock }}</td>
                    <td>
                      <a href="{{ url('update_product/'.$rows->product_id) }}" class="fa fa-edit"></a>
                      <a href="{{ url('delete_product/'.$rows->product_id) }}" class="fa fa-trash" style="margin-left: 30px;" onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này chứ T_T ?')"></a>
                    </td>
                  </tr>
                  </tbody>
              <?php } ?>
              </table>
              {{ $arr->links() }}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

     
    
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
  
@endsection