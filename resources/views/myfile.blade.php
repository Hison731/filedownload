@extends('layouts.app')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-folder"></i> {{$newDate}}</h1>
                <p>Table to display files that you have for special day</p>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Files</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-sm btn-success mb-2" href="{{ route('download', $newDate) }}">Download All</a>
            </div>


            <div class="col-md-12">

                <div class="tile">
                    <div class="tile-body table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th style="width: 50px">No</th>
                                <th>Filename</th>
                                <th style="width: 50px">FileType</th>
                                <th style="width: 50px">Filesize</th>
                                <th style="width: 100px">Preview</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($files as $key=>$file)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$file['basename']}}</td>
                                        <td><i class="fas {{$file['image']}}" style="color: green; margin-right: 5px; font-size: 16px;"></i> {{$file['extension']}}</td>
                                        <td>{{$file['size']}}</td>
                                        <td><a class="btn btn-success btn-sm" href="/{{$file['linkTarget']}}" target="_blank">View <i class="fa fa-eye"></i></a></td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')

    <script src="{{asset('template/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('template/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable({
            "columnDefs": [ {

                "targets": [4], // column or columns numbers

                "orderable": false,  // set orderable for selected columns

            }],
        });
    </script>
@endsection
