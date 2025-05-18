@extends('layouts.app')

@section('content')

<!-- Hero Section Start -->
<div class="container-fluid p-0" id="home">
    <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($sliders as $index => $slider)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" style="height: 100vh;">
                <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.4);"></div>
                <img class="d-block w-100 h-100" src="{{ asset('storage/' . $slider->image) }}" alt="{{ $slider->title }}" style="object-fit: cover;">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 text-center wow animate__animated animate__fadeIn">
                                <h3 class="text-white fw-light mb-3">{{ $slider->title }}</h3>
                                <h1 class="display-4 text-uppercase text-white mb-4 fw-bold">{{ $slider->subtitle }}</h1>
                                <div class="d-inline-block border-top border-bottom border-light py-3 px-4">
                                    <h5 class="text-white mb-0">Pejabat Pengelola Informasi dan Dokumentasi</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Hero Section End -->


<!-- Videos Section Start -->
<div class="container-fluid py-5 bg-light" id="videos">
    <div class="container py-5">
        <div class="text-center mb-5 wow animate__animated animate__fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-primary text-uppercase mb-3">Media Kami</h6>
            <h1 class="display-5 mb-4">Video Terbaru</h1>
        </div>
        <div class="row g-4">
            @foreach($videos as $video)
            <div class="col-lg-12 col-md-12 mb-5 wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 15px;">
                    <div class="ratio ratio-16x9" style="height: 500px;">
                        @if(strpos($video->video_link, 'drive.google.com') !== false)
                            @php
                                $videoId = explode('/', parse_url($video->video_link, PHP_URL_PATH))[3];
                                $embedUrl = "https://drive.google.com/file/d/{$videoId}/preview";
                            @endphp
                            <iframe src="{{ $embedUrl }}" title="{{ $video->title }}" allowfullscreen></iframe>
                        @else
                            <iframe src="{{ $video->video_link }}" title="{{ $video->title }}" allowfullscreen></iframe>
                        @endif
                    </div>
                    <div class="card-body p-4 text-center">
                        <h4 class="card-title fw-bold mb-2">{{ $video->title }}</h4>
                        <div class="d-flex justify-content-center align-items-center mt-3">
                            <a href="{{ $video->video_link }}" target="_blank" class="btn btn-primary px-4 py-2">Tonton Video <i class="fas fa-play-circle ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Videos Section End -->





<!-- Portfolio Gallery Section Start -->
<div class="container-fluid py-5" id="portfolios">
    <div class="container py-5">
        <div class="text-center mb-5 wow animate__animated animate__fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-primary text-uppercase mb-3">Galeri Kami</h6>
            <h1 class="display-5 mb-4">Portofolio Kegiatan</h1>
        </div>
        <div class="row g-4">
            @foreach($portfolios as $portfolio)
            <div class="col-lg-4 col-md-6 mb-4 wow animate__animated animate__fadeInUp" data-wow-delay="{{ 0.1 + $loop->index * 0.1 }}s">
                <div class="portfolio-item position-relative overflow-hidden rounded">
                    <img src="{{ asset('storage/' . $portfolio->image) }}" class="img-fluid w-100" alt="{{ $portfolio->title }}">
                    <div class="portfolio-overlay">
                        <div class="portfolio-content text-center p-4">
                            <h5 class="text-white mb-3">{{ $portfolio->title }}</h5>
                            <p class="text-white-50 mb-4">{{ $portfolio->category }}</p>
                            <a href="{{ $portfolio->link }}" class="btn btn-light px-4 py-2" target="_blank">Lihat Detail <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Portfolio Gallery Section End -->



<!-- About Section Start -->
<div class="container-fluid py-5 bg-light" id="about">
    <div class="container py-5">
        <div class="text-center mb-5 wow animate__animated animate__fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-primary text-uppercase mb-3">Tentang Kami</h6>
            <h1 class="display-5 mb-4">Profil PPID</h1>
        </div>
        <div class="row g-5 align-items-center">
            @forelse ($aboutme as $index => $about)
            <div class="col-lg-6 wow animate__animated {{ $index % 2 == 0 ? 'animate__fadeInLeft' : 'animate__fadeInRight' }}" data-wow-delay="0.3s">
                <div class="about-content p-4 bg-white rounded shadow-sm">
                    <div class="mb-4">
                        <p class="text-muted fs-5">{{ $about->content }}</p>
                    </div>
                    @if($about->link)
                        <a href="{{ $about->link }}" class="btn btn-primary px-4 py-2" title="{{ $about->content }}">Lihat Selengkapnya <i class="fas fa-arrow-right ms-2"></i></a>
                    @endif
                </div>
            </div>
            @if(isset($about->image) && $about->image)
            <div class="col-lg-6 wow animate__animated {{ $index % 2 == 0 ? 'animate__fadeInRight' : 'animate__fadeInLeft' }}" data-wow-delay="0.5s">
                <div class="about-img position-relative overflow-hidden rounded shadow-sm">
                    <img src="{{ asset('storage/aboutme/' . $about->image) }}" class="img-fluid w-100" alt="About Me Image">
                </div>
            </div>
            @endif
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted fs-5">Tidak ada profil yang ditemukan.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
<!-- About Section End -->

<!-- Facilities Section Start -->
<div class="container-fluid py-5" id="facilities">
    <div class="container py-5">
        <div class="text-center mb-5 wow animate__animated animate__fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-primary text-uppercase mb-3">Fasilitas</h6>
            <h1 class="display-5 mb-4">Fasilitas Umum dan Media Publik</h1>
        </div>
        <div class="row g-4">
            @foreach($slides as $slide)
            <div class="col-md-4 mb-4 wow animate__animated animate__fadeInUp" data-wow-delay="{{ 0.1 + $loop->index * 0.1 }}s">
                <div class="facility-item position-relative overflow-hidden rounded shadow-sm">
                    <div id="carousel-{{ $slide->id }}" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner rounded">
                            @foreach($slide->images as $index => $image)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/portfolio_slides/' . $image) }}" class="d-block w-100" alt="{{ $slide->title }}" style="height: 250px; object-fit: cover;">
                            </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $slide->id }}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $slide->id }}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="p-4 bg-white">
                        <h5 class="fw-bold mb-0">{{ $slide->title }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Facilities Section End -->
    

<!-- Portfolio Slides End -->


<!-- Information Sources Section Start -->
<div class="container-fluid py-5" id="sources">
    <div class="container py-5">
        <div class="text-center mb-5 wow animate__animated animate__fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-primary text-uppercase mb-3">Informasi</h6>
            <h1 class="display-5 mb-4">Sumber Informasi</h1>
        </div>
        <div class="row g-4">
            @foreach ($sources as $source)
            <div class="col-lg-4 col-md-6 mb-4 wow animate__animated animate__fadeInUp" data-wow-delay="{{ 0.1 + $loop->index * 0.1 }}s">
                <div class="source-item h-100 rounded overflow-hidden shadow-sm">
                    @if($source->image)
                        <div class="position-relative overflow-hidden">
                            <img src="{{ asset('storage/sources/' . $source->image) }}" class="img-fluid w-100" alt="{{ $source->title }}" style="height: 200px; object-fit: cover;">
                            <div class="source-overlay">
                                <a class="btn btn-primary btn-sm" href="{{ $source->link }}" target="_blank"><i class="fas fa-link me-2"></i>Kunjungi</a>
                            </div>
                        </div>
                    @endif
                    <div class="p-4 bg-white">
                        <h5 class="fw-bold mb-3">{{ $source->title }}</h5>
                        <div class="text-muted mb-3">{!! $source->content !!}</div>
                        <a href="{{ $source->link }}" target="_blank" class="btn btn-outline-primary">Lihat Sumber <i class="fas fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Information Sources Section End -->



<!-- Guestbook Section Start -->
<div class="container-fluid py-5 bg-light" id="guestbook">
    <div class="container py-5">
        <div class="text-center mb-5 wow animate__animated animate__fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-primary text-uppercase mb-3">Pengunjung</h6>
            <h1 class="display-5 mb-4">Buku Tamu</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
                <div class="card border-0 rounded-3 shadow-sm overflow-hidden">
                    <div class="card-header bg-primary py-4">
                        <h4 class="text-white text-center mb-0">Formulir Buku Tamu</h4>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <form method="POST" action="{{ route('admin.guestbook.store') }}">
                            @csrf
                            <div class="row g-3">
                                <!-- Nama Lengkap -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" required>
                                        <label for="nama_lengkap">Nama Lengkap</label>
                                    </div>
                                </div>
                                
                                <!-- Nomor Telepon -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="Nomor Telepon" required>
                                        <label for="nomor_telepon">Nomor Telepon</label>
                                    </div>
                                </div>
                                
                                <!-- Email -->
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                
                                <!-- Nama Perusahaan -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" placeholder="Nama Perusahaan" required>
                                        <label for="nama_perusahaan">Nama Perusahaan</label>
                                    </div>
                                </div>
                                
                                <!-- Alamat Perusahaan -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="alamat_perusahaan" name="alamat_perusahaan" placeholder="Alamat Perusahaan" required>
                                        <label for="alamat_perusahaan">Alamat Perusahaan</label>
                                    </div>
                                </div>
                                
                                <!-- Personal/Bidang -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="personal_bidang" name="personal_bidang" placeholder="Personal/Bidang" required>
                                        <label for="personal_bidang">Personal/Bidang</label>
                                    </div>
                                </div>
                                
                                <!-- Tujuan -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Tujuan" required>
                                        <label for="tujuan">Tujuan</label>
                                    </div>
                                </div>
                                
                                <!-- Submit Button -->
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg px-5 py-3">Kirim <i class="fas fa-paper-plane ms-2"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Guestbook Section End -->



<!-- Information Request Section Start -->
<div class="container-fluid py-5" id="permohonan_informasi">
    <div class="container py-5">
        <div class="text-center mb-5 wow animate__animated animate__fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-primary text-uppercase mb-3">Layanan</h6>
            <h1 class="display-5 mb-4">Permohonan Informasi</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10 wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
                <div class="card border-0 rounded-3 shadow-sm overflow-hidden">
                    <div class="card-header bg-primary py-4">
                        <h4 class="text-white text-center mb-0">Formulir Permohonan Informasi</h4>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <form id="informationRequestForm" method="POST" action="{{ route('admin.permohonan_informasi.store') }}" enctype="multipart/form-data" class="row g-3">
                            @csrf
                            <!-- Nama -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Nama (Sesuai KTP)" required />
                                    <label for="nama">Nama (Sesuai KTP)</label>
                                    @error('nama')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required />
                                    <label for="email">Email</label>
                                    @error('email')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- No KTP -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="{{ old('no_ktp') }}" placeholder="No KTP / NIK" required />
                                    <label for="no_ktp">No KTP / NIK</label>
                                    @error('no_ktp')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- No HP -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" placeholder="No HP / Kontak" required />
                                    <label for="no_hp">No HP / Kontak</label>
                                    @error('no_hp')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Alamat -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" placeholder="Alamat" required />
                                    <label for="alamat">Alamat</label>
                                    @error('alamat')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Nama Informasi -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nama_informasi" name="nama_informasi" value="{{ old('nama_informasi') }}" placeholder="Nama Informasi yang Dibutuhkan" required />
                                    <label for="nama_informasi">Nama Informasi yang Dibutuhkan</label>
                                    @error('nama_informasi')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Tujuan -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="tujuan" name="tujuan" value="{{ old('tujuan') }}" placeholder="Tujuan" required />
                                    <label for="tujuan">Tujuan</label>
                                    @error('tujuan')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Upload KTP -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="upload_ktp" class="form-label">Upload KTP</label>
                                    <input type="file" class="form-control" id="upload_ktp" name="upload_ktp" />
                                    @error('upload_ktp')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Cara Mendapatkan Informasi -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="cara_mendapatkan" name="cara_mendapatkan" required>
                                        <option value="lihat/baca/dengar/catat" {{ old('cara_mendapatkan') == 'lihat/baca/dengar/catat' ? 'selected' : '' }}>Lihat/Baca/Dengar/Catat</option>
                                        <option value="mendapatkan salinan informasi" {{ old('cara_mendapatkan') == 'mendapatkan salinan informasi' ? 'selected' : '' }}>Mendapatkan Salinan Informasi</option>
                                    </select>
                                    <label for="cara_mendapatkan">Cara Mendapatkan Informasi</label>
                                    @error('cara_mendapatkan')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Cara Memberikan Informasi -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="cara_memberikan" name="cara_memberikan" required>
                                        <option value="mengambil langsung" {{ old('cara_memberikan') == 'mengambil langsung' ? 'selected' : '' }}>Mengambil Langsung</option>
                                        <option value="email" {{ old('cara_memberikan') == 'email' ? 'selected' : '' }}>Email</option>
                                        <option value="faksimili" {{ old('cara_memberikan') == 'faksimili' ? 'selected' : '' }}>Faksimili</option>
                                        <option value="pos" {{ old('cara_memberikan') == 'pos' ? 'selected' : '' }}>Pos</option>
                                    </select>
                                    <label for="cara_memberikan">Cara Memberikan Informasi</label>
                                    @error('cara_memberikan')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-lg px-5 py-3">Kirim Permohonan <i class="fas fa-paper-plane ms-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Information Request Section End -->


<!-- Complaint Section Start -->
<div class="container-fluid py-5 bg-light" id="complaint">
    <div class="container py-5">
        <div class="text-center mb-5 wow animate__animated animate__fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-primary text-uppercase mb-3">Layanan Publik</h6>
            <h1 class="display-5 mb-4">Pengaduan</h1>
        </div>
        <div class="row g-4">
            @forelse ($complaints as $complaint)
            <div class="col-lg-4 col-md-6 mb-4 wow animate__animated animate__fadeInUp" data-wow-delay="{{ 0.1 + $loop->index * 0.1 }}s">
                <div class="complaint-item h-100 rounded overflow-hidden shadow-sm">
                    <div class="position-relative overflow-hidden">
                        <img src="{{ asset('storage/' . $complaint->image) }}" class="img-fluid w-100" alt="{{ $complaint->title }}" style="height: 220px; object-fit: cover;">
                        <div class="complaint-date position-absolute start-0 bottom-0 px-3 py-2 bg-primary text-white">
                            <i class="fas fa-calendar-alt me-2"></i>{{ date('d M Y', strtotime($complaint->created_at)) }}
                        </div>
                    </div>
                    <div class="p-4 bg-white">
                        <h5 class="fw-bold mb-3">{{ $complaint->title }}</h5>
                        <p class="text-muted mb-3">{{ Str::limit($complaint->content, 100) }}</p>
                        @if($complaint->link)
                            <a href="{{ $complaint->link }}" class="btn btn-outline-primary" target="_blank">Lihat Detail <i class="fas fa-arrow-right ms-2"></i></a>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center wow animate__animated animate__fadeIn">
                <div class="p-5 bg-white rounded shadow-sm">
                    <i class="fas fa-exclamation-circle text-muted fa-3x mb-3"></i>
                    <p class="text-muted fs-5">Tidak ada pengaduan yang tersedia saat ini.</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>
<!-- Complaint Section End -->

               
                 

<!-- Footer Start -->
<footer class="container-fluid bg-dark text-white py-5">
    <div class="container py-4">
        <div class="row g-5">
            <div class="col-lg-4 col-md-6 wow animate__animated animate__fadeInUp" data-wow-delay="0.1s">
                <h4 class="text-white fw-bold mb-4">PPID Dispora Jabar</h4>
                <p class="mb-2"><i class="fas fa-map-marker-alt me-3"></i>Komplek SPOrT Jabar Arcmanik, Jl. Pacuan Kuda No. 140 Sukamiskin Bandung 40293</p>
                <p class="mb-2"><i class="fas fa-phone-alt me-3"></i>(022) 87884268</p>
                <p class="mb-2"><i class="fas fa-fax me-3"></i>(022) 87881419</p>
                <p class="mb-2"><i class="fas fa-envelope me-3"></i>dispora@jabarprov.go.id</p>
                <div class="d-flex pt-3">
                    <a class="btn btn-outline-light btn-social rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social rounded-circle me-2" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-light btn-social rounded-circle me-2" href="#"><i class="fab fa-tiktok"></i></a>
                    <a class="btn btn-outline-light btn-social rounded-circle" href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
                <h4 class="text-white fw-bold mb-4">Tautan Cepat</h4>
                <a class="btn btn-link" href="#home">Beranda</a>
                <a class="btn btn-link" href="#about">Profil</a>
                <a class="btn btn-link" href="#sources">Informasi</a>
                <a class="btn btn-link" href="#portfolios">Galeri</a>
                <a class="btn btn-link" href="#guestbook">Buku Tamu</a>
                <a class="btn btn-link" href="#permohonan_informasi">Permohonan</a>
                <a class="btn btn-link" href="#complaint">Pengaduan</a>
            </div>
            <div class="col-lg-4 col-md-12 wow animate__animated animate__fadeInUp" data-wow-delay="0.5s">
                <h4 class="text-white fw-bold mb-4">Lokasi Kami</h4>
                <div class="position-relative rounded overflow-hidden" style="height: 250px;">
                    <iframe class="position-relative w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.4849600365217!2d107.61774801431446!3d-6.916753869176887!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68efb5ed97d00f%3A0xb2934c6b5e67262c!2sKomplek%20SPOrT%20Jabar%20Arcamanik%2C%20Jl.%20Pacuan%20Kuda%20No.%20140%2C%20Sukamiskin%2C%20Bandung%2C%2040293%20Bandung%2C%20Jawa%20Barat!5e0!3m2!1sen!2sid!4v1626861495875!5m2!1sen!2sid" frameborder="0" style="min-height: 250px; border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->

<!-- Copyright Start -->
<div class="container-fluid copyright py-4 bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <span class="text-white">&copy; <script>document.write(new Date().getFullYear())</script> Dispora Jawa Barat. All Rights Reserved.</span>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <a class="text-white me-4" href="#">Terms & Conditions</a>
                <a class="text-white" href="#">Privacy Policy</a>
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->
 

    <!-- Scroll to Bottom -->
    <i class="fa fa-2x fa-angle-down text-white scroll-to-bottom"></i>

    <!-- Back to Top -->
    <a href="#" class="btn btn-outline-dark px-0 back-to-top"><i class="fa fa-angle-double-up"></i></a>
                  
    

    
    
@endsection
