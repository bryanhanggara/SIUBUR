<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .letter {
            width: 80%;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            line-height: 1.6;
        }
        .footer{
            text-align: right;
        }
    </style>
    <title>Laporan Surat</title>
</head>
<body>
    <div class="letter">
        <div class="header">
            <h2>Laporan Kinerja</h2>
            <h4>{{$report->judul}}</h4>
            <p>Jl. Merdeka Indrajaya, Kec. Dogan Ilir, Kota Lama Daerah Khusus Perkotaan</p>
            <hr>
        </div>
        <div class="content">
            <p><strong>Ditujukan:</strong> {{ $report->user->name }}</p>
            <p><strong>Jabatan:</strong> {{$jabatan->nama_jabatan}} </p>
            <p>{{ $report->content }}</p>
         
        </div>
        <div class="content">
            <p>Gaji 1 Bulan  {{ \Carbon\Carbon::now()->subMonth()->format(' F ') }}:  {{$totalGajiBulanSebelumnya}}</p>
            <p>Total Jam kerja {{ \Carbon\Carbon::now()->subMonth()->format(' F ') }}: {{$totalSelisihJamBulanSebelumnya}}</p>
        </div>
        <div class="footer">
            <p>Indralaya, {{ \Carbon\Carbon::now()->subMonth()->format(' F Y') }}</p>
           
            <p style="margin-top: 50px;">Direktur Batta Corp</p>
        </div>
    </div>
</body>
</html>
