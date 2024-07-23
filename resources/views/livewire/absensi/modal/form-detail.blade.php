<x-modal
    id="absensi-modal-formdetail"
    size="lg"
    x-data="{ modal: new bootstrap.Modal($el) }"
    x-on:upload-added="modal.hide()"
>

        <x-modal.header>
            <h5 class="modal-title fw-normal">
               Scan Identitas
            
            </h5>
        </x-modal.header>
        <form wire:submit="save">
        <x-modal.body>
            
                <x-input
                label="KTP"
                placeholder="Scan KTP"
                
                wire:model="ktps" multiple
                type="file"
                accept="image/*"
            />
            <x-input type='hidden' wire:model="iddetail" value={{$qty}}/>
            @error('ktps.*') <span class="error">{{ $message }}</span> @enderror
           {{-- <x-table>
            <thead>
                <th>No</th>
                <th>Scan KTP</th>
                <th>Scan Finger</th>
                
            </thead>
            <tbody id="scan">
           @for ($i=1; $i<=$qty;$i++)
               <tr>
                <td>
                    {{$i}}
                </td>
                <td>
                    <x-input
                    label="KTP"
                    placeholder="Scan KTP"
                    id="ktp-{{$i}}"
                    name="ktp-{{$i}}"
                   
                    type="file"
                    accept="image/*"
                />
                </td>
                <td>
                    <x-input
                    label="Finger"
                    placeholder="Scan Finger"
                    id="finger-{{$i}}"
                    name="finger-{{$i}}"
                  
                    type="file"
                />
                </td>
               </tr>
           @endfor
            <tr>
                <td colspan="3" align="center">
                    <x-button
                    icon
                    color="primary"
                    onclick="addrow()"
                >
                    <x-icon.plus />
                </x-button>
                </td>
            </tbody>
           </x-table> --}}
                    
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
    <script>
        function addrow(){
            var x=document.getElementById('scan');
            var rw = x.getElementsByTagName("tr");
            var r = rw[rw.length - 1];
       // deep clone the targeted row
    var new_row = x.rows[1].cloneNode(true);
       // get the total number of rows
    var len = x.rows.length;
       // set the innerHTML of the first row 
    new_row.cells[0].innerHTML = len;

       // grab the input from the first cell and update its ID and value
    var inp1 = new_row.cells[1].getElementsByTagName('input')[0];
    inp1.id = 'ktp-'+len;
    inp1.name= 'ktp-'+len;
    inp1.value = '';

       // grab the input from the first cell and update its ID and value
    var inp2 = new_row.cells[2].getElementsByTagName('input')[0];
    inp2.id = 'finger-'+len;
    inp2.name = 'finger-'+len;
    inp2.value = '';
    r.parentNode.insertBefore(new_row, r);
       // append the new row to the table
    //x.appendChild( new_row );

        }
    </script>
</x-modal>




		