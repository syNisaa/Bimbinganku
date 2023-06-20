<title>Skripsi Mahasiswa</title>

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
      <h6 class="font-weight-bolder mb-0">Skripsi Yang Sudah Di Periksa</h6> <br>
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
                                <th scope="col" class="text-center">Catatan Dosen</th>
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
                                <td class="text-center">{{ $s->catatan }}</td>
                                <td class="text-center">
                                <a data-bs-toggle="modal" data-bs-target="#lihatskripsi{{ $s->id }}" class="btn btn-small btn btn-outline-primary"> Lihat File</span></a>
                                </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

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

      

    </div>
  </main>
  