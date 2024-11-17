@extends('layouts.app')

@section('title', 'Anggaran Rumah Tangga')

@push('styles')
    <style>
        .divider {
            width: 100%;
            height: 2px;
            background-color: #e4e4e4;
            position: relative
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            width: 15%;
            background-color: #152d8f;

        }

        a {
            text-decoration: none;
            color: black;
        }

        .widget a {
            position: relative;
            padding-left: 1.5rem;
        }

        .widget a::before {
            position: absolute;
            content: "\e315";
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            font-family: "Material Symbols Outlined";
            font-size: 24px;
            color: var(--bs-blue);
            -webkit-transition: all 0.3s ease-out 0s;
            -moz-transition: all 0.3s ease-out 0s;
            -ms-transition: all 0.3s ease-out 0s;
            -o-transition: all 0.3s ease-out 0s;
            transition: all 0.3s ease-out 0s;
        }

        .widget a:hover::before {
            margin-left: 4px;
        }

        :target:before {
            content: "";
            display: block;
            height: 100px;
            margin: -100px 0 0;
        }
    </style>
@endpush

@section('navbar')
    @include('partials.__navbar')
@endsection

@section('content')
    <div class="container min-vh-100" style="margin-top: 120px">
        {{ Breadcrumbs::render('anggaran-rumah-tangga') }}

        <div class="row">
            <div class="col-md-8 order-2 order-md-1 mt-5 mt-md-5">
                <div class="mt-md-5 p-2 p-md-3 p-md-0 ">
                    <div class="">
                        <h4 class="fw-bold text-center">ANGGARAN RUMAH TANGGA IKATAN ALUMNI SMA
                            <br> NEGERI I TEBING TINGGI
                        </h4>
                        <div class="mt-5 fs-6" id="pasal-1">
                            <h5 class="fw-bold text-center">PASAL 1 <br>
                                KETENTUAN UMUM </h5>
                            <p class="text-justify text-md-start">
                                Anggaran rumah tangga ini bersumber dari anggaran dasar ikatan alumni SMA Negeri 1 Tebing
                                Tinggi yang berlaku oleh karena itu tidak bertentangan dengan ketentuan dalam anggaran dasar
                            </p>
                        </div>
                        <div class="mt-5 fs-6" id="pasal-2">
                            <h5 class="fw-bold text-center">PASAL 2 <br>
                                KEANGGOTAAN </h5>
                            <ol>
                                <li>Ikatan Alumni SMA Negeri 1 Tebing Tinggi selanjutnya disebut IKA SMANSA TEBING TINGGI
                                    terdiri dari sebagaimana yang dimaksud dalam pasal 7 Anggaran Dasar IKA SMANSA TEBING
                                    TINGGI</li>
                                <li>Pendaftaran anggota biasa, luar biasa dan kehormatan dilakukan secara tertulis dengan
                                    mengisi formulir pendaftaran yang disediakan oleh pengurus pusat IKA SMANSA TEBING
                                    TINGGI</li>
                                <li>Pendaftaran anggota dapat dilakukan melalui pengurus Cabang IKA SMANSA TEBING TINGGI dan
                                    Formulir pendaftaran akan dikirimkan langsung ke pengurus pusat IKA SMANSA TEBING
                                    TINGGI, pengurus cabang IKA SMANSA TEBING TINGGI memperoleh salinan/tembusannya</li>
                                <li>Kartu anggota dikeluarkan oleh Pengurus Pusat IKA SMANSA TEBING TINGGI</li>
                                <li>Anggota IKA SMANSA TEBING TINGGI adalah juga anggota cabang IKA SMANSA TEBING TINGGI
                                    berdasarkan domisilinya</li>
                            </ol>
                        </div>
                        <div class="mt-5 fs-6" id="pasal-3">
                            <h5 class="fw-bold text-center">PASAL 3 <br>
                                KEWAJIBAN ANGGOTA </h5>
                            <p>Setiap anggota wajib untuk : </p>
                            <ol>
                                <li>Menjunjung tinggi asas tujuan dari IKA SMANSA TEBING TINGGI</li>
                                <li>Memberikan saran dan ikut serta mengembangkan IKA SMANSA TEBING TINGGI</li>
                                <li>Mentaati dan melaksanakan segala keputusan IKA SMANSA TEBING TINGGI </li>
                                <li>4.Membayar iuran anggota </li>
                            </ol>
                        </div>
                        <div class="mt-5 fs-6" id="pasal-4">
                            <h5 class="fw-bold text-center">PASAL 4 <br>
                                HAK ANGGOTA</h5>
                            <ol>
                                <li>1.Setiap anggota biasa mempunyai hak bicara, hak suara dan hak untuk dapat dipilih
                                    menjadi pengurus IKA SMANSA TEBING TINGGI</li>
                                <li>Setiap anggota luar biasa dan anggota kehormatan mempunyai hak bicara, dan tidak berhak
                                    untuk dipilih menjadi pengurus IKA SMANSA TEBING TINGGI </li>
                            </ol>
                        </div>
                        <div class="mt-5 fs-6" id="pasal-5">
                            <h5 class="fw-bold text-center">PASAL 5 <br>
                                BERHENTINYA ANGGOTA </h5>
                            <p>Seseorang berhenti menjadi anggota: </p>
                            <ol>
                                <li>Atas permintaan sendiri secara tertulis </li>
                                <li>Meningga dunia </li>
                                <li>Mentaati dan melaksanakan segala keputusan IKA SMANSA TEBING TINGGI </li>
                                <li>Atas keputusan pengurus pusat IKA SMANSA TEBING TINGGI </li>
                            </ol>
                        </div>
                        <div class="mt-5 fs-6" id="pasal-6">
                            <h5 class="fw-bold text-center">PASAL 6 <br>
                                PEMBERHENTIAN ANGGOTA</h5>
                            <ol>
                                <li>Pengurus Pusat IKA SMANSA TEBING TINGGI dapat memutuskan pemberhentian anggotanya
                                    sebagaimana dimaksud Pasal 5 ayat (3), atas alasan-alasan sebagai berikut
                                    <ol type="a">
                                        <li>Karena tindakan atas sikap yang merugikan kepentingan Negara </li>
                                        <li>Karena tidak melaksanakan kewajiban sesuai dengan ketentuan IKA SMANSA TEBING
                                            TINGGI </li>
                                        <li>Karena tindakan yang merugikan IKA SMANSA TEBING TINGGI</li>
                                    </ol>
                                </li>
                                <li>Keputusan pemberhentian anggota IKA SMANSA TEBING TINGGI oleh pengurus Pusat IKA SMANSA
                                    TEBING TINGGI diambil setelah mendengar pembelaan dari anggota yang bersangkutan </li>
                                <li>Anggota yang sudah berhenti dapat di rehabilitasi kembali</li>
                            </ol>
                        </div>
                        <div class="mt-5 fs-6" id="pasal-7">
                            <h5 class="fw-bold text-center">PASAL 7 <br>
                                MUNAS</h5>
                            <ol>
                                <li>MUNAS adalah forum pengambil keputusan tertinggi dan berwenang dalam hal penyempurnaan
                                    AD/ART, menerima dan mendengar laporan pertanggungjawaban pengurus pusat dalam 1 kali
                                    periode nya, menyusun program kerja dan pemilihan ketua umum IKA SMANSA TEBING TINGGI
                                </li>
                                <li>MUNAS diadakan 1 kali dalam 5 tahun yang diikuti oleh pengurus pusat dan perwakilan
                                    cabang</li>
                                <li>Pengurus pusat IKA SMANSA TEBING TINGGI akan menentukan waktu dan agenda MUNAS serta
                                    mencantumkan undangan kepada seluruh anggota IKA SMANSA TEBING TINGGI </li>
                                <li>Paling lambat 6 bulan sebelum pelaksanaan MUNAS ketua umum IKA SMANSA TEBING TINGGI
                                    membentuk panitia pelaksanaan MUNAS yang bertugas mengatur penyelenggaraan MUNAS </li>
                                <li>5.Proses musyawarah di dalam MUNAS adalah sah apabila dihadirin oleh oleh ½ dari jumlah
                                    pengurus pusat dan wakil tiap cabang, apabila jumlah yang hadir tidak mencapai kuorum
                                    maka MUNAS akan ditunda sekurang-kurangnya setengah jam dan setelah itu MUNAS dapat
                                    tetap dilaksanakan tanpa memperhatikan jumlah yang hadir dan dapat mengambil keputusan
                                    yang sah </li>
                                <li>Setiap keputusan dalam MUNAS diambil berdasarkan kusyawarah untuk mufakat dan apabila
                                    dengan cara musyawarah menemui kegagalan akan dilakukan pemungutan suara dan keputusan
                                    adalah sah apabisa disetujui oleh sekurang kurangnya ½ lebih 1 dari peserta MUNAS yang
                                    hadir kecuali keputusan untuk perubahan anggaran dasar dan pembubaran IKA SMANSA TEBING
                                    TINGGI </li>
                            </ol>
                        </div>
                        <div class="mt-5 fs-6" id="pasal-8">
                            <h5 class="fw-bold text-center">PASAL 8 <br>
                                MUNAS LUAR BIASA </h5>
                            <ol>
                                <li>MUNAS LUAR BIASA hanya dapat diadakan atas usulan yang diajukan secara tertulis dari :
                                    <ol type="a">
                                        <li>Pengurus pusat</li>
                                        <li>Pengurus cabang, yang jumlahnya masing masing 2/3 dari jumlah cabang </li>
                                    </ol>
                                </li>
                                <li>MUNAS LUAR BIASA hanya dianggap sah bilamana dihadiri oleh perwakilan yang sah dari
                                    sekurang-kurangnya 2/3 dari jumlah cabang </li>
                                <li>Mentaati dan melaksanakan segala keputusan IKA SMANSA TEBING TINGGI </li>
                                <li>3.Ketentuan-ketentaun lainnya untuk MUNAS LUAR BIASA adalah sebagaimana
                                    ketentuan-ketentuan yang berlaku untuk MUNAS </li>
                            </ol>
                        </div>
                        <div class="mt-5 fs-6" id="pasal-9">
                            <h5 class="fw-bold text-center">PASAL 9 <br>
                                Pimpinan IKA SMANSA TEBING TINGGI terdiri dari : </h5>
                            <ol>
                                <li>Dewan penasehat terdiri dari :
                                    <ol type="a">
                                        <li>Dewan penasehat pusat IKA SMANSA TEBING TINGG</li>
                                        <li>Dewan penasehat cabang IKA SMANSA TEBING TINGGI </li>
                                    </ol>
                                </li>
                                <li>Pengurus terdiri dari
                                    <ol type="a">
                                        <li>Pengurus pusat IKA SMANSA TEBING TINGGI </li>
                                        <li>Pengurus cabang IKA SMANSA TEBING TINGGI </li>
                                    </ol>
                                </li>
                                <li>Mentaati dan melaksanakan segala keputusan IKA SMANSA TEBING TINGGI </li>
                                <li>3.Ketentuan-ketentaun lainnya untuk MUNAS LUAR BIASA adalah sebagaimana
                                    ketentuan-ketentuan yang berlaku untuk MUNAS </li>
                            </ol>
                        </div>
                        <div class="mt-5 fs-6" id="pasal-10">
                            <h5 class="fw-bold text-center">PASAL 10 <br>
                                DEWAN PENASEHAT </h5>
                            <ol>
                                <li>Dewan penasehat terdiri dari seorang ketua merangkap anggota,dan sekurang-kurangnya 10
                                    orang anggota </li>
                                <li>Masa jabatan dewan penasehat adalah 5 tahun dan setelahnya dapat dipilih kembali </li>
                                <li>Dewan penasehat pusat IKA SMANSA TEBING TINGGI harus berdomisili di Negara kesatuan
                                    Republik Indonesia, dipilih oleh pengurus pusat IKA SMANSA TEBING TINGGI sedangkan dewan
                                    penasehat cabang IKA SMANSA TEBING TINGGI harus berdomisili dimana cabang tersebut
                                    berada </li>
                                <li>Ketua umum IKA SMANSA TEBING TINGGI periode sebelumnya dan direktur SMA Negeri 1
                                    Tebing Tinggi yang masih aktif menjabat adalah secara ex-officio menjadi salah satu
                                    anggota dewan penasehat </li>
                            </ol>
                        </div>
                        <div class="mt-5 fs-6" id="pasal-11">
                            <h5 class="fw-bold text-center">PASAL 11 <br>
                                TUGAS DEWAN PENASEHAT </h5>
                            <p>Tugas pokok dewan penasehat adalah memberikan nasehat dan saran yang dipandang perlu kepada
                                pengurus tentang langkah-langkah yang harus diambil dalam pelaksanaan program dan kegiatan
                                IKA SMANSA TEBING TINGGI untuk mencapai tujuan IKA SMANSA TEBING TINGGI</p>

                        </div>
                        <div class="mt-5 fs-6" id="pasal-12">
                            <h5 class="fw-bold text-center">PASAL 12 <br>
                                RAPAT DEWAN PENASEHAT </h5>
                            <ol>
                                <li>Dewan penasehat berhak mengadakan rapat atau pertemuan sesuai dengan kebutuhan dewan
                                    penasehat </li>
                                <li>Rapat dewan penasehat akan dipimpin oleh ketua dewan penasehat atau salah satu anggota
                                    dalam hal ketua berhalangan hadir </li>
                                <li>Rapat dianggap sah dan dapat mengambil keputusan apabila dihadiri oleh
                                    sekurang-kurangnya setengah dari jumlah anggota dewan penasehat, apabila jumlah yang
                                    hadir tidak mencapai quorum,maka rapat akan ditunda sekurang-kurangnya 1 jam dan setelah
                                    itu dapat tetap dilaksanakan tanpa memperhatikan jumlah yang hadir dan dapat mengambil
                                    keputusan yang sah</li>
                                <li>Keputusan rapat adalah sah apabila disetujui oleh sekurang-kurangnya setengah lebih satu
                                    dari jumlah yang hadir </li>
                            </ol>
                        </div>
                        <div class="mt-5 fs-6" id="pasal-13">
                            <h5 class="fw-bold text-center">PASAL 13 <br>
                                TATA CARA PEMILIHAN KETUA UMUM </h5>
                            <ol>
                                <li>Ketua umum pengurus pusat IKA SMANSA TEBING TINGGI diangkat untuk masa jabatan 5 tahun
                                    dan setelahnya dapat dipilih kembali hanya untuk satu kali periode selanjutnya </li>
                                <li>Calon ketua umum yang diajukan harus berdomisili wilayah Negara Kesatuan Republik
                                    Indonesia dan lulusan dari SMA Negeri 1 Tebing Tinggi paling cepat 25 tahun dari tahun
                                    penyelenggaraan MUNAS </li>
                                <li>Ketua umum pusat IKA SMANSA TEBING TINGGI tidak merangkap jabatan sebagai ketua cabang
                                </li>
                                <li>Khusus MUNAS I, Setiap angkatan IKA SMANSA TEBING TINGGI dapat mengajukan satu orang
                                    calon ketua umum yang didukung sekurang-kurangnya 5 angkatan kepada panitia pelaksanaan
                                    MUNAS selambat-lambatnya 14 hari sebelum pelaksanaan MUNAS </li>
                                <li>Panitia pelaksanaan MUNAS I akan mengirimkan seluruh nama calon ketua umum kepada
                                    pengurus angkatan selambat-lambatnya 7 hari sebelum pelaksanaan MUNAS</li>
                                <li>Wakil-wakil angkatan dari IKA SMANSA TEBING TINGGI pada rapat MUNAS I ini masing-masing
                                    adalah utusan angkatan berjumlah 4 orang terdiri dari 1 peserta dan 3 peninjau</li>
                                <li>Untuk MUNAS II dan seterusnya, rapat MUNAS dihadiri oleh :
                                    <ol type="a">
                                        <li>Pengurus pusat</li>
                                        <li>Pengurus cabang berjumlah 3 orang terdiri dari 1 peserta dan 2 peninjau
                                            merupakan wakil yang sah dengan membawa surat mandat yang ditandatangani ketua
                                            dan sekertaris pengurus cabangnya</li>
                                    </ol>
                                </li>
                                <li>Hak suara:
                                    <ol type="a">
                                        <li>Khusus MUNAS I, utusan angkatan memiliki 1 suara</li>
                                        <li>Untuk MUNAS II dan seterusnya:
                                            <ol>
                                                <li>1.Pengurus pusat memiliki 3 suara yang ditentukan oleh ketua umum IKA
                                                    SMANSA TEBING TINGGI</li>
                                                <li>Pengurus cabang memiliki 1 suara mewakili anggota IKA SMANSA TEBING
                                                    TINGGI yang berada di cabangnya</li>
                                            </ol>
                                        </li>
                                    </ol>
                                </li>
                                <li>Para calon ketua umum IKA SMANSA TEBING TINGGI akan mendapat kesempatan menyampaikan
                                    visi misi dan program dalam forum MUNAS</li>
                                <li>Keputusan MUNAS dalam memilih ketua umum diambil berdasarkan musyawarah mufakat. Apabila
                                    tidak tercapai mufakat maka Ketua Umum dipilih berdasarkan suara terbanyak</li>
                                <li>Ketentuan teknis pemungutan suara akan dimuat di dalam tata tertib MUNAS</li>
                            </ol>
                        </div>
                        <div class="mt-5 fs-6" id="pasal-14">
                            <h5 class="fw-bold text-center">PASAL 14 <br>
                                PENGURUS PUSAT</h5>
                            <ol>
                                <li>Pengurus pusat IKA SMANSA TEBING TINGGI terdiri dari 1 ketua umum, unsur ketua, 1 orang
                                    sekretaris umum, beberapa wakil sekretaris, 1 orang bendahara dan beberapa wakil
                                    bendahara dan organ lainnya sesuai kebutuhan </li>
                                <li>Selambat-lambatnya 2 bulan setelah MUNAS, ketua umum terpilih harus sudah melengkapi
                                    susunan pengurus dan memberitahukan secara resmi kepada anggota IKA SMANSA TEBING TINGGI
                                    melalui website IKA SMANSA TEBING TINGGI </li>
                                <li>Masa jabatan pengurus pusat IKA SMANSA TEBING TINGGI adalah 5 tahun dan setelahnya dapat
                                    dipilih kembali</li>
                                <li>Apabila ketua umum berhalangan untuk waktu yang tidak dapat ditentukan lamanya atau
                                    mengundurkan diri sebelum habis masa jabatannya, IKA SMANSA TEBING TINGGI akan dipimpin
                                    oleh salah seorang ketua lainnya yang dipilih oleh rapat pengurus lengkap </li>
                                <li>Penyelenggara MUNAS LUAR BIASA untuk memilih ketua umum yang baru akan dilaksanakan oleh
                                    pejabat ketua umum bila dianggap perlu rapat lengkap pengurus pusat</li>
                                <li>Hal-hal diatas berlaku juga untuk kepengurusan cabang, disesuaikan dengan aturan dan
                                    lingkupnya masing masing</li>
                            </ol>
                        </div>
                        <div class="mt-5 fs-6" id="pasal-15">
                            <h5 class="fw-bold text-center">PASAL 15 <br>
                                TUGAS POKOK PENGURUS PUSAT</h5>
                            <p>Tugas pokok pengurus pusat IKA SMANSA TEBING TINGGI adalah :</p>
                            <ol>
                                <li>Merumuskan dan melaksanakan kebijaksanaan yang ditetapkan oleh MUNAS dan program
                                    –program IKA SMANSA TEBING TINGGI</li>
                                <li>Menyusun dan melaksanakan program kerja IKA SMANSA TEBING TINGGI dalam priode
                                    kepengurusannya </li>
                                <li>Masa jabatan pengurus pusat IKA SMANSA TEBING TINGGI adalah 5 tahun dan setelahnya dapat
                                    dipilih kembali</li>
                                <li>Memberikan laporan secara berkala kepada anggota dan kepada dewan penasehat </li>
                                <li>Mengadakan hubungan,konsultasi dan kerjasama dengan instansi dan atau badan lain yang
                                    dipandang perlu dalam pelaksanaan program dan pencapaian tujuan IKA SMANSA TEBING TINGGI
                                </li>
                            </ol>
                        </div>
                        <div class="mt-5 fs-6" id="pasal-16">
                            <h5 class="fw-bold text-center">PASAL 16 <br>
                                RAPAT PENGURUS PUSAT</h5>
                            <ol>
                                <li>Rapat pengurus akan dipimpin oleh ketua umum atau unsur ketua dalam hal ketua umum
                                    berhalangan hadir rapat dianggap sah dan dapat mengambil keputusan apabisa dihadiri
                                    sekurang-kurangnya ½ dari jumlah pengurus, apabila jumlah yang hadir tidak mencapai
                                    kuorum,maka rapat akan ditunda minimal setengah jam dan setelah itu rapat tetap
                                    dilaksanakan tanpa memperhitungkan jumlah yang hadir,dan dapat mengambil keputusan yang
                                    sah</li>
                                <li>Keputusan rapat adalah dianggap sah apabila disetujui oleh sekurang-kurangnya ½ lebih
                                    satu dari jumlah yang hadir </li>
                            </ol>
                        </div>
                        <div class="mt-5 fs-6" id="pasal-17">
                            <h5 class="fw-bold text-center">PASAL 17 <br>
                                CABANG-CABANG</h5>
                            <ol>
                                <li>IKA SMANSA TEBING TINGGI dapat mendirikan cabang-cabang di setiap provinsi ataupun
                                    gabungan beberapa provinsi yang disatukan menjadi 1 cabang, di seluruh Indonesia dan di
                                    luar negeri apabila dianggap perlu </li>
                                <li>Di setiap provinsi atau beberapa provinsi yang disatukan menjadi 1 cabang, hanya ada
                                    satu cabang IKA SMANSA TEBING TINGGI yang tempat kedudukannya ditentukan oleh rapat
                                    anggota cabang tersebut </li>
                                <li>3.Pengurus cabang IKA SMANSA TEBING TINGGI diangkat dan diberhentikan oleh rapat anggota
                                    cabang IKA SMANSA TEBING TINGGI tersebut serta disahkan oleh pengurus pusat IKA SMANSA
                                    TEBING TINGGI </li>
                                <li>Masa jabatan pengurus cabang IKA SMANSA TEBING TINGGI adalah 5 tahun dan seterusnya
                                    dapat dipilih kembali </li>
                                <li>Ketua pengurus cabang IKA SMANSA TEBING TINGGI yang diangkat harus berdomisili di tempat
                                    cabang tersebut berada dan terdaftar secara sah sebagai lulusan dari SMA NEGERI 1 TEBING
                                    TINGGI</li>
                                <li>Apabila ketua pengurus cabang IKA SMANSA TEBING TINGGI berhalangan untuk waktu yang
                                    tidak dapat ditentukan lamanya atau mengundurkan diri sebelum habis masa jabatannya,
                                    maka cabang IKA SMANSA TEBING TINGGI tersebut akan dipimpin oleh seorang wakil ketua
                                    lainnya yang dipilih oleh rapat pengurus cabang dan dilaporkan serta disahkan oleh
                                    pengurus pusat</li>
                                <li>Penyelenggaraan rapat anggota luar biasa untuk memilih ketua pengurus cabang baru akan
                                    dilaksanakan oleh pejabat ketua pengurus cabang selambat-lambatnya 1 tahun setelah
                                    terpilihnya pejabat ketua pengurus cabang tersebut</li>
                            </ol>
                        </div>
                        <div class="mt-5 fs-6" id="pasal-18">
                            <h5 class="fw-bold text-center">PASAL 18 <br>
                                TATA CARA PEMILIHAN KETUA CABANG</h5>
                            <ol>
                                <li>Ketua pengurus cabang IKA SMANSA TEBING TINGGI diangkat untuk masa jabatan 5 tahun dan
                                    setelahnya dapat dipilih kembali melalui musyawarah cabang atau disingkat dengan MUSCAB.
                                </li>
                                <li>Untuk memilih ketua cabang periode berikutnya akan dipimpin oleh ketua cabang IKA
                                    SMANSA TEBING TINGGI priode berjalan disahkan oleh pengurus pusat IKA SMANSA TEBING
                                    TINGGI</li>
                                <li>Calon ketua cabang yang diajukan harus berdomisili di kota dimana cabang IKA SMANSA
                                    TEBING TINGGI berkedudukan dan lulus dari SMA Negeri 1 TEBING TINGGI</li>
                                <li>Setiap anggota IKA SMANSA TEBING TINGGI yang berada di cabang tersebut dapat mengajukan
                                    calon ketua cabang yang didukung sekurang – kurangnya 5 anggota kepada panitia
                                    pelaksanaan MUSCAB selambat-lambatnya 14 hari sebelum pelaksanaan MUSCAB </li>
                                <li>Panitia pelaksanaan MUSCAB akan mengumumkan seluruh nama calon ketua cabang kepada
                                    anggota selambat-lambatnya 7 hari sebelum pelaksanaan MUSCAB</li>
                                <li>Hak suara :
                                    <ol type="a">
                                        <li>Pengurus cabang 3 suara mewakilin pengurus cabang tersebut ditentukan oleh ketua
                                            cabang IKA SMANSA TEBING TINGGI tersebut</li>
                                        <li>Setiap anggota memiliki 1 suara</li>
                                    </ol>
                                </li>
                                <li>Para calon ketua cabang IKA SMANSA TEBING TINGGI tersebut akan mendapat kesempatan
                                    berbicara dalam MUSCAB untuk mengemukakan rancangan program kerja masing-masing </li>
                                <li>Keputusan MUSCAB dalam memilih ketua cabang diambil berdasarkan musyawarah mufakat.
                                    Apabila tidak tercapai mufakat maka Ketua cabang dipilih berdasarkan suara terbanyak
                                </li>
                                <li>Ketentuan teknis pemungutan suara akan dimuat di dalam tata tertib MUSCAB</li>
                            </ol>
                        </div>
                        <div class="mt-5 fs-6" id="pasal-19">
                            <h5 class="fw-bold text-center">PASAL 19<br>
                                TUGAS POKOK PENGURUS CABANG</h5>
                            <p>Tugas pokok pengurus cabang IKA SMANSA TEBING TINGGI adalah :</p>
                            <ol>
                                <li>Merumuskan dan melaksanakan kebijaksanaan yang ditetapkan oleh MUSCAB dan
                                    program-program IKA SMANSA TEBING TINGGI cabang berpedoman denan AS/ART IKA SMANSA
                                    TEBING TINGGI</li>
                                <li>Menyusun dan melaksanakan program kerja IKA SMANSA TEBING TINGGI cabang dalam priode
                                    kepengurusannya</li>
                                <li>Memberikan laporan secara berkala kepada pengurus pusat, Dewan penasehat cabang serta
                                    anggota cabang melalui website IKA SMANSA TEBING TINGGI</li>
                                <li>Mengadakan hubungan konsultasi dan kerjasama dengan instansi dan atau badan lain yang
                                    dipandang perlu dalam pelaksanaan program dan pencapaian tujuan IKA SMANSA TEBING TINGGI
                                    di cabang </li>
                            </ol>
                        </div>
                        <div class="mt-5 fs-6" id="pasal-20">
                            <h5 class="fw-bold text-center">PASAL 20<br>
                                RAPAT PENGURUS CABANG </h5>
                            <ol>
                                <li>Pengurus cabang IKA SMANSA TEBING TINGGI akan mengadakan rapat kerja cabang IKA SMANSA
                                    TEBING TINGGI sekurang-kurangnya 1 kali dalam priode kepengurusannnya</li>
                                <li>Rapat dipimpin oleh ketua pengurus cabang IKA SMANSA TEBING TINGGI apabila yang
                                    bersangkutan berhalangan, pimpinan rapat dipimpin oleh pengurus harian yang hadir</li>
                                <li>Rapat dianggap sah apabila dihadiri oleh sekurang-kurangnya ½ jumlah pengurus. Apabila
                                    jumlah yang hadir tidak mencapai quorum maka rapat akan di tunda minimal setengah jam
                                    dan setelah itu rapat akan tetap dilaksanakan tanpa memperhitungkan jumlah yang hadir
                                    dan dapat mengambil keputusan yang sah </li>
                                <li>Keputusan dianggap sah apabila disetujui oleh ½ lebih satu dari jumlah pengurus yang
                                    hadir</li>
                            </ol>
                        </div>
                        <div class="mt-5 fs-6" id="pasal-21">
                            <h5 class="fw-bold text-center">PASAL 21<br>
                                KEUANGAN</h5>
                            <ol>
                                <li>Setiap anggota IKA SMANSA TEBING TINGGI kecuali anggota kehormatan wajib membayar uang
                                    iuran bulanan anggota yang besarnya ditetapkan oleh pengurus pusat</li>
                                <li>Setiap anggota IKA SMANSA TEBING TINGGI menyetorkan langsung uang iuran ke rekening
                                    milik IKA SMANSA TEBING TINGGI dan menyerahkan bukti setoran kepada bendahara pusat IKA
                                    SMANSA TEBING TINGGI</li>
                                <li>Alokasi iuran anggota untuk IKA SMANSA TEBING TINGGI cabang dan IKA SMANSA TEBING TINGGI
                                    angkatan ditetapkan oleh pengurus pusat IKA SMANSA TEBING TINGGI</li>
                            </ol>
                        </div>
                        <div class="mt-5 fs-6" id="pasal-22">
                            <h5 class="fw-bold text-center">PASAL 22<br>
                                PENGELOLAAN KEUANGAN</h5>
                            <p>Penggunaan data tata cara pencatatan keuangan diatur dan ditentukan oleh pengurus dan
                                dilaporkan serta di pertanggungjawabkan oleh pengurus cabang IKA SMANSA TEBING TINGGI dan
                                oleh pengurus angkatan IKA SMANSA TEBING TINGGI kepada rapat anggotanya </p>
                        </div>
                        <div class="mt-5 fs-6" id="pasal-25">
                            <h5 class="fw-bold text-center">PASAL 25<br>
                                PENUTUP </h5>
                            <p>Hal-hal yang belum cukup diatur dalam anggaran rumah tangga ini akan di atur kemudian oleh
                                pengurus pusat IKA SMANSA TEBING TINGGI dengan memperhatikan pertimbangan dewan penasehat,
                                anggaran rumah tangga ini mulai berlaku pada tanggal ditetapkan.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-3 mt-md-5 order-1 order-md-2">
                <div>
                    <h3>Daftar Isi</h3>
                    <div class="divider"></div>
                </div>
                <div class="row flex-column gy-2 mt-3 fs-5 widget">
                    <div class="col-12">
                        <a href="#pasal-1" class="fs-6">Pasal 1 : Ketentuan Umum</a>
                    </div>
                    <div class="col-12">
                        <a href="#pasal-2" class="fs-6">Pasal 2 : Keanggotaan</a>
                    </div>
                    <div class="col-12">
                        <a href="#pasal-3" class="fs-6">Pasal 3 : Kewajiban Anggota</a>
                    </div>
                    <div class="col-12">
                        <a href="#pasal-4" class="fs-6">Pasal 4 : Hak Anggota</a>
                    </div>
                    <div class="col-12">
                        <a href="#pasal-5" class="fs-6">Pasal 5 : Berhentinya Anggota</a>
                    </div>
                    <div class="col-12">
                        <a href="#pasal-6" class="fs-6">Pasal 6 : Pemberhentian Anggota</a>
                    </div>
                    <div class="col-12">
                        <a href="#pasal-7" class="fs-6">Pasal 7 : Munas</a>
                    </div>
                    <div class="col-12">
                        <a href="#pasal-8" class="fs-6">Pasal 8 : Munas Luar Biasa</a>
                    </div>
                    <div class="col-12">
                        <a href="#pasal-9" class="fs-6">Pasal 9 : Pimpinan Ika Smansa Tebing Tinggi</a>
                    </div>
                    <div class="col-12">
                        <a href="#pasal-10" class="fs-6">Pasal 10: Dewan Penasehat</a>
                    </div>
                    <div class="col-12">
                        <a href="#pasal-11" class="fs-6">Pasal 11: Tugas Dewan Penasehat</a>
                    </div>
                    <div class="col-12">
                        <a href="#pasal-12" class="fs-6">Pasal 12: Rapat Dewan Penasehat</a>
                    </div>
                    <div class="col-12">
                        <a href="#pasal-13" class="fs-6">Pasal 13: Tata Cara Pemilihan Ketua Umum</a>
                    </div>
                    <div class="col-12">
                        <a href="#pasal-14" class="fs-6">Pasal 14: Pengurus Pusat</a>
                    </div>
                    <div class="col-12">
                        <a href="#pasal-15" class="fs-6">Pasal 15: Tugas Pokok Pengurus Pusat</a>
                    </div>
                    <div class="col-12">
                        <a href="#pasal-16" class="fs-6">Pasal 16: Rapat Pengurus Pusat</a>
                    </div>
                    <div class="col-12">
                        <a href="#pasal-17" class="fs-6">Pasal 17: Cabang-Cabang</a>
                    </div>
                    <div class="col-12">
                        <a href="#pasal-18" class="fs-6">Pasal 18: Tata Cara Pemilihan Ketua Cabang</a>
                    </div>
                    <div class="col-12">
                        <a href="#pasal-19" class="fs-6">Pasal 19: Tugas Pokok Pengurus Cabang</a>
                    </div>
                    <div class="col-12">
                        <a href="#pasal-20" class="fs-6">Pasal 20: Rapat Pengurus Cabang</a>
                    </div>
                    <div class="col-12">
                        <a href="#pasal-21" class="fs-6">Pasal 21: Angkatan</a>
                    </div>
                    <div class="col-12">
                        <a href="#pasal-22" class="fs-6">Pasal 22: Rapat Pengurus Angkatan</a>
                    </div>
                    <div class="col-12">
                        <a href="#pasal-25" class="fs-6">Pasal 25: Penutup</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
