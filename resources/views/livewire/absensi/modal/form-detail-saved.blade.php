<x-modal
    id="absensi-modal-formdetailsaved"
    size="xl"
    x-data="{ modal: new bootstrap.Modal($el) }"
    x-on:list-added="modal.hide()"
>

        <x-modal.header>
            <h5 class="modal-title fw-normal">
              List Absen
            
            </h5>
        </x-modal.header>
       <form>
        <x-modal.body>
            
           <x-table>
            <thead>
                <th>No</th>
                <th>NIK</th>
                <th align="center">Nama</th>
                
            </thead>
            <tbody id="scan">
                @if(count($sources)!=0)
           @foreach ($sources as $s )
               
        
               <tr>
                <td>
                    {{$loop->iteration}}
                </td>
                <td align="center">
                    
                    <x-input
                    readOnly
                    fullwidth
                   value="{{$s->i_visitor_card}}"
                />
                <td align="center">
                    
                    <x-input
                    readOnly
                    fullwidth
                    value="{{$s->n_visitor_card}}"
                  
                />
                    
                </td>
               </tr>
               @endforeach
               @else
                <tr><td colspan="4" align="center">Belum Ada Data</td></tr>
            
            @endif
            </tbody>
           </x-table>
                    
        </x-modal.body>
        <x-modal.footer>
            
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




		