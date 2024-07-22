<x-card>
    <x-card.body>
        <div class="d-flex">
            <div>
                <div class="mx-2 d-inline-block">
                   Tanggal : {{\Carbon\Carbon::now()->format('d-m-Y')}}
                </div>
            </div>
        </div>
    </x-card.body>
    <x-card.body class="border-bottom">
        <div class="d-flex">
            <div class="text-muted">
                <div class="mx-2 d-inline-block">
                    <x-select wire:model.change="rowsPerPage">
                        @foreach ($rowsPerPageOptions as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </x-select>
                </div>
            </div>
            <div class="ms-auto text-muted">
                <div class="ms-2 d-inline-block">
                    <x-search
                        id='searchu'
                        placeholder="Search"
                        wire:model.live="search"
                    />
                </div>
            </div>
        </div>
    </x-card.body>
    
    <x-table>
        <thead>
            <tr>
                <th>Id</th>
                <th class="text-center">Jam</th>
                <th class="text-center">Pengundang</th>
                
                <th class="text-center">Subject</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($undangans as $item)
                <tr>
                    <td>
                        {{ $item->i_id }}
                    </td>
                    <td class="text-center">
                        {{ $item->d_meet_timestart }}
                    </td>
                    <td class="text-center">
                        {{$item->i_emp_reqst}}
                    </td>
                    
                    <td>
					{{$item->e_meet_subject}}
                    </td>
                    <td class="text-center">
                        <a
                            class="btn btn-icon btn-success"
                            target="_blank"
                            data-toggle="tooltip" 
                            data-placement="top" 
                            title="absen detail"
							href="{{ route('absensidetail', ['id' => $item->i_id]) }}"
                        >
                            <x-icon.person />
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
		
		
    </x-table>
    <x-card.footer class="d-flex align-items-center">
        <x-pagination :resources="$undangans" />
    </x-card.footer>
</x-card>
