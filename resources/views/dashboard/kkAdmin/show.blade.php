@extends('dashboard.layouts.main')

@section('container')

<!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <a href="/dashboard/kk" class="btn btn-success"><i class="bi bi-arrow-left-square"></i> Kembali</a>
                        <a href="/dashboard/kk/{{ $kk->id }}/cetak" class="btn btn-secondary"><i class="bi bi-printer"></i> Cetak</a>
                    </div>
                    <center style="margin-top: 50px;">
                        <table style="align-content: center">
                            <tr>
                            <td><img src="{{ asset('dashmin/img/desa_logo.svg') }}" width="150" height="150" /></td>
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
                                <u>SURAT PERMOHONAN KARTU KELUARGA (KK)</u>
                            </td>
                            </tr>
                            <tr>
                            <td style="text-align: center">Nomor : {{ $kk->id }}/{{ $kk->id }}/2024</td>
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
                            <td width="200">Nama</td>
                            <td width="10">:</td>
                            <td width="335">{{ $kk->nama }}</td>
                            </tr>
                            <tr>
                            <td width="200">No. KK</td>
                            <td width="10">:</td>
                            <td width="335">{{ $kk->noKK }}</td>
                            </tr>
                            <tr>
                            <td width="200">NIK</td>
                            <td width="10">:</td>
                            <td width="335">{{ $kk->nik }}</td>
                            </tr>
                            <tr>
                            <td width="200">Alamat</td>
                            <td width="10">:</td>
                            <td width="335">{{ $kk->alamat }}</td>
                            </tr>
                            <td width="200">RT</td>
                            <td width="10">:</td>
                            <td width="335">{{ $kk->RT }}</td>
                            </tr>
                            </tr>
                            <td width="200">RW</td>
                            <td width="10">:</td>
                            <td width="335">{{ $kk->RW }}</td>
                            </tr>
                            <td width="200">Kode Pos</td>
                            <td width="10">:</td>
                            <td width="335">{{ $kk->kodePos }}</td>
                            </tr>
                        </table>
                    
                        <br /><br /><br />
                        <table width="545">
                            <tr>
                                <td width="340"></td>
                                <td style="text-align: left">Yogyakarta, {{ date('d M Y', strtotime($kk->tglSurat)); }}</td>
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
                                <td style="text-align: left">{{ $kk->Camat }}</td>
                                <td width="240"></td>
                                <td style="text-align: left">{{ $kk->nama }}</td>
                            </tr>
                        </table>
                    </center>
                </div>
            </div>
<!-- Recent Sales End -->

@endsection