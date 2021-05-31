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

          <h3 class="box-title">Form Input Spot</h3>

          <a style="float: right;" class="btn btn-sm btn-success" href="{{url('admin/blog/list')}}">List Blog</a>

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

                <form action="{{url('admin/blog/edit/proses')}}/{{$blog->id_blog}}?page={{$page}}" method="post" enctype="multipart/form-data">



                  {{ csrf_field() }}

                  {{ method_field('PUT') }}

                  

                  <div class="form-group">

                    <label for="judulBlog">Judul Blog</label>

                    <input type="text" name="judul" class="form-control" value="{{$blog->judul_blog}}">

                  </div>



                  <div class="form-group">

                    <label for="editorKonten">Konten</label>

                    <textarea class="form-control" name="konten" id="editorKontenBlog">

                      {{$blog->konten_blog}}

                    </textarea>

                  </div>



                  <div class="form-group">

                    <label for="kategori">Kategori</label>

                    <select class="form-control" name="kategori" id="kategori">

                      <option value="">-Pilih Kategori-</option>

                      @foreach($kategori as $k)

                      <option value="{{$k->id_kategori_blog}}" {{($k->id_kategori_blog == $blog->id_kategori_blog) ? 'selected' : ''}}>{{$k->nama_kategori_blog}}</option>

                      @endforeach

                    </select>

                  </div>



                  <div class="form-group">

                    <label>Meta Deskripsi & Keyword</label>

                    <textarea class="form-control" name="meta_deskripsi" placeholder="Meta Deskripsi">{{$blog->meta_deskripsi}}</textarea>

                  </div>

                  <div class="form-group">

                    <input type="text" name="meta_keyword" class="form-control" data-role="tagsinput" value="{{$blog->meta_keyword}}" width="100%">

                  </div>



                  <div class="form-group">

                    <label for="foto">Foto Header</label>

                    <input type="file" name="foto">

                  </div>



                  <div class="form-group">

                    <label for="status">Status</label>

                    <select class="form-control" name="status">

                      <option value="1" {{($blog->id_kategori_blog == 1) ? 'selected' : ''}}>Aktif</option>

                      <option value="0" {{($blog->id_kategori_blog == 0) ? 'selected' : ''}}>Tidak Aktif</option>

                    </select>

                  </div>



                  <div class="text-right">

                    <button class="btn btn-success btn-sm">Simpan</button>

                  </div>



                </form>

              </div>



            </div>

          </div>



          <div class="col-md-6">

            <div class="box">

              <div class="box-header">

                <h6>QTips</h6>

              </div>

              <div class="box-body">

                <ul>

                  <li>Semua form yang ada di input form halaman ini wajib diisi</li>

                </ul>

              </div>

              <div class="box-header">

                <h6>Foto Header</h6>

              </div>

              <div class="box-body">

                <img src="{{url('images/konten/blog/header')}}/{{$blog->foto_blog}}" width="100%">

              </div>

            </div>

          </div>



        </div>

      </div>

    </div>



  </div>

</div>

</section>



@endsection