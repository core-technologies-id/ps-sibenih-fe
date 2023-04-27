<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            .container {
                width: 300px;
                float: right;
                margin-bottom: 10px;
            }

            .title {
                text-align: center;
            }

            .title h3 {
                font-weight: bold;
                text-decoration: underline;
                clear: right;
            }

            .title-table {
                text-decoration: underline;
            }

            .table {
                font-size: 11px;
            }

            .table table tr td {
                padding-bottom: 10px;
                padding-right: 25px;
            }

            .table table tr {
                line-height: 5px;
            }

            .table table tr .samping {
                padding-right: 20px;
            }

            .pernyataan {
                font-size: 11px;
            }

            .ttd {
                width: 200px;
                float: right;
                margin-top: 10px;
                text-align: center;
            }

            .table-format {
                border: 2px solid black;
                margin-top: 8px;
                margin-bottom: 13px;
            }

            .keterangan {
                margin-top: 15px;
                clear: right;
            }

            .keterangan {
                font-size: 11px;
            }

            .keterangan .bagian-1 {
                float: left;
                height: 150px;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div style="text-align: right; width: 100%">Formulir 1</div>
            <div class="table-format">
                <table>
                    <tbody>
                        <tr style="line-height: 16px;">
                            <td>Nomor</td>
                            <td>: ..............................</td>
                        </tr>
                        <tr style="line-height: 16px;">
                            <td>Musim Tanam</td>
                            <td>: @if ($data->s1_musim_tanam == 'oktmar')
                                Oktober - Maret
                                @elseif ($data->s1_musim_tanam == 'asep')
                                April - September
                                @endif
                            </td>
                        </tr>
                        <tr style="line-height: 16px;">
                            <td>Paraf</td>
                            <td>: ..............................</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div>Kepada Yth,</div>
            <div>Kepala UPTD BPSBTPH Prov Sumsel</div>
            <div>di -</div>
            <div>&emsp; Palembang</div>
        </div>
        <div class="title">
            <h3>PERMOHONAN SERTIFIKASI BENIH TANAMAN PANGAN</h3>
            <div style="line-height: 10px">No. {{ $data->s1_nomor_antrian ?? '-' }} /SBTP/XI/{{ date('Y') }}</div>
        </div>

        <div class="table">
            <table>
                <tbody>
                    <tr style="padding-top: 20px">
                        <td>Komoditas</td>
                        <td>: {{ $data->kom_nama_komoditas ?? '-' }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>1. Nama Produsen</td>
                        <td>: {{ $data->pro_nama_pt ?? '-' }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: {{ $produsenAlamat->s1_alamat_lengkap ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="margin-top: 5px;">2. <span class="title-table">Sertifikat Benih
                                Untuk</span>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Luas Pertanaman</td>
                        <td class="samping">: {{ $produsenAlamat->s2_luas_tanah ?? '-' }}</td>
                        <td>Tanggal Tebar</td>
                        <td class="samping">: {{ $data->s2_tgl_tebar ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Varietas</td>
                        <td class="samping">: {{ $data->var_nama_varietas1 ?? '-' }}</td>
                        <td>Tanggal Tanam</td>
                        <td class="samping">: {{ $data->s2_tgl_tanam ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Kelas Benih</td>
                        <td class="samping">: {{ $data->kelas1_nama_kelas ?? '-' }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="margin-top: 5px;">3. <span class="title-table">Letak Tanah</span></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Blok</td>
                        <td class="samping">: {{ $data->s1_block }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Desa</td>
                        <td class="samping">:
                            <span>{{ $produsenAlamat->s2_desa ?? '-' }}</span>
                        </td>
                        <td>Kota/Kabupaten</td>
                        <td class="samping">: {{ $produsenAlamat->kabupaten ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Kecamatan</td>
                        <td class="samping">: {{ $produsenAlamat->kecamatan ?? '-' }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="margin-top: 5px;">4. <span class="title-table">Tanaman Sebelumnya</span>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Jenis Tanaman</td>
                        <td class="samping">: {{ $data->s2_jenis_tanaman ?? '-' }}</td>
                        <td>Varietas</td>
                        <td class="samping">: {{ $data->var_nama_varietas2 ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Panen</td>
                        <td class="samping">: {{ $data->s2_tgl_panen ?? '-' }}</td>
                        <td>Kelas Benih</td>
                        <td class="samping">: {{ $data->kelas2_nama_kelas ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Pemeriksaan Lapangan</td>
                        <td class="samping">: @if ($data->s7_pemeriksaan_lapangan == 1)
                            Lulus
                            @else
                            Tidak Lulus
                            @endif
                        </td>
                        <td>Di Sertifikasi</td>
                        <td class="samping">: @if ($data->s7_disertifikasi == 1)
                            Ya
                            @else
                            Tidak
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="margin-top: 5px;">5. <span class="title-table">Asal Benih</span></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Produsen Benih</td>
                        <td class="samping">: {{ $data->s3_produsen ?? '-' }}</td>
                        <td>No. Kelompok Benih</td>
                        <td class="samping">: {{ $data->s3_no_kel_benih ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Asal Benih/No. Kelas</td>
                        <td class="samping">: {{ $data->s3_no_label_sumber ?? '-' }}</td>
                        <td>Jumlah Benih</td>
                        <td class="samping">: {{ $data->s3_jml_benih ?? '-' }} Kg</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="pernyataan">
            <div style="line-height: 14px"><b>Pernyataan</b> :</div>
            <div style="line-height: 14px"><b>a.</b> Pertanaman kami tidak akan diterima untuk sertifikasi bila tidak
                mengikuti petunjuk - petunjuk
                untuk sertifikasi dan dibersihkan dari tanaman/varietas lain untuk memenuhi standar lapangan.</div>
            <div style="line-height: 14px"><b>b.</b> Kami wajib memberitahu kepada Pengawas Benih untuk pemeriksaan
                lapangan
                selambat-lambatnya 7
                (tujuh) hari sebelum pemeriksaan.</div>
            <div style="line-height: 14px"><b>c.</b> Kami tidak diperkenankan untuk memindahkan letak pertanaman tanpa
                pemberitahuan Pangawas Benih.</div>
            <div style="line-height: 14px"><b>d.</b> Pengelolaan benih harus mendapatkan bimbingan dari Pengawas Benih.
            </div>
            <div style="line-height: 14px"><b>e.</b> Sertifikat akan diberikan apabila telah lulus pemeriksaan lapangan
                dan
                pengujian laboratorium.</div>
            <div style="line-height: 14px"><b>f.</b> Pemerintah tidak mempunyai kewajiban untuk membeli benih yang
                disertifikasi.</div>
            <div style="line-height: 14px"><b>g.</b> Kami bersedia membayar biaya jasa pemeriksaan lapangan dan
                pengujian
                mutu benih di laboratorium
                sesuai dengan ketentuan yang berlaku</div>
        </div>

        <div class="ttd">
            <div>Palembang, {{ Carbon\Carbon::now()->format('d.m.Y') }}</div>
            <div>Pemohon</div>
            <div style="padding: 10 0">
                <img src="{{ $data->s6_ttd }}" width="70" alt="" />
            </div>
            <div>({{ $data->pro_nama_pimpinan }})</div>
        </div>

        <div class="keterangan">
            <hr>
            <div class="bagian-1">
                <table>
                    <tbody>
                        <tr>
                            <td>Lembar Pertama</td>
                            <td style="width: 200px">: UPTD BPSP</td>
                            <td>
                                *) Diisi oleh PBT /Pengendali Mutu (QC)
                            </td>
                        </tr>
                        <tr>
                            <td>Lembar Kedua</td>
                            <td style="width: 200px">: Dinas Pertanian Kabupaten</td>
                            <td>
                                **) Lampirkan peta lapangan
                            </td>
                        </tr>
                        <tr>
                            <td>Lembar Ketiga</td>
                            <td style="width: 200px">: Pemohon</td>
                            <td>
                                ***) Coret yang tidak perlu
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
