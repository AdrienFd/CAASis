<!-- title of the list participants -->
<h2 style="text-align:center; margin:0px;">Liste des participants pour l'événement : {{ $name }}</h2>
</div>

<!-- Table containing participants -->
<table width="100%" style="border-collapse: collapse; border: 0px;">
    <thead>
        <tr>
            <th style="border: 1px solid; padding:12px;" width="15%">N°</th>
            <th style="border: 1px solid; padding:12px;" width="15%">Nom</th>
            <th style="border: 1px solid; padding:12px;" width="15%">Prénom</th>
            <th style="border: 1px solid; padding:12px;" width="15%">Email</th>
        </tr>
    </thead>
    <tbody>
    <?php $i=1; ?>
    @foreach($data as $row)
        <tr>
            <th style="border: 1px solid; padding:12px;">{{ $i }}</th>
            <th style="border: 1px solid; padding:12px;">{{ $row->member_name }}</th>
            <th style="border: 1px solid; padding:12px;">{{ $row->member_firstname }}</th>
            <th style="border: 1px solid; padding:12px;">{{ $row->email }}</th>
        </tr>
        <?php $i++; ?>
    @endforeach
    </tbody>
</table>