@extends('layouts.Frontend.app')
@section('title')
    Ranking
@endsection

@section('content')
    @section('about')
    <div class="about-page1-area">
        <div class="container">
            <h2 class="mb-5">Ranking Perkembangan Siswa</h2>
            <div class="mb-5 " style="margin-bottom: 10px">
                <h5 class="mb-0 text-body-secondary" style="margin-bottom: 0px">Adab = Prilaku siswa di sekolah</h5>
                <h5 class="mb-0 text-body-secondary" style="margin-bottom: 0px">Akademik = Menilai seluruh pengetahuan dan memahami pelajaran disekolah</h5>
                <h5 class="mb-0 text-body-secondary" style="margin-bottom: 0px">Agama = Menilai seluruh pengetahuan dan memahami pelajaran agama disekolah</h5>
            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Rank</th>
                    <th>Nama</th>
                    <th>Adab</th>
                    <th>Akademik</th>
                    <th>Agama</th>
                    <th>Skor</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>95</td>
                    <td>95</td>
                    <td>95</td>
                    <td>285</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jane Smith</td>
                    <td>95</td>
                    <td>95</td>
                    <td>90</td>
                    <td>280</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Bob Johnson</td>
                    <td>95</td>
                    <td>95</td>
                    <td>85</td>
                    <td>275</td>
                </tr>
                <!-- Tambahkan baris lain sesuai kebutuhan -->
                </tbody>
            </table>
        </div>
    </div>
    @endsection
@endsection