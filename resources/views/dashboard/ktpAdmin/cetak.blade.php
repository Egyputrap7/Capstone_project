<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Contoh Surat</title>
    <style>
      /* add body to center in dompdf */
      body {
        margin: 0 auto;
        width: 600px;
      }
    </style>
  </head>
  <body>
    <center style="margin-top: 50px;">
        <table style="align-content: center">
            <tr>
            <td><img src="{{ asset('dashmin/img/user.png') }}" width="150" height="150" /></td>
            <td style="font-family: 'Times New Roman', Times, serif; font-size: 13px">
                <center>
                <font size="5"><b>PEMERINTAH KABUPATEN SLEMAN</b> </font><br />
                <font size="5"><b>KECAMATAN TEMPEL</b></font
                ><br />
                <font size="4"><b>KALURAHAN MOROREJO</b></font
                ><br />
                <font size="3"><i>Jl.Karanggawang, Karanggawang Mororejo, Kec. Tempel, Kabupaten Sleman, Daerah Istimewa Yogyakarta</i></font
                ><br />
                </center>
            </td>
            </tr>
            <tr>
            <td colspan="2"><hr style="border: 1px solid" /></td>
            </tr>
        </table>
        <br />
        <table width="545">
            <tr>
            <td style="font-family: 'Times New Roman', Times, serif; font-size: 18px; text-align: center; font-weight: bold" class="text">
                <u>SURAT PERMOHONAN KARTU TANDA PENDUDUK (KTP)</u>
            </td>
            </tr>
            <tr>
            <td style="text-align: center">Nomor : {{ $ktp->id }}/{{ $ktp->id }}/2024</td>
            </tr>
        </table>
        <br /><br /><br />
        <table width="545">
            <tr>
            <td>Yang bertanda tangan dibawah ini :</td>
            </tr>
        </table>
        <br /><br />
        <table width="545">
            <tr>
            <td width="200">Pemerintah Provinsi</td>
            <td width="10">:</td>
            <td width="335">Daerah Istimewa Yogyakarta</td>
            </tr>
            <tr>
            <td width="200">Pemerintah Kabupaten</td>
            <td width="10">:</td>
            <td width="335">Sleman</td>
            </tr>
            <tr>
            <td width="200">Desa</td>
            <td width="10">:</td>
            <td width="335">Mororejo</td>
            </tr>
            <tr>
            <td width="200">Permohonan KTP</td>
            <td width="10">:</td>
            <td width="335">{{ $ktp->jenisKTP }}</td>
            </tr>
            <tr>
            <td width="200">Nama</td>
            <td width="10">:</td>
            <td width="335">{{ $ktp->nama }}</td>
            </tr>
            <tr>
            <td width="200">No. KK</td>
            <td width="10">:</td>
            <td width="335">{{ $ktp->noKK }}</td>
            </tr>
            <tr>
            <td width="200">NIK</td>
            <td width="10">:</td>
            <td width="335">{{ $ktp->nik }}</td>
            </tr>
            <tr>
            <td width="200">Alamat</td>
            <td width="10">:</td>
            <td width="335">{{ $ktp->alamat }}</td>
            </tr>
            <td width="200">RT</td>
            <td width="10">:</td>
            <td width="335">{{ $ktp->RT }}</td>
            </tr>
            </tr>
            <td width="200">RW</td>
            <td width="10">:</td>
            <td width="335">{{ $ktp->RW }}</td>
            </tr>
            <td width="200">Kode Pos</td>
            <td width="10">:</td>
            <td width="335">{{ $ktp->kodePos }}</td>
            </tr>
        </table>
    
        <br /><br /><br />
        <table width="545">
            <tr>
                <td width="340"></td>
                <td style="text-align: left">Yogyakarta, {{ date('d M Y', strtotime($ktp->tglSurat)); }}</td>
            </tr>
        </table>
        <table width="650">
            <tr>
                <td width="35"></td>
                <td style="text-align: left">Lurah</td>
                <td width="290"></td>
                <td style="text-align: left">Pemohon</td>
            </tr>
        </table>
        <br /><br />
        <br /><br />
        <table width="650" style="margin-bottom: 100px">
            <tr>
                <td width="10"></td>
                <td style="text-align: left">{{ $ktp->Camat }}</td>
                <td width="240"></td>
                <td style="text-align: left">{{ $ktp->nama }}</td>
            </tr>
        </table>
    </center>
  </body>
</html>
