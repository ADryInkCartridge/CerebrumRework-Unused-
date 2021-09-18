<!DOCTY`P`E html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td,
            th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
            
            .total{
                text-align: center;
            }

        </style>


    </head>

    <body>
                <table>
                @php
                $total = 0
                @endphp
                <tr>
                    <th>No</th>
                    <th>Divisi</th>
                    <th>Tahap</th>
                    <th>Kegiatan</th>
                    <th>SN</th>
                    <th>BN</th>
                    <th>TN</th>
                </tr>
                @foreach($nilais as $index => $nilai)
                <tr>
                    <td>{{$index+1}}</td>
                    <td> @if($nilai->divisi)
                        {{$nilai['divisi']}}
                        @else
                        Ormawa
                        @endif</td>
                    <td>{{$nilai['tahap']}}</td>
                    <td>{{$nilai['kegiatan']}}</td>
                    <td> @if($nilai->sn)
                        {{$nilai['sn']}}
                        @else
                        {{$nilai['sn2']}}
                        @endif</td>
                    <td> @if($nilai->sn)
                        {{$nilai['bn']}}
                        @else
                        {{$nilai['bn2']}}
                        @endif</td>
                    <td> @if($nilai->tn)
                        @php
                        $total = $total + $nilai->tn
                        @endphp
                        {{$nilai['tn']}}
                        @else
                        @php
                        $total = $total + $nilai->tn2
                        @endphp
                        {{$nilai['tn2']}}
                        @endif</td>
                </tr>
                @endforeach
                <tr class="total">
                    <td class="total" colspan="7">{{$total}}</td>
                </tr>
            </table>
            
    </body>

    </html>
