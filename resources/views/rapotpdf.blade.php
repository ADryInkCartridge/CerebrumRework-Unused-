<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="pt-5 w-full">
        <div class="table table-fixed w-full rounded-2xl overflow-hidden">
            <div class="table-header-group">
                <div class="table-row h-20 bg-greenTableheader text-white text-xl font-semibold ">
                    <div class="table-cell w-32 text-center align-middle ">No</div>
                    <div class="table-cell w-1/4 text-center align-middle">Divisi</div>
                    <div class="table-cell w-1/4 text-center align-middle">Tahap</div>
                    <div class="table-cell w-1/4 text-center align-middle">Kegiatan</div>
                    <div class="table-cell w-1/4 text-center align-middle">SN</div>
                    <div class="table-cell w-1/4 text-center align-middle">BN</div>
                    <div class="table-cell w-1/4 text-center align-middle">TN</div>
                    <div class="table-cell w-32 text-center align-middle "></div>

                </div>
            </div>
            <div class="table-row-group overflow-y-scroll h-96">
                @php
                $total = 0
                @endphp
                @foreach($nilais as $index => $nilai)
                <div class="table-row h-20 text-white text-xl font-semibold ">
                    <div class="table-cell w-32 text-center align-middle  ">
                        <span class="">{{$index+1}}</span>
                    </div>
                    <div class="table-cell w-1/4 text-center align-middle">
                        @if($nilai->divisi)
                        {{$nilai['divisi']}}
                        @else
                        Ormawa
                        @endif
                    </div>
                    <div class="table-cell w-1/4 text-center align-middle">{{$nilai['tahap']}}</div>
                    <div class="table-cell w-1/4 text-center align-middle">{{$nilai['kegiatan']}}</div>
                    <div class="table-cell w-1/4 text-center align-middle">
                        @if($nilai->sn)
                        {{$nilai['sn']}}
                        @else
                        {{$nilai['sn2']}}
                        @endif
                    </div>
                    <div class="table-cell w-1/4 text-center align-middle">
                        @if($nilai->sn)
                        {{$nilai['bn']}}
                        @else
                        {{$nilai['bn2']}}
                        @endif
                    </div>
                    <div class="table-cell w-1/4 text-center align-middle">
                        @if($nilai->tn)
                        @php
                        $total = $total + $nilai->tn
                        @endphp
                        {{$nilai['tn']}}
                        @else
                        @php
                        $total = $total + $nilai->tn2
                        @endphp
                        {{$nilai['tn2']}}
                        @endif
                    </div>
                </div>
                @endforeach
                <p>{{$total}}</p>
            </div>
        </div>
</body>

</html>