<title>Skripsi Dosen</title>

@include('template.css')

<body class="g-sidenav-show  bg-gray-100">
  
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
    id="sidenav-main">
    @include('template.sidebar')
</aside>
  
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('template.navbar')
    
    
    <!-- End Navbar -->


    <div class="container py-4">
      <h6 class="font-weight-bolder mb-0">Skripsi Bimbingan</h6> <br>
      <a class="btn btn-small btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addskripsi" > Unggah Skripsi </span></a></a>
    <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="text-center">NO</th>
                                <th scope="col" class="text-center">Nama Dosen</th>
                                <th scope="col" class="text-center">Tahap</th>
                                <th scope="col" class="text-center">Judul</th>
                                <th scope="col" class="text-center">Deskripsi</th>
                                <th scope="col" class="text-center">Keluhan</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($skripsi as $s)
                            <tr>
                                <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                <td class="text-center">{{ $s->namadosen }}</td>
                                <td class="text-center">{{ $s->tahap }}</td>
                                <td class="text-center">{{ $s->judul }}</td>
                                <td class="text-center">{{ $s->deskripsi }}</td>
                                <td class="text-center">{{ $s->keluhan }}</td>
                                <td class="text-center">{{ $s->status }}</td>
                                <td class="text-center">
                                <a data-bs-toggle="modal" data-bs-target="#lihatskripsi{{ $s->id }}" class="btn btn-small btn btn-outline-primary"> Lihat File</span></a>
                                
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

      
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About
                    Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                    target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>

       <!-- Modal Video -->
       @foreach($skripsi as $s)
        <div class="modal" tabindex="-1" id="lihatskripsi{{ $s->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Skripsi </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <embed src="{{asset('file_skripsi/'.$s->file)}}" width="468" height="400" type=""></embed>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></div>
                </div>
                </form>
            </div>
        </div>
        @endforeach


<div class="modal" tabindex="-1" id="addskripsi">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Skripsiku </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/skripsiku/create" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <select class="btn btn-outline-secondary dropdown-toggle" id="namadosen" name="namadosen" class="form-control" placeholder="Class Category" aria-label="class" aria-describedby="basic-addon1">
                                    <option value="0" selected disabled>Pilih Nama DosenMu... </option>
                                    @foreach ($dosen as $d)
                                    <option value="{{ $d->nama }}">
                                        {{ $d->nama }}
                                    </option>
                                    @endforeach
                                </select>
                    <div class="form-group">
                        <label>Tahapan</label>
                        <input type="text" name="tahap" id="tahap" class="form-control" placeholder="Tahap 1, 2 ..." aria-label="tahap" aria-describedby="basic-addon1">
                        
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul Bimbingan Skripsi" aria-label="program" aria-describedby="basic-addon1">
                        
                    <div class="form-group">
                        <label>Deskripsi </label>
                        <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Penjelasan mengenai file" aria-label="program" aria-describedby="basic-addon1">
                        
                    <div class="form-group">
                        <label>Keluhan Mahasiswa</label>
                        <input type="text" name="keluhan" id="keluhan" class="form-control" placeholder="Kendala Pengerjaan" aria-label="program" aria-describedby="basic-addon1">
                        
                    </div>
                    <div class="form-group">
                        <label>File Bimbingan </label>
                        <input type="file" name="file" id="file">
                        
                    </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save</button>
            </div>
        </div>
        </form>
    </div>
</div>

       

    </div>
  </main>
  