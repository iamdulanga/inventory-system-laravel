<h3>Extra Needles Report</h3>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Retrieved Date</th>
            <th>Needle Type</th>
            <th>Needle Size</th>
            <th>Machine</th>
            <th>Submitted EPF</th>
            <th>Section (Sub)</th>
            <th>Delivery Date</th>
            <th>Retrieved EPF</th>
            <th>Section (Ret)</th>
            <th>New Machine</th>
            <th>Unique ID</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $i => $record)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $record->retrieved_date }}</td>
            <td>{{ $record->needle_type }}</td>
            <td>{{ $record->needle_size }}</td>
            <td>{{ $record->machine_number }}</td>
            <td>{{ $record->submitted_epf }}</td>
            <td>{{ $record->section_submitted }}</td>
            <td>{{ $record->delivery_date }}</td>
            <td>{{ $record->retrieved_epf }}</td>
            <td>{{ $record->section_retrieved }}</td>
            <td>{{ $record->new_machine_number ?? '-' }}</td>
            <td>{{ $record->unique_identifier }}</td>
        </tr>
        @endforeach
    </tbody>
</table>