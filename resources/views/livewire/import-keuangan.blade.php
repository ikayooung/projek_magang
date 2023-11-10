<div>
    <x-modal title="Import Keuangan" action="{{route('import.keuangan')}}" name="import" button="Import">
        <x-input name="file" label="File Excel" value="" type="file"/>
        <a href="{{route('import.template')}}">
            <small>Download Template</small>
        </a>
    </x-modal>
</div>
