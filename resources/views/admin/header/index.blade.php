@include('layouts/admin/head')

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    @include('layouts/admin/sidebar')
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        @include('layouts/admin/header')
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">หน้า header</h1>
            <ol class="breadcrumb">
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">หน้า header</h6>
                </div>
                <a href="{{route('add_header')}}" class="btn btn-sm btn-primary">เพิ่มข้อมูล</a>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>ID</th>
                        <th>text</th>
                        <th>image</th>
                        <th>ID_USERS</th>
                        <th>แก้ไข</th>
                        <th>ลบ</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($header_ as $Header)
                        <tr>
                          <td>{{$Header->id_header}}</td>
                          <td>{{$Header->text}}</td>
                          <td><img src="{{asset('admin/images/'.$Header->image)}}" alt="" style="width: 150px"></td>
                          <td>{{$Header->user->name}}</td>
                          <td><a href="{{url('/Admin/edit_header/'.$Header->id_header)}}" class="btn btn-sm btn-primary">แก้ไข</a></td>
                          <td><a href="{{url('/Admin/header/delete/'.$Header->id_header)}}" class="btn btn-sm btn-danger">ลบ</a></td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          <!--Row-->
        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      @include('layouts/admin/footer')
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


</body>

<script>

  let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

      elems.forEach(function(html) {
          let switchery = new Switchery(html,  { size: 'small' });
      });


      $(document).ready(function(){
      $('.js-switch').change(function () {
          let status = $(this).prop('checked') === true ?  'open' : 'close' ;
          let Idheader = $(this).data('id');
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '{{ route('header.update.status') }}',
              data: {'status': status, 'id_header': Idheader},
              success: function (data) {
                  console.log(data.message);
              }
              });
          });
      });
  </script>
</html>
