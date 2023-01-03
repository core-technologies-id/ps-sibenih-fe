<!DOCTYPE html>
<html lang="en">

    <head>
        <style>
            .container {
                width: 300px;
                float: right;
                margin-bottom: 50px;
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
                font-size: 1rem;
            }

            .table table tr td {
                padding-bottom: 10px;
                padding-right: 20px;
            }

            .table table tr .samping {
                padding-right: 60px;
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

            .box {
                margin-top: 1rem;
                width: 150px;
                height: 200px;
                outline: 2px solid #333;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div style="text-align: right; width: 100%">Nomor Tiket : {{ $data->nomor_tiket }}</div>
        </div>

        <div class="title">
            <h3>FORMULIR PENDAFTARAN SIBENIH</h3>
        </div>

        <div class="table">
            <table>
                <tbody>
                    <tr>
                        <td colspan="2">*<span class="title-table">DATA REGISTRASI</span></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2">Nama Petani / Pimpinan</td>
                        <td class="samping" colspan="2">: {{ $data->nama_pimpinan }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Kelompok Tani / Perusahaan</td>
                        <td class="samping" colspan="2">: {{ $data->nama_pt }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Alamat</td>
                        <td class="samping" colspan="2">: {{ $data->alamat_usaha }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Nomor HP</td>
                        <td class="samping" colspan="2">: {{ $data->hp }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Alamat email</td>
                        <td class="samping" colspan="2">: {{ $data->email }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Foto KTP</td>
                        <td colspan="2" class="samping">: </td>
                    </tr>
                    <div class="box"></div>
                </tbody>
            </table>
        </div>
    </body>
</html>