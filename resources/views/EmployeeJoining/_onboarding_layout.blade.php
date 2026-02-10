<div class="a4-page">
    {{-- Watermark --}}
    {{-- <div class="watermark">Aastha</div> --}}

    {{-- Page Content --}}
    <div class="page-content">
        {{-- Document Header --}}
        <div class="header" style="border-bottom: 1px dotted black;">
            <table style="width: 100%">
                <tr style="height: 4.5cm;">
                    <td class="qr-cont">
                        {{-- QR Code --}}
                        <div class="qr-box">
                            {!! QrCode::size(90)->generate($qrPayload) !!}
                        </div>
                    </td>
                    <td class="title-cont">
                        {{-- Doc Title --}}
                        <span class="doc-title">Employee Onboarding Form</span>
                        <br />
                        <span class="ag-logo">Aastha</span><span class="ag-addr"> - 4<sup>th</sup> Floor, Niladri Shikhar Building,</span>
                        <br />
                        <span class="ag-addr">Hill Cart Road, Siliguri - 734001.</span>
                    </td>
                    <td class="photo-cont">
                        {{-- Passport Photo --}}
                        <div class="photo-box">
                            @php
                                $photo = $employeeJoining->supportDocuments
                                    ->firstWhere('support_doc_type_id', /* PHOTO TYPE ID */)?->documentUpload;
                            @endphp

                            @if($photo)
                                <img src="{{ $isPdf
                                    ? public_path('storage/'.$photo->file_path)
                                    : asset('storage/'.$photo->file_path)
                                    }}">
                            @endif
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <h6>Ref: {{ $employeeJoining->id }}</h6>

        <table style="width: 100%;  border: 1px solid black;">
            <thead>
                <tr class="sect-title">
                    <td colspan="2">
                        <h4>Basic Information</h4>
                    </td>
                </tr>
            </thead>

            <tbody>
                <tr style="margin-top: 2px;">
                    <td style="width: 20%; text-align: right; padding-right: 5px">Name:</td>
                    <td style="padding-left: 5px">{{ strtoupper($employeeJoining->full_name) }}</td>
                </tr>
                <tr style="margin-top: 2px;">
                    <td style="width: 20%; text-align: right; padding-right: 5px">Mobile:</td>
                    <td style="padding-left: 5px">{{ $employeeJoining->mobile_no }}</td>
                </tr>
                <tr style="margin-top: 2px;">
                    <td style="width: 20%; text-align: right; padding-right: 5px">Email:</td>
                    <td style="padding-left: 5px">{{ strtolower($employeeJoining->email) }}</td>
                </tr>
                <tr style="margin-top: 2px;">
                    <td style="width: 20%; text-align: right; padding-right: 5px">Date of Birth:</td>
                    <td style="padding-left: 5px">{{ $employeeJoining->dob->format('d-m-Y') }}</td>
                </tr>
                <tr style="margin-top: 2px;">
                    <td style="width: 20%; text-align: right; padding-right: 5px">Gender:</td>
                    <td style="padding-left: 5px">{{ strtoupper($employeeJoining->gender) }}</td>
                </tr>
                <tr style="margin-top: 2px;">
                    <td style="width: 20%; text-align: right; padding-right: 5px">Marital Status:</td>
                    <td style="padding-left: 5px">{{ strtoupper($employeeJoining->marital_status) }}</td>
                </tr>
            </tbody>
        </table>

        <br />

        @foreach($employeeJoining->employeeAddresses as $address)
            <table style="width: 100%;  border: 1px solid black;">
                <thead>
                    <tr class="sect-title">
                        <td colspan="2">
                            <h4>{{ ucfirst(strtolower($address->address_type)) }} Address</h4>
                        </td>
                    </tr>
                </thead>

                <tbody>
                    <tr style="margin-top: 2px;">
                        <td style="width: 20%; text-align: right; padding-right: 5px">Street:</td>
                        <td style="padding-left: 5px">{{ strtoupper($address->street) }}</td>
                    </tr>
                    <tr style="margin-top: 2px;">
                        <td style="width: 20%; text-align: right; padding-right: 5px">Locality:</td>
                        <td style="padding-left: 5px">{{ strtoupper($address->locality) }}</td>
                    </tr>
                    <tr style="margin-top: 2px;">
                        <td style="width: 20%; text-align: right; padding-right: 5px">City:</td>
                        <td style="padding-left: 5px">{{ strtoupper($address->city) }}</td>
                    </tr>
                    <tr style="margin-top: 2px;">
                        <td style="width: 20%; text-align: right; padding-right: 5px">District:</td>
                        <td style="padding-left: 5px">{{ strtoupper($address->district)}}</td>
                    </tr>
                    <tr style="margin-top: 2px;">
                        <td style="width: 20%; text-align: right; padding-right: 5px">Post Office:</td>
                        <td style="padding-left: 5px">{{ strtoupper($address->post_office) }}</td>
                    </tr>
                    <tr style="margin-top: 2px;">
                        <td style="width: 20%; text-align: right; padding-right: 5px">State:</td>
                        <td style="padding-left: 5px">{{ strtoupper($address->state) }}</td>
                    </tr>
                    <tr style="margin-top: 2px;">
                        <td style="width: 20%; text-align: right; padding-right: 5px">PIN:</td>
                        <td style="padding-left: 5px">{{ strtoupper($address->pin_code) }}</td>
                    </tr>
                </tbody>
            </table>
        @endforeach

        <br />

        <table style="width: 100%;  border: 1px solid black;">
            <thead>
                <tr class="sect-title">
                    <td colspan="5">
                        <h4>Languages Known</h4>
                    </td>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <th style="width: 20%; border-bottom: 1px solid black; margin: 0;">Language</th>
                    <th style="width: 20%; border-bottom: 1px solid black; margin: 0;">Understand</th>
                    <th style="width: 20%; border-bottom: 1px solid black; margin: 0;">Speak</th>
                    <th style="width: 20%; border-bottom: 1px solid black; margin: 0;">Read</th>
                    <th style="width: 20%; border-bottom: 1px solid black; margin: 0;">Write</th>
                </tr>

                @foreach($employeeJoining->languageKnows as $lang)
                    <tr style="margin-top: 2px;">
                        <td style="text-align: right; padding-right: 5px">{{ strtoupper($lang->language->name) }}:</td>
                        <td style="text-align: center;">{{ $lang->can_understand ? 'YES' : 'NO' }}</td>
                        <td style="text-align: center;">{{ $lang->can_speak ? 'YES' : 'NO' }}</td>
                        <td style="text-align: center;">{{ $lang->can_read ? 'YES' : 'NO' }}</td>
                        <td style="text-align: center;">{{ $lang->can_write ? 'YES' : 'NO' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br />

        <table style="width: 100%;  border: 1px solid black;">
            <thead>
                <tr class="sect-title">
                    <td colspan="5">
                        <h4>Educational Qualification</h4>
                    </td>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <th style="width: 25%; border-bottom: 1px solid black; margin: 0;">Std.</th>
                    <th style="width: 25%; border-bottom: 1px solid black; margin: 0;">Board</th>
                    <th style="width: 25%; border-bottom: 1px solid black; margin: 0;">Passing Year</th>
                    <th style="width: 25%; border-bottom: 1px solid black; margin: 0;">Remarks</th>
                </tr>

                @foreach($employeeJoining->educationalQualifications as $edu)
                    <tr>
                        <td style="text-align: center;">{{ strtoupper($edu->educationStandard->name) }}</td>
                        <td style="text-align: center;">{{ strtoupper($edu->educationBoard->name) }}</td>
                        <td style="text-align: center;">{{ $edu->year_of_passing }}</td>
                        <td style="text-align: center;">{{ strtoupper($edu->remarks) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if($employeeJoining->workExperiences->count())
            <div class="page-break"></div>

            <h4 class="section-title">Work Experience</h4>

            <table class="info-table">
                <tr>
                    <th>Company</th>
                    <th>Designation</th>
                    <th>From</th>
                    <th>To</th>
                </tr>

                @foreach($employeeJoining->workExperiences as $exp)
                    <tr>
                        <td>{{ $exp->company_name }}</td>
                        <td>{{ $exp->job_title }}</td>
                        <td>{{ $exp->work_start_date }}</td>
                        <td>{{ $exp->work_end_date }}</td>
                    </tr>
                @endforeach
            </table>
        @endif

        <div class="page-break"></div>

        <h4 class="section-title">Documents Submitted</h4>

        <table class="info-table">
            @foreach($employeeJoining->supportDocuments as $doc)
                <tr>
                    <td>{{ $doc->supportDocType->name }}</td>
                </tr>
            @endforeach
        </table>

        <table class="no-border" style="width: 100%">
            <tr>
                <td>
                    Signed at {{ $employeeJoining->signed_place }}<br />
                    on {{ $employeeJoining->signed_date->format('d-m-Y') }}<br />
                </td>
                <td align="right">
                    <div class="signature-section">
                        <p><strong>Digitally Generated Document</strong></p>
                        <p>No physical signature required</p>
                        <p>
                            Generated by Aastha HR System<br>
                            On {{ now()->format('d-m-Y H:i') }}
                        </p>
                    </div>
                    <div class="digital-seal">
                        DIGITALLY SIGNED<br>
                        AASTHA HR SYSTEM
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
