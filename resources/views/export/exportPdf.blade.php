<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Surat</title>
    <style>
        .header-container {
            display: flex;
            align-items: center;
        }

        .title-container {
            margin-right: 200px;
        }

        .header-title {
            display: flex;
            align-items: center

        }
        .title {
         text-decoration: underline;
        }
        .sub-title {
            list-style: none;
            margin-bottom: -30px;
            margin-left: 70px;
        }

        .deret {
            float: left;
            font-size: 15px;
        }

        .header-sub-title>ul>li {
            list-style: none;
            margin-bottom: -30px;
            font-size: 15px;
        }

        .heading-container ul li {
            list-style: none;
            margin-bottom: -30px;
        }

        .footer {
            margin-top: 350px;
            float: right;
        }

        .main-content {
            margin-left: 40px;
            margin-right: 20px;
        }

        img {
            width: 100px;
            height: 100px;
            position: absolute;
            top: 7.5%;
        }

        .title-container {
            display: flex;
            justify-content: space-around;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header-container">
        <div class="header-title">
            <img src="{{ public_path('logo-wk.png') }}" alt="">
            <div class="title-container">
                <h2 class="title"><strong>SMK WIKRAMA BOGOR</strong></h2>
                <ul class="deret">
                    <li class="sub-title"><h3>Bisnis dan Manajemen</h3></li>
                    <li class="sub-title"><h3>Teknologi Informasi dan Komunikasi</h3></li>
                    <li class="sub-title"><h3>Pariwisata</h3></li>
                </ul>
            </div>
        </div>
        <div class="header-sub-title">
            <ul>
                <li><p>Jl. Ray Wangun kel. Sindangsari Bogor</p></li>
                <li><p>Telp/Faks: (0251) 8242411</p></li>
                <li><p>e-mail: prohumasi@smkwikrama.sch.id</p></li>
                <li><p>website: www.smkwikrama.sch.id</p></li>
            </ul>
        </div>
    </div>
    <hr>
    <div class="content-container">
        <div class="heading-container">
            <ul class="first-heading">
                <li><p>Kepada</p></li>
                <li><p>Yth. Bapa/Ibu Terlampir</p></li>
                <li><p>Di tempat</p></li>
            </ul>
            <ul class="second-heading">
                <li><p>No: {{ $letterType->letter_code }}/{{ $data->id }}/SMK Wikrama/2023</p></li>
                <li><p>Hal: <strong>{{ $data->letter_perihal }}</strong> </p></li>
                <li><p>Tanggal: {{ \Carbon\Carbon::parse($data->created_at)->format('d F Y') }}</p></li>
            </ul>
        </div>
    </div>
    <div class="main-content">

        {!!  $data->content !!}

        <ol>
            @foreach($data->recipient as $w)
                <li>{{ App\Models\User::find($w)->name }}</li>
            @endforeach
        </ol>
    </div>

    <div class="footer">
        <p>Hormat kami,</p>
        <p>Kepala SMK Wikrama Bogor</p>
        <p>(........................)</p>
    </div>
</div>
</body>
</html>
