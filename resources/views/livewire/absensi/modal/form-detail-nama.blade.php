<x-modal
    id="absensi-modal-formdetailnama"
    size="xl"
    x-data="{ modal: new bootstrap.Modal($el) }"
    x-on:edit-added="modal.hide()"
>

        <x-modal.header>
            <h5 class="modal-title fw-normal">
               Edit Identitas
            
            </h5>
        </x-modal.header>
        <form wire:submit="save">
        <x-modal.body>
            
           <x-table>
            <thead>
                <th>No</th>
                <th>KTP</th>
                <th>NIK</th>
                <th align="center">Nama</th>
                
            </thead>
            <tbody id="scan">
                
               @if(count($sources)!=0)
           @foreach ($sources as $s=>$v )
               
         
               <tr>
                <td>
                    {{$loop->iteration}}
                </td>
                <td>
                    
                    <x-input hidden wire:model="sources.{{$s}}.image" />
                    <img src="{{URL('images/'.$v['image'])}}" width="400" height="280"/>
                </td>
                <td align="center">
                    
                    <x-input
                    fullwidth
                    wire:model="sources.{{$s}}.NIK"
                    maxlength=16
                />
                <td align="center">
                    
                    <x-input
                    fullwidth
                    wire:model="sources.{{$s}}.Nama"
                  
                />
                    
                </td>
               </tr>
               @endforeach
            @else
                <tr><td colspan="4" align="center">Belum upload KTP</td></tr>
            
            @endif
            </tbody>
           </x-table>
                    
        </x-modal.body>
        <x-modal.footer>
            <x-button 
             color="primary"
                class="ms-auto">
                <x-loading target="save" />
                Save
            </x-button>
            {{-- <x-button
                type="button"
                color="link"
                modal-dismiss
            >
                Cancel
            </x-button>
            <x-button
                color="primary"
                class="ms-auto"
            >
                <x-loading target="save" />
                Save
            </x-button> --}}
        </x-modal.footer>
    </form>
    
</x-modal>




		