<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            font-size: 12px;
            font-family: Arial, Helvetica, sans-serif;
        }
        
        .a4-page {
            width: 21cm;
            min-height: 29.7cm;
            //margin: 20px auto;      /* center in browser */
            padding: 1.5cm;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,.15);
            position: relative;
            overflow: hidden;
        }

        .page-content {
            position: relative;
            z-index: 1;
        }

        .photo-box {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 2.5cm;
            height: 3.5cm;
            border: 1px solid #000;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
        }

        .photo-box img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .watermark {
            position: fixed;
            top: 40%;
            left: 10%;
            width: 80%;
            text-align: center;

            font-family: 'Banff', sans-serif;
            font-size: 90px;
            font-weight: bold;

            color: rgba(0,0,0,0.07);

            transform: rotate(-30deg);
            z-index: 0;
            pointer-events: none;
        }

        @media print {
            body {
                background: none;
            }

            .a4-page {
                margin: 0;
                box-shadow: none;
            }
        }

        .page-break {
            page-break-before: always;
            break-before: page;
        }

        .qr-box {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 2;
        }

        .signature-section {
            margin-top: 50px;
            text-align: right;
            font-size: 11px;
            color: #333;
        }

        .digital-seal {
            border: 2px solid #444;
            padding: 8px 12px;
            display: inline-block;
            font-weight: bold;
            font-size: 10px;
        }

        @page {
            @bottom-right {
                content: "Page " counter(page) " of " counter(pages);
            }
        }

        .doc-title {
            font-size: 36px; 
            font-weight: bold;
            text-decoration: underline;
        }

        td.qr-cont {
            /* border: 1px solid red;  */
            width: 3cm;
        }

        td.title-cont {
            /* border: 1px solid red;  */
            text-align: center;
            vertical-align: top;
            padding-top: 20px;
        }

        td.photo-cont {
            /* border: 1px solid red;  */
            width: 4cm;
        }

        .ag-logo {
            font-family: 'Banff', sans-serif;
            font-size: 20px;
            font-weight: bold;
        }

        .ag-addr {
            font-size: 16px;
        }

        .sect-title {
            background-color: #888;
            color: #fff;
            text-align: center;
        }
    </style>
    <title>Document</title>
</head>
<body>
    {{-- PRINT BUTTON --}}
    {{-- <div class="text-end mb-3">
        <a href="{{ route('onboardings.pdf', $employeeJoining) }}"
           class="btn btn-danger">
            Download PDF
        </a>
    </div> --}}
    
    <div class="container">
        @include('EmployeeJoining._onboarding_layout', [
            'employeeJoining' => $employeeJoining,
            'isPdf' => false
        ])
    
        {{-- Uploaded Documents --}}
        <h5>Uploaded Documents</h5>
        <ul>
            @foreach($employeeJoining->supportDocuments as $doc)
                <li>
                    {{ $doc->supportDocType->name }} :
                    <a href="{{ asset('storage/'.$doc->documentUpload->file_path) }}"
                       target="_blank">
                       Download
                    </a>
                </li>
            @endforeach
        </ul>
    
    </div>
</body>
</html>
