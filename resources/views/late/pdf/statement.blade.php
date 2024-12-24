<!DOCTYPE html>
<html>

<head>
    <title>Surat Pernyataan Keterlambatan ({{ $late->student->name }})</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            padding: 10px;
        }

        .header {
            text-align: center;
        }

        .content {
            margin-top: 30px;
            color: #2e2e2e;
        }

        .signature {
            margin-top: 50px;
        }

        .signature div {
            display: inline-block;
            width: 45%;
            text-align: center;
            color: #2e2e2e;
            padding-top: 100px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h3 style="margin-bottom: 0px">SURAT PERNYATAAN</h3>
            <h3 style="margin-top: 2px">TIDAK AKAN DATANG TERLAMBAT KESEKOLAH</h3>
        </div>
        <div class="content">
            <p>Yang bertanda tangan dibawah ini :</p>
            <table style=" margin-bottom: 30px" cellpadding="5">
                <tr>
                    <td>NIS</td>
                    <td>:</td>
                    <td>{{ $late->student->nis }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $late->student->name }}</td>
                </tr>
                <tr>
                    <td>Rombel</td>
                    <td>:</td>
                    <td>{{ $late->student->rombel->rombel }}</td>
                </tr>
                <tr>
                    <td>Rayon</td>
                    <td>:</td>
                    <td>{{ $late->student->rayon->rayon }}</td>
                </tr>
            </table>
            <p style=" margin-bottom: 30px">Dengan ini menyatakan bahwa saya telah melakukan pelanggaran tata tertib
                sekolah, yaitu terlambat datang
                ke sekolah sebanyak <b>3 Kali</b> yang mana hal tersebut termasuk kedalam pelanggaran kedisiplinan. Saya
                berjanji tidak akan terlambat datang ke sekolah lagi. Apabila saya terlambat datang ke sekolah lagi saya
                siap diberikan sanksi yang sesuai dengan peraturan sekolah.</p>

            <p>Demikian surat pernyataan terlambat ini saya buat dengan penuh penyesalan.</p>
        </div>
        <div class="signature">
            <div>
                Peserta Didik,<br><br><br><br><br>
                ( {{ $late->student->name }} )
            </div>
            <div>
                Bogor, {{ now()->format('d F Y') }}<br>
                Orang Tua/Wali Peserta Didik,<br><br><br><br><br>
                ( {{ $blank_space }} )
            </div>
        </div>
        <div class="signature">
            <div>
                Pembimbing Siswa,<br><br><br><br><br>
                ( {{ $late->student->rayon->user->name }} )
            </div>
            <div>
                Kesiswaan,<br><br><br><br><br>
                ( {{ $blank_space }} )
            </div>
        </div>
    </div>
</body>

</html>
