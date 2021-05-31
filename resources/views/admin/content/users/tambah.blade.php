 @extends('admin/app')



 @section('title', $title)

 @section('judul1', $judul1)

 @section('judul2', $judul2)



 @section('konten')

 <section class="content">

  <div class="row">

    <div class="col-md-12">



      <div class="box">

        <div class="box-header with-border">

          <h3 class="box-title">Form Input User</h3>

          <a style="float: right;" class="btn btn-sm btn-success" href="{{url('admin/users/list')}}">List Users</a>

        </div>

        <!-- /.box-header -->

        <div class="box-body">

          <div class="row">

            <div class="col-md-6">

              <div class="box">

                @if ($errors->any())

                <div class="alert alert-danger">

                  <ul>

                    @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                    @endforeach

                  </ul>

                </div>

                @endif

                <div class="box-body">

                  <form action="{{url('admin/users/tambah/proses')}}" method="post">

                    {{ csrf_field() }}

                    <div class="form-group">

                      <label for="name">Nama *</label>

                      <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}">

                    </div>

                    <div class="form-group">

                      <label for="username">Username *</label>

                      <input type="text" name="username" class="form-control" id="username" value="{{old('username')}}">

                    </div>

                    <div class="form-group">

                      <label for="email">Email *</label>

                      <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}">

                    </div>

                    <div class="form-group">

                      <label for="password">Password *</label>

                      <input type="password" name="password" class="form-control" id="password">

                    </div>

                    <div class="text-right">

                      <button class="btn btn-sm btn-success">Submit</button>

                    </div>

                  </form>

                </div>

              </div>

            </div>

            <div class="col-md-6">

              <div class="box">

                <div class="box-body">

                  <p><b>Tips</b></p>

                  <div>

                    <ul>

                      <li>Input text dengan label username wajib diisi</li>

                      <li>Input text dengan label password wajib diisi</li>

                      <li>Input text dengan label nama wajib diisi</li>

                      <li>Input text dengan label email wajib diisi</li>

                    </ul>

                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>

        <!-- /.box-body -->

      </div>



    </div>

  </div>

</section>

@endsection